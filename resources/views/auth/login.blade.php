<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | OFSPTS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&family=Poppins:wght@400;500;700&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>
   <div class="min-h-screen py-10" style="background-color: #D5DFE8">
        <div class="container mx-auto">
            <div class="flex flex-col-reverse lg:flex-row bg-white w-10/12 lg:w-10/12 mx-auto">
                <div class="w-full lg:w-2/4">
                    <form action="/login/authenticate" method="POST" class="px-12">
                        @csrf
                        <div class="flex justify-start mt-20">
                            <img class="h-12 w-12" src="{{asset('images/logo.png')}}" alt="" srcset="">
                            <h1 class="py-3 font-poppins font-bold text-brand">OFSPTS</h1>
                        </div>

                        <div class="mt-2">
                            <h1 class="text-4xl font-bold font-lora text-dark-blue">Login</h1>
                            <p class="text-xl font-roboto font-normal mt-2 text-dark-blue">Lorem ipsum dolor sit amet, consectetur..</p>
                        </div>
                        <div class="d"></div>
                        <div class="mt-2">
                          <label class="text-xs font-roboto font-bold" for="email">Email</label>
                          <input type="text" placeholder="Enter Email Address" name="email" class="border border-gray-800 rounded-md py-2 px-4 w-full mt-1">
                          @error('email')
                          <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                          @enderror
                        </div>
                       
                        <div class="mt-2">
                            <label class="text-xs font-roboto font-bold" for="password">Password</label>
                            <input type="password" placeholder="Password" name="password" id="password" class="border border-gray-800 rounded-md py-2 px-4 w-full mt-1">
                            @error('password')
                            <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                              @enderror
                        </div>
                        <div class="mt-1">
                            <a class="text-xs font-roboto font-bold" href="/login/forgot-password">Forgot Password?</a>
                        </div>
                       
                        <div class="mt-2">
                          <button type="submit" class="w-full bg-very-dark-blue rounded-md hover:bg-gray-500 py-3 text-center text-white">Log in</button>
                        </div>

                        <div class="mt-2 mb-20">
                            <p class="float-right text-xs font-roboto font-bold">Don't have an Account? <span><a  href="/register">Sign up</a>
                            </span></p>
                        </div>
                      </form>
                </div>

                <div class="w-full lg:w-3/4 p-4">
                    <img src="{{asset('images/login-img-1.png')}}" alt="" class="w-full h-full bg-no-repeat bg-cover bg-center rounded-tl-lg rounded-br-lg">
                </div>
            </div>
        </div>
   </div>
    

        
    
</body>
</html>