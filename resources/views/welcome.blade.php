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
        <div class="bg-lighter-blue min-h-screen p-10">
            
           
                <div class="flex flex-col-reverse lg:flex-row w-full lg:w-11/12 mx-auto">

                    <div class="w-full  lg:w-6/12 ">
                        <div class="mb-10">
                            <h1 class="text-2xl text-stone-800 text-center lg:text-left lg:text-5xl leading-normal p-2 w-11/12 font-bold font-roboto">
                            Obtain Your Wildlife Transport Permits with 
                            Ease - Apply Online Now
                            and Simplify the Process
                            </h1>
                            <p class="w-11/12 p-2 text-xl text-center lg:text-left font-normal">Welcome to our online platform for wildlife transport permitting and transactions. Apply for permits, track your applications, and manage your transactions easily and securely on our website. Streamline your wildlife transport permitting process today.</p>
                        </div>
                        <div class="grid grid-col gap-5 grid-cols-2 text-center w-11/12">
                            <a class="w-full py-4 px-8  border-solid border-2 rounded-sm border-black" href="/user/register-transport-permit">Apply Now</a>
                            <a class="w-full py-4 px-8  border-solid border-2 rounded-sm bg-black text-white" href="/user/view-existing-transport-permit">Already Applied</a>
                        </div>
                        

                    </div>
                    
                    <div class="w-full lg:w-6/12 ">
                        <img class="w-full h-full  bg-no-repeat bg-cover bg-center rounded-tl-lg rounded-br-lg" src="{{asset('images/landing-page-img.png')}}" alt="">
                    </div>
                   
    
                </div>
               
        </div>

    </div>
   
</body>
</html>