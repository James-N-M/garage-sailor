<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactAdCreator extends Mailable
{
    use Queueable, SerializesModels;

    public $body;

    public function __construct(string $body)
    {
        $this->body = $body;
    }

    public function build()
    {
        return $this->from(auth()->user()->email)
            ->markdown('emails.contact-ad-creator');
    }
}
