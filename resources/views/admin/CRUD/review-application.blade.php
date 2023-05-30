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
    <div class="min-h-screen">
        @include('admin.layout.dashboard-nav')

        <section class="main home transition-all duration-300 ease-in">
        @include('admin.layout.dashboard-header-v2', ["title" => "Review Application"])

                <div id="printable">
                    <div>
                        <div class="bg-gray-50 w-11/12 rounded-20 mx-auto mt-10 shadow-md ">
                            <h1 class="px-6 py-2 font-lora font-bold text-2xl text-custom-dark-blue ">APPLICATION FORM DETAILS</h1>


                            <div class="grid grid-flow-col  px-6 pb-4  ">
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
                                        <p class="text-custom-dark-400 font-poppins">
                                            PMDQ-LTP-{{$form->created_at->year}}-{{sprintf('%06d', $form->id)}}</p>
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
                                        @if ($form->status=="Returned")
                                        <p
                                            class="text-custom-dark-400 w-20 text-center rounded-md bg-red-300 text-red-700  font-poppins">
                                            Returned</p>
                                        @elseif ($form->status=="Accepted")
                                        <p
                                            class="text-custom-dark-400 w-20 text-center rounded-md bg-green-300 text-green-700  font-poppins">
                                            Accepted</p>
                                        @elseif($form->status=="On Process")
                                        <p
                                            class="text-custom-dark-400 w-28 px-2 text-center rounded-md bg-orange-300 text-orange-700  font-poppins">
                                            On Process</p>
                                        @endif


                                       
                                    </div>

                                    
                                </div>
                            </div>
                            <div>
                                <h1 class="px-6 py-2 font-lora font-bold text-2xl text-custom-dark-blue">BUTTERFLY
                                    DETAILS</h1>


                                <div class="grid grid-cols-2  px-6 ">
                                    <p class="text-base font-roboto font-semibold ">Butterfly Name:</p>
                                    <p class="text-base font-roboto font-semibold ">Quantity</p>
                                </div>
                                <div class="grid grid-cols-2  px-6 pb-4">
                                    @foreach ($form->butterflies as $butterfly)
                                    <div>

                                        <div class="mt-1">

                                            <p class="text-custom-dark-400 font-poppins">{{ $butterfly->name }}</p>
                                        </div>

                                    </div>
                                    <div>

                                        <div class="mt-1">


                                            <p class="text-custom-dark-400 font-poppins">{{ $butterfly->quantity }}</p>

                                        </div>
                                    </div>
                                        
                                    @endforeach

                                   
                                </div>
                                <div class="flex justify-center pl-24 ">
                                        
                                    <div class="">
                                        <p class="text-base font-roboto font-semibold">Total Quantity:</p>
                                        <p class="px-2 text-custom-dark-400 font-poppins">{{ $form->butterflies->sum('quantity') }}</p>
                                    </div>
                                    </div>
                            </div>
                                <h1 class=" px-6 py-2 font-lora font-bold text-2xl text-custom-dark-blue">Approval And Return Section</h1>
                           
                             
                                    <div class="w-full py-5  px-5  flex justify-between gap-3 "> 
                                
                                        <form action="{{ route('approve-application', $form->id) }}" method="POST" class="w-full">
                                            @csrf
                                        
                                            <div class="grid grid-flow-col gap-3">
                                                <input type="number" name="payment_amount" placeholder="Enter Payment Amount" class="w-full flex text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md" required>
                                        
                                                <button type="submit" class="w-full mr-2 py-2 bg-custom-blue hover:bg-custom-dark-700 text-white flex item-center font-bold px-2 rounded" onclick="return confirm('Are you sure you want to approve this application?')">
                                                    <i class='bx bx-sm bx-check'></i> Accept Application
                                                </button>
                                            </div>
                                        </form>
                                        
                                        <form action="{{ route('deny-application', $form->id) }}" method="POST" class="w-6/12 text-left">
                                            @csrf
                                            <button type="submit" class="w-full bg-red-400 hover:bg-red-700 text-white flex item-center font-bold py-2 px-2 rounded" onclick="return confirm('Are you sure you want to reject this application?')">
                                                <i class='bx bx-sm bx-x'></i> Return Application
                                            </button>
                                        </form>
                                        
                                       
                                     </div>
                            
                                
                            

                        </div>


                    </div>
                </div>
         

        </section>




    </div>



  
   @include('admin.layout.admin-script')

</body>

</html>
