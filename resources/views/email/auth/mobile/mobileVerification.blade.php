@extends('email.layout')

@section('content')
    <tr>
        <td align="center" class="sm-px-24" style="direction:rtl;font-family: 'tahoma' ,Arial,sans-serif;">
            <table style="font-family: 'tahoma',Arial,sans-serif; width: 100%;" width="100%" cellpadding="0"
                cellspacing="0" role="presentation">
                <tr>
                    <td class="sm-px-24" style=" background-color: #ffffff; border-radius: 4px; font-family: 'tahoma', Montserrat, -apple-system, 'Segoe UI', sans-serif; font-size: 14px; line-height: 24px; padding: 48px; text-align: right; color: #626262;" >
                        <p style="color : #25255c;font-weight: 600; font-size: 18px; margin-bottom: 0;">سلام
                            {{ $first_name }} عزیز </p>
                        <p
                            style="font-weight: 700; font-size: 20px; margin-top: 0; --text-opacity: 1; color: #ff5850; color: rgba(255, 88, 80, var(--text-opacity));">
                            {{-- {{ $first_name }} --}}
                        </p>
                        <p class="sm-leading-32"
                            style="font-weight: 100; font-size: 14px; margin: 0 0 24px; --text-opacity: 1; color: #25255c;">
                            با تشکر از همراهی صمیمانه شما ، شماره همراه شما به شماره {{ $mobile_number }} با موفقیت در
                            تاریخ و ساعت {{ $date }} تایید گردید و در سامانه
                            صرافی اِکسیلوم ثبت گردید . لطفا این موضوع را در نظر داشته باشید که تمامی اعلان های ضروری برای شما به
                            شماره همراهی که تایید فرموده اید پیامک خواهد شد تا از هر گونه سوء استفاده توسط شخص دیگری از حساب
                            کاربری شما جلوگیری گردد .
                        </p>
                        <p class="sm-leading-32"
                            style="font-weight: 100; font-size: 14px; margin: 0 0 24px; --text-opacity: 1; color: #25255c;">
                            در صورتی که تمایل دارید پیامکی برای شما ارسال نگردد ، به آسانی می توانید از بخش تنظیمات حساب
                            کاربری خود در پنل کاربری صرافی اِکسیلوم ، تمامی اعلان ها یا برخی اعلان های مد نظر خود را که برای
                            شماره همراه شما پیامک می گردد را غیر فعال نمایید.
                        </p>



                        <p style="margin: 0 0 16px;color: #25255c ;">با تشکر از همراهی شما <br>صرافی اِکسیلوم</p>
                    </td>
                </tr>
                <tr>
                    <td style="font-family: 'Montserrat',Arial,sans-serif; height: 20px;" height="20"></td>
                </tr>
               
            </table>
        </td>
    </tr>

@endsection
