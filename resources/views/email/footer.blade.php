<tr>
    <td style=" font-size: 12px; padding-left: 48px; padding-right: 48px; --text-opacity: 1; color: #eceff1; color: rgba(236, 239, 241, var(--text-opacity));">
        <p align="center" style="cursor: default; margin-bottom: 16px;">
            <a href="{{ $instagram }}" style="--text-opacity: 1; color: #263238; color: rgba(38, 50, 56, var(--text-opacity)); text-decoration: none;"><img src="{{ URL::asset('/system/assets/img/instagram.png') }}" width="25" alt="instagram" style="border: 0; max-width: 100%; line-height: 100%; vertical-align: middle; margin-left: 12px;"></a>

            <a href="{{ $twitter }}" style="--text-opacity: 1; color: #263238; color: rgba(38, 50, 56, var(--text-opacity)); text-decoration: none;"><img src="{{ URL::asset('/system/assets/img/twitter.png') }}" width="25" alt="Twitter" style="border: 0; max-width: 100%; line-height: 100%; vertical-align: middle; margin-left: 12px;"></a>

            <a href="{{ $facebook_page }}" style="--text-opacity: 1; color: #263238; color: rgba(38, 50, 56, var(--text-opacity)); text-decoration: none;"><img src="{{ URL::asset('/system/assets/img/facebook.png') }}" width="25" alt="facebook" style="border: 0; max-width: 100%; line-height: 100%; vertical-align: middle; margin-left: 12px;"></a>
        </p>
        <p style="font-family: tahoma;text-align:center;--text-opacity: 1; color: #ffffff;">
         {{ $email_footer }}
        </p>
    </td>
</tr>