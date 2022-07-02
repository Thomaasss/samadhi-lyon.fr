<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Photo;
use App\Models\Tag;
use App\Models\Therapie;
use App\Models\Yoga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class TagController extends Controller
{
    public function backendIndex (Request $request) {
        request()->session()->put('lien', '/backend/tags');
        $filter = $request->query('filter');

        if(!empty($filter)) {
            $tags = Tag::where('yogas.intitule', 'like', '%'.$filter.'%')
                ->paginate(10);
        } else {
            $tags = Tag::paginate(10);
        }

        return view('backend.tags.index', [
            'tags' => $tags
        ])->with('filter', $filter);
    }

    public function backendEdit (Tag $el) {
        request()->session()->put('lien', '/backend/tags');
        return view('backend.tags.edit', [
            'tag' => $el
        ]);
    }

    public function update (Yoga $el) {
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

        $el->update([
            'intitule' => $attributes['intitule'],
            'description' => $attributes['description'],
            'professionnel_id' => $attributes['professionnel'],
            'icon_id' => $attributes['icon'],
        ]);

        if(request()->input('for_children'))
            $el->update([
                'is_for_children' => 1
            ]);
        else
            $el->update([
                'is_for_children' => 0
            ]);

        if(request()->file('image') && $attributes['imgStatus'] == 0) {
            Storage::delete(str_replace('/storage/', '', $el->image));

            $fileName = time().'_'.request()->image->getClientOriginalName();
            $filePath = request()->file('image')->storeAs('uploads', $fileName, 'public');

            $el->update([
                'image' => '/storage/' . $filePath
            ]);
        }
        if($attributes['imgStatus'] == 1) {
            Storage::delete(str_replace('/storage/', '', $el->image));
        }

        return back()
            ->with('success','Tag mis à jour');
    }

    public function backendCreate () {
        request()->session()->put('lien', '/backend/tags');
        return view('backend.tags.create');
    }

    public function backendStore () {
        $attributes = request()->validate([
            'intitule' => ['string', 'required']
        ]);

        $el = Tag::create([
            'intitule' => $attributes['intitule']
        ]);

        return back()
            ->with('success','Tag créé');
    }

    public function delete(Tag $el)
    {
        $el->delete();

        return redirect('/backend/tags')->with([
            'success' => 'Tag supprimé avec succès'
        ]);
    }
}
