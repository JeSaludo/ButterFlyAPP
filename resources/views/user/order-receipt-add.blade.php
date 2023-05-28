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
        <div class="bg-gray-50 w-6/12 rounded-md mx-auto mt-6 mb-5 ">
            <h1 class="px-6 py-2 font-lora font-bold text-3xl text-custom-dark-blue text-center">Permit Completion</h1>
                <form action="{{route('user.store-permit', $form->id)}}" method="POST" class="w-8/12 mx-auto py-4" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mt-2">
                        <label class="my-2 block text-md font-robot font-medium" for="orNumber">OR Number:
                            <input
                                class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                type="text" name="orNumber" id="orNumber" placeholder="Enter Order Receipt Number"
                               ></label>
                        @error('orNumber')
                        <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                        @enderror
                    </div>

                    <div class="mt-2">
                        
                        <label class="my-2 block text-md font-robot font-medium" for="signature">Your Signature:</label>
                        <input class="w-full block mt-2 bg-transparent" type="file" name="signature" id="signature">

                        @error('signature')
                        <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                        @enderror
                    </div>

                    <div class="flex justify-between gap-2">
                        <button type="submit" class="w-full mx-auto font-poppins text-xl text-white bg-custom-blue mt-4  py-2 border-none rounded-md">Submit</button>
                       
                     </div>
                </form>
           
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