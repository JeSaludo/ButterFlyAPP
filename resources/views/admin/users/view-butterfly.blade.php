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

</head>

<body class="bg-custom-admin-bg min-h-screen">
    <div class="min-h-screen">
        @include('admin.layout.dashboard-nav', ["title" => "View Butterfly"])

        <section id="overview">

            <div class="md:ml-64">
                <div id="printable">
                    <div>
                        <div class="bg-gray-50 w-11/12 rounded-md mx-auto mt-10 ">
                            <h1 class="px-6 py-2 font-lora font-bold text-3xl text-custom-dark-blue">Butterfly
                                Details</h1>

                            <div class="grid grid-flow-col  px-6 pb-4">
                                <div>
                                    <div class="mt-2">
                                        <p class="text-lg font-roboto font-semibold ">Species Type:</p>
                                        <p class="text-custom-dark-400 font-poppins"> {{$butterflies->species_type}}</p>
                                    </div>

                                    <div class="mt-2">
                                        <p class="text-lg font-roboto font-semibold ">Class Name:</p>
                                        <p class="text-custom-dark-400 font-poppins">{{$butterflies->class_name}}</p>
                                    </div>

                                    <div class="mt-2">
                                        <p class="text-lg font-roboto font-semibold  ">Family Name:</p>
                                        <p class="text-custom-dark-400 font-poppins">{{$butterflies->family_name}}</p>
                                    </div>

                                    <div class="mt-2">
                                        <p class="text-lg font-roboto font-semibold ">Scientific Name:</p>
                                        <p class="text-custom-dark-400 font-poppins">{{$butterflies->scientific_name}}/p>
                                           
                                    </div>
                                    <div class="mt-2">
                                        <p class="text-lg font-roboto font-semibold  ">Common name:</p>
                                        <p class="text-custom-dark-400 font-poppins">{{$butterflies->common_name}}</p>
                                    </div>
                                    <div class="mt-2">
                                        <p class="text-lg font-roboto font-semibold ">Description:</p>
                                        <p class="text-custom-dark-400 font-poppins">{{$butterflies->description}}</p>
                                    </div>

                                    


                                       
                               

                                    
                                </div>
                            </div>
                        </div>

                      

                    </div>
                </div>
            </div>

        </section>




    </div>



    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <script src="{{asset('js/sidenav.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

</body>

</html>
