<aside id="sidenav" class="opacity-0 md:opacity-100 fixed w-64 h-full  left-0 bg-custom-dark-900 overflow-hidden  transition-all ease-in duration-500 z-40">
    <div class="mx-auto text-center pt-2 mb-7">
        <span class="font-2xl text-custom-dark-500 py-4 px-2 cursor-pointer font-raleway font-bold text-2xl">
            <img class="h-6 inline " src="{{asset('images/logo.png')}}" alt="" srcset="">
            <span class="text-custom-blue ">WILD</span>LIFE               
        </span>
    </div>

    <ul class="text-white">
        <li class="text-left py-3 rounded-md bg-custom-dark-700 mx-6 "><a href="/admin/dashboard/"><span class="pl-6"><img class="h-6 inline" src="{{asset('images/Dashboard-logo (1).png')}}"></span> DASHBOARD</a></li>



        <p class="mt-5 px-10">MANAGEMENT</p>
    
        <li class="mt-2 text-left text-default py-3 rounded-md hover:bg-custom-dark-700 mx-6 "><a href="/admin/dashboard/#UserAccount"><span class="pl-6"><img class="h-5  inline" src="{{asset('images/user-edit-img.png')}}"></span> USER ACCOUNTS</a></li>
        <li class="mt-2 text-left text-default py-3 rounded-md hover:bg-custom-dark-700 mx-6 "><a href="/admin/dashboard/#Applications"><span class="pl-6"><img class="h-5  inline" src="{{asset('images/icon-1-img.png')}}"></span> APPLICATIONS</a></li>
        <li class="mt-2 text-left text-default py-3 rounded-md hover:bg-custom-dark-700 mx-6 "><a href="/admin/dashboard/#OrderOfPayment"><span class="pl-6"><img class="h-5  inline" src="{{asset('images/icon-1-img.png')}}"></span> ORDER OF PAYMENTS</a></li>
        <li class="mt-2 text-left text-default py-3 rounded-md hover:bg-custom-dark-700 mx-6 "><a href="/admin/dashboard/#Permits"><span class="pl-6"><img class="h-5  inline" src="{{asset('images/icon-1-img.png')}}"></span> PERMITS</a></li>
        <li class="mt-2 text-left text-default py-3 rounded-md hover:bg-custom-dark-700 mx-6 "><a href="/admin/dashboard/#Reports"><span class="pl-6"><img class="h-5  inline" src="{{asset('images/icon-1-img.png')}}"></span> REPORTS</a></li>
        
        <p class="mt-5 px-10">OPTIONS</p>
        
        <li class="text-left py-3 rounded-md hover:bg-custom-dark-700  mx-6 "><a href=""><span class="pl-6"><img class="h-5  inline" src="{{asset('images/icon-1-img.png')}}"></span> DOCUMENTATION</a></li>
      
    </ul>
</aside>

<nav class="md:ml-64">
    <div class="flex justify-between">
        <div class="flex items-center ">
            <span class="text-3xl text-black cursor-pointer  fixed  z-50 mx-2 my-2 block md:hidden" onclick="Menu(this)">
              <ion-icon name="menu-outline"></ion-icon>
             
            </span>
            <h1 class="text-2xl md:text-4xl font-poppins font-medium py-2 px-0 md:px-4">{{ $title }}</h1>
        
          </div>
        
        </span>
            
            <div>
            <i class='bx bxs-bell' ></i>
            @auth('admin')
            <span class="py-2 px-6 text-xl text-gray-800 font-raleway font-bold">
                {{ Auth::guard('admin')->user()->username}}
                <i class='bx bxs-down-arrow bx-xs cursor-pointer'></i>
            </span>
            @endauth
        </div>
    </div>
</nav>