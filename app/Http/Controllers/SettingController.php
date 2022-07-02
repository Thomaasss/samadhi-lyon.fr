<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function update() {
        if(auth()->user()->is_admin) {
            $attributes = request()->validate([
                'tel_princ' => ['nullable'],
                'tel_sec' => ['nullable'],
                'email' => ['nullable'],
            ]);

            $arr = [
                'email' => $attributes['email'],
                'tel_sec' => $attributes['tel_sec'],
                'tel_princ' => $attributes['tel_princ'],
                'updated_by' => auth()->user()->id
            ];

            $setting = Setting::first();
            if($setting) {
                $setting->update($arr);
            } else {
                Setting::create($arr);
            }

            return back()
                ->with('success','Paramètres mis à jour');
        } else {
            abort('403', 'Vous n\'êtes pas administrateur de la plateforme');
        }
    }
}
