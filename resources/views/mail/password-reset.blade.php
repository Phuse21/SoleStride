<!DOCTYPE html>
<html>

<head>
    <title>Password Reset</title>
</head>

<body>
    <p>Hello!</p>

    <p>You are receiving this email because we received a password reset request for your account.</p>

    <p><a href="{{ $url }}">Reset Password</a></p>

    <p>This password reset link will expire in 60 minutes.</p>

    <p>If you did not request a password reset, no further action is required.</p>

    <p>Regards,<br>Your Application Name</p>

    <p>If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web
        browser:</p>

    <p>{{ $url }}</p>
</body>

</html>