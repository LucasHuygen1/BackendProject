<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ContactForm;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    /**
     * 
     *
     * @param \App\Models\ContactForm $contact
     */
    public function __construct(ContactForm $contact)
    {
        $this->contact = $contact;
    }

    /**
     *  email opbouwen
     */
    public function build()
    {
        //email opzetten 
        return $this->subject($this->contact->subject)
                    ->view('emails.contact')
                    ->with(['contact' => $this->contact]);
    }
}
