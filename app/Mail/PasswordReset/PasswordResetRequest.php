<?php

namespace App\Mail\PasswordReset;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetRequest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var User
     */
    private $user;
    /**
     * @var string
     */
    private $date;
    /**
     * @var string
     */
    private $time;
    private $ip;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $ip)
    {
        $this->user =  $user;

        $this->date = Verta(Carbon::now())->format('j-n-Y');
        $this->time = Verta(Carbon::now())->format('H:i');
        $this->ip = $ip;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): PasswordResetRequest
    {
        return $this->view('email.fa.auth.forgotPassword.passwordRequest')->subject('Password reset Request')->with([
            'first_name' => $this->user->first_name,
            'last_name' => $this->user->last_name,
            'ip' => $this->ip,
            'date' => $this->date,
            'time' => $this->time,
        ]);
    }
}
