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
            @include('admin.layout.dashboard-header-v2', ["title" => "Application Management"])    


            <form action="{{ route('uploadltp', $applicationForm->id) }}" method="post" enctype="multipart/form-data">
                @csrf
              
                <div>
                    <div class="bg-gray-50 w-8/12 rounded-md mx-auto mt-3 mb-6 shadow-md ">
                        <h1 class="px-6 py-2 font-lora font-bold text-3xl text-custom-dark-blue text-center">Finalized Permit</h1>
                        
                            <p class="text-center w-9/12 mx-auto">Download Client Signature to add to the permit</p>
                            <a class="my-4 block text-center w-24 rounded-md mx-auto bg-custom-blue text-white hover:bg-custom-dark-blue" href="{{ route('download', ['id' => $applicationForm->id]) }}">Download</a>
                            
                            <div class="flex justify-center">
                                <div class="text-center">
                                    <label for="pdf_file" class="block text-sm font-medium text-gray-700">Upload PDF File:</label>
                                    <input type="file" name="pdf_file" id="pdf_file" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    @error('pdf_file')
                                    <p class="mt-2 text-red-700 text-xs font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            
                    
                       
                       
                       
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
