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

    
    
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body class="bg-custom-admin-bg min-h-screen">
    
   
    @include('admin.layout.dashboard-nav')
   
    <section class="main home transition-all duration-300 ease-in">     
        
        @include('admin.layout.dashboard-header-v2', ["title" => "Application Review"])    
    

        <div class="grid grid-cols-1 md:grid-cols-2  gap-4 justify-center h-20 mx-2 mt-4">
        
          <a href="{{route('admin.dashboard.pending')}}" class="bg-orange-500 h-32 hover:bg-yellow-700 text-center text-white text-xl md:text-3xl font-bold font-popins py-10 px-4 rounded-md">
            Pending Application
          </a>
          
          <a href="{{route('admin.dashboard.approved')}}" class="bg-custom-blue h-32 hover:bg-[#390A86] text-center text-white text-xl md:text-3xl font-popins font-bold py-10 px-4 rounded-md">
            Approve Application
          </a>
          
          <a href="{{route('admin.dashboard.released')}}" class="bg-green-500 h-32 hover:bg-green-700 text-center text-white text-xl md:text-3xl font-popins font-bold py-10 px-4 rounded-md">
            Released Application
          </a>
          
          <a href="{{ route('admin.dashboard.expired-used') }}" class="bg-red-500 h-32 hover:bg-red-700 text-center text-white text-xl md:text-3xl font-popins font-bold py-10 px-4 rounded-md">
            <span class="text-white">Expired/Used Application</span>
          </a>
          
          <a href="{{ route('admin.dashboard.returned') }}" class="bg-blue-500 h-32 hover:bg-blue-900 text-center text-white text-xl md:text-3xl font-popins font-bold py-10 px-4 rounded-md">
            <span class="text-white">Returned Application</span>
          </a>
          
          
        </div>
        
          
          
          
   
    </section>
    


   @include('admin.layout.admin-script')
   
   
  
  

</body>

</html>
