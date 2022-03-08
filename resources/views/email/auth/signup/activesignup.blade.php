@extends('email.layout')

@section('content')
<tr>
    <td align="center" class="sm-px-24" style="direction:rtl;font-family: 'tahoma' ,'Montserrat',Arial,sans-serif;">
        <table style="font-family: 'tahoma',Arial,sans-serif; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
                <td class="sm-px-24" style=" background-color: #ffffff; border-radius: 4px; font-family: 'tahoma', Montserrat, -apple-system, 'Segoe UI', sans-serif; font-size: 14px; line-height: 24px; padding: 48px; text-align: right; --text-opacity: 1; color: #626262;">
                    <p style="color : #25255c;font-weight: 600; font-size: 18px; margin-bottom: 0;">سلام
                        {{ $first_name }} عزیز
                    </p>
                    <p style="font-weight: 700; font-size: 20px; margin-top: 0; --text-opacity: 1; color: #ff5850; color: rgba(255, 88, 80, var(--text-opacity));">
                        {{-- {{ $first_name }} --}}
                    </p>
                    <p class="sm-leading-32" style="font-weight: 100; font-size: 14px; margin: 0 0 24px; --text-opacity: 1; color: #25255c;">
                        {{$email_text}}
                    </p>


                    <p style="margin: 0 0 16px;color: #25255c ;"> {{ $email_signature }} </p>
                </td>
            </tr>


        </table>
    </td>
</tr>

@endsection