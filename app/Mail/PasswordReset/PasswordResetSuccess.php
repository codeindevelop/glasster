<?php

namespace App\Mail\PasswordReset;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

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


        $this->website_name = DB::table('general_settings')->where('id', 1)->value('website_name');
        $this->main_domain = DB::table('general_settings')->where('id', 1)->value('main_domain');

        $this->instagram = DB::table('social_settings')->where('id', 1)->value('instagram');
        $this->facebook_page = DB::table('social_settings')->where('id', 1)->value('facebook_page');
        $this->twitter = DB::table('social_settings')->where('id', 1)->value('twitter');

        $this->email_signature = DB::table('email_settings')->where('id', 1)->value('email_signature');
        $this->email_logo = DB::table('email_settings')->where('id', 1)->value('email_logo');
        $this->email_header = DB::table('email_settings')->where('id', 1)->value('email_header');
        $this->email_footer = DB::table('email_settings')->where('id', 1)->value('email_footer');
        $this->show_instagram = DB::table('email_settings')->where('id', 1)->value('show_instagram');
        $this->show_twitter = DB::table('email_settings')->where('id', 1)->value('show_twitter');
        $this->show_facebook = DB::table('email_settings')->where('id', 1)->value('show_facebook');

        $this->subject = DB::table('email_templates')->where('id', 4)->value('subject');
        $this->email_text = DB::table('email_templates')->where('id', 4)->value('email_text');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): PasswordResetSuccess
    {
        return $this->view('email.auth.forgotPassword.changePassword')->subject($this->subject)->with([
            'first_name' => $this->user->first_name,
            'last_name' => $this->user->last_name,


            'email_text' => $this->email_text,

            'website_name' => $this->website_name,
            'main_domain' => $this->main_domain,

            'instagram' => $this->instagram,
            'facebook_page' => $this->facebook_page,
            'twitter' => $this->twitter,

            'email_signature' => $this->email_signature,
            'email_logo' => $this->email_logo,
            'email_header' => $this->email_header,
            'email_footer' => $this->email_footer,
            'show_instagram' => $this->show_instagram,
            'show_twitter' => $this->show_twitter,
            'show_facebook' => $this->show_facebook,
        ]);
    }
}
