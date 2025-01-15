<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactForm;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    /**
     *show contact pagina tonen
     */
    public function show()
    {
        return view('contact.show');
    }

    /**
     * verwerken
     */
    public function submit(Request $request)
    {
        // Valideer de invoer
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // in db opslaan, voor overview pagina admin
        $contact = ContactForm::create($request->only(['name', 'email', 'subject', 'message']));

        // Mailable mail sturen
        Mail::to(config('mail.admin_address'))->send(new ContactFormMail($contact));

        // succes + redirect
        return redirect()->route('contact.show')->with('success', 'Uw bericht is verzonden!');
    }
}
