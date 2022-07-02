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

class ReviewController extends Controller
{
    public function backendIndex (Request $request) {
        request()->session()->put('lien', '/backend/reviews');
        $filter = $request->query('filter');
        if (auth()->user()->is_admin == 1) {
            if (!empty($filter)) {
                $avis = Avis::where('message', 'like', '%' . $filter . '%')->orderByDesc('is_active')->orderByDesc('created_at')
                    ->paginate(10);
            } else {
                $avis = Avis::orderBy('is_active')->orderByDesc('created_at')->paginate(10);
            }

            return view('backend.reviews.index', [
                'avis' => $avis
            ])->with('filter', $filter);
        } else {
            return abort('403', 'Non autorisé');
        }
    }

    public function backendEdit (Avis $el) {
        if(auth()->user()->is_admin) {
            request()->session()->put('lien', '/backend/reviews');
            return view('backend.reviews.edit', [
                'avis' => $el
            ]);
        } else {
            abort('403', 'Vous n\'êtes pas administrateur');
        }
    }

    public function switchValidation (Avis $el) {
        if(auth()->user()->is_admin) {
            $state = $el->switchValidation() ? 'validé' : 'invalidé';
            return redirect()->back()->with([
                'success' => 'Avis '. $state .' avec succès'
            ]);
        } else {
            abort('403', 'Vous n\'êtes pas administrateur');
        }
    }

    public function delete(Avis $el)
    {
        if(auth()->user()->is_admin) {
            $el->delete();

            return redirect('/backend/reviews')->with([
                'success' => 'Avis supprimé avec succès'
            ]);
        } else {
            abort(403, 'Vous n\'êtes pas administrateur');
        }
    }
}
