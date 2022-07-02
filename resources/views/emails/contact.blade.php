<!--
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>{{ $attributes['nom'] }} a envoyé une demande de contact !</h2>
        <small>Ce message provient du formulaire de contact de www.samadhi-lyon.fr</small>
        <p>Nom & prénom : {{ $attributes['nom'] }}</p>
        <p>Tél. : {{ $attributes['tel'] }}</p>
        <p>Email : {{ $attributes['email'] }}</p>
        <p>Message : : {{ $attributes['message'] }}</p>
        <ul>
        </ul>
    </body>
</html>
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="format-detection" content="date=no" />
    <meta name="format-detection" content="address=no" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="x-apple-disable-message-reformatting" />
    <!--[if !mso]><!-->
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,700,700i" rel="stylesheet" />
    <!--<![endif]-->
    <title>Nouveau contact</title>
    <!--[if gte mso 9]>
    <style type="text/css" media="all">
        sup { font-size: 100% !important; }
    </style>
    <![endif]-->


    <style type="text/css" media="screen">
        /* Linked Styles */
        body { padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#001736; -webkit-text-size-adjust:none }
        a { color:#66c7ff; text-decoration:none }
        p { padding:0 !important; margin:0 !important }
        img { -ms-interpolation-mode: bicubic; /* Allow smoother rendering of resized image in Internet Explorer */ }
        .mcnPreviewText { display: none !important; }

        .cke_editable,
        .cke_editable a,
        .cke_editable span,
        .cke_editable a span { color: #000001 !important; }
        /* Mobile styles */
        @media only screen and (max-device-width: 480px), only screen and (max-width: 480px) {
            .mobile-shell { width: 100% !important; min-width: 100% !important; }

            .text-header,
            .m-center { text-align: center !important; }

            .center { margin: 0 auto !important; }
            .container { padding: 20px 10px !important }

            .td { width: 100% !important; min-width: 100% !important; }

            .m-br-15 { height: 15px !important; }
            .p30-15 { padding: 30px 15px !important; }

            .m-td,
            .m-hide { display: none !important; width: 0 !important; height: 0 !important; font-size: 0 !important; line-height: 0 !important; min-height: 0 !important; }

            .m-block { display: block !important; }

            .fluid-img img { width: 100% !important; max-width: 100% !important; height: auto !important; }

            .column,
            .column-top,
            .column-empty,
            .column-empty2,
            .column-dir-top { float: left !important; width: 100% !important; display: block !important; }

            .column-empty { padding-bottom: 10px !important; }
            .column-empty2 { padding-bottom: 30px !important; }

            .content-spacing { width: 15px !important; }
        }
    </style>
</head>
<body class="body" style="padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#001736; -webkit-text-size-adjust:none;">
<!--*|IF:MC_PREVIEW_TEXT|*-->
<!--[if !gte mso 9]><!-->
<!--<![endif]-->
<!--*|END:IF|*-->
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#001736">
    <tr>
        <td align="center" valign="top">
            <table width="650" border="0" cellspacing="0" cellpadding="0" class="mobile-shell">
                <tr>
                    <td class="td container" style="width:650px; min-width:650px; font-size:0pt; line-height:0pt; margin:0; font-weight:normal; padding:55px 0px;">
                        <!-- Header -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="p30-15" style="padding: 0px 30px 30px 30px;">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <th class="column-top" width="145" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td class="img m-center" style="font-size:0pt; line-height:0pt; text-align:left;"><x-application-logo class="block h-10 w-auto fill-current text-gray-600" /></td>
                                                    </tr>
                                                </table>
                                            </th>
                                            <th class="column-empty" width="1" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;"></th>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <!-- END Header -->

                        <!-- Intro -->
                        <div mc:repeatable="Select" mc:variant="Intro">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td style="padding-bottom: 10px;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td class="tbrr p30-15" style="padding: 60px 30px; border-radius:26px 26px 0px 0px;" bgcolor="#12325c">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td class="h1 pb25" style="color:#ffffff; font-family:'Muli', Arial,sans-serif; font-size:40px; line-height:46px; text-align:center; padding-bottom:25px;"><div mc:edit="text_2">Bonjour, l'équipe Samadhi</div></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center pb25" style="color:#c1cddc; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;"><div mc:edit="text_3">{{ $attributes['nom'] }} a envoyé une demande de contact !</div></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center pb25" style="color:#c1cddc; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;"><div mc:edit="text_3">Nom & prénom : {{ $attributes['nom'] }}</div></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center pb25" style="color:#c1cddc; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;"><div mc:edit="text_3">Tél. : {{ $attributes['tel'] }}</div></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center pb25" style="color:#c1cddc; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;"><div mc:edit="text_3">Email : {{ $attributes['email'] }}</div></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center pb25" style="color:#c1cddc; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:25px;"><div mc:edit="text_3">Message : {{ $attributes['message'] }}</div></td>
                                                        </tr>
                                                        <!-- Button -->
                                                        <tr mc:hideable>
                                                            <td align="center">
                                                                <table class="center" border="0" cellspacing="0" cellpadding="0" style="text-align:center;">
                                                                    <tr>
                                                                        <td class="pink-button text-button" style="background:#ff6666; color:#c1cddc; font-family:'Muli', Arial,sans-serif; font-size:14px; line-height:18px; padding:12px 30px; text-align:center; border-radius:0px 22px 22px 22px; font-weight:bold;"><div mc:edit="text_4"><a href="mailto:{{ $attributes['email'] }}" target="_blank" class="link-white" style="color:#ffffff; text-decoration:none;"><span class="link-white" style="color:#ffffff; text-decoration:none;">Cliquez ici pour répondre</span></a></div></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <!-- END Button -->
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- END Intro -->

                        <!-- Footer -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="p30-15 bbrr" style="padding: 50px 30px; border-radius:0px 0px 26px 26px;" bgcolor="#0e264b">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td class="text-footer1 pb10" style="color:#c1cddc; font-family:'Muli', Arial,sans-serif; font-size:16px; line-height:20px; text-align:center; padding-bottom:10px;"><div mc:edit="text_36">Mail envoyé automatiquement depuis
                                                    <a href="https://www.samadhi-lyon.fr">www.samadhi-lyon.fr</a>. Ne pas répondre directement</div></td>
                                        </tr>
                                        <tr>
                                            <td class="text-footer2" style="color:#8297b3; font-family:'Muli', Arial,sans-serif; font-size:12px; line-height:26px; text-align:center;"><div mc:edit="text_37">Thomas FENET</div></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="img" style="font-size:0pt; line-height:0pt; text-align:left;">
                                    <div mc:edit="text_39">
                                        <!--[if !mso]><!-->
                                        *|LIST:DESCRIPTION|*
                                        *|LIST:ADDRESS|*
                                        *|REWARDS_TEXT|*
                                        <!--<![endif]-->
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <!-- END Footer -->
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
