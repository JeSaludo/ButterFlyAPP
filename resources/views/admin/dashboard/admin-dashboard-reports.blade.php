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
        
        @include('admin.layout.dashboard-header-v2', ["title" => "Reports"])    

   
        <div class="px-4 pt-5">
            <div class="bg-white w-full mx-auto my-4 p-2 rounded-20 shadow-md">
                <p class="my-2 font-poppins font-medium text-2xl mx-5">List of Butterfly Species</p>
                
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200 table-auto">
                        <thead class="">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Species Type</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Common Name</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Scientific Name</th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Class Name</th>

                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Family Name</th>
                                <th
                                    class="px-6 py-3  text-xs text-center font-medium text-gray-500 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach($butterflies as $butterfly)
                            <tr>
                                <td class="px-6 py-4">
                                    {{$butterfly->species_type}}</td>
                                <td class="px-6 py-4">{{ $butterfly->common_name }}</td>

                                <td class="px-6 py-4">{{ $butterfly->scientific_name }}</td>

                                <td class="px-6 py-4">{{ $butterfly->class_name }}</td>
                                <td class="px-6 py-4">{{ $butterfly->family_name }}</td>

                                <td class="px-6  text-center py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('admin.view-butterfly', $butterfly->id)}}"
                                        class="mx-2 text-indigo-600 hover:text-indigo-900">View</a>
                                    <a href="{{ route('admin.edit-butterfly', $butterfly->id)}}"
                                        class="mx-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ Route('admin.delete-butterfly', $butterfly->id)}}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="mx-2 text-red-600 hover:text-indigo-900"
                                            onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                    </form>
                                   


                                </td>


                            </tr>
                            @endforeach
                         
                        </tbody>
                    </table>
                </div>
                <div class="mx-auto my-2 px-6 pb-3">
                    <nav class="flex items-center justify-between">
                        <div class="flex-1 flex justify-between">
                            <!-- Previous Page Link -->
                            @if ($butterflies->onFirstPage())
                            <span
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-md">
                                Previous
                            </span>
                            @else
                            <a href="{{ $butterflies->previousPageUrl() }}"
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:ring-opacity-50">
                                Previous
                            </a>
                            @endif

                            <div class="text-sm text-gray-500 py-2">
                                <span>{!! __('Showing') !!}</span>
                                <span class="font-medium">{{ $butterflies->firstItem() }}</span>
                                <span>{!! __('to') !!}</span>
                                <span class="font-medium">{{ $butterflies->lastItem() }}</span>
                                <span>{!! __('of') !!}</span>
                                <span class="font-medium">{{ $butterflies->total() }}</span>
                                <span>{!! __('results') !!}</span>
                            </div>

                            @if ($butterflies->hasMorePages())
                            <a href="{{ $butterflies->nextPageUrl() }}"
                                class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:ring-opacity-50">
                                Next
                            </a>
                            @else
                            <span
                                class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-md">
                                Next
                            </span>
                            @endif
                        </div>


                    </nav>
                </div>
                
            </div>

           
        </div>

        <div class="w-full  grid grid-flow-row md:grid-flow-col gap-2 px-4 ">
            <div class="w-full px-6 py-2  rounded-md shadow-md bg-[#7AD3FF]">
                <p class=" text-2xl font-poppins font-semibold">Total Permit Issued</p>          
               <p class="font-poppins text-xl">{{$totalPermits}}</p>
            </div>
            <div class="w-full px-6 py-2  rounded-md shadow-md bg-[#FFD572]">
                <p class=" text-2xl font-poppins font-semibold">Pending Permits</p>          
                <p class="font-poppins text-xl">{{$pendingPermit}}</p>
            </div>
    
            <div class="w-full px-6 py-2 rounded-md shadow-md bg-[#B09FFF]">
                <p class=" text-2xl font-poppins font-semibold">Released Permits</p>          
                <p class="font-poppins text-xl">{{$totalPermits}}</p>
            </div>
          </div>  
        <div class="px-4 pt-2">
            <div class="bg-white w-full mx-auto my-4 p-2 rounded-20 shadow-md">
                <p class="my-2 font-poppins font-medium text-2xl mx-5">Permits Issued by Month</p>
                <div id="permitIssuedByMonthChart"></div>
                
            </div>           
        </div>

        <div class="px-4 pt-2">
            <div class="bg-white w-full mx-auto my-4 p-2 rounded-20 shadow-md">
                <p class="my-2 font-poppins font-medium text-2xl mx-5">Permits Issued by Year</p>
                <div id="permitIssuedByYearChart"></div>
                
            </div>           
        </div>

        <div class="px-4 pt-5">
            <div class="bg-white w-full mx-auto my-4 p-2 rounded-20 shadow-md">
                <p class="my-2 font-poppins font-medium text-2xl mx-5">Total Revenue Collection by Month and Year</p>
                <div id="revenueChart"></div>
                
            </div>           
        </div>


       

       
    </section>
    


   @include('admin.layout.admin-script')
   
   

   <script>
   
   var options = {
            series: [{
                name: 'Permits',
                data: @json($values)
            }],
            chart: {
                type: 'area',
                height: 350
            },
            xaxis: {
                categories: @json($labels),
            },
        };

    

    var chart = new ApexCharts(document.querySelector("#permitIssuedByMonthChart"), options);
    chart.render();

    var options2 = {
            series: [{
                name: 'Permits',
                data: @json($values1)
            }],
            chart: {
                type: 'area',
                height: 350
            },
            xaxis: {
                categories: @json($labels1),
            },
            colors: ['#FFD572'],
        };

    

    var chart3 = new ApexCharts(document.querySelector("#permitIssuedByYearChart"), options2);
    chart3.render();
    
    

    var revenueData = @json($revenueData);


    var labels = [];
    var dataSeries = [];

    revenueData.forEach(function(item) {
            var monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            var month = monthNames[item.month - 1];
            var label = month + ' ' + item.year;
            
            labels.push(label);
            dataSeries.push(item.totalRevenue);
        });

    var options1 = {
        chart: {
            type: 'bar',
            height: 350
        },
        series: [{
            name: 'Revenue',
            data: dataSeries
        }],
        xaxis: {
            categories: labels
        },
        colors: ['#B09FFF', '#FFD572', '#7AD3FF']
    };

    // Render the chart
    var chart2 = new ApexCharts(document.querySelector("#revenueChart"), options1);
    chart2.render();
        </script>

  

</body>

</html>
