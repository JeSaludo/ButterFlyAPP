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

    
    
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body class="bg-custom-admin-bg min-h-screen">
    
   
    @include('admin.layout.dashboard-nav')
   
    <section class="main home transition-all duration-300 ease-in">     
        
        <div class="h-14 w-full flex justify-between py-2 transition-all duration-300 ease-in">
            <div class="px-6">         
                <p class="text-auto md:text-3xl  font-poppins font-medium">Order of Payment</p>                  
               
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


    </section>
    


   @include('admin.layout.admin-script')
   
   
  
  

</body>

</html>
