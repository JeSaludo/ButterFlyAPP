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
        rel="stylesheet"> 
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body class="bg-custom-admin-bg min-h-screen">
    @include('admin.layout.dashboard-nav')

    <section class="main home transition-all duration-300 ease-in">
        @include('admin.layout.dashboard-header-v2', ["title" => "Wildlife Permit"])   
        <form action="store-wildlife-permit/store" method="post">
            @csrf
            
            <div>
                <div class="bg-gray-50 w-11/12 rounded-md mx-auto mt-3 mb-3  shadow-md">
                    <h1 class="px-6 py-2 font-lora font-bold text-3xl text-custom-dark-blue">Create Wild Life Permit
                    </h1>
                    <div class="grid grid-flow-row md:grid-flow-col gap-4 px-10 pb-4">
                        <div class="w-full">
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="permitType">Permit Type:</label>
                                <select id="permitType" name="permitType" class="w-full bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md">
                                    <option value="wfp" @if(old('permitType') == 'wfp') selected @endif>WFP</option>
                                    <option value="wcp" @if(old('permitType') == 'wcp') selected @endif>WCP</option>
                                </select>
                                @error('permitType')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="permitNo">Permit No.:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="permitNo" id="permitNo" placeholder="Enter Permit No."
                                        ></label>
                                @error('permitNo')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>
                           
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="businessName">Business Name:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="businessName" id="businessName" placeholder="Enter Business Name"
                                        ></label>
                                @error('businessName')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>

                            
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="ownerName">Owner Name:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="ownerName" id="ownerName" placeholder="Enter Owner Name"
                                        ></label>
                                @error('ownerName')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>
                            



                           
                        </div>
                      
                       
                        <div class="w-full">
                            
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="issueDate">Issue Date:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="date" name="issueDate" id="issueDate" placeholder="Enter Issue Date"
                                        ></label>
                                @error('issueDate')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                                </div>
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="expirationDate">Enter Expiration Date:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="date" name="expirationDate" id="expirationDate" placeholder="Enter Expiration Date"
                                        ></label>
                                @error('expirationDate')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>
                        
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="address">Enter Address:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="address" id="address" placeholder="Enter Address"
                                        ></label>
                                @error('address')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>

                        </div>
                           
                            
            
                    </div>
                    <div class=" px-10 py-2 flex  gap-2">
                        <button type="submit"
                            class="w-full mx-auto font-poppins text-xl text-white bg-custom-blue hover:bg-[#390A86] mt-4  py-2 border-none rounded-md">Create
                            Permit</button>
    
                    </div>
                   
                </div>
               

            </div>


    
    
          </div>


    
        </form>
       
    </section>

  
    @include('admin.layout.admin-script')
</body>

</html>

