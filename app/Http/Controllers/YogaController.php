<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Photo;
use App\Models\Therapie;
use App\Models\Yoga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class YogaController extends Controller
{
    public function index () {
        request()->session()->put('lien', '/yogas');
        $yogas = Yoga::all()->shuffle();
        return view('frontend.yogas.index', [
            'yogas' => $yogas
        ]);
    }

    public function reservation () {
        request()->session()->put('lien', '/yogas');
        return view('frontend.yogas.reservation');
    }

    public function show (Yoga $el) {
        request()->session()->put('lien', '/yogas');
        return view('frontend.yogas.show', [
            'yoga' => $el
        ]);
    }

    public function avis(Yoga $el, string $discipline)
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

        $newContact = Avis::create([
            'discipline_id' => $el->id,
            'nom' => $attributes['nom'],
            'message' => $attributes['message'],
            'discipline' => $discipline,
        ]);

        $to_name = 'Samadhi';
        $to_email = env('APP_MAIL');
        $to_email = 'sheepbild@gmail.com';
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
        request()->session()->put('lien', '/backend/yogas');
        $filter = $request->query('filter');

        if(Auth::user()->is_admin == 1) {
            if(!empty($filter)) {
                $yogas = Yoga::where('yogas.intitule', 'like', '%'.$filter.'%')
                    ->paginate(10);
            } else {
                $yogas = Yoga::paginate(10);
            }
        } else {
            if(!empty($filter)) {
                $yogas = Yoga::where('professionnel_id', Auth::user()->professionnel_id)->where('yogas.intitule', 'like', '%'.$filter.'%')
                    ->paginate(10);
            } else {
                $yogas = Yoga::where('professionnel_id', Auth::user()->professionnel_id)->paginate(10);
            }
        }

        return view('backend.yogas.index', [
            'yogas' => $yogas
        ])->with('filter', $filter);
    }

    public function backendEdit (Yoga $el) {
        if(auth()->user()->is_admin || auth()->user()->professionnel->yogas->contains($el)) {
            request()->session()->put('lien', '/backend/yogas');
            return view('backend.yogas.edit', [
                'yoga' => $el
            ]);
        } else {
            abort(403, 'Vous n\'êtes pas administrateur');
        }
    }

    public function update (Yoga $el) {
        if(auth()->user()->is_admin || auth()->user()->professionnel->yogas->contains($el)) {
            $attributes = request()->validate([
                'intitule' => ['string', 'required'],
                'description' => ['required'],
                'image' => ['nullable'],
                'professionnel' => ['nullable'],
                'tags' => ['array', 'nullable'],
                'for_children' => ['nullable'],
                'imgStatus' => ['required'],
                'icon' => ['required'],
            ]);

            $el->update([
                'intitule' => $attributes['intitule'],
                'description' => $attributes['description'],
                'icon_id' => $attributes['icon'],
            ]);

            if(request()->input('professionnel')) {
                $el->update([
                    'professionnel_id' => $attributes['professionnel'],
                ]);
            }

            DB::table('entite_tags')->where('entite_id', $el->id)->where('entite', 'yoga')->delete();
            if(request()->input('tags')) {
                foreach(request()->input('tags') as $tag) {
                    DB::table('entite_tags')->insert([
                        'entite_id' => $el->id,
                        'tag_id' => $tag,
                        'entite' => 'yoga'
                    ]);
                }
            }

            if(request()->input('for_children'))
                $el->update([
                    'is_for_children' => 1
                ]);
            else
                $el->update([
                    'is_for_children' => 0
                ]);

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

            return redirect('/backend/yogas/'.$el->id)
                ->with('success','Cours mis à jour');
        } else {
            abort(403, 'Vous n\'êtes pas administrateur');
        }
    }

    public function backendCreate () {
        if(auth()->user()->is_admin) {
            request()->session()->put('lien', '/backend/yogas');
            return view('backend.yogas.create');
        } else {
            abort(403, 'Vous n\'êtes pas administrateur');
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
                'for_children' => ['nullable'],
                'imgStatus' => ['required'],
                'icon' => ['required'],
            ]);

            $el = Yoga::create([
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
                        'entite' => 'yoga'
                    ]);
                }
            }

            if(request()->input('for_children'))
                $el->update([
                    'is_for_children' => 1
                ]);
            else
                $el->update([
                    'is_for_children' => 0
                ]);

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

            return redirect('/backend/yogas/'.$el->id)
                ->with('success','Cours créé');
        } else {
            abort(403, 'Vous n\'êtes pas administrateur');
        }
    }

    public function delete(Yoga $el)
    {
        if(auth()->user()->is_admin || auth()->user()->professionnel->yogas->contains($el)) {
            $el->delete();

            return redirect('/backend/yogas')->with([
                'success' => 'Cours supprimée avec succès'
            ]);
        } else {
            abort(403, 'Vous n\'êtes pas administrateur');
        }
    }
}
