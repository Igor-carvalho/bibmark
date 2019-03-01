<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
You have requested to reset your password. Please use the following link to set a new password.

<a href="{{ action('WebController@resetPasswordPage', [$token, $email])}}">
    {{action('WebController@resetPasswordPage', [$token, $email])}}
</a>
</body>
</html>
