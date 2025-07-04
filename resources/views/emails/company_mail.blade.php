<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yeni Firma Yetkilisi Talebi</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f5f6fb; margin: 0; padding: 20px;">
<table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">

    <!-- Header -->
    <tr>
        <td style="background-color: #7064d5; padding: 20px; border-top-left-radius: 8px; border-top-right-radius: 8px; text-align: center;">
            <img src="{{ asset('images/firmacvlogo.png') }}" alt="FirmaCV Logo" style="height: 50px; margin-bottom: 10px;">
            <h2 style="color: white; margin: 0;">📩 Yeni Talep Alındı</h2>
        </td>
    </tr>

    <!-- Content -->
    <tr>
        <td style="padding: 20px;">

            <p style="margin: 10px 0;"><strong>👤 Ad Soyad:</strong><br> {{ $details['name'] }}</p>

            <p style="margin: 10px 0;">
                <strong>📧 E-posta:</strong><br>
                <a href="mailto:{{ $details['email'] }}" style="color: #7064d5; text-decoration: none;">
                    {{ $details['email'] }}
                </a>
            </p>

            <p style="margin: 10px 0;">
                <strong>📞 Telefon:</strong><br>
                <a href="tel:{{ preg_replace('/\D/', '', $details['phone']) }}" style="color: #00b46c; text-decoration: none;">
                    {{ $details['phone'] }}
                </a>
            </p>

            <p style="margin: 10px 0;"><strong>📝 Konu:</strong><br> {{ $details['subject'] }}</p>

            <hr style="margin: 20px 0; border: none; border-top: 1px solid #ddd;">

            <p style="margin: 10px 0;"><strong>📨 Mesaj:</strong></p>
            <p style="background-color: #f0f0f5; padding: 15px; border-radius: 6px; color: #333;">
                {{ $details['message'] }}
            </p>

        </td>
    </tr>

    <!-- Footer -->
    <tr>
        <td style="padding: 20px; text-align: center;">
            <p style="margin: 0; font-size: 14px; color: #888;">
                FirmaCV | Bu e-posta sistem tarafından oluşturulmuştur.
            </p>

            <!-- Sosyal Medya -->
            <p style="margin-top: 10px;">
                <a href="https://www.linkedin.com/in/firmacv" style="margin: 0 6px; text-decoration: none;">
                    <img src="{{ asset('images/linkedin-icon.png') }}" alt="LinkedIn" width="24">
                </a>
                <a href="https://www.instagram.com/firmacv" style="margin: 0 6px; text-decoration: none;">
                    <img src="{{ asset('images/instagram-icon.png') }}" alt="Instagram" width="24">
                </a>
                <a href="https://www.firmacv.com" style="margin: 0 6px; text-decoration: none;">
                    <img src="{{ asset('images/web-icon.png') }}" alt="Website" width="24">
                </a>
            </p>
        </td>
    </tr>
</table>
</body>
</html>
