<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $details['subject'] }}</title>
</head>
<body>

    <p>Dear Admin,</p>
    <p>{{ $details['message'] }}</p>


{{-- <table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td align="center" style="padding: 20px;">
            <table width="600" cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
                <tr>
                    <td style="padding: 30px;">
                        <h1 style="margin-top: 0; color: #333;">{{ $details['subject'] }}</h1>
                        <p>Dear Admin,</p>
                        <p>{{ $details['message'] }}</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table> --}}

</body>
</html>
