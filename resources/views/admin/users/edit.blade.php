<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update | WildLife</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&family=Poppins:wght@400;500;700&family=Raleway:ital,wght@0,100;0,400;0,500;0,600;0,700;1,300&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"> @vite('resources/css/app.css')
    @vite('resources/css/app.css')

</head>
<body class="bg-custom-bg-dark">
    <div class="min-h-screen">
        <nav class="px-4 font-poppins  flex justify-between">
            <div class="flex justify-between items-center">
                <span class="font-2xl text-custom-dark-500 py-4 px-2 cursor-pointer font-raleway font-bold text-2xl">
                    <img class="h-10 inline " src="{{asset('images/logo.png')}}" alt="" srcset="">
                    <span class="text-custom-blue ">WILD</span>LIFE               
                </span>
            </div>

                    
        </nav>

            
    <div class="bg-custom-bg-light-dark w-7/12 mb-10 mx-auto rounded-sm overflow-hidden">
        <div class="mx-auto pt-8 ">
            <h1 class="text-center text-custom-dark-600 text-auto md:text-3xl lg:text-xl xl:text-3xl font-lora font-bold">REGISTER <span class="text-white">AN ACCOUNT</span></h1>
            <p class="text-center text-custom-dark-500 text-sm md:text-default lg:text-sm xl:text-default" >Register an account to access the platform</p>
            
        </div>
        <form action="{{ route('admin.users.update', $user->id) }}" method="post">
            @csrf
            @method("PUT")
            <div class="w-8/12 mx-auto">

                    <div class="grid grid-flow-row md:grid-flow-col md:gap-5">
                        <div>
                            <div>
                                <label class="my-2 block text-xs md:text-sm text-custom-white-p" for="firstName">First Name:
                                <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                                type="text" name="firstName" id="firstName" placeholder="Enter First Name" value="{{$user->first_name}}"></label>
                                @error('firstName')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>

                            <div>
                                <label class="my-2 block text-xs md:text-sm text-custom-white-p" for="lastName">Last Name:
                                    <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                                    type="text" name="lastName" id="lastName" placeholder="Enter Last Name" value="{{$user->last_name}}"></label>
                                    @error('lastName')
                                    <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                    @enderror
                            </div>

                            <div >
                                <label class="my-2 block text-sm text-custom-white-p" for="email">Email Address:
                                    <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                                    type="email" name="email" id="email" placeholder="Enter Email Address" value="{{$user->email}}"></label>
                                    @error('email')
                                    <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                    @enderror
                            </div>

                            

                            <div>
                                <label class="my-2 block text-sm text-custom-white-p" for="businessName">Business Name:
                                <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                                type="text" name="businessName" id="businessName" placeholder="Enter Business Name" value="{{$user->business_name}}"></label>
                                @error('businessName')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>
                            

                            <div>
                                <label class="my-2 block text-sm text-custom-white-p" for="address">Address:
                                    <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                                    type="text" name="address" id="address" placeholder="Enter Address" value="{{$user->address}}"></label>
                                    @error('address')
                                    <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                    @enderror
                            </div>
                            
                            <div>
                                <label class="my-2 block text-sm text-custom-white-p" for="status">Status:</label>
                                <select name="status" id="status" class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-900 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md">
                                    <option value="0" @if ($user->role == 0) selected @endif class="text-custom-dark-1000">Active</option>
                                    <option value="1" @if ($user->role == 1) selected @endif class="text-custom-dark-1000">Deactive</option>
                                </select>
                                @error('status')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>
                           

                         </div>

                         <div>

                            <div>
                                <label class="my-2 block text-sm text-custom-white-p" for="lastName">WFP No:
                                    <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                                    type="text" name="wfp_permit" id="wfp_permit" placeholder="Enter Wildlife Farm Permit" value="{{$user->wfp_permit}}"></label>
                                    @error('wfp_permit')
                                    <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                    @enderror
                            </div>

                            

                            <div>
                                <label class="my-2 block text-sm text-custom-white-p" for="wcp_permit">WCP No:
                                    <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                                    type="text" name="wcp_permit" id="wcp_permit" placeholder="Enter Wildlife Collector Permit" value="{{$user->wcp_permit}}"></label>
                                    @error('wcp_permit')
                                    <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                    @enderror
                            </div>

                            <div>
                                <label class="my-2 block text-sm text-custom-white-p" for="ownerName">Owner Name:
                                    <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                                    type="text" name="ownerName" id="ownerName" placeholder="Enter Owner Name" value="{{$user->owner_name}}"></label>
                                    @error('ownerName')
                                    <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                    @enderror
                            </div>

                            <div>
                                <label class="my-2 block text-sm text-custom-white-p" for="username">Username:
                                <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                                type="text" name="username" id="username" placeholder="Enter Username " value="{{$user->username}}"></label>
                                @error('username')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>

                            <div>
                                <label class="my-2 block text-sm text-custom-white-p" for="contact">Contact Number:
                                    <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                                    type="text" name="contact" id="contact" placeholder="Enter Contact Number" value="{{$user->contact}}"></label>
                                    @error('contact')
                                    <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                    @enderror
                            </div>
                           
                         </div>
                    </div>  

                    

                    <button type="submit" class="mb-5 font-poppins text-xl text-white bg-custom-blue mt-5 w-full py-2 border-none rounded-md">Update Account</button>
        
                </div> 
                
            </div>
           
        </form>
    </div>

  
           
    </div>

    

    

</body>
</html>


