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
        
        @include('admin.layout.dashboard-header-v2', ["title" => "Admin Management"])    
       
          
        
        <div class="px-4 pt-5">
            <div class="bg-white w-full mx-auto my-4 rounded-md shadow-md">
                <div class="flex justify-between flex-col md:flex-row">
                    <div class="px-5 py-3">
                        <form action="{{ route('admin.dashboard.show-admin') }}" method="GET">
                            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                </div>
                                <input type="search" id="default-search" name="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500  " placeholder="Search" required>
                                <button type="submit"  class="text-white absolute right-2.5 bottom-2.5 bg-custom-blue hover:bg-[#390A86] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="flex  items-center px-4 ">
                        <form action="{{ route('admin.dashboard.show-admin') }}" method="GET" class="flex items-center">
                            <label for="sort" class="mr-2 text-sm font-medium text-gray-900 ">Sort By:</label>
                            <div class="relative">
                                <select id="sort" name="sort" onchange="this.form.submit()"
                                    class="block w-36 py-2 pl-3 pr-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    <option value="latest" {{ $sort === 'latest' ? 'selected' : '' }}>Latest</option>
                                    <option value="oldest" {{ $sort === 'oldest' ? 'selected' : '' }}>Oldest</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                   
                                </div>
                            </div>
                        </form>
                        <div class="px-2 ">
                            <a href="/admin/register" class="inline-block px-4 py-2 font-medium bg-custom-blue hover:bg-[#390A86] text-white text-xs whitespace-nowrap md:text-sm rounded-md">Create Account</a>
                          </div>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200 table-auto">
                        <thead class="border-b-2 border-gray-200">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Username</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name</th>
                                
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admin as $index =>$user)
                            <tr class="{{ $index % 2 == 0 ? 'bg-gray-100' : 'bg-white' }} border-b-2 border-gray-100">
                                <td class="px-6 py-4 whitespace-nowrap text-sm ">
                                    {{ $user->username}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm  ">
                                   {{$user->name}}
                                </td>
                                
                               
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-left  p-2 text-sm font-medium text-gray-400">

                                    @if($user->role === 0)
                                    <a href="" class="bg-green-100 text-green-700 px-5  py-2 rounded-20">Active</a>
                                    @else
                                    <a href="" class=" bg-red-100 text-red-700 px-3 py-2 rounded-20">Deactive</a>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('admin.admins.edit', $user->id) }}"
                                        class="mx-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ route('admin.admins.destroy', $user->id) }}" method="POST"
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
                <div class="mx-auto my-2 p-4">
                    <nav class="flex items-center justify-between">
                        <div class="flex-1 flex justify-between">
                            <!-- Previous Page Link -->
                            @if ($admin->onFirstPage())
                            <span
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-md">
                                Previous
                            </span>
                            @else
                            <a href="{{ $admin->previousPageUrl() }}"
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:ring-opacity-50">
                                Previous
                            </a>
                            @endif

                            <div class="text-sm text-gray-500 py-2">
                                <span>{!! __('Showing') !!}</span>
                                <span class="font-medium">{{ $admin->firstItem() }}</span>
                                <span>{!! __('to') !!}</span>
                                <span class="font-medium">{{ $admin->lastItem() }}</span>
                                <span>{!! __('of') !!}</span>
                                <span class="font-medium">{{ $admin->total() }}</span>
                                <span>{!! __('results') !!}</span>
                            </div>

                            @if ($admin->hasMorePages())
                            <a href="{{ $admin->nextPageUrl() }}"
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
