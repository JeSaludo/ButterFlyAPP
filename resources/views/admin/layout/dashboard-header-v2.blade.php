<div class="h-14 w-full flex justify-between py-2 transition-all duration-300 ease-in">
    <div class="px-6">         
        <p class="text-auto md:text-3xl  font-poppins font-medium">{{$title}}</p>                  
       
    </div>
    <div class="py-2 px-2 whitespace-nowrap">
        
        @auth('admin')
        <div class="relative inline-block text-left">
            <span class="px-2 text-auto md:text-xl text-gray-800 font-raleway font-bold cursor-pointer" onclick="dropdownToggle()">
                {{ Auth::guard('admin')->user()->username}}
                <i class='bx bxs-down-arrow bx-xs'></i>
            </span>
            <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-40 bg-custom-dark-900 rounded-md shadow-lg z-10 transition-all duration-300 ease-in">
                <ul class="py-1">
                    
                    <li><a href="#" class="block px-4 py-2 text-sm font-poppins text-white hover:bg-custom-blue transition-all duration-300 ease-in">Setting</a></li>
                    <li><a href="/admin/logout" class="block px-4 py-2 text-sm font-poppins  text-white hover:bg-custom-blue transition-all duration-300 ease-in">Logout</a></li>
                </ul>
            </div>
        </div>
        @endauth
    </div>
</div>
<script>
    function dropdownToggle() {
        var dropdownMenu = document.getElementById("dropdownMenu");
        dropdownMenu.classList.toggle("hidden");
    }
</script>





