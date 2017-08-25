<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PleaseConfirmYourEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The user associated with the email.
     *
     * @var \App\User
     */
    public $user;

    /**
     * Create a new mailable instance.
     *
     * @param \App\User $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the email.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.confirm-email');
    }
}
