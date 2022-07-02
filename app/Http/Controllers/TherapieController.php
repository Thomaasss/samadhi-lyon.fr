<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Therapie;
use App\Models\Yoga;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class TherapieController extends Controller
{
    public function index () {
        request()->session()->put('lien', '/therapies');
        $therapies = Therapie::all()->shuffle();
        return view('frontend.therapies.index', [
            'therapies' => $therapies
        ]);
    }

    public function show (Therapie $el) {
        request()->session()->put('lien', '/therapies');
        return view('frontend.therapies.show', [
            'therapie' => $el
        ]);
    }

    public function avis(Therapie $el, string $discipline)
    {
        $attributes = request()->validate([
            'nom' => [
                'string',
                'required'
            ],
            'message' => [
                'string',
                'required'
            ]
        ]);

        $newAvis = Avis::create([
            'discipline_id' => $el->id,
            'discipline' => $discipline,
            'nom' => $attributes['nom'],
            'message' => $attributes['message'],
        ]);

        $to_name = 'Samadhi';
        $to_email = env('APP_MAIL');
        Mail::send('emails.avis', ["attributes"=>$attributes, "el" => $el], function($message) use ($el, $attributes, $to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Nouvel avis pour le cours '. $el->intitule .' !');
            $message->from('hello@thomasfenet.fr', $attributes['nom']);
        });

        /*$to_name = $attributes['name'];
        $to_email = $attributes['email'];
        Mail::send('emails.contact_confirmation', ["attributes"=>$attributes], function($message) use ($attributes, $to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Demande de contact');
            $message->from('hello@thomasfenet.fr', $attributes['name']);
        });*/

        return redirect()->back()->with([
            'success' => 'Avis envoyé avec succès'
        ]);
    }

    public function backendIndex (Request $request) {
        request()->session()->put('lien', '/backend/therapies');
        $filter = $request->query('filter');
        if (Auth::user()->is_admin == 1) {
            if (!empty($filter)) {
                $therapies = Therapie::where('therapies.intitule', 'like', '%' . $filter . '%')
                    ->paginate(10);
            } else {
                $therapies = Therapie::paginate(10);
            }
        } else {
            if (!empty($filter)) {
                $therapies = Therapie::where('professionnel_id', Auth::user()->professionnel_id)->where('therapies.intitule', 'like', '%' . $filter . '%')
                    ->paginate(10);
            } else {
                $therapies = Therapie::where('professionnel_id', Auth::user()->professionnel_id)->paginate(10);
            }
        }

        return view('backend.therapies.index', [
            'therapies' => $therapies
        ])->with('filter', $filter);
    }

    public function backendEdit (Therapie $el) {
        if(auth()->user()->is_admin || auth()->user()->professionnel->therapies->contains($el)) {
            request()->session()->put('lien', '/backend/therapies');
            return view('backend.therapies.edit', [
                'therapie' => $el
            ]);
        } else {
            abort('403', 'Vous n\'êtes pas administrateur');
        }
    }

    public function update (Therapie $el) {
        if(auth()->user()->is_admin || auth()->user()->professionnel->therapies->contains($el)) {
            $attributes = request()->validate([
                'intitule' => ['string', 'required'],
                'description' => ['nullable'],
                'image' => ['nullable'],
                'professionnel' => ['required'],
                'categorie' => ['nullable'],
                'tags' => ['array', 'nullable'],
                'imgStatus' => ['required'],
                'icon' => ['required'],
            ]);

            $el->update([
                'intitule' => $attributes['intitule'],
                'description' => $attributes['description'],
                'professionnel_id' => $attributes['professionnel'],
                'categorie_id' => $attributes['categorie'],
                'icon_id' => $attributes['icon']
            ]);

            DB::table('entite_tags')->where('entite_id', $el->id)->where('entite', 'therapie')->delete();
            if(request()->input('tags')) {
                foreach(request()->input('tags') as $tag) {
                    DB::table('entite_tags')->insert([
                        'entite_id' => $el->id,
                        'tag_id' => $tag,
                        'entite' => 'therapie'
                    ]);
                }
            }

            DB::table('therapies_tarifs')->where('therapie_id', $el->id)->delete();
            for($i = 0; $i < 10; $i++) {
                if(request()->input('tarif_intitule_'. $i)) {
                    DB::table('therapies_tarifs')->insert([
                        'therapie_id' => $el->id,
                        'prix_ttc' => request()->input('tarif_prix_'. $i),
                        'intitule' => request()->input('tarif_intitule_'. $i),
                        'duree' => request()->input('tarif_duree_'. $i),
                        'is_devis' => request()->input('is_devis_'. $i) ? 1 : 0
                    ]);
                }
            }

            if(request()->image) {
                $directory = storage_path('app/public/image/'. request()->image);
                $files = scandir ($directory);
                $firstFile = $directory .'/'. $files[2];// because [0] = "." [1] = ".."
                $fileName = $file = basename($firstFile);
                $file = str_replace('/var/www/html/samadhi/storage/app/public/', '/storage/', $firstFile);
                $el->update([
                    'image' => $file
                ]);
            }

            return redirect('/backend/therapies/'.$el->id)
                ->with('success','Thérapie mise à jour');
        } else {
            abort('403', 'Vous n\'êtes pas administrateur');
        }
    }

    public function backendCreate () {
        if(auth()->user()->is_admin) {
            request()->session()->put('lien', '/backend/therapies');
            return view('backend.therapies.create');
        } else {
            abort('403', 'Vous n\'êtes pas administrateur');
        }
    }

    public function backendStore () {
        if(auth()->user()->is_admin) {
            $attributes = request()->validate([
                'intitule' => ['string', 'required'],
                'description' => ['nullable'],
                'image' => ['nullable'],
                'professionnel' => ['required'],
                'tags' => ['array', 'nullable'],
                'imgStatus' => ['required'],
                'icon' => ['required'],
            ]);

            $el = Therapie::create([
                'intitule' => $attributes['intitule'],
                'description' => $attributes['description'],
                'professionnel_id' => $attributes['professionnel'],
                'icon_id' => $attributes['icon']
            ]);

            if(request()->input('tags')) {
                foreach(request()->input('tags') as $tag) {
                    DB::table('entite_tags')->insert([
                        'entite_id' => $el->id,
                        'tag_id' => $tag,
                        'entite' => 'therapie'
                    ]);
                }
            }

            for($i = 0; $i < 10; $i++) {
                if(request()->input('tarif_intitule_'. $i)) {
                    DB::table('therapies_tarifs')->insert([
                        'therapie_id' => $el->id,
                        'prix_ttc' => request()->input('tarif_prix_'. $i),
                        'intitule' => request()->input('tarif_intitule_'. $i),
                        'duree' => request()->input('tarif_duree_'. $i),
                        'is_devis' => request()->input('is_devis_'. $i) ? 1 : 0
                    ]);
                }
            }

            if(request()->image) {
                $directory= storage_path('app/public/image/'. request()->image);
                $files = scandir ($directory);
                $firstFile = $directory .'/'. $files[2];// because [0] = "." [1] = ".."
                $fileName = $file = basename($firstFile);
                $file = str_replace('/var/www/html/samadhi/storage/app/public/', '/storage/', $firstFile);

                $el->update([
                    'image' => $file
                ]);
            } else {
                $el->update([
                    'image' => '/images/white.png'
                ]);
            }

            return redirect('/backend/therapies/'.$el->id)
                ->with('success','Thérapie créée');
        } else {
            abort('403', 'Vous n\'êtes pas administrateur');
        }
    }

    public function delete(Therapie $el)
    {
        if(auth()->user()->is_admin || auth()->user()->professionnel->yogas->contains($el)) {
            $el->delete();

            return redirect('/backend/therapies')->with([
                'success' => 'Thérapie supprimée avec succès'
            ]);
        } else {
            abort(403, 'Vous n\'êtes pas administrateur');
        }
    }
}
