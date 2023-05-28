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
        <div class="px-4 pt-5">
            <div class="bg-white w-full mx-auto my-4 p-2 rounded-20 shadow-md">
                <p class="my-2 font-poppins font-medium text-2xl mx-5">Permits Issued by Month and Year</p>
                <div id="permitIssuedByMonthAndYearChart"></div>
                
            </div>           
        </div>

        <div class="px-4 pt-5">
            <div class="bg-white w-full mx-auto my-4 p-2 rounded-20 shadow-md">
                <p class="my-2 font-poppins font-medium text-2xl mx-5">Permits Issued by Year</p>
                <div id="permitIssuedByYearChart"></div>
                
            </div>           
        </div>

        <div class="px-4 pt-5">
            <div class="bg-white w-full mx-auto my-4 p-2 rounded-20 shadow-md">
                <p class="my-2 font-poppins font-medium text-2xl mx-5">Total Permits Issued by Month and Year</p>
                <div id="totalPermitIssuedByMonthAndYearChart"></div>
                
            </div>           
        </div>
    </section>
    


   @include('admin.layout.admin-script')
   
   

   <script>
    let permitData = {!! json_encode($permitData) !!};

    const chartData = permitData.map(item => ({
        x: `${item.month} ${item.year}`,
        y: item.permits
    }));
  
    // Create chart
    const options = {
        chart: {
            type: 'bar',
            height: 350,
        },
        series: [{ name: 'Permits', data: chartData }],
        xaxis: {
            type: 'category',
        },
        colors: ['#B09FFF'],
    };

    const chart = new ApexCharts(document.querySelector('#permitIssuedByMonthAndYearChart'), options);
    chart.render();

    let permitData1 = {!! json_encode($permitData) !!};

    const chartData1 = permitData1.map(item => ({
        x: item.year,
        y: item.permits
    }));

    // Create chart
    const options1 = {
        chart: {
            type: 'bar',
            height: 350,
        },
        series: [{ name: 'Permits', data: chartData1 }],
        xaxis: {
            type: 'category',
        },
        colors: ['#FFD572'],
    };

    const chart1 = new ApexCharts(document.querySelector('#permitIssuedByYearChart'), options1);
    chart1.render();

    let permitData2 = {!! json_encode($permitData) !!};

    // Group the data by month and year and calculate the total permits for each month-year combination
    let groupedData = permitData2.reduce((acc, item) => {
        let key = `${item.month} ${item.year}`;
        if (!acc[key]) {
            acc[key] = 0;
        }
        acc[key] += item.permits;
        return acc;
    }, {});

    // Convert the grouped data into an array of objects for chart rendering
    const chartData2 = Object.keys(groupedData).map(key => ({
        x: key,
        y: groupedData[key]
    }));

    // Create chart
    const options2 = {
        chart: {
            type: 'bar',
            height: 350,
        },
        series: [{ name: 'Permits', data: chartData2 }],
        xaxis: {
            type: 'category',
        },
        colors: ['#7AD3FF'],
    };

    const chart2 = new ApexCharts(document.querySelector('#totalPermitIssuedByMonthAndYearChart'), options2);
    chart2.render();
    </script>

  

</body>

</html>
