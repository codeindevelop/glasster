@extends('email.layout')
@section('content')


<tr>
    <td class="sm-px-24" style="--bg-opacity: 1; background-color: #ffffff; border-radius: 4px; font-size: 14px;font-weight: lighter; line-height: 24px; padding: 48px; text-align: right; --text-opacity: 1; color: #626262; " bgcolor="rgba(255, 255, 255, var(--bg-opacity))" align="right">
        <p style="font-weight: 600; font-size: 18px; margin-bottom: 0;">سلام {{$first_name}} عزیز</p>



        <p style="margin: 24px 0;font-size: 15px">
            {{ $email_text }}
        </p>
        <p style="margin: 24px 0;font-size: 15px;line-height: 35px;font-weight: 600;">
            تاریخ و زمان درخواست : {{$date}} <br>
            آی پی درخواست کننده : {{$ip}} <br>
        </p>

        <a style="width: 164px; height: 22px;  background: #378C8C;  color: #fff;  padding: 13px; border-radius: 35px; text-decoration: none;
    display: flex;  justify-content: center;  align-items: center; margin: 0 auto;" href={{ env('EMAIL_CHANGE_PASSWORD_LINK_PREFIX') . "$token"  }}>بازیابی رمز عبور</a>

        <p style="margin: 24px 0;font-size: 15px;color:darkred">
            لطفا در نظر داشته باشید در صورتی که درخواست تغییر رمز عبور از سمت شما نبوده است ، این ایمیل را نادیده بگیرید .
        </p>

        <table style="font-family: 'Montserrat',Arial,sans-serif; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
                <td style="font-family: 'Montserrat',Arial,sans-serif; padding-top: 32px; padding-bottom: 32px;">
                    <div style="--bg-opacity: 1; background-color: #eceff1; background-color: rgba(236, 239, 241, var(--bg-opacity)); height: 1px; line-height: 1px;">
                        &zwnj;
                    </div>
                </td>
            </tr>
        </table>


        <p style="margin: 0 0 16px;">{{ $email_signature }}</p>
    </td>
</tr>


@endsection