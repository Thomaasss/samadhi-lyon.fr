<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store()
    {
        $attributes = request()->validate([
            'nom' => [
                'string',
                'required'
            ],
            'tel' => [
                'string',
                'required'
            ],
            'email' => [
                'string',
                'required'
            ],
            'message' => [
                'string',
                'required'
            ]
        ]);

        if($attributes['nom'] == 'Henryvah') {
            return redirect()->back()->with('L\'envoi a échoué');
        }
        $newContact = Contact::create([
            'nom' => $attributes['nom'],
            'email' => $attributes['email'],
            'tel' => $attributes['tel'],
            'message' => $attributes['message'],
        ]);

        $to_name = 'Samadhi';
        $to_email = 'contact@samadhi-lyon.fr';
        Mail::send('emails.contact', ["attributes"=>$attributes], function($message) use ($attributes, $to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Nouveau contact !');
            $message->from('hello@thomasfenet.fr', $attributes['nom']);
        });

        /*$to_name = $attributes['name'];
        $to_email = $attributes['email'];
        Mail::send('emails.contact_confirmation', ["attributes"=>$attributes], function($message) use ($attributes, $to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Demande de contact');
            $message->from('hello@thomasfenet.fr', $attributes['name']);
        });*/

        return redirect('contact')->with([
            'success' => 'Message envoyé avec succès'
        ]);
    }

    public function index() {
        if(auth()->user()->is_admin) {
            request()->session()->put('lien', '/backend/contacts');

            $filter = request()->query('filter');

            if(!empty($filter)) {
                $contacts = Contact::where('professionnel.nom', 'like', '%'.$filter.'%')
                    ->sortByDesc('created_at')
                    ->paginate(10);
            } else {
                $contacts = Contact::orderByDesc('created_at')->paginate(10);
            }

            return view('backend.contacts.index', [
                'contacts' => $contacts
            ])->with('filter', $filter);
        } else {
            abort('403', 'Vous n\'êtes pas administrateur de la plateforme');
        }
    }
}
