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
        
        @include('admin.layout.dashboard-header-v2', ["title" => "Application Management"])    

   
        <div class="px-4 pt-5">
            <div class="bg-white w-full mx-auto my-4 p-2 rounded-20 shadow-md">
                <p class="my-2 font-poppins font-medium text-2xl mx-5">List of Pending Applications</p>
                
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
                                <th
                                    class="px-6 py-3  text-xs text-center font-medium text-gray-500 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach($pendingApplicationForm as $form)
                            <tr>
                                <td class="px-6 py-4">
                                    PMDQ-LTP-{{$form->created_at->year}}-{{sprintf('%04d', $form->id)}}</td>
                                <td class="px-6 py-4">{{ $form->name }}</td>

                                <td class="px-6 py-4">{{ $form->created_at }}</td>

                                <td
                                    class="px-6 py-4 whitespace-nowrap text-center  p-2 text-sm font-medium text-gray-400">
                                    
                                    <a class=" bg-orange-100 text-orange-700 px-3 py-2 rounded-20">On Process</a>
                                   
                                </td>
                                <td class="px-6  text-center py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('application-forms.review', $form->id)}}"
                                        class="mx-2 text-indigo-600 hover:text-indigo-900">Review</a>
                                    <a href="{{ route('edit-application', $form->id)}}"
                                        class="mx-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ Route('delete-application', $form->id)}}" method="POST"
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
                            @if ($pendingApplicationForm->onFirstPage())
                            <span
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-md">
                                Previous
                            </span>
                            @else
                            <a href="{{ $pendingApplicationForm->previousPageUrl() }}"
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:ring-opacity-50">
                                Previous
                            </a>
                            @endif

                            <div class="text-sm text-gray-500 py-2">
                                <span>{!! __('Showing') !!}</span>
                                <span class="font-medium">{{ $pendingApplicationForm->firstItem() }}</span>
                                <span>{!! __('to') !!}</span>
                                <span class="font-medium">{{ $pendingApplicationForm->lastItem() }}</span>
                                <span>{!! __('of') !!}</span>
                                <span class="font-medium">{{ $pendingApplicationForm->total() }}</span>
                                <span>{!! __('results') !!}</span>
                            </div>

                            @if ($pendingApplicationForm->hasMorePages())
                            <a href="{{ $pendingApplicationForm->nextPageUrl() }}"
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
        <div class="px-4 pt-2">
            <div class="bg-white w-full mx-auto my-4 p-2 rounded-20 shadow-md">
                <p class="my-2 font-poppins font-medium text-2xl mx-5">List of Accepted Applications</p>
                
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
                                    class="px-6 py-3  text-xs text-center font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="px-6 py-3  text-xs text-center font-medium text-gray-500 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach($acceptedApplicationForm as $form)
                            <tr>
                                <td class="px-6 py-4">
                                    PMDQ-LTP-{{$form->created_at->year}}-{{sprintf('%04d', $form->id)}}</td>
                                <td class="px-6 py-4">{{ $form->name }}</td>

                                <td class="px-6 py-4">{{ $form->created_at }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center  p-2 text-sm font-medium text-gray-400">
                                    @if ($form->orderOfPayment && $form->orderOfPayment->status === "paid")                                 
                                    <a class=" bg-green-100 text-green-700 px-6 py-2 rounded-20">Paid</a>
                                    @else
                                    <a class=" bg-red-100 text-red-700 px-3 py-2 rounded-20">Unpaid</a>
                                    @endif
                                   
                              
                               
                                </td>
                              
                                <td class="px-6  text-center py-4 whitespace-nowrap text-sm font-medium">
                                    @if($form->orderOfPayment && $form->orderOfPayment->status === "paid")
                                    <a href="{{route('admin.dashboard.release-permit.show', $form->id)}}" class="mx-2 text-indigo-600 cursor-pointer hover:text-indigo-900">Release</a>
                                    @else
                                    <a 
                                        class="mx-2 text-gray-600 opacity-70">Release</a>
                                    @endif
                                        <a href="{{ route('edit-application', $form->id)}}"
                                        class="mx-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ Route('delete-application', $form->id)}}" method="POST"
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
                            @if ($acceptedApplicationForm->onFirstPage())
                            <span
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-md">
                                Previous
                            </span>
                            @else
                            <a href="{{ $acceptedApplicationForm->previousPageUrl() }}"
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:ring-opacity-50">
                                Previous
                            </a>
                            @endif

                            <div class="text-sm text-gray-500 py-2">
                                <span>{!! __('Showing') !!}</span>
                                <span class="font-medium">{{ $acceptedApplicationForm->firstItem() }}</span>
                                <span>{!! __('to') !!}</span>
                                <span class="font-medium">{{ $acceptedApplicationForm->lastItem() }}</span>
                                <span>{!! __('of') !!}</span>
                                <span class="font-medium">{{ $acceptedApplicationForm->total() }}</span>
                                <span>{!! __('results') !!}</span>
                            </div>

                            @if ($acceptedApplicationForm->hasMorePages())
                            <a href="{{ $acceptedApplicationForm->nextPageUrl() }}"
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
        
        <div class="px-4 pt-2">
            <div class="bg-white w-full mx-auto my-4 p-2 rounded-20 shadow-md">
                <p class="my-2 font-poppins font-medium text-2xl mx-5">List of Returned Applications</p>
                
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
                                <th
                                    class="px-6 py-3  text-xs text-center font-medium text-gray-500 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach($returnedApplicationForm as $form)
                            <tr>
                                <td class="px-6 py-4">
                                    PMDQ-LTP-{{$form->created_at->year}}-{{sprintf('%04d', $form->id)}}</td>
                                <td class="px-6 py-4">{{ $form->name }}</td>

                                <td class="px-6 py-4">{{ $form->created_at }}</td>

                                <td
                                    class="px-6 py-4 whitespace-nowrap text-center  p-2 text-sm font-medium text-gray-400">
                                    
                                    <a class=" bg-red-100 text-red-700 px-3 py-2 rounded-20">Returned</a>
                                   
                                </td>
                                <td class="px-6  text-center py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('application-forms.show', $form->id)}}"
                                        class="mx-2 text-indigo-600 hover:text-indigo-900">View</a>
                                    <a href="{{ route('edit-application', $form->id)}}"
                                        class="mx-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ Route('delete-application', $form->id)}}" method="POST"
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
                            @if ($returnedApplicationForm->onFirstPage())
                            <span
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-md">
                                Previous
                            </span>
                            @else
                            <a href="{{ $returnedApplicationForm->previousPageUrl() }}"
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:ring-opacity-50">
                                Previous
                            </a>
                            @endif

                            <div class="text-sm text-gray-500 py-2">
                                <span>{!! __('Showing') !!}</span>
                                <span class="font-medium">{{ $returnedApplicationForm->firstItem() }}</span>
                                <span>{!! __('to') !!}</span>
                                <span class="font-medium">{{ $returnedApplicationForm->lastItem() }}</span>
                                <span>{!! __('of') !!}</span>
                                <span class="font-medium">{{ $returnedApplicationForm->total() }}</span>
                                <span>{!! __('results') !!}</span>
                            </div>

                            @if ($returnedApplicationForm->hasMorePages())
                            <a href="{{ $returnedApplicationForm->nextPageUrl() }}"
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
      
        <div class="px-4 pt-2">
            <div class="bg-white w-full mx-auto my-4 p-2 rounded-20 shadow-md">
                <p class="my-2 font-poppins font-medium text-2xl mx-5">List of Released Applications</p>
                
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
                                <th
                                    class="px-6 py-3  text-xs text-center font-medium text-gray-500 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach($releasedApplicationForm as $form)
                            <tr>
                                <td class="px-6 py-4">
                                    PMDQ-LTP-{{$form->created_at->year}}-{{sprintf('%04d', $form->id)}}</td>
                                <td class="px-6 py-4">{{ $form->name }}</td>

                                <td class="px-6 py-4">{{ $form->created_at }}</td>

                                <td
                                    class="px-6 py-4 whitespace-nowrap text-center  p-2 text-sm font-medium text-gray-400">
                                    
                                    <a class=" bg-green-100 text-green-700 px-3 py-2 rounded-20">Released</a>
                                   
                                </td>
                                <td class="px-6  text-center py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('application-forms.show', $form->id)}}"
                                        class="mx-2 text-indigo-600 hover:text-indigo-900">View</a>
                                    <a href="{{ route('edit-application', $form->id)}}"
                                        class="mx-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ Route('delete-application', $form->id)}}" method="POST"
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
                            @if ($releasedApplicationForm->onFirstPage())
                            <span
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-md">
                                Previous
                            </span>
                            @else
                            <a href="{{ $releasedApplicationForm->previousPageUrl() }}"
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:ring-opacity-50">
                                Previous
                            </a>
                            @endif

                            <div class="text-sm text-gray-500 py-2">
                                <span>{!! __('Showing') !!}</span>
                                <span class="font-medium">{{ $releasedApplicationForm->firstItem() }}</span>
                                <span>{!! __('to') !!}</span>
                                <span class="font-medium">{{ $releasedApplicationForm->lastItem() }}</span>
                                <span>{!! __('of') !!}</span>
                                <span class="font-medium">{{ $releasedApplicationForm->total() }}</span>
                                <span>{!! __('results') !!}</span>
                            </div>

                            @if ($releasedApplicationForm->hasMorePages())
                            <a href="{{ $releasedApplicationForm->nextPageUrl() }}"
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

        <div class="px-4 pt-2">
            <div class="bg-white w-full mx-auto my-4 p-2 rounded-20 shadow-md">
                <p class="my-2 font-poppins font-medium text-2xl mx-5">List of Used Application</p>
                
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
                                <th
                                    class="px-6 py-3  text-xs text-center font-medium text-gray-500 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach($usedApplicationForm as $form)
                            <tr>
                                <td class="px-6 py-4">
                                    PMDQ-LTP-{{$form->created_at->year}}-{{sprintf('%04d', $form->id)}}</td>
                                <td class="px-6 py-4">{{ $form->name }}</td>

                                <td class="px-6 py-4">{{ $form->created_at }}</td>

                                <td
                                    class="px-6 py-4 whitespace-nowrap text-center  p-2 text-sm font-medium text-gray-400">
                                    
                                    <a class=" bg-yellow-100 text-yellow-700 px-3 py-2 rounded-20">Used</a>
                                   
                                </td>
                                <td class="px-6  text-center py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('application-forms.show', $form->id)}}"
                                        class="mx-2 text-indigo-600 hover:text-indigo-900">View</a>
                                    <a href="{{ route('edit-application', $form->id)}}"
                                        class="mx-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ Route('delete-application', $form->id)}}" method="POST"
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
                            @if ($usedApplicationForm->onFirstPage())
                            <span
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-md">
                                Previous
                            </span>
                            @else
                            <a href="{{ $usedApplicationForm->previousPageUrl() }}"
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:ring-opacity-50">
                                Previous
                            </a>
                            @endif

                            <div class="text-sm text-gray-500 py-2">
                                <span>{!! __('Showing') !!}</span>
                                <span class="font-medium">{{ $usedApplicationForm->firstItem() }}</span>
                                <span>{!! __('to') !!}</span>
                                <span class="font-medium">{{ $usedApplicationForm->lastItem() }}</span>
                                <span>{!! __('of') !!}</span>
                                <span class="font-medium">{{ $usedApplicationForm->total() }}</span>
                                <span>{!! __('results') !!}</span>
                            </div>

                            @if ($usedApplicationForm->hasMorePages())
                            <a href="{{ $usedApplicationForm->nextPageUrl() }}"
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

        <div class="px-4 pt-2">
            <div class="bg-white w-full mx-auto my-4 p-2 rounded-20 shadow-md">
                <p class="my-2 font-poppins font-medium text-2xl mx-5">List of Expired Applications</p>
                
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
                                <th
                                    class="px-6 py-3  text-xs text-center font-medium text-gray-500 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach($expiredApplicationForm as $form)
                            <tr>
                                <td class="px-6 py-4">
                                    PMDQ-LTP-{{$form->created_at->year}}-{{sprintf('%04d', $form->id)}}</td>
                                <td class="px-6 py-4">{{ $form->name }}</td>

                                <td class="px-6 py-4">{{ $form->created_at }}</td>

                                <td
                                    class="px-6 py-4 whitespace-nowrap text-center  p-2 text-sm font-medium text-gray-400">
                                    <a class=" bg-red-100 text-red-700 px-3 py-2 rounded-20">Expired</a>                                   
                                </td>
                                <td class="px-6  text-center py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('application-forms.show', $form->id)}}"
                                        class="mx-2 text-indigo-600 hover:text-indigo-900">View</a>
                                    <a href="{{ route('edit-application', $form->id)}}"
                                        class="mx-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ Route('delete-application', $form->id)}}" method="POST"
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
                            @if ($expiredApplicationForm->onFirstPage())
                            <span
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-md">
                                Previous
                            </span>
                            @else
                            <a href="{{ $expiredApplicationForm->previousPageUrl() }}"
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:ring-opacity-50">
                                Previous
                            </a>
                            @endif

                            <div class="text-sm text-gray-500 py-2">
                                <span>{!! __('Showing') !!}</span>
                                <span class="font-medium">{{ $expiredApplicationForm->firstItem() }}</span>
                                <span>{!! __('to') !!}</span>
                                <span class="font-medium">{{ $expiredApplicationForm->lastItem() }}</span>
                                <span>{!! __('of') !!}</span>
                                <span class="font-medium">{{ $expiredApplicationForm->total() }}</span>
                                <span>{!! __('results') !!}</span>
                            </div>

                            @if ($expiredApplicationForm->hasMorePages())
                            <a href="{{ $expiredApplicationForm->nextPageUrl() }}"
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
    </section>
    


   @include('admin.layout.admin-script')
   
   
  
  

</body>

</html>
