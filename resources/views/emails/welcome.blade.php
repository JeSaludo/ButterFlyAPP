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
    <p>Username: {{$get_user_name}}</p>
    <p>Password: {{$get_user_password}}</p>
    <p>Here are your OTP code:</p>
    <p>{{$valid_token}}</p>

    <p>If you have any questions or need further assistance, please don't hesitate to reach out. We're here to help!</p>

    <p>If you did not request this, please disregard this message. We apologize for any inconvenience caused.</p>
    
</body>
</html>