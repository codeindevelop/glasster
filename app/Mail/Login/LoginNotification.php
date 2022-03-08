<?php

namespace App\Mail\Login;

use App\Models\User;
use Carbon\Carbon;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoginNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected  $user;
    protected  $ip;
    /**
     * @var string
     */
    protected $date;
    /**
     * @var string
     */
    protected $time;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $ip)
    {
        $this->user =  $user;

        $this->date = Verta(Carbon::now())->format('Y-n-j');
        $this->time = Verta(Carbon::now())->format('H:i');
        $this->ip = $ip;

        
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

        $this->subject = DB::table('email_templates')->where('id', 3)->value('subject');
        $this->email_text = DB::table('email_templates')->where('id', 3)->value('email_text');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): LoginNotification
    {
        return $this->view('email.auth.login.loginNotification')->subject($this->subject)->with([
            'first_name' => $this->user->first_name,
            'last_name' => $this->user->last_name,
            'ip' => $this->ip,
            'date' => $this->date,
            'time' => $this->time,

            
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
