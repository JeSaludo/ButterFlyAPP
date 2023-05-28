<nav class="sidebar fixed top-0 left-0 h-full w-72 w-20 bg-custom-dark-900 p-2 transition-all duration-300 ease-in z-50">
        <header class="relative">
            <div class="flex px-4 py-2 text-3xl font-raleway font-bold text-custom-blue ">
                <img class="w-8" src="{{asset('images/logo.png')}}" alt="">
                <span class="text transition-all duration-300 ease-in">WILD<span class="text-white">LIFE</span></span></a>
            </div>
          

            <i class='toggle hover:cursor-pointer bx bx-chevron-right absolute top-0 -right-4 translate-y-2/4 bg-custom-blue text-white rounded-20 text-xl w-6 h-6 flex item-center justify-center transition-all duration-200 ease-in'  ></i>
        </header>


        <div class="h-full overflow-y-auto">
            <div>
                <ul class="">
                  
                    <li class="text-white w-full h-full py-2 whitespace-nowrap mt-5 rounded-md  hover:bg-custom-blue transition-all duration-200 ease-in">
                        <a href="/admin/dashboard" class="flex items-center font-poppins text-xl">
                            <i class='bx bxs-dashboard px-5' ></i>
                            <span class=" text transition-all duration-200 ease-in ">Dashboard</span>
                        </a>
                    </li>
                    <p class="text-custom-white-p mt-2 font-poppins font-light px-4 text transition-all duration-200 ease-in">Management</p>
                    <li class="text-white w-full h-full py-2 whitespace-nowrap mt-2   rounded-md  hover:bg-custom-blue transition-all duration-200 ease-in">
                        <a href="{{route('admin.dashboard.show-user')}}" class="flex items-center font-poppins text-base">
                            <i class='bx bxs-user-detail px-5' ></i>
                            <span class="text transition-all duration-200 ease-in">User Accounts</span>
                        </a>
                    </li>                   

                    <li class="text-white w-full h-full py-2 whitespace-nowrap mt-2   rounded-md text-default hover:bg-custom-blue transition-all duration-200 ease-in">
                        <a href="{{route('admin.dashboard.show-app')}}" class="flex items-center  font-poppins text-base">
                            <i class='bx bx-file px-5' ></i>
                            <span class="text transition-all duration-200 ease-in">Applications Review</span>
                        </a>
                    </li>

                    <li class="text-white w-full h-full py-2 whitespace-nowrap mt-2   rounded-md text-xl hover:bg-custom-blue transition-all duration-200 ease-in">
                        <a href="{{route('admin.order-of-payment.show')}}" class="flex items-center  font-poppins text-base">
                            <i class='bx bx-wallet px-5' ></i>
                            <span class="text transition-all duration-200 ease-in">Order of Payment</span>
                        </a>
                    </li>

                    <li class="text-white w-full h-full py-2 whitespace-nowrap mt-2   rounded-md text-xl hover:bg-custom-blue transition-all duration-200 ease-in">
                        <a href="{{route('admin.dashboard.show-wilflife')}}" class="flex items-center  font-poppins text-base">
                            <i class='bx bx-certification px-5' ></i>
                            <span class="text transition-all duration-200 ease-in">Wildlife Permits</span>
                        </a>
                    </li>

                

                    <p class="text-custom-white-p mt-2 font-poppins font-light px-4 text transition-all duration-200 ease-in">Create</p>
                   
                    <li class="text-white w-full h-full py-2 whitespace-nowrap mt-2   rounded-md text-xl hover:bg-custom-blue transition-all duration-200 ease-in">
                        <a href="{{route('admin.users.create')}}" class="flex items-center  font-poppins text-base">
                            <i class='bx bx-user-plus px-5' ></i>
                            <span class="text transition-all duration-200 ease-in">Create User</span>
                        </a>
                    </li>

                    <li class="text-white w-full h-full py-2 whitespace-nowrap mt-2   rounded-md text-xl hover:bg-custom-blue transition-all duration-200 ease-in">
                        <a href="/admin/create-permit" class="flex items-center  font-poppins text-base">
                            <i class='bx bx-file-blank px-5' ></i>
                            <span class="text transition-all duration-200 ease-in">Create Wildlife Permit</span>
                        </a>
                    </li>
                

                    <li class="text-white w-full h-full py-2 whitespace-nowrap mt-2   rounded-md text-xl hover:bg-custom-blue transition-all duration-200 ease-in">
                        <a href="{{route('admin.add-butterfly.show')}}" class="flex items-center  font-poppins text-base">
                            <i class='bx bx-plus-circle px-5' ></i>
                            <span class="text transition-all duration-200 ease-in">Create Butterfly Sp</span>
                        </a>
                    </li>
                
                

                    <p class="text-custom-white-p mt-2 font-poppins font-light px-4 text transition-all duration-200 ease-in">Monitoring</p>
                    
                    <li class="text-white w-full h-full py-2 whitespace-nowrap mt-2   rounded-md text-xl hover:bg-custom-blue transition-all duration-200 ease-in">
                        <a href="{{route('admin.report.show')}}" class="flex items-center  font-poppins text-base">
                            <i class='bx bxs-report px-5' ></i>
                            <span class="text transition-all duration-200 ease-in">Reports</span>
                        </a>                      
                    </li>
                   
                </ul>
            </div>
        </div>

    </nav>