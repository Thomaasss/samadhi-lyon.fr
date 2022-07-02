<?php

namespace App\Http\Controllers;

use App\Models\Professionnel;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfessionnelController extends Controller
{
    public function backendIndex (Request $request) {
        if(auth()->user()->is_admin) {
            request()->session()->put('lien', '/backend/professionnels');

            $filter = $request->query('filter');

            if(!empty($filter)) {
                $pros = Professionnel::where('professionnel.nom', 'like', '%'.$filter.'%')
                    ->paginate(10);
            } else {
                $pros = Professionnel::paginate(10);
            }

            return view('backend.professionnels.index', [
                'pros' => $pros
            ])->with('filter', $filter);
        } else {
            abort('403', 'Vous n\'êtes pas administrateur de la plateforme');
        }
    }

    public function backendCreate () {
        if(auth()->user()->is_admin) {
            request()->session()->put('lien', '/backend/professionnels');
            return view('backend.professionnels.create');
        } else {
            abort('403', 'Vous n\'êtes pas administrateur de la plateforme');
        }
    }

    public function backendStore () {
        if(auth()->user()->is_admin) {
            $attributes = request()->validate([
                'nom' => ['string', 'required'],
                'description' => ['nullable'],
                'image' => ['nullable'],
                'imgStatus' => ['required'],
                'email' => ['nullable'],
                'tel' => ['nullable'],
                'website' => ['nullable'],
            ]);

            $el = Professionnel::create([
                'nom' => $attributes['nom'],
                'description' => $attributes['description'],
                'email' => $attributes['email'],
                'tel' => $attributes['tel'],
                'website' => $attributes['website']
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

            return redirect('/backend/professionnels')
                ->with('success','Membre créé avec succès');
        } else {
            abort('403', 'Vous n\'êtes pas administrateur de la plateforme');
        }
    }

    public function backendEdit (Professionnel $el) {
        if(auth()->user()->is_admin || auth()->user()->professionnel_id == $el->id) {
            request()->session()->put('lien', '/backend/professionnels');

            return view('backend.professionnels.edit', [
                'prof' => $el
            ]);
        } else {
            abort('403', 'Vous n\'êtes pas administrateur de la plateforme');
        }
    }

    public function update (Professionnel $el) {
        if(auth()->user()->is_admin || auth()->user()->professionnel_id == $el->id) {
            $attributes = request()->validate([
                'nom' => ['string', 'required'],
                'description' => ['nullable'],
                'image' => ['nullable'],
                'imgStatus' => ['required'],
                'email' => ['nullable'],
                'tel' => ['nullable'],
                'website' => ['nullable'],
            ]);

            $el->update([
                'nom' => $attributes['nom'],
                'description' => $attributes['description'],
                'email' => $attributes['email'],
                'tel' => $attributes['tel'],
                'website' => $attributes['website']
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

            return back()
                ->with('success','Membre mis à jour');
        } else {
            abort('403', 'Vous n\'êtes pas administrateur de la plateforme');
        }
    }

    public function delete(Professionnel $el)
    {
        if(auth()->user()->is_admin || auth()->user()->professionnel_id == $el->id) {
            \App\Models\Yoga::where('professionnel_id', $el->id)->delete();
            \App\Models\Therapie::where('professionnel_id', $el->id)->delete();
            $el->delete();

            return redirect('/backend/professionnels')->with([
                'success' => 'Membre supprimé avec succès'
            ]);
        }
    }
}
