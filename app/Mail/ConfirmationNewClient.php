<?php
/*****************************************************************************
 Fichier : ConfirmationNewClient
 Auteur : Amélie Fréchette
 Fonctionnalité : Gère l'envoi d'un courriel lorsqu'on ajoute un client a
 partir de cette endroit.
*****************************************************************************/

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ConfirmationNewClient extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(protected User $client)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {

        return new Envelope(
            subject: "Création de compte chez Sherby Pizzeria",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'courriel/mail',
            with:[
                'nom' => $this->client->name,
                'telephone' => $this->client->telephone,
                'courriel' => $this->client->email,
                'adresse' => $this->client->adresse,
            ],
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
