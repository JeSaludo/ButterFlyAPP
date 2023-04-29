<div class=" min-h-screen">
    <nav class="px-4 font-poppins bg-custom-dark-1000 md:flex md:justify-between md:items-center ">
        <div class="flex justify-between items-center">
        <span class="font-2xl text-custom-dark-500 p-2 cursor-pointer">
            <img class="h-10 inline " src="{{asset('images/logo.png')}}" alt="" srcset="">
            OFSPTS
        </span>

        <span class="text-3xl cursor-pointer mx-2 md:hidden block"><ion-icon name="menu-outline" onclick="Menu(this)"></ion-icon>
        </span>
        </div>
       <ul class="md:flex md:items-center md:z-auto md:static absolute bg-custom-dark-1000 w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500">
        
        
        <li class="mx-4 my-6 md:my-0">
            <a href="/" class="text-md  text-white hover:text-custom-dark-600">HOME</a>
        </li>
        <li class="mx-4 my-6 md:my-0">
            <a href="/contact" class="text-md  text-white hover:text-custom-dark-600">CONTACT</a>
        </li>
        <li class="mx-4 my-6 md:my-0">
            <a href="about" class="text-md  text-white hover:text-custom-dark-600">ABOUT</a>
        </li>

        <div class="md:flex lg:ml-52">
            @if (Route::has('login'))
            <li class="ml-4 my-6 md:my-0 ">
                <a href="{{ route('login') }}" class="text-md text-white hover:text-custom-dark-600">Log in</a>
            </li>
            @if (Route::has('register'))
            <li class="mx-4 my-6 md:my-0">
                <a href="{{ route('register') }}" class="text-md text-white hover:text-custom-dark-600" >Register</a>
            </li>
            @endif
        @endif
        </div>
         </ul> 
    </nav>
