<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Account</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="min-h-screen p-10" style="background-color: #D5DFE8">
        <div class="container mx-auto w-6/12">
            <div class="p-4 bg-white">
                <h1 class="text-2xl  font-bold">Verify Account</h1>
                <p class="w-9/12 mt-2">Before proceeding, please check your email for a verification link. If you did not receive the email.</p>
                <form action="/email/verification-notification" method="POST">
                    @csrf
                    <button type="submit" class="bg-black text-white p-2 w-3/12 mt-2 rounded-md">Resend Email</button>
                </form>
            </div>
           
        </div>
    </div>
</body>
</html>