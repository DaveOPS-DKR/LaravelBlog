<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article publié</title>
</head>
<body style="margin:0;padding:0;background:#0f0f0f;font-family:'Georgia',serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="background:#0f0f0f;padding:40px 20px;">
    <tr>
        <td align="center">
            <table width="580" cellpadding="0" cellspacing="0" style="background:#181818;border:1px solid #2a2a2a;">

                <!-- HEADER -->
                <tr>
                    <td style="padding:40px;border-bottom:1px solid #2a2a2a;text-align:center;">
                        <p style="font-family:Georgia,serif;font-size:28px;color:#c9a84c;margin:0;letter-spacing:2px;">The Blog</p>
                        <p style="font-size:11px;color:#7a7670;letter-spacing:3px;text-transform:uppercase;margin:6px 0 0;">Confirmation de publication</p>
                    </td>
                </tr>

                <!-- BODY -->
                <tr>
                    <td style="padding:40px;">
                        <p style="font-size:13px;color:#7a7670;letter-spacing:2px;text-transform:uppercase;margin:0 0 16px;">Bonjour,</p>
                        <p style="font-family:Georgia,serif;font-size:26px;color:#e8e4dc;font-weight:normal;margin:0 0 24px;line-height:1.3;">
                            {{ $article->title }}
                        </p>
                        <p style="font-size:14px;color:#7a7670;margin:0 0 32px;line-height:1.7;">
                            Votre article a été publié avec succès sur <strong style="color:#e8e4dc;">The Blog</strong>.
                        </p>

                        <!-- META -->
                        <table width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #2a2a2a;margin-bottom:32px;">
                            <tr>
                                <td style="padding:14px 20px;border-bottom:1px solid #2a2a2a;">
                                    <span style="font-size:11px;color:#7a7670;letter-spacing:2px;text-transform:uppercase;">Auteur</span><br>
                                    <span style="font-size:14px;color:#e8e4dc;">{{ $article->user->name }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:14px 20px;border-bottom:1px solid #2a2a2a;">
                                    <span style="font-size:11px;color:#7a7670;letter-spacing:2px;text-transform:uppercase;">Catégorie</span><br>
                                    <span style="font-size:14px;color:#c9a84c;">{{ $article->type->name }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:14px 20px;">
                                    <span style="font-size:11px;color:#7a7670;letter-spacing:2px;text-transform:uppercase;">Date de publication</span><br>
                                    <span style="font-size:14px;color:#e8e4dc;">{{ $article->created_at->format('d/m/Y à H:i') }}</span>
                                </td>
                            </tr>
                        </table>

                        <!-- CTA -->
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td align="center">
                                    <a href="{{ route('articles.index') }}"
                                       style="display:inline-block;background:#c9a84c;color:#0f0f0f;text-decoration:none;padding:14px 36px;font-size:11px;letter-spacing:3px;text-transform:uppercase;font-family:Arial,sans-serif;font-weight:bold;">
                                        Voir mes articles
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- FOOTER -->
                <tr>
                    <td style="padding:24px 40px;border-top:1px solid #2a2a2a;text-align:center;">
                        <p style="font-size:11px;color:#7a7670;letter-spacing:1px;margin:0;">
                            &copy; {{ date('Y') }} Blog TP &mdash; Vous recevez cet email car vous êtes auteur sur notre plateforme.
                        </p>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</body>
</html>
