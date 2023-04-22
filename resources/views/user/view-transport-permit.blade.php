<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OFPTS | Landing Page</title>
    @vite('resources/css/app.css')

</head>
<body>
   
        <header class="bg-white p-2 border-gray-500 border-b-2">
            <nav class="flex flex-row justify-between item-center">
                <div class="text-2xl flex flex-row justify-between">
                    <div class="item-center">
                        <img class="w-12 h-12" src="{{asset('images/logo.png')}}" alt="" srcset=""></div>
                        <p class="p-2 font-poppins font-bold text-dark-blue">OFTPS</p>
                    </div>
                <div>
                @if (Route::has('login'))
                <div class="p-3">
                    @auth
                        <a href="{{ url('/logout') }}" class="ml-4 font-semibold text-black hover:text-gray-900  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Logout</a>
                    
                        @else
                        <a href="{{ route('login') }}" class="font-semibold text-black hover:text-gray-900  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
            
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-black hover:text-gray-900  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
                @endif
                </div>
            </nav>
        </header>
     
   
</body>
</html>