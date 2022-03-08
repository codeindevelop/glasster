@extends('email.layout')

@section('content')
<tr>
    <td align="center" style="font-family: tahoma;" class="sm-px-24">
        <table style="width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
                <td class="sm-px-24" style=" background-color: #ffffff; border-radius: 4px; font-size: 14px; line-height: 24px; padding: 48px; text-align: right; --text-opacity: 1; color: #626262;">
                    <p style="font-family: tahoma;color : #25255c;font-weight: 600; font-size: 18px; margin-bottom: 0;">سلام
                        {{ $first_name }} عزیز
                    </p>
                    <p style="font-family: tahoma;font-weight: 700; font-size: 20px; margin-top: 0; --text-opacity: 1; color: #ff5850; color: rgba(255, 88, 80, var(--text-opacity));">
                        {{-- {{ $first_name }} --}}
                    </p>
                    <p class="sm-leading-32" style="font-family: tahoma;font-weight: 100; font-size: 14px; margin: 0 0 24px; --text-opacity: 1; color: #25255c;">
                        {{ $email_text }}
                    </p>

                    <table style=" width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                        <tr>
                            <td style=" padding-top: 10px; padding-bottom: 32px;">
                                <div style="--bg-opacity: 1; background-color: #eceff1; background-color: rgba(236, 239, 241, var(--bg-opacity)); height: 1px; line-height: 1px;">
                                    &zwnj;
                                </div>
                            </td>
                        </tr>
                    </table>
                    {{-- Begin Invoice Table --}}
                    <table style=" width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">


                        <tr>
                            <td colspan="2">
                                <table style=" width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                    <tr>
                                        <th align="right" style="font-family: tahoma;color: #25255c ;padding-bottom: 8px;">
                                            <p>شرح ثبت نام</p>
                                        </th>
                                        <th align="right" style="font-family: tahoma;color: #25255c ;padding-bottom: 8px;">
                                            <p>جزئیات</p>
                                        </th>
                                    </tr>

                                    <tr>
                                        <td style="font-family: tahoma;color: #25255c ; font-size: 14px; padding-top: 10px; padding-bottom: 10px; width: 80%;" width="80%">
                                            نام و نام خانوادگی
                                        </td>
                                        <td align="right" style="font-family: tahoma;color: #25255c ; font-size: 14px; text-align: right; width: 20%;" width="20%">{{ $first_name . ' ' . $last_name }}</td>
                                    </tr>

                                    <tr>
                                        <td style="font-family: tahoma;color: #25255c ; font-size: 14px; padding-top: 10px; padding-bottom: 10px; width: 80%;" width="80%">
                                            زمان ثبت نام
                                        </td>
                                        <td align="right" style="font-family: tahoma;color: #25255c ; font-size: 11px; text-align: right; width: 20%;" width="20%">{{ $date }}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-family: tahoma;color: #25255c ; font-size: 14px; padding-top: 10px; padding-bottom: 10px; width: 80%;" width="80%">
                                            آدرس IP ثبت نام
                                        </td>
                                        <td align="right" style="font-family: tahoma;color: #25255c ; font-size: 14px; text-align: right; width: 20%;" width="20%">{{ $ip }}</td>
                                    </tr>


                                </table>

                                <table align="center" style=" margin-left: auto; margin-right: auto; text-align: center; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                    <tr>
                                        <td align="left">
                                            <table style="font-family:tahoma, 'Montserrat',Arial,sans-serif; margin-top: 24px; margin-bottom: 24px;" cellpadding="0" cellspacing="0" role="presentation">
                                                <tr>
                                                    <td width="100%" align="right" style="width: 100%; --bg-opacity: 1; background-color: #7367f0;  border-radius: 4px;">
                                                        <a style="font-family: tahoma;display: block;width: 100%; font-weight: 600;  font-size: 14px; line-height: 100%; padding: 16px 24px;color: #ffffff; text-decoration: none;" href={{ env('EMAIL_ACTIVE_LINK_PREFIX') . "$activation_token" }}>فعالسازی حساب کاربری</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                    <table style=" width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                        <tr>
                            <td style=" padding-top: 10px; padding-bottom: 32px;">
                                <div style="--bg-opacity: 1; background-color: #eceff1; background-color: rgba(236, 239, 241, var(--bg-opacity)); height: 1px; line-height: 1px;">
                                    &zwnj;
                                </div>
                            </td>
                        </tr>
                    </table>


                    <p style="font-family: tahoma;margin: 0 0 16px;color: #25255c ;">{{ $email_signature }}</p>
                </td>
            </tr>
            <tr>
                <td style=" height: 20px;" height="20"></td>
            </tr>



            <tr>
                <td style="height: 16px;" height="16"></td>
            </tr>
        </table>
    </td>
</tr>

@endsection