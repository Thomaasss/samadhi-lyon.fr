<?php

namespace App\Http\Controllers;

use App\Models\Atelier;
use Illuminate\Http\Request;

class AtelierController extends Controller
{

    public function index () {
        request()->session()->put('lien', '/ateliers');
        $ateliers = Atelier::all()->shuffle();
        return view('frontend.ateliers.index', [
            'ateliers' => $ateliers
        ]);
    }
}
