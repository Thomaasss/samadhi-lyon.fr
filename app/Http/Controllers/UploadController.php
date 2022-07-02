<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request) {
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() .'-'. now()->timestamp;
            $file->storeAs('image/'. $folder, $filename);

            return $folder;
        }

        return '';
    }

    public function delete(Request $request) {
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() .'-'. now()->timestamp;
            $file->storeAs('image/'. $folder, $filename);

            return $folder;
        }

        return '';
    }
}
