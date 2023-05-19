<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | WildLife</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&family=Poppins:wght@400;500;700&family=Raleway:ital,wght@0,100;0,400;0,500;0,600;0,700;1,300&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"> @vite('resources/css/app.css')
    @vite('resources/css/app.css')

</head>
<body class="bg-custom-bg-dark">
    <div class="min-h-screen">
        <nav class="px-4 font-poppins  flex justify-between">
            <div class="flex justify-between items-center">
                <span class="font-2xl text-custom-dark-500 py-4 px-2 cursor-pointer font-raleway font-bold text-2xl">
                    <img class="h-10 inline " src="{{asset('images/logo.png')}}" alt="" srcset="">
                    <span class="text-custom-blue ">WILD</span>LIFE               
                </span>
            </div>

            <div class="flex list-none py-4">
                @if (Route::has('login'))
                @auth             
                    
                    @else
                    <li class="ml-4 my-6 md:my-0 ">
                        <a href="/admin/login" class="text-md text-white hover:text-custom-dark-600">Log in</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="mx-4 my-6 md:my-0">
                        <a href="/admin/register" class="text-md text-white hover:text-custom-dark-600" >Register</a>
                    </li>                   
                @endauth                
                @endif
            @endif
            </div>            
        </nav>

        <div class="bg-custom-bg-light-dark w-7/12  mx-auto  ">
            
            <div class="flex flex-col-reverse lg:flex-row justify-between">           
            <div class="w-full  lg:w-3/6 mb-10 ">
                <form action="/admin/login/authenticate" method="POST">
                    @csrf
                    <div class="px-2 md:px-4 xl:pl-12 mt-4 mx-2 ">
                        <div class="lg:pt-16 mx-auto w-12/12 text-center">
                            <h1 class="text-center md:text-left  text-custom-dark-600 text-auto md:text-3xl lg:text-xl xl:text-3xl font-lora font-bold">ADMIN <span class="text-white">LOGIN</span></h1>
                            <p class="text-center md:text-left text-custom-dark-500 text-sm md:text-default lg:text-sm xl:text-default" >Sign in to continue accessing the platform</p>
                        </div>
                        
                        <div class="mt-8">
                   
                        <label class="my-2 block text-sm text-custom-white-p" for="email">Email:
                            <input class=" w-11/12 block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                            type="text" name="email" id="email" placeholder="Enter Email Address"></label>
                            @error('email')
                            <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                            @enderror
                        <label class="my-2 block text-sm text-custom-white-p" for="password">Password:
                            <input class="w-11/12 block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                            type="password" name="password" id="password" placeholder="Enter Password"></label>
                            @error('password')
                            <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                            @enderror
                       
                        <button type="submit" class="font-poppins text-xl text-white bg-custom-blue mt-4 w-11/12 py-2 border-none rounded-md">Login</button>
                        
                        <div class="text-right mr-6 mt-2">
                            <a href="" class=" text-white font-light right">Forgot Password?</a>
                        </div>
                         </div>
                        
                        </form>
        
                    </div>
                
            </div>
            <div class="w-auto  md:w-full lg:w-3/6 flex justify-center">
                <img  style="border-top-left-radius: 40px; border-bottom-right-radius: 40px;" class="p-6 sm:96 lg:h-486  " src="{{ asset('images/butterfly-img-1.png')}}" alt="">

            </div>
            </div>
        
        </div>



    </div>

    

    

</body>
</html>