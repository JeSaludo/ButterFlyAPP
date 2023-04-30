<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Thanks for creating an account with us!</h1>
    <p>Here are your Account details below:</p>
    <p>username: {{$get_user_name}}</p>
    <p>password: {{$get_user_password}}</p>
    <p>Here are your OTP code:</p>
    <p>{{$valid_token}}</p>

    
</body>
</html>