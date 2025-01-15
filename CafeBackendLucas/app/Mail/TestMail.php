<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $messageContent;

    /**
     * Maak een nieuwe mail instance.
     *
     * @param string $messageContent
     */
    public function __construct(string $messageContent)
    {
        $this->messageContent = $messageContent;
    }

    /**
     * email opbouwen
     */
    public function build()
    {
        $recipientEmail = config('mail.admin_address'); //van env file
        $recipientName  = 'Admin';
    
        return $this->subject('Test Email via Mailtrap')
                    ->to($recipientEmail, $recipientName)
                    ->view('emails.test')
                    ->with(['messageContent' => $this->messageContent]);
    }
    
}
