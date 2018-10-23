<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyEmailRegistration extends Mailable
{
    use Queueable, SerializesModels;
    private $user;
    private $view;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->view = 'backend.layouts.mail.confirm';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // example: domain.com/verify?token=xxxx
        $route = route('member.verify', ['token' => Crypt::encrypt($this->user->email)]);
        return $this->subject('Verify Your Email Address')
            ->with([
                'route' => $route,
                'user' => $this->user
            ])
            ->view($this->view);
    }
}
