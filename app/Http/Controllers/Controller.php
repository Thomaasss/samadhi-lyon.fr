<?php

namespace App\Http\Controllers;

use App\Models\CategorieChantier;
use App\Models\Chantier;
use App\Models\Therapie;
use App\Models\Yoga;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index () {
        request()->session()->put('lien', '/home');
        $yogas = Yoga::all()->shuffle();
        $therapies = Therapie::all()->shuffle();
        return view('frontend.index', [
            'yogas' => $yogas,
            'therapies' => $therapies
        ]);
    }

    public function temoignages () {
        request()->session()->put('lien', '/temoignages');

        return view('frontend.temoignages');
    }
}
