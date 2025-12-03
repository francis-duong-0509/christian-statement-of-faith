<?php

namespace App\Mail;

use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewSubscriberMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public Subscriber $subscriber
    ) {}

    public function envelope(): Envelope
    {
        $prefix = $this->subscriber->locale === 'vi'
            ? 'Nguoi dang ky moi'
            : 'New Subscriber';

        return new Envelope(
            subject: "{$prefix}: {$this->subscriber->email}",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.new-subscriber',
            with: [
                'subscriber' => $this->subscriber,
            ],
        );
    }
}
