<nav class="px-4 font-poppins  bg-custom-dark-900 md:bg-transparent flex justify-between">
    <div class="flex justify-between items-center">
        <span class="font-2xl text-custom-dark-500 py-4 px-2 cursor-pointer font-raleway font-bold text-2xl">
            <img class="h-10 inline " src="{{asset('images/logo.png')}}" alt="" srcset="">
            <span class="text-custom-blue ">WILD</span>LIFE               
        </span>
    </div>

    <span class="py-4 text-3xl text-white cursor-pointer mx-2 mb-2 md:hidden block"><ion-icon name="menu-outline" onclick="Menu(this)"></ion-icon>
    </span>
   
   <ul class="md:flex bg-custom-dark-900 md:bg-transparent  md:items-center md:z-auto md:static absolute  z-30 w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500">
    


   
    <div class="md:flex py-4 mr-10 lg:mr-80">
       
            <li class="ml-4 my-6 md:my-0 ">
                <a href="{{route('home')}}" class="text-md text-white hover:text-custom-dark-600">HOME</a>
            </li>

           

            <li class="ml-4 my-6 md:my-0 ">
                <a href="{{route('myapplications.submit.show')}}" class="text-md  text-white hover:text-custom-dark-600">MY APPLICATION</a>
            </li>

            <li class="ml-4 my-6 md:my-0 ">
                <a href="{{route('myapplications.draft.show')}}" class="text-md  text-white hover:text-custom-dark-600">MY DRAFT</a>
            </li>
    </div>
    <div class="md:flex  py-4">
        @if (Route::has('login'))
        @auth             
            <li class="ml-4 ">
                <a href="{{ route('users.edit', auth()->user()->id) }}" class="text-md  text-white hover:text-custom-dark-600">PROFILE</a>
            </li>                    
            <li class="ml-4 my-6 md:my-0 ">
                <a href="/logout" class="text-md text-white hover:text-custom-dark-600">LOGOUT</a>
            </li>
            @else
            <li class="ml-4 my-6 md:my-0 ">
                <a href="{{ route('login') }}" class="text-md text-white hover:text-custom-dark-600">Log in</a>
            </li>
            @if (Route::has('register'))
            <li class="mx-4 my-6 md:my-0">
                <a href="{{ route('register') }}" class="text-md text-white hover:text-custom-dark-600" >Register</a>
            </li>                   
        @endauth                
        @endif
    @endif
 
    <ul>         
</nav>