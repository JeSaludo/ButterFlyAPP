<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard | WildLife</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&family=Poppins:wght@400;500;700&family=Raleway:ital,wght@0,100;0,400;0,500;0,600;0,700;1,300&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet"> @vite('resources/css/app.css')
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite('resources/css/app.css')
   <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body class="bg-custom-admin-bg min-h-screen">
    @include('admin.layout.dashboard-nav')

    <section class="main home transition-all duration-300 ease-in">
        <div class="h-14 w-full flex justify-between py-2 transition-all duration-300 ease-in">
            <div class="px-6">         
                <p class="text-auto md:text-3xl  font-poppins font-medium">Edit User Account</p>                  
               
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
        <form action="{{ route('admin.users.update', $user->id) }}" method="post">
            @csrf
            @method("PUT")
            <div>
                <div class="bg-gray-50 w-11/12 rounded-md mx-auto mt-3 mb-3 ">
                    <h1 class="px-6 py-2 font-lora font-bold text-3xl text-custom-dark-blue">EDIT USER PROFILE
                    </h1>
                    <div class="grid grid-flow-row md:grid-flow-col gap-4 px-10 pb-4">
                        <div class="w-full">
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="firstName">First Name:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="firstName" id="firstName" placeholder="Enter First Name"
                                        value="{{$user->first_name}}"></label>
                                @error('firstName')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="lastName">Last Name:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="lastName" id="lastName" placeholder="Enter Last Name"
                                        value="{{$user->last_name}}"></label>
                                @error('lastName')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>
                           
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="username">Username:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="username" id="username" placeholder="Enter Username"
                                        value="{{$user->username}}"></label>
                                @error('username')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>

                            
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="businessName">Business Name:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="businessName" id="businessName" placeholder="Enter Business Name"
                                        value="{{$user->business_name}}"></label>
                                @error('businessName')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="email">Email Address:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="email" id="email" placeholder="Enter Email Address"
                                        value="{{$user->email}}"></label>
                                @error('email')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="contact">Contact Number:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="contact" id="contact" placeholder="Enter Contact Number"
                                        value="{{$user->contact}}"></label>
                                @error('contact')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>

                           
                        </div>

                        <div class="w-full">
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="ownerName">Owner Name:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="ownerName" id="ownerName" placeholder="Enter Owner Name"
                                        value="{{$user->owner_name}}"></label>
                                @error('ownerName')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="wcp_permit">Wildlife Collector Permit No:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="wcp_permit" id="wcp_permit" placeholder="Enter Wildlife Collector Permit Number"
                                        value="{{$user->wcp_permit}}"></label>
                                @error('wcp_permit')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="wfp_permit">Wildlife Farm Permit No:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="wfp_permit" id="wfp_permit" placeholder="Enter Wildlife Farm Permit Number"
                                        value="{{$user->wfp_permit}}"></label>
                                @error('wfp_permit')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="address">Address:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="address" id="address" placeholder="Enter Address"
                                        value="{{$user->address}}"></label>
                                @error('address')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>

                          
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="status">Status:</label>
                                <select name="status" id="status" class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md">
                                  <option value="0" @if ($user->role == 0) selected @endif class="text-custom-dark-1000">Active</option>
                                  <option value="1" @if ($user->role == 1) selected @endif class="text-custom-dark-1000">Deactive</option>
                                 </select>
                                @error('status')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                           

                           
                        </div>

                       
                    </div>

                   
                </div>
                <div class=" px-10 py-2 flex  gap-2">
                    <button type="submit"
                        class="w-full mx-auto font-poppins text-xl text-white bg-custom-blue mt-4  py-2 border-none rounded-md">Update
                        Application</button>

                </div>

            </div>


    
    
          </div>


    
        </form>
       
    </section>

 
    @include('admin.layout.admin-script')
</body>

</html>

