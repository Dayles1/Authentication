<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailNotification extends Mailable
{
    use Queueable, SerializesModels;

    
    protected $url;
    protected $user;

    public function __construct($url, $user)
    {
        $this->url = $url;
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Hello',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
      $link=$this->url . '/verify-email?token='.$this->user->verification_token;
      return new Content
      (
        view:'emails.verify',
        with:[
            'link'=>$link,
            'user'=>$this->user
        ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
