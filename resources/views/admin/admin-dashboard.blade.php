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

        @include("admin.layout.dashboard-nav", ["title" => "Overview"])

        <section id="overview " >

            <div class="md:ml-64">

                <div class="w-11/12  grid grid-cols-2 md:grid-cols-3 gap-4  mx-auto mt-4">
                    <div class="w-full h-40 bg-white rounded-md">
                        <h1 class="text-md md:text-xl font-poppins font-medium py-4 px-6">Total Users</h1>
                        <p class="py-4 px-10 text-5xl font-poppins font-medium">{{$userCount}}</p>
                    </div>
                    <div class="w-full h-40 bg-white rounded-md">
                        <h1 class="text-md md:text-xl font-poppins font-medium py-4 px-6">Non-Verified Users</h1>
                        <p class="py-4 px-10 text-5xl font-poppins font-medium">{{$nonverifiedUserCount}}</p>
                    </div>
                    <div class="w-full h-40 bg-white rounded-md">
                        <h1 class="text-md md:text-xl font-poppins font-medium py-4 px-6">Verified Users</h1>
                        <p class="py-4 px-10 text-5xl font-poppins font-medium">{{$verifiedUserCount}}</p>
                    </div>

                    <div class="w-full h-40 bg-white rounded-md">
                        <h1 class="text-md md:text-xl font-poppins font-medium py-4 px-6">Pending Application</h1>
                        <p class="py-4 px-10 text-5xl font-poppins font-medium">
                            {{ $usersWithPermit->sum(function($user) { return $user->applicationForms->where('status', 'On Process')->count(); }) }}
                        </p>
                    </div>

                    <div class="w-full h-40 bg-white rounded-md">
                        <h1 class="text-md md:text-xl font-poppins font-medium py-4 px-6">Approved Application</h1>
                        <p class="py-4 px-10 text-5xl font-poppins font-medium">
                            {{ $usersWithPermit->sum(function($user) { return $user->applicationForms->where('status', 'Accepted')->count(); }) }}
                        </p>
                    </div>

                    <div class="w-full h-40 bg-white rounded-md">
                        <h1 class="text-md md:text-xl font-poppins font-medium py-4 px-6">Returned Application</h1>
                        <p class="py-4 px-10 text-5xl font-poppins font-medium">
                            {{ $usersWithPermit->sum(function($user) { return $user->applicationForms->where('status', 'Returned')->count(); }) }}
                        </p>
                    </div>
                </div>



            </div>


        </section>

        <section id="UserAccount">
            <div class="md:ml-64 ">

                <div class="bg-white w-11/12 mx-auto my-10 p-2 rounded-20">
                    
                    <p class="my-2 font-poppins font-medium text-2xl mx-5">List of User Accounts</p>
                    <div class="overflow-x-auto">
                        <table class="w-full divide-y divide-gray-200 table-auto">
                            <thead class="">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Username</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Wildlife Collector Permit</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Wildlife Farm Permit</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email Verified At</th>
                                    <th
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm ">
                                        {{ $user->username}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm  ">
                                        @if (!$user->wcp_permit)
                                        Not Available
                                        @else
                                        {{$user->wcp_permit}}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm  ">
                                        @if (!$user->wfp_permit)
                                        Not Available
                                        @else
                                        {{$user->wfp_permit}}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm ">
                                        @if(!$user->email_verified_at)
                                        Not Verified
                                        @else
                                        {{$user->email_verified_at}}
                                        @endif
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-center  p-2 text-sm font-medium text-gray-400">

                                        @if($user->role === 0)
                                        <a href="" class="bg-green-100 text-green-700 px-5  py-2 rounded-20">Active</a>
                                        @else
                                        <a href="" class=" bg-red-100 text-red-700 px-3 py-2 rounded-20">Deactive</a>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                            class="mx-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
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
                    <div class="mx-auto my-2">
                        <nav class="flex items-center justify-between">
                            <div class="flex-1 flex justify-between">
                                <!-- Previous Page Link -->
                                @if ($users->onFirstPage())
                                <span
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-md">
                                    Previous
                                </span>
                                @else
                                <a href="{{ $users->previousPageUrl() }}"
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:ring-opacity-50">
                                    Previous
                                </a>
                                @endif

                                <div class="text-sm text-gray-500 py-2">
                                    <span>{!! __('Showing') !!}</span>
                                    <span class="font-medium">{{ $users->firstItem() }}</span>
                                    <span>{!! __('to') !!}</span>
                                    <span class="font-medium">{{ $users->lastItem() }}</span>
                                    <span>{!! __('of') !!}</span>
                                    <span class="font-medium">{{ $users->total() }}</span>
                                    <span>{!! __('results') !!}</span>
                                </div>

                                @if ($users->hasMorePages())
                                <a href="{{ $users->nextPageUrl() }}"
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

        <section id="Applications">
            <div class="md:ml-64 ">

                <div class="bg-white w-11/12 mx-auto my-10 p-2 rounded-20">
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
                                @foreach($usersWithPermit as $user)
                                @foreach($user->applicationForms->where('status', 'On Process') as $form)
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
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
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
                                        <form action="{{route('approve-application', $form->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            <button type="submit"
                                                class="mr-2 bg-green-400 hover:bg-green-700 text-white font-bold py-1 px-2 rounded"
                                                onclick="return confirm('Are you sure you want to approve this application?')"><i class='bx bx-sm bx-check' ></i></button>
                                        </form>
                                        <form action="{{route('deny-application', $form->id)}}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            <button type="submit"
                                                class="bg-red-400 hover:bg-red-700 text-white font-bold py-1 px-2 rounded"
                                                onclick="return confirm('Are you sure you want to reject this application?')"><i class='bx bx-sm bx-x'></i></button>
                                        </form>


                                    </td>


                                </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mx-auto my-2">
                        <nav class="flex items-center justify-between">
                            <div class="flex-1 flex justify-between">
                                <!-- Previous Page Link -->
                                @if ($users->onFirstPage())
                                <span
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-md">
                                    Previous
                                </span>
                                @else
                                <a href="{{ $users->previousPageUrl() }}"
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:ring-opacity-50">
                                    Previous
                                </a>
                                @endif

                                <div class="text-sm text-gray-500 py-2">
                                    <span>{!! __('Showing') !!}</span>
                                    <span class="font-medium">{{ $users->firstItem() }}</span>
                                    <span>{!! __('to') !!}</span>
                                    <span class="font-medium">{{ $users->lastItem() }}</span>
                                    <span>{!! __('of') !!}</span>
                                    <span class="font-medium">{{ $users->total() }}</span>
                                    <span>{!! __('results') !!}</span>
                                </div>

                                @if ($users->hasMorePages())
                                <a href="{{ $users->nextPageUrl() }}"
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

            <div class="md:ml-64 ">

                <div class="bg-white w-11/12 mx-auto my-10 p-2 rounded-20">
                    <p class="my-2 font-poppins font-medium text-2xl mx-5">List of Approved Applications</p>
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
                                @foreach($usersWithPermit as $user)
                                @foreach($user->applicationForms->where('status', 'Accepted') as $form)
                                <tr>
                                    <td class="px-6 py-4">
                                        PMDQ-LTP-{{$form->created_at->year}}-{{sprintf('%04d', $form->id)}}</td>
                                    <td class="px-6 py-4">{{ $form->name }}</td>

                                    <td class="px-6 py-4">{{ $form->created_at }}</td>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-center  p-2 text-sm font-medium text-gray-400">
                                        
                                        <a class=" bg-green-100 text-green-700 px-3 py-2 rounded-20">Accepted</a>
                                       
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mx-auto my-2">
                        <nav class="flex items-center justify-between">
                            <div class="flex-1 flex justify-between">
                                <!-- Previous Page Link -->
                                @if ($users->onFirstPage())
                                <span
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-md">
                                    Previous
                                </span>
                                @else
                                <a href="{{ $users->previousPageUrl() }}"
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:ring-opacity-50">
                                    Previous
                                </a>
                                @endif

                                <div class="text-sm text-gray-500 py-2">
                                    <span>{!! __('Showing') !!}</span>
                                    <span class="font-medium">{{ $users->firstItem() }}</span>
                                    <span>{!! __('to') !!}</span>
                                    <span class="font-medium">{{ $users->lastItem() }}</span>
                                    <span>{!! __('of') !!}</span>
                                    <span class="font-medium">{{ $users->total() }}</span>
                                    <span>{!! __('results') !!}</span>
                                </div>

                                @if ($users->hasMorePages())
                                <a href="{{ $users->nextPageUrl() }}"
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

            <div class="md:ml-64 ">

                <div class="bg-white w-11/12 mx-auto my-10 p-2 rounded-20">
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
                                @foreach($usersWithPermit as $user)
                                @foreach($user->applicationForms->where('status', 'Returned') as $form)
                                <tr>
                                    <td class="px-6 py-4">
                                        PMDQ-LTP-{{$form->created_at->year}}-{{sprintf('%04d', $form->id)}}</td>
                                    <td class="px-6 py-4">{{ $form->name }}</td>

                                    <td class="px-6 py-4">{{ $form->created_at }}</td>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-center  p-2 text-sm font-medium text-gray-400">
                                        
                                        <a class=" bg-red-100 text-red-700 px-3 py-2 rounded-20">Returned</a>
                                       
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mx-auto my-2 ">
                        <nav class="flex items-center justify-between">
                            <div class="flex-1 flex justify-between">
                                <!-- Previous Page Link -->
                                @if ($users->onFirstPage())
                                <span
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-md">
                                    Previous
                                </span>
                                @else
                                <a href="{{ $users->previousPageUrl() }}"
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:ring-opacity-50">
                                    Previous
                                </a>
                                @endif

                                <div class="text-sm text-gray-500 py-2">
                                    <span>{!! __('Showing') !!}</span>
                                    <span class="font-medium">{{ $users->firstItem() }}</span>
                                    <span>{!! __('to') !!}</span>
                                    <span class="font-medium">{{ $users->lastItem() }}</span>
                                    <span>{!! __('of') !!}</span>
                                    <span class="font-medium">{{ $users->total() }}</span>
                                    <span>{!! __('results') !!}</span>
                                </div>

                                @if ($users->hasMorePages())
                                <a href="{{ $users->nextPageUrl() }}"
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

            <div class="md:ml-64 ">

                <div class="bg-white w-11/12 mx-auto my-10 p-2 rounded-20">
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
                                @foreach($usersWithPermit as $user)
                                @foreach($user->applicationForms->where('status', 'Released') as $form)
                                <tr>
                                    <td class="px-6 py-4">
                                        PMDQ-LTP-{{$form->created_at->year}}-{{sprintf('%04d', $form->id)}}</td>
                                    <td class="px-6 py-4">{{ $form->name }}</td>

                                    <td class="px-6 py-4">{{ $form->created_at }}</td>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-center  p-2 text-sm font-medium text-gray-400">
                                      
                                        <a class=" bg-green-100 text-green-700 px-3 py-2 rounded-20">Released</a>
                                        
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('application-forms.show', $form->id)}}"
                                            class="mx-2 text-indigo-600 hover:text-indigo-900">View</a>
                                       
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mx-auto my-2">
                        <nav class="flex items-center justify-between">
                            <div class="flex-1 flex justify-between">
                                <!-- Previous Page Link -->
                                @if ($users->onFirstPage())
                                <span
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-md">
                                    Previous
                                </span>
                                @else
                                <a href="{{ $users->previousPageUrl() }}"
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:ring-opacity-50">
                                    Previous
                                </a>
                                @endif

                                <div class="text-sm text-gray-500 py-2">
                                    <span>{!! __('Showing') !!}</span>
                                    <span class="font-medium">{{ $users->firstItem() }}</span>
                                    <span>{!! __('to') !!}</span>
                                    <span class="font-medium">{{ $users->lastItem() }}</span>
                                    <span>{!! __('of') !!}</span>
                                    <span class="font-medium">{{ $users->total() }}</span>
                                    <span>{!! __('results') !!}</span>
                                </div>

                                @if ($users->hasMorePages())
                                <a href="{{ $users->nextPageUrl() }}"
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

            <div class="md:ml-64 ">

                <div class="bg-white w-11/12 mx-auto my-10 p-2 rounded-20">
                    <p class="my-2 font-poppins font-medium text-2xl mx-5">List of Expired Permit</p>
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
                                @foreach($usersWithPermit as $user)
                                @foreach($user->applicationForms->where('status', 'Expired') as $form)
                                <tr>
                                    <td class="px-6 py-4">
                                        PMDQ-LTP-{{$form->created_at->year}}-{{sprintf('%04d', $form->id)}}</td>
                                    <td class="px-6 py-4">{{ $form->name }}</td>

                                    <td class="px-6 py-4">{{ $form->created_at }}</td>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-center  p-2 text-sm font-medium text-gray-400">
                                      
                                        <a class=" bg-red-100 text-red-700 px-3 py-2 rounded-20">Expired</a>
                                        
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('application-forms.show', $form->id)}}"
                                            class="mx-2 text-indigo-600 hover:text-indigo-900">View</a>
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mx-auto my-2">
                        <nav class="flex items-center justify-between">
                            <div class="flex-1 flex justify-between">
                                <!-- Previous Page Link -->
                                @if ($users->onFirstPage())
                                <span
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-md">
                                    Previous
                                </span>
                                @else
                                <a href="{{ $users->previousPageUrl() }}"
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:ring-opacity-50">
                                    Previous
                                </a>
                                @endif

                                <div class="text-sm text-gray-500 py-2">
                                    <span>{!! __('Showing') !!}</span>
                                    <span class="font-medium">{{ $users->firstItem() }}</span>
                                    <span>{!! __('to') !!}</span>
                                    <span class="font-medium">{{ $users->lastItem() }}</span>
                                    <span>{!! __('of') !!}</span>
                                    <span class="font-medium">{{ $users->total() }}</span>
                                    <span>{!! __('results') !!}</span>
                                </div>

                                @if ($users->hasMorePages())
                                <a href="{{ $users->nextPageUrl() }}"
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

            <div class="md:ml-64 ">

                <div class="bg-white w-11/12 mx-auto my-10 p-2 rounded-20">
                    <p class="my-2 font-poppins font-medium text-2xl mx-5">List of Used Permit</p>
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
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-3  text-xs text-center font-medium text-gray-500 uppercase tracking-wider">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usersWithPermit as $user)
                                @foreach($user->applicationForms->where('status', 'Used') as $form)
                                <tr>
                                    <td class="px-6 py-4">
                                        PMDQ-LTP-{{$form->created_at->year}}-{{sprintf('%04d', $form->id)}}</td>
                                    <td class="px-6 py-4">{{ $form->name }}</td>

                                    <td class="px-6 py-4">{{ $form->created_at }}</td>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-center  p-2 text-sm font-medium text-gray-400">
                                      
                                        <a class=" bg-green-100 text-green-700 px-3 py-2 rounded-20">Released</a>
                                        
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
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
                                        <form action="{{route('approve-application', $form->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            <button type="submit"
                                                class="mr-2 bg-green-400 hover:bg-green-700 text-white font-bold py-1 px-2 rounded"
                                                onclick="return confirm('Are you sure you want to approve this application?')"><i class='bx bx-sm bx-check' ></i></button>
                                        </form>
                                        <form action="{{route('deny-application', $form->id)}}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            <button type="submit"
                                                class="bg-red-400 hover:bg-red-700 text-white font-bold py-1 px-2 rounded"
                                                onclick="return confirm('Are you sure you want to reject this application?')"><i class='bx bx-sm bx-x'></i></button>
                                        </form>


                                    </td>


                                </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mx-auto my-2">
                        <nav class="flex items-center justify-between">
                            <div class="flex-1 flex justify-between">
                                <!-- Previous Page Link -->
                                @if ($users->onFirstPage())
                                <span
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-md">
                                    Previous
                                </span>
                                @else
                                <a href="{{ $users->previousPageUrl() }}"
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:ring-opacity-50">
                                    Previous
                                </a>
                                @endif

                                <div class="text-sm text-gray-500 py-2">
                                    <span>{!! __('Showing') !!}</span>
                                    <span class="font-medium">{{ $users->firstItem() }}</span>
                                    <span>{!! __('to') !!}</span>
                                    <span class="font-medium">{{ $users->lastItem() }}</span>
                                    <span>{!! __('of') !!}</span>
                                    <span class="font-medium">{{ $users->total() }}</span>
                                    <span>{!! __('results') !!}</span>
                                </div>

                                @if ($users->hasMorePages())
                                <a href="{{ $users->nextPageUrl() }}"
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

        <section id="OrderOfPayment">
            <div class="md:ml-64 ">

                <div class="bg-white w-11/12 mx-auto my-10 p-2 rounded-20">
                    <p class="my-2 font-poppins font-medium text-2xl mx-5">List of Order Of Payments</p>
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
                                        Date of Transport</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date of Submission</th>
                                    <th
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usersWithPermit as $user)
                                @foreach($user->applicationForms as $form)
                                <tr>
                                    <td class="px-6 py-4">
                                        PMDQ-LTP-{{$form->created_at->year}}-{{sprintf('%04d', $form->id)}}</td>
                                    <td class="px-6 py-4">{{ $form->name }}</td>
                                    <td class="px-6 py-4">{{ $form->transport_date }}</td>
                                    <td class="px-6 py-4">{{ $form->created_at }}</td>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-center  p-2 text-sm font-medium text-gray-400">
                                        @if($form->status === "pending")
                                        <a href=""
                                            class="bg-orange-100 text-orange-700 px-5  py-2 rounded-20">Pending</a>
                                        @elseif ($form->status === "approve")
                                        <a href=""
                                            class=" bg-green-100 text-green-700 px-3 py-2 rounded-20">Approved</a>
                                        @else
                                        <a href="" class=" bg-red-100 text-red-700 px-3 py-2 rounded-20">Rejected</a>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mx-auto my-2">
                        <nav class="flex items-center justify-between">
                            <div class="flex-1 flex justify-between">
                                <!-- Previous Page Link -->
                                @if ($users->onFirstPage())
                                <span
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-md">
                                    Previous
                                </span>
                                @else
                                <a href="{{ $users->previousPageUrl() }}"
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:ring-opacity-50">
                                    Previous
                                </a>
                                @endif

                                <div class="text-sm text-gray-500 py-2">
                                    <span>{!! __('Showing') !!}</span>
                                    <span class="font-medium">{{ $users->firstItem() }}</span>
                                    <span>{!! __('to') !!}</span>
                                    <span class="font-medium">{{ $users->lastItem() }}</span>
                                    <span>{!! __('of') !!}</span>
                                    <span class="font-medium">{{ $users->total() }}</span>
                                    <span>{!! __('results') !!}</span>
                                </div>

                                @if ($users->hasMorePages())
                                <a href="{{ $users->nextPageUrl() }}"
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

     

        <section id="Reports">
            <div class="md:ml-64 ">


            </div>

    </div>
    </section>

    </div>



    @include('admin.layout.script')

</body>

</html>
