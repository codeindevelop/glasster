<?php

namespace App\Jobs\Auth;

use App\Mail\Signup\UserSignup;
use App\Models\Profile\PersonalUserInfo;
use App\Models\UserNotificationSetting;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ProcessUserRegister implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var User
     */
    public $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        //
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = $this->user;

        $personalUserInfo = new PersonalUserInfo([
            'user_id' => $user->id,
            'father_name' => null,
            'gender' => null,
            'date_of_birth' => null,
            'shenasname_no' => null,
            'mellicode' => null,
            'country_id' => 101,
            'home_address' => null,
            'phone_number' => null,
            'image_mellicard' => null,
            'verified' => false,
            'status' => 'user-registered',
            'user_verified_at' => null,
        ]);


        // Save User Personal Info
        $user->personalInfos()->save($personalUserInfo);

        // Create notification setting to user
        $notification_setting = new UserNotificationSetting([
            'user_id' => $user->id,
            'login_email' => true,
            'login_sms' => false,
            'logout_email' => true,
            'logout_sms' => false,
            'create_transaction_email' => true,
            'create_transaction_sms' => true,
            'payed_transaction_email' => true,
            'payed_transaction_sms' => true,
            'create_withdraw_email' => true,
            'create_withdraw_sms' => true,
            'add_bank_email' => true,
            'add_bank_sms' => true,
            'pay_profit_email' => true,
            'pay_profit_sms' => true,
            'create_investment_email' => true,
            'create_investment_sms' => true,
            'create_ticket_email' => true,
            'create_ticket_sms' => true,
            'answer_ticket_email' => true,
            'answer_ticket_sms' => true,
            'store_verification_email' => true,
            'store_verification_sms' => true,
            'change_verification_email' => true,
            'change_verification_sms' => true
        ]);

        $notification_setting->save();


        // Try Send Mail to User
        Mail::to($user->email)->send(new UserSignup($user));
    }
}
