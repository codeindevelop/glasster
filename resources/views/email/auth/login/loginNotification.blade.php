@extends('email.layout')

@section('content')
    <tr>
        <td align="center" class="sm-px-24" style="direction:rtl;font-family: 'tahoma' ,Arial,sans-serif;">
            <table style="font-family: 'tahoma','Montserrat',Arial,sans-serif; width: 100%;" width="100%"
                   cellpadding="0"
                   cellspacing="0" role="presentation">
                <tr>
                    <td class="sm-px-24" style=" background-color: #ffffff; border-radius: 4px; font-family: 'tahoma', Montserrat, -apple-system, 'Segoe UI', sans-serif; font-size: 14px; line-height: 24px; padding: 48px; text-align: right; --text-opacity: 1; color: #626262; color: rgba(98, 98, 98, var(--text-opacity));

                    ">
                        <p style="color : #25255c;font-weight: 600; font-size: 18px; margin-bottom: 0;">سلام
                            {{ $first_name }} عزیز </p>
                        <p
                            style="font-weight: 700; font-size: 20px; margin-top: 0; --text-opacity: 1; color: #ff5850; color: rgba(255, 88, 80, var(--text-opacity));">
                            {{-- {{ $first_name }} --}}
                        </p>
                        <p class="sm-leading-32"
                           style="font-weight: 100; font-size: 14px; margin: 0 0 24px; --text-opacity: 1; color: #25255c;">
                           {{ $email_text }}
                        </p>

                        <table style="font-family: 'Montserrat',Arial,sans-serif; width: 100%;" width="100%"
                               cellpadding="0"
                               cellspacing="0" role="presentation">
                            <tr>
                                <td
                                    style="font-family: 'Montserrat',Arial,sans-serif; padding-top: 10px; padding-bottom: 32px;">
                                    <div
                                        style="--bg-opacity: 1; background-color: #eceff1; background-color: rgba(236, 239, 241, var(--bg-opacity)); height: 1px; line-height: 1px;">
                                        &zwnj;
                                    </div>
                                </td>
                            </tr>
                        </table>
                        {{-- Begin Invoice Table --}}
                        <table style="font-family: tahoma,'Montserrat',Arial,sans-serif; width: 100%;" width="100%"
                               cellpadding="0" cellspacing="0" role="presentation">


                            <tr>
                                <td colspan="2" style="font-family:'tahoma', 'Montserrat',Arial,sans-serif;">
                                    <table style="font-family:'tahoma', 'Montserrat',Arial,sans-serif; width: 100%;"
                                           width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                        <tr>
                                            <th align="right" style="color: #25255c ;padding-bottom: 8px;">
                                                <p>شرح ورود</p>
                                            </th>
                                            <th align="right" style="color: #25255c ;padding-bottom: 8px;">
                                                <p>جزئیات</p>
                                            </th>
                                        </tr>

                                        <tr>
                                            <td style="color: #25255c ;font-family: 'tahoma','Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px; width: 80%;"
                                                width="80%">
                                                تاریخ ورود
                                            </td>
                                            <td align="right"
                                                style="color: #25255c ;font-family: 'tahoma','Montserrat',Arial,sans-serif; font-size: 14px; text-align: right; width: 20%;"
                                                width="20%">{{ $date }}</td>
                                        </tr>

                                        <tr>
                                            <td style="color: #25255c ;font-family: 'tahoma','Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px; width: 80%;"
                                                width="80%">
                                                ساعت ورود
                                            </td>
                                            <td align="right"
                                                style="color: #25255c ;font-family: 'tahoma','Montserrat',Arial,sans-serif; font-size: 14px; text-align: right; width: 20%;"
                                                width="20%">{{ $time }}</td>
                                        </tr>
                                        <tr>
                                            <td style="color: #25255c ;font-family: 'tahoma','Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px; width: 80%;"
                                                width="80%">
                                                آدرس آی پی ورود
                                            </td>
                                            <td align="right"
                                                style="color: #25255c ;font-family: 'tahoma','Montserrat',Arial,sans-serif; font-size: 14px; text-align: right; width: 20%;"
                                                width="20%">{{ $ip }}</td>
                                        </tr>


                                    </table>

                                </td>
                            </tr>
                        </table>

                        <table style="font-family: 'Montserrat',Arial,sans-serif; width: 100%;" width="100%"
                               cellpadding="0"
                               cellspacing="0" role="presentation">
                            <tr>
                                <td
                                    style="font-family: 'Montserrat',Arial,sans-serif; padding-top: 10px; padding-bottom: 32px;">
                                    <div
                                        style="--bg-opacity: 1; background-color: #eceff1; background-color: rgba(236, 239, 241, var(--bg-opacity)); height: 1px; line-height: 1px;">
                                        &zwnj;
                                    </div>
                                </td>
                            </tr>
                        </table>


                        <p style="margin: 0 0 16px;color: #25255c ;">{{ $email_signature }}</p>
                    </td>
                </tr>
                <tr>
                    <td style="font-family: 'Montserrat',Arial,sans-serif; height: 20px;" height="20"></td>
                </tr>
            
            </table>
        </td>
    </tr>

@endsection
