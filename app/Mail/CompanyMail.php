<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class CompanyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Firmadan Geri Bildirim Var!",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.company_mail',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
