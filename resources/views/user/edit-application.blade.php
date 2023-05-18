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
        @include('layout.user-nav')

        <div class="bg-custom-bg-light-dark w-7/12  mx-auto  ">
            <div class="mx-auto pt-8 ">
                <h1 class="text-center text-custom-dark-600 text-auto md:text-3xl lg:text-xl xl:text-3xl font-lora font-bold">UPDATE <span class="text-white">DRAFT  APPLICATION</span></h1>
                <p class="text-center text-custom-dark-500 text-sm md:text-default lg:text-sm xl:text-default" >Lorem ipsum dolor sit amet, consectetur..</p>
                
                <form action="{{ route('user.update-application', $form->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-flow-col">
                        
                        <div class="w-full px-10 pb-10">
                            <p class="text-white mt-6">PERSONAL INFORMATION</p>
                            <div>
                                <label class="text-left mt-2 block text-sm text-custom-white-p" for="name">Full Name:</label>
                                <input class="w-full block mt-2 placeholder:text-custom-dark-500 bg-transparent text-custom-white-p border-custom-dark-500 border-2 p-1.5 rounded-md"
                                type="text" name="name" id="name" placeholder="Enter Full Name" value="{{$form->name}}">
                                @error('name')
                                <div class="text-left mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="">
                                <label class="text-left mt-2 block text-sm text-custom-white-p" for="address">Address:</label>
                                <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                                type="text" name="address" id="address" placeholder="Enter Address" value="{{$form->address}}">
                                @error('address')
                                <div class="text-left mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                                @enderror
                             </div>
                             <div class="">
                                <label class="text-left mt-2 block text-sm text-custom-white-p" for="purpose">Mode Of Transport:</label>
                                <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                                type="text" name="modeOfTransport" id="modeOfTransport" placeholder="Enter Mode of Transport" value="{{$form->mode_of_transport}}">
                                @error('modeOfTransport')
                                <div class="text-left mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                                @enderror
                             </div>
                             <div class="">
                                <label class="text-left mt-2 block text-sm text-custom-white-p" for="transportAddress">Transport to Address:</label>
                                <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                                type="text" name="transportAddress" id="name" placeholder="Enter Transport to Address" value="{{$form->transport_address}}">
                                @error('transportAddress')
                                <div class="text-left mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                                @enderror
                             </div>
                       
                             <div class="">
                                <label class="text-left mt-2 block text-sm text-custom-white-p" for="transportDate">Date of Transport:</label>
                                <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                                type="date" name="transportDate" id="transportDate" value="{{$form->transport_date}}">
                                @error('transportDate')
                                <div class="text-left mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                                @enderror
                             </div>
                       
                            
                             <div class="">
                                <label class="text-left mt-2 block text-sm text-custom-white-p" for="purpose">Purpose:</label>
                                <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                                type="text" name="purpose" id="purpose" placeholder="Enter purpose of transport" value="{{$form->purpose}}"> 
                                @error('purpose')
                                <div class="text-left mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                                @enderror
                             </div>

                             <div class="flex justify-between gap-2">
                                <button type="submit" class="w-full mx-auto font-poppins text-xl text-white bg-custom-blue mt-4  py-2 border-none rounded-md">Submit</button>
                               
                             </div>
                        </div>

                        <div class="w-full px-10">
                            <p class="text-white mt-6 ">BUTTERFLY INFORMATION</p>
                            <div class="grid grid-flow-col">
                                <label class="text-left mt-2 block text-sm text-custom-white-p" for="purpose">Name:</label>
                                <label class="text-left mt-2 block text-sm text-custom-white-p" for="purpose">Quantity:</label>
                        
                            </div>
                            @foreach ($form->butterflies as $butterfly)
                                
                                <div class="grid grid-flow-col gap-2">
                                    
                                    <input type="text" class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md" placeholder="Enter Butterfly" name="butterfly_name[]" value="{{ $butterfly->name }}">
                                    <input type="number" class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md" placeholder="Enter Quantity" name="butterfly_quantity[]" value="{{ $butterfly->quantity }}">
                                </div>
                            @endforeach
                            <div class="grid grid-flow-col">
                                @error('butterfly_name[]')
                                <div class="text-left mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                                @enderror
                                @error('butterfly_quantity[]')
                                <div class="text-left mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                                @enderror
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