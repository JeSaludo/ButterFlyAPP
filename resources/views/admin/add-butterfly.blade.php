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
    @include('admin.layout.dashboard-header-v2', ["title" => "Add Butterfly Species"])
        <form action="{{route('admin.store-butterfly')}}" method="post">
            @csrf
            
            <div>
                <div class="bg-gray-50 w-11/12 rounded-md mx-auto mt-3 mb-3 ">
                    <h1 class="px-6 py-2 font-lora font-bold text-3xl text-custom-dark-blue">Create Butterfly
                    </h1>
                    <div class="grid grid-flow-row md:grid-flow-col gap-4 px-10 pb-4">
                        <div class="w-full">
                            
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="speciesType">Species Type:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="speciesType" id="speciesType" placeholder="Enter Species Type"
                                        ></label>
                                @error('speciesType')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>
                           
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="className">Class Name:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="className" id="className" placeholder="Enter Class Name"
                                        ></label>
                                @error('className')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>

                            
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="familyName">Family Name:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="familyName" id="familyName" placeholder="Enter Family Name"
                                        ></label>
                                @error('familyName')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>
                            



                           
                        </div>

                        <div class="w-full">
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="commonName">Common Name:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="commonName" id="commonName" placeholder="Enter Common Name"
                                        ></label>
                                @error('commonName')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="scientificName">Scientific Name:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="scientificName" id="scientificName" placeholder="Enter Scientific Name"
                                        ></label>
                                @error('scientificName')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="description">Description:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="description" id="description" placeholder="Enter Description"
                                        ></label>
                                @error('description')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>

            
                    </div> 
                    
                   
                </div>
                <div class=" px-10 py-2 flex  gap-2">
                    <button type="submit"
                        class="w-full mx-auto font-poppins text-xl text-white bg-custom-blue hover:bg-[#390A86] mt-4  py-2 border-none rounded-md">Create
                        Butterfly Species</button>

                </div>

            </div>


    
    
          </div>


    
        </form>
       
    </section>

    @include('admin.layout.admin-script')
</body>

</html>

