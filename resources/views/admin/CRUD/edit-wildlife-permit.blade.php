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
                <p class="text-auto md:text-3xl  font-poppins font-medium">Add Wildlife Permit</p>                  
               
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
        <form action="{{route('admin.update-wildlife-permit', $permit->id)}}" method="post">
            @csrf
            @method('PUT')
            <div>
                <div class="bg-gray-50 w-11/12 rounded-md mx-auto mt-3 mb-3 ">
                    <h1 class="px-6 py-2 font-lora font-bold text-3xl text-custom-dark-blue">Create Wild Life Permit
                    </h1>
                    <div class="grid grid-flow-row md:grid-flow-col gap-4 px-10 pb-4">
                        <div class="w-full">
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="permitType">Permit Type:</label>
                                <select id="permitType" name="permitType" class="w-full bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md">
                                    <option value="wfp" @if ($permit->permit_type == "wfp")  selected @endif>WFP</option>
                                    <option value="wcp"  @if ($permit->permit_type == "wcp") selected @endif>WCP</option>
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
                                        value='{{$permit->permit_no}}'></label>
                                @error('permitNo')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>
                           
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="businessName">Business Name:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="businessName" id="businessName" placeholder="Enter Business Name"
                                        value='{{$permit->business_name}}'></label>
                                @error('businessName')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>

                            
                           
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="ownerName">Owner Name:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="ownerName" id="ownerName" placeholder="Enter Owner Name"
                                        value='{{$permit->owner_name}}'></label>
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
                                        value='{{$permit->issue_date}}'></label>
                                @error('issueDate')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="expirationDate">Enter Expiration Date:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="date" name="expirationDate" id="expirationDate" placeholder="Enter Expiration Date"
                                        value='{{$permit->expiration_date}}'></label>
                                @error('expirationDate')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="address">Enter Address:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="address" id="address" placeholder="Enter Address"
                                        value="{{$permit->address}}"></label>
                                @error('address')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>

            
                    </div>
                    
                   
                </div>
                <div class=" px-10 py-2 flex  gap-2">
                    <button type="submit"
                        class="w-full mx-auto font-poppins text-xl text-white bg-custom-blue mt-4  py-2 border-none rounded-md">
                        Update Permit</button>

                </div>

            </div>


    
    
          </div>


    
        </form>
       
    </section>

  
    @include('admin.layout.admin-script')
</body>

</html>

