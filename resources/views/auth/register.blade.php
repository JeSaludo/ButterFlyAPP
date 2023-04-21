<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | OFSPTS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&family=Poppins:wght@400;500;700&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>
   <div class="min-h-screen py-10" style="background-color: #D5DFE8">
        <div class="container mx-auto">
            <div class="flex flex-col-reverse lg:flex-row bg-white w-10/12 lg:w-10/12 mx-auto">
                <div class="w-full lg:w-2/4">
                    <form action="/register/store" method="POST" class="px-12">
                        @csrf
                        <div class="flex justify-start mt-20">
                            <img class="h-12 w-12" src="{{asset('images/logo.png')}}" alt="" srcset="">
                            <h1 class="py-3 font-poppins font-bold text-brand">OFSPTS</h1>
                        </div>

                        <div class="mt-2">
                            <h1 class="text-4xl font-bold font-lora text-dark-blue">Create an Account</h1>
                            <p class="text-xl font-roboto font-normal mt-2 text-dark-blue">Lorem ipsum dolor sit amet, consectetur..</p>
                        </div>
                        <div class="mt-2 grid grid-flow-col gap-5">
                            <div class=""> 
                             <label class="text-xs font-roboto font-bold" for="firstName">FirstName</label>
                             <input type="text" placeholder="Enter First Name" name="firstName" id="firstName" class="border border-gray-800 rounded-md py-2 px-4 w-full mt-1">
                             @error('firstName')
                             <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                               @enderror
                            </div>
                           <div class=""> 
                             <label class="text-xs font-roboto font-bold" for="lastName">LastName</label>
                             <input type="text" placeholder="Enter Last Name" name="lastName"  id="lastName" class="border border-gray-800 rounded-md py-2 px-4 w-full mt-1">
                             @error('lastName')
                             <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                               @enderror
                            </div>
                         </div>
                        <div class="mt-2">
                          <label class="text-xs font-roboto font-bold" for="wildlifePermit">WCP or WFP</label>
                          <input type="text" placeholder="Enter WCP or WFP" name="wildlifePermit" id="wildlifePermit"   class="border border-gray-800 rounded-md py-2 px-4 w-full mt-1">
                            @error('wildlifePermit')
                             <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mt-2">
                            <label class="text-xs font-roboto font-bold" for="businessName">Business Name</label>
                            <input type="text" placeholder="Enter Business Name" name="businessName"  id="businessName" class="border border-gray-800 rounded-md py-2 px-4 w-full mt-1">
                            @error('businessName')
                             <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                            @enderror
                        </div>
                      
                        <div class="mt-2">
                            <label class="text-xs font-roboto font-bold" for="ownerName">Owner Name</label>
                            <input type="text" placeholder="Enter Owner Name" name="ownerName"  id="ownerName" class="border border-gray-800 rounded-md py-2 px-4 w-full mt-1">
                            @error('ownerName')
                             <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        
                        <div class="mt-2">
                            <label class="text-xs font-roboto font-bold" for="address">Address</label>
                            <input type="text" placeholder="Enter Address" name="address"  id="address" class="border border-gray-800 rounded-md py-2 px-4 w-full mt-1">
                            @error('address')
                             <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label class="text-xs font-roboto font-bold" for="contact">Contact Number</label>
                            <input type="text" placeholder="Enter Contact Number" name="contact"  id="contact" class="border border-gray-800 rounded-md py-2 px-4 w-full mt-1">
                            @error('address')
                            <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label class="text-xs font-roboto font-bold" for="email">Email</label>
                            <input type="text" placeholder="Enter Email Address" name="email"  id="email" class="border border-gray-800 rounded-md py-2 px-4 w-full mt-1">
                            @error('email')
                            <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <div class="mt-5">
                          <button type="submit" class="w-full bg-very-dark-blue rounded-md hover:bg-gray-500 py-3 text-center text-white">Create Account</button>
                        </div>

                        <div class="mt-3 mb-20">
                            <p class="float-right text-xs font-roboto font-bold">Already have an Account? <span><a  href="/login">Login</a>
                            </span></p>
                        </div>
                      </form>
                </div>

                <div class="w-full lg:w-3/4 p-4">
                    <img src="{{asset('images/login-img.png')}}" alt="" class="w-full h-full bg-no-repeat bg-cover bg-center rounded-tl-lg rounded-br-lg">
                </div>
            </div>
        </div>
   </div>
    

        
    
</body>
</html>