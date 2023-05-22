<div class="h-14 w-full flex justify-between py-2 transition-all duration-300 ease-in">
    <div class="px-6">         
        <p class="text-auto md:text-3xl  font-poppins font-medium">Admin Dashboard</p>                  
       <p class="font-poppins text-auto md:text-xl">{{$greeting}}, Admin</p>
    </div>
    <div class="py-2 px-2 whitespace-nowrap">
        <i class='bx bxs-bell'></i>
        @auth('admin')
        <span class=" px-2 text-auto md:text-xl text-gray-800 font-raleway font-bold">
            {{ Auth::guard('admin')->user()->username}}
            <i class='bx bxs-down-arrow bx-xs cursor-pointer'></i>
        </span>
        @endauth
    </div>
</div>