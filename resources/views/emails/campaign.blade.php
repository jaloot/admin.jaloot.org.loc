<!DOCTYPE html>
<html dir="rtl" lang="ar" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="color-scheme" content="light dark">
    <meta name="supported-color-schemes" content="light dark">
    <title>{{ $campaign->subject }}</title>
    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
</head>

<body style="margin:0; padding:0; background-color:#f9fafb; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;">

    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f9fafb; margin:0; padding:24px 0;">
        <tr>
            <td align="center">

                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width:600px; width:100%; background-color:#ffffff; border-radius:8px; overflow:hidden; border:1px solid #f3f4f6;">

                    {{-- Header --}}
                    <tr>
                        <td align="center" style="padding:24px 24px; border-bottom:1px solid #f3f4f6;">
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td style="padding-inline-start:12px; font-size:16px; font-weight:bold; color:#111827; font-family:Tahoma, Arial, sans-serif;" dir="rtl">
                                        {{ config('app.name') }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('images/logo.svg') }}" width="40" height="40" alt="{{ config('app.name') }}" style="display:block; height:40px; width:auto;">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- Content --}}
                    <tr>
                        <td dir="rtl" align="right" style="padding:32px 24px; font-family:Tahoma, Arial, sans-serif; color:#1f2937;">
                            <h1 style="margin:0 0 16px 0; font-size:18px; font-weight:bold; color:#111827; text-align:right;">
                                {{ $campaign->subject }}
                            </h1>

                            <div style="font-size:14px; line-height:26px; text-align:right;">
                                {!! $campaign->content !!}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="center"
                            style="padding:16px; border-top:1px solid #f3f4f6; font-family:Tahoma, Arial, sans-serif; color:#1f2937; font-size:12px;"
                            dir="rtl">

                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:16px;">
                                <tr>
                                    <td align="center">

                                        <svg width="40" height="20" viewBox="0 0 6 3" xmlns="http://www.w3.org/2000/svg"
                                            style="display:block; margin:0 auto;">
                                            <rect fill="#009639" width="6" height="3" />
                                            <rect fill="#FFF" width="6" height="2" />
                                            <rect width="6" height="1" />
                                            <path fill="#ED2E38" d="M0,0l2,1.5L0,3Z" />
                                        </svg>

                                        <p style="margin:12px 0 0 0; font-size:13px;">
                                            وندعو بالسلام والحرية لفلسطين
                                        </p>

                                    </td>
                                </tr>
                            </table>

                            <div style="font-weight:600; color:#1f2937; margin-bottom:4px;">
                                تم تطويره من قِبل
                                <a href="https://www.elkharoua.com"
                                    target="_blank"
                                    style="color:#4f46e5; text-decoration:none;">
                                    حسن الخرواع
                                </a>
                            </div>

                            <div style="font-size:11px;">
                                متاح للاستخدام مجانًا - &copy; 2019 - {{ date('Y') }} jaloot.org
                            </div>

                            <div style="font-size:10px; margin-top:16px; color:#4f46e5;">
                                الإصدار {{ config('app.api_version') }}
                            </div>

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>