@extends('email.layout')
@section('content')


<tr>
    <td class="sm-px-24" style="--bg-opacity: 1; background-color: #ffffff; border-radius: 4px; font-size: 14px;font-weight: lighter; line-height: 24px; padding: 48px; text-align: right; --text-opacity: 1; color: #626262; " bgcolor="rgba(255, 255, 255, var(--bg-opacity))" align="right">
        <p style="font-weight: 600; font-size: 18px; margin-bottom: 0;">سلام {{$first_name}} عزیز</p>


        <p style="margin: 24px 0;font-size: 15px">
            {{$email_text}}
        </p>



        <p style="margin: 0 0 16px;">{{ $email_signature }}</p>


    </td>
</tr>


@endsection