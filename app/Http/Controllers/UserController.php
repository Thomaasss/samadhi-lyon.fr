<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function backendIndex (Request $request) {
        request()->session()->put('lien', '/backend/users');
        if(auth()->user()->is_admin) {
            $filter = $request->query('filter');

            if(!empty($filter)) {
                $users = User::where('users.name', 'like', '%'.$filter.'%')
                    ->paginate(10);
            } else {
                $users = User::paginate(10);
            }

            return view('backend.users.index', [
                'users' => $users
            ])->with('filter', $filter);
        }
    }

    public function backendEdit (User $el) {
        request()->session()->put('lien', '/backend/users');
        if(auth()->user()->is_admin || auth()->user()->id === $el->id) {
            return view('backend.users.edit', [
                'user' => $el
            ]);
        }
    }

    public function update (User $el) {
        if(auth()->user()->is_admin || auth()->user()->id === $el->id) {
            $attributes = request()->validate([
                'nom' => ['string', 'required', 'max:255'],
                'professionnel' => ['nullable'],
                'is_admin' => ['nullable'],
                'password' => 'nullable', 'confirmed', Rules\Password::defaults(),
            ]);

            if(request()->input('professionnel'))
                $el->update([
                    'name' => $attributes['nom'],
                    'professionnel_id' => $attributes['professionnel'],
                ]);
            else
                $el->update([
                    'name' => $attributes['nom']
                ]);

            if(request()->input('password')) {
                if(request()->input('password') === request()->input('password_confirmation')) {
                    $el->update([
                        'password' => Hash::make($attributes['password']),
                    ]);
                }
            }
            if(auth()->user()->is_admin) {
                if (!is_null(request()->input('is_admin')))
                    $el->update([
                        'is_admin' => 1
                    ]);
                else
                    $el->update([
                        'is_admin' => 0
                    ]);
            }

            return back()
                ->with('success', 'Utilisateur mis à jour');
        }
    }

    public function connectas($id){
        session()->put('rollback', Auth::user()->id);
        Auth::loginUsingId($id);

        return Redirect()->route('dashboard');
    }

    public function rollBackLogin( ){

        $id = session()->get('rollback');
        session()->forget('rollback');

        Auth::loginUsingId( $id );

        return Redirect()->route('users.backend.index');
    }

    public function backendCreate( ){
        if(auth()->user()->is_admin) {
            return view('backend.users.create');
        }
    }

    public function backendStore( ){
        if(auth()->user()->is_admin) {
            $attributes = request()->validate([
                'nom' => ['string', 'required', 'max:255'],
                'email' => ['string', 'required', 'max:255'],
                'professionnel' => ['nullable'],
                'is_admin' => ['nullable'],
                'password' => 'required', 'confirmed', Rules\Password::defaults(),
            ]);

            $el = User::create([
                'name' => $attributes['nom'],
                'email' => $attributes['email'],
                'professionnel_id' => $attributes['professionnel'],
                'password' => Hash::make($attributes['password']),
            ]);

            if (!is_null(request()->input('is_admin')))
                $el->update([
                    'is_admin' => 1
                ]);
            else
                $el->update([
                    'is_admin' => 0
                ]);

            return redirect('/backend/users')
                ->with('success', 'Utilisateur mis à jour');
        }
    }

    public function delete(User $el)
    {
        if(auth()->user()->is_admin && auth()->user()->id !== $el->id) {
            $el->delete();

            return redirect('/backend/users')->with([
                'success' => 'Utilisateur supprimé avec succès'
            ]);
        } else {
            abort(403, 'Vous n\'êtes pas administrateur');
        }
    }
}
