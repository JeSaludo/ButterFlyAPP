<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Application | WildLife</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&family=Poppins:wght@400;500;700&family=Raleway:ital,wght@0,100;0,400;0,500;0,600;0,700;1,300&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"> @vite('resources/css/app.css')
    @vite('resources/css/app.css')

</head>
<body class="bg-custom-bg-dark">
    <div class="min-h-screen">
        <nav class="px-4 font-poppins  bg-custom-dark-900 md:bg-transparent flex justify-between">
            <div class="flex justify-between items-center">
                <span class="font-2xl text-custom-dark-500 py-4 px-2 cursor-pointer font-raleway font-bold text-2xl">
                    <img class="h-10 inline " src="{{asset('images/logo.png')}}" alt="" srcset="">
                    <span class="text-custom-blue ">WILD</span>LIFE               
                </span>
            </div>

            <span class="py-4 text-3xl text-white cursor-pointer mx-2 mb-2 md:hidden block"><ion-icon name="menu-outline" onclick="Menu(this)"></ion-icon>
            </span>
           
           <ul class="md:flex bg-custom-dark-900 md:bg-transparent  md:items-center md:z-auto md:static absolute  z-30 w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500">
            
        

           
            <div class="md:flex py-4 mr-10 lg:mr-80">
               
                    <li class="ml-4 my-6 md:my-0 ">
                        <a href="{{route('home')}}" class="text-md text-white hover:text-custom-dark-600">HOME</a>
                    </li>

                    <li class="ml-4 my-6 md:my-0 ">
                        <a href="#features" class="text-md  text-white hover:text-custom-dark-600">FEATURES</a>
                    </li>

                    <li class="ml-4 my-6 md:my-0 ">
                        <a href="" class="text-md  text-white hover:text-custom-dark-600">MY APPLICATION</a>
                    </li>
            </div>
            <div class="md:flex  py-4">
                @if (Route::has('login'))
                @auth             
                    <li class="ml-4 ">
                        <a href="/profile" class="text-md  text-white hover:text-custom-dark-600">PROFILE</a>
                    </li>                    
                    <li class="ml-4 my-6 md:my-0 ">
                        <a href="/logout" class="text-md text-white hover:text-custom-dark-600">LOGOUT</a>
                    </li>
                    @else
                    <li class="ml-4 my-6 md:my-0 ">
                        <a href="{{ route('login') }}" class="text-md text-white hover:text-custom-dark-600">Log in</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="mx-4 my-6 md:my-0">
                        <a href="{{ route('register') }}" class="text-md text-white hover:text-custom-dark-600" >Register</a>
                    </li>                   
                @endauth                
                @endif
            @endif
         
            <ul>         
        </nav>

        <div class="bg-custom-bg-light-dark w-7/12  mx-auto  ">
            <div class="mx-auto pt-8 ">
                <h1 class="text-center text-custom-dark-600 text-auto md:text-3xl lg:text-xl xl:text-3xl font-lora font-bold">REGISTER <span class="text-white">AN APPLICATION</span></h1>
                <p class="text-center text-custom-dark-500 text-sm md:text-default lg:text-sm xl:text-default" >Lorem ipsum dolor sit amet, consectetur..</p>
                
                <form action="/permit/apply-permit-process" method="post">
                    @csrf
                    <div class="grid grid-flow-col">
                        
                        <div class="w-full px-10 pb-10">
                            <p class="text-white mt-6">PERSONAL INFORMATION</p>
                            <div>
                                <label class="text-left mt-2 block text-sm text-custom-white-p" for="name">Full Name:</label>
                                <input class="w-full block mt-2 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                                type="text" name="name" id="name" placeholder="Enter Full Name">
                                @error('name')
                                <div class="text-left mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="">
                                <label class="text-left mt-2 block text-sm text-custom-white-p" for="address">Address:</label>
                                <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                                type="text" name="address" id="address" placeholder="Enter Address">
                                @error('address')
                                <div class="text-left mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                                @enderror
                             </div>
                             <div class="">
                                <label class="text-left mt-2 block text-sm text-custom-white-p" for="purpose">Mode Of Transport:</label>
                                <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                                type="text" name="modeOfTransport" id="modeOfTransport" placeholder="Enter Mode of Transport">
                                @error('modeOfTransport')
                                <div class="text-left mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                                @enderror
                             </div>
                             <div class="">
                                <label class="text-left mt-2 block text-sm text-custom-white-p" for="transportAddress">Transport to Address:</label>
                                <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                                type="text" name="transportAddress" id="name" placeholder="Enter Transport to Address">
                                @error('transportAddress')
                                <div class="text-left mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                                @enderror
                             </div>
                       
                             <div class="">
                                <label class="text-left mt-2 block text-sm text-custom-white-p" for="transportDate">Date of Transport:</label>
                                <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                                type="date" name="transportDate" id="transportDate">
                                @error('transportDate')
                                <div class="text-left mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                                @enderror
                             </div>
                       
                            
                             <div class="">
                                <label class="text-left mt-2 block text-sm text-custom-white-p" for="purpose">Purpose:</label>
                                <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                                type="text" name="purpose" id="purpose" placeholder="Enter purpose of transport">
                                @error('purpose')
                                <div class="text-left mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                                @enderror
                             </div>

                             <div class="flex justify-between gap-2">
                                <button type="submit" class="w-6/12 mx-auto font-poppins text-xl text-white bg-custom-blue mt-4  py-2 border-none rounded-md">Apply</button>
                                <button type="submit" class="w-6/12 mx-auto font-poppins text-xl text-white bg-transparent border-custom-dark-500 border-2 mt-4  py-2  rounded-md">Draft</button>
            
                             </div>
                        </div>

                        <div class="w-full px-10">
                            <p class="text-white mt-6 mb-4">BUTTERFLY INFORMATION</p>
                            <div class="grid grid-flow-col gap-2">
                                <input type="text" class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md" placeholder="Enter Butterfly" name="butterfly_name[]">
                                <input type="number" class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md" placeholder="Enter Quantity" name="butterfly_quantity[]">
                                <a href="#" class="add text-white bg-custom-blue p-1.5 rounded-md mt-2 cursor-pointer "> Add Field</a>

                            </div>
                            <div class="inp-group">
        
                            </div>

                          
                           
                        </div>
                       
                    </div>
                   
                </form>

            </div>
            
            
        
        </div>



    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
    <script>
        function Menu(e){
            let list  = document.querySelector("ul")
            e.name === 'menu' ? (e.name = "close", list.classList.add('top-[55px]'), list.classList.add('opacity-100')) : (e.name = "menu", list.classList.remove('top-[55px]'), list.classList.remove('opacity-100'))
        
        }
    </script>
    <script src="{{ asset('js/customize-form.js') }}"></script>

</body>
</html>