<!DOCTYPE html>
<html>
<head>
    <title>Set Your Password</title>
</head>
<body>
<h1>Hello {{ $user->name }},</h1>
<p>You have been added to our system. Please click the button below to set your password.</p>

<a href="{{ url('/password/reset/'.$token) }}" style="background: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
    Set Your Password
</a>

<p>Thank you for using our application!</p>
</body>
</html>
