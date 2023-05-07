<div class="min-h-screen">
    <aside id="sidenav" class="opacity-0 md:opacity-100 fixed w-52 md:w-64 h-full  left-0 bg-custom-dark-900 overflow-hidden  transition-all ease-in duration-500">
      <span class="block text-white p-4 px-2"><img src="{{ asset('images/Dashboard-logo (1).png')}}" class="w-8 h-8 inline"><span class="font-medium font-poppins"> ADMIN</span> Dashboard</span>
   
        <p class="mt-5 text-white text-xs px-4">MENU</p>            
        <ul class="px-6 ">
            <li class="text-xs md:text-md py-2 px-2 hover:bg-custom-dark-700 hover:rounded-md mt-2"><a href= "/admin/dashboard/users" class="text-white "><img class="w-4 md:w-7 inline" src="{{ asset('images/List-icon.png')}}"> LIST OF USERS</a></li>
            <li class="text-xs md:text-md py-2 px-2 hover:bg-custom-dark-700 hover:rounded-md"><a href= "/admin/dashboard/applications" class="text-white "><img class="w-4 md:w-7 inline " src="{{ asset('images/List-icon.png')}}">LIST OF APPLICATIONS</a></li>
            <li class="text-xs md:text-md py-2 px-2 hover:bg-custom-dark-700 hover:rounded-md"><a href= "/admin/dashboard/butterflies" class="text-white "><img class="w-4 md:w-7 inline " src="{{ asset('images/List-icon.png')}}"> BUTTERFLY SPECIES</a></li>
            <li class="text-xs md:text-md py-2 px-2 hover:bg-custom-dark-700 hover:rounded-md"><a href= "/admin/dashboard/monitoring" class="text-white "><img class="w-4 md:w-7 inline" src="{{ asset('images/List-icon.png')}}"> MONITORING</a></li>
            <li class="text-xs md:text-md py-2 px-2 hover:bg-custom-dark-700 hover:rounded-md"><a href= "/admin/dashboard/reports" class="text-white "><img class="w-4 md:w-7 inline" src="{{ asset('images/List-icon.png')}}"> REPORTS</a></li>
        </ul>

        <p class="px-4 mt-5 text-white text-xs">OPTION</p>
        <ul class="px-6">
          
       
            <li class="mt-2 py-2 px-2 hover:bg-custom-dark-700 hover:rounded-md"><a href= "/admin/logout" class="text-white  ">LOG OUT</a></li>
            
        </ul>
   
    </aside>
    <div class="bg-white md:ml-64">
       <div class="flex justify-between md:block  p-2">
          
        <span class="block md:hidden text-black py-2"><img src="{{ asset('images/Dashboard-logo (2).png')}}" class="w-8 h-8 inline"><span class="font-medium font-poppins"> ADMIN</span> Dashboard</span>
        
        <div class="flex justify-between  py-2">
            <p class="hidden md:block px-2 text-xl font-bold font-roboto"> APPLICATION FORM</p>
          @auth('admin')
            <a href="#" class="text-right px-2 ">Hi, {{ Auth::guard('admin')->user()->username}} </a>
            @endauth
          <span class="text-3xl text-black cursor-pointer mx-2 md:hidden block"><ion-icon name="menu-outline" onclick="Menu(this)"></ion-icon>
          </span>
            
           
        </div>
       </div>
    </div>