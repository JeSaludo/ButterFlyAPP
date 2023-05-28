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
        
        @include('admin.layout.dashboard-header', ["title" => "Admin Dashboard"])           
          
          <div class="w-full  grid grid-flow-row md:grid-flow-col gap-2 px-4 my-8">
            <div class="w-full px-6 py-2  rounded-md shadow-md bg-[#7AD3FF]">
                <p class=" text-2xl font-poppins font-semibold">Total Users</p>          
               <p class="font-poppins text-xl">{{$userCount}}</p>
            </div>
            <div class="w-full px-6 py-2  rounded-md shadow-md bg-[#FFD572]">
                <p class=" text-2xl font-poppins font-semibold">Non Verified Users</p>          
                <p class="font-poppins text-xl">{{$nonverifiedUserCount}}</p>
            </div>
    
            <div class="w-full px-6 py-2 rounded-md shadow-md bg-[#B09FFF]">
                <p class=" text-2xl font-poppins font-semibold">Verified Users</p>          
                <p class="font-poppins text-xl">{{$verifiedUserCount}}</p>
            </div>
          </div>    

          <div class="px-4 w-full">
            <div class="bg-white px-4 rounded-md shadow-md py-2 ">
                <div class="" id="chart"></div>
             </div>
        
          </div>

          <p class="text-3xl font-poppins font-medium px-4 my-4">Recent Activity</p>

          <div class="px-4 ">
            <div class="bg-white w-full  mx-auto mt-3 p-2 rounded-20 shadow-md">
                <p class="my-2 font-poppins  text-xl mx-5">List of Latest Applications</p>
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200 table-auto">
                        <thead class="">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Application ID</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Applicant Name</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date of Submission</th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($applications as $form)
                            
                            <tr>
                                <td class="px-6 py-4">
                                    PMDQ-LTP-{{$form->created_at->year}}-{{sprintf('%04d', $form->id)}}</td>
                                <td class="px-6 py-4">{{ $form->name }}</td>

                                <td class="px-6 py-4">{{ $form->created_at }}</td>

                                <td
                                    class="px-6 py-4 whitespace-nowrap text-center  p-2 text-sm font-medium text-gray-400">
                                    @if($form->status === "On Process")
                                    <a class="bg-orange-100 text-orange-700 px-5  py-2 rounded-20">On Process</a>
                                    @elseif ($form->status === "Accepted")
                                    <a class=" bg-green-100 text-green-700 px-3 py-2 rounded-20">Accepted</a>
                                    @else
                                    <a class=" bg-red-100 text-red-700 px-3 py-2 rounded-20">Returned</a>
                                    @endif
                                </td>
                               


                            </tr>
                            @endforeach
                          
                        </tbody>
                    </table>
                </div>
               
            </div>

          </div>

          <div class="mt-5  w-full mx-auto text-center" >
            <a href="/admin/dashboard/applications" class="hover:cursor-pointer hover:underline font-poppins font-medium text-custom-blue" >View More</a>
          </div>
       
      
               
           
      
    </section>
    


   @include('admin.layout.admin-script')
   
   <script>    
     var options = {
      chart: {
        type: 'bar',
        height: 400,
      },
      series: [
        {
          name: 'Pending',
          data: [{{$pendingApplicationForm}}],
        },
        {
          name: 'Accepted',
          data: [{{$acceptedApplicationForm}}],
        },
        {
          name: 'Returned',
          data: [{{$returnedApplicationForm}}],
        },{
          name: 'Released',
          data: [{{$releasedApplicationForm}}],
        },
      ],
      xaxis: {
        categories: ['Submitted Application Forms'],
      },
      legend: {
        position: 'top',
      },
    };

    var chart = new ApexCharts(document.querySelector('#chart'), options);
    chart.render();



  </script>
  
  
  

</body>

</html>
