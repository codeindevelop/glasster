<?php

namespace App\Mail\PasswordReset;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetSuccess extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var User
     */
    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        //
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): PasswordResetSuccess
    {
        return $this->view('email.fa.auth.forgotPassword.passwordChanged')->subject('change password successful')->with([
            'first_name' => $this->user->first_name,
            'last_name' => $this->user->last_name,
        ]);
    }
}
