<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $data['subject'] }}</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333; margin: 0; padding: 0;">

<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td align="center" style="padding: 20px;">
            <table width="600" cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
                <tr>
                    <td style="padding: 30px;">
                        <h1 style="margin-top: 0; color: #333;">{{ $data['subject'] }}</h1>
                        <p>Dear Admin,</p>
                        <p>🎉 Exciting News! A new enquiry has just come in for our {{ $data['service'] }}!</p>
                        <p>We're delighted to inform you that a visitor is interested in our {{ $data['service'] }} on Geo Holidays. Here are the details:</p>
                        <ul>
                            <li><strong>Name:</strong> {{ $data['name'] }}</li>
                            <li><strong>Email:</strong> {{ $data['email'] }}</li>
                            <li><strong>Phone Number:</strong> {{ $data['phone_number'] }}</li>
                            <li><strong>Enquiry Type:</strong>{{ $data['service'] }}</li>
                            <li><strong>Message:</strong>{{ $data['message'] }}</li>
                        </ul>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>
