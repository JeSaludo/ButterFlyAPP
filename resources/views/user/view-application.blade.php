<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | WildLife</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&family=Poppins:wght@400;500;700&family=Raleway:ital,wght@0,100;0,400;0,500;0,600;0,700;1,300&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"> @vite('resources/css/app.css')
    @vite('resources/css/app.css')

</head>
<body class="bg-custom-light-tint-blue">
    <div class="min-h-screen">
        <div class="bg-custom-dark-900">
            @include('layout.user-nav-dashboard')
        </div>

        <div id="printable" class=" mx-auto">
            <div>
                <div class="bg-gray-50 w-7/12 rounded-md mx-auto mt-10 ">
                <h1 class="px-6 py-2 font-lora font-bold text-3xl text-custom-dark-blue">APPLICATION FORM DETAILS</h1>
                
                <div class="grid grid-flow-col  px-6 pb-4">               
                    <div>
                        <div class="mt-2">
                            <p class="text-lg font-roboto font-semibold ">Application Name:</p>
                            <p class="text-custom-dark-400 font-poppins">{{$form->name}}</p>
                        </div>

                        <div class="mt-2">
                            <p class="text-lg font-roboto font-semibold ">Address:</p>
                            <p class="text-custom-dark-400 font-poppins">{{$form->address}}</p>
                        </div>

                        <div class="mt-2">
                            <p class="text-lg font-roboto font-semibold  ">Mode Of Transport:</p>
                            <p class="text-custom-dark-400 font-poppins">{{$form->mode_of_transport}}</p>
                        </div>

                        <div class="mt-2">
                            <p class="text-lg font-roboto font-semibold  ">Purpose:</p>
                            <p class="text-custom-dark-400 font-poppins">{{$form->purpose}}</p>
                        </div>
                    </div>
                    <div>

                        <div class="mt-2">
                            <p class="text-lg font-roboto font-semibold ">Application ID:</p>
                            <p class="text-custom-dark-400 font-poppins">PMDQ-LTP-{{$form->created_at->year}}-{{sprintf('%06d', $form->id)}}</p>
                        </div>
                        <div class="mt-2">
                            <p class="text-lg font-roboto font-semibold ">Date of Transport:</p>
                            <p class="text-custom-dark-400 font-poppins">{{$form->transport_date}}</p>
                        </div>

                        <div class="mt-2">
                            <p class="text-lg font-roboto font-semibold ">Tranport Address:</p>
                            <p class="text-custom-dark-400 font-poppins">{{$form->transport_address}}</p>
                        </div>

                        <div class="mt-2">
                            <p class="text-lg font-roboto font-semibold ">Status:</p>
                            <div class="w-24">
                                @if ($form->status=="Returned")
                                <p class=" bg-red-100 text-green-700 px-3 py-2 rounded-20 text-center">Returned</p>
                            @elseif ($form->status=="Accepted")
                                <p class=" bg-green-100 text-green-700 px-3 py-2 rounded-20 text-center">Accepted</p>
                            @elseif ($form->status=="Released")
                                <p class=" bg-green-100 text-green-700 px-3 py-2 rounded-20 text-center">Released</p>
                            @elseif ($form->status=="Draft")
                            <p class=" bg-orange-100 text-orange-700 px-3 py-2 rounded-20 text-center">Draft</p>
                            
                                @else
                                <p class=" bg-orange-100 text-orange-700 px-3 w-28 py-2 rounded-20">On Process</p>
                            @endif
                            </div>
                         </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="bg-gray-50 w-7/12 rounded-md mx-auto mt-10 ">
                <h1 class="px-6 py-2 font-lora font-bold text-3xl text-custom-dark-blue">BUTTERFLY DETAILS</h1>
            
                
                <div class="grid grid-cols-2  px-6 pb-2"> 
                    <p class="text-lg font-roboto font-semibold ">Butterfly Name:</p>
                    <p class="text-lg font-roboto font-semibold ">Quantity</p>
                </div>
                <div class="grid grid-cols-2  px-6 pb-4">               
                    @foreach ($form->butterflies as $butterfly)
                    <div>
                    
                        <div class="mt-2">
                        
                            <p class="text-custom-dark-400 font-poppins">{{ $butterfly->name }}</p>
                        </div>
                    
                    </div> 
                    <div>  

                        <div class="mt-2">
                            
                            
                            <p class="text-custom-dark-400 font-poppins">{{ $butterfly->quantity }}</p>
                        
                        </div>
                    </div>
                    @endforeach
                </div>
                
            </div>

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