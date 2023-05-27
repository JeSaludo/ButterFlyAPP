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
    <div class="min-h-screen">
        @include('admin.layout.dashboard-nav')

        <section class="main home transition-all duration-300 ease-in">
            <div class="h-14 w-full flex justify-between py-2 transition-all duration-300 ease-in">
                <div class="px-6">         
                    <p class="text-auto md:text-3xl  font-poppins font-medium">Review Application</p>                  
            
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

            <form action="{{ route('uploadltp', $applicationForm->id) }}" method="post" enctype="multipart/form-data">
                @csrf
              
                <div>
                    <div class="bg-gray-50 w-11/12 rounded-md mx-auto mt-3 mb-3 ">
                        <h1 class="px-6 py-2 font-lora font-bold text-3xl text-custom-dark-blue text-center">Finalized Permit</h1>
                        

                        <a href="{{ route('download', ['id' => $applicationForm->id]) }}">{{ $applicationForm->file_name }}</a>
                      
                      
                        <input type="file" name="pdf_file">
                        @error('pdf_file')
                        <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                        @enderror
                       
                       
                        <div class=" px-10 py-2 flex  gap-2">
                            <button type="submit"
                                class="w-full mx-auto font-poppins text-xl text-white bg-custom-blue mt-4  py-2 border-none rounded-md">
                                Release Permit</button>

                        </div>
                    </div>
                   
    
                </div>
    
    
        
        
              </div>
    
    
        
            </form>
           
         

        </section>




    </div>



  
   @include('admin.layout.admin-script')

</body>

</html>
