<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | WildLife</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&family=Poppins:wght@400;500;700&family=Raleway:ital,wght@0,100;0,400;0,500;0,600;0,700;1,300&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"> 
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

</head>
<body class="bg-custom-light-tint-blue">
    <div class="min-h-screen">
      
            @include('layout.user-nav-dashboard')
        

        <div>
            <div class="bg-gray-50 w-9/12 rounded-md mx-auto my-4 ">
                <div class="flex justify-between ">
                    <p class="p-4 font-roboto font-bold text-3xl text-custom-dark-blue uppercase">List of Submitted Applications</p>
                    <form class="p-4" action="{{ route('myapplications.submit.show') }}" method="GET">
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
                <div class="flex justify-between px-4">
                    <div class="px-2 ">
                        <a href="/permit/apply" class="inline-block px-6 py-2 font-medium bg-custom-blue hover:bg-[#390A86] text-white text-sm whitespace-nowrap md:text-sm rounded-md">Apply a Permit </a>
                      </div>
                    <div class="flex items-center ">                       
                        <form action="{{ route('myapplications.submit.show') }}" method="GET">
                            <div class="flex items-center"> <!-- Added a flex container -->
                              <label for="sort" class="mr-2 text-sm font-medium text-gray-900">Sort By:</label>
                              <div class="relative">
                                <select id="sort" name="sort" onchange="this.form.submit()"
                                  class="block w-36 py-2 pl-3 pr-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                  <option value="latest" {{ $sort === 'latest' ? 'selected' : '' }}>Latest</option>
                                  <option value="oldest" {{ $sort === 'oldest' ? 'selected' : '' }}>Oldest</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                  <!-- Optionally add any content for the absolute positioned element -->
                                </div>
                              </div>
                            </div>
                          </form>
                          
                        
                    </div>
                </div><div class="overflow-x-auto">
              <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Application ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Application Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date of Transport</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Of Submission</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                 
                        @foreach($usersWithPermit as $index => $form)
                        <tr class="{{ $index % 2 == 0 ? 'bg-gray-100' : 'bg-white' }} border-b-2 border-gray-100">
                                <td class="px-6 py-4">PMDQ-LTP-{{$form->created_at->year}}-{{sprintf('%06d', $form->id)}}</td>
                                <td class="px-6 py-4">{{ $form->name }}</td>
                                <td class="px-6 py-4">{{ $form->transport_date }}</td>
                                <td class="px-6 py-4">{{ $form->created_at }}</td>
                                
                                <td class="px-6 py-4">
                                    @if ($form->status=="Returned")
                                    <p class=" bg-red-100 text-red-700 px-3 py-2 rounded-20 text-center">Returned</p>
                                @elseif ($form->status=="Accepted")
                                    <p class=" bg-green-100 text-green-700 px-3 py-2 rounded-20 text-center">Accepted</p>
                                @elseif ($form->status=="Released")
                                    <p class=" bg-green-100 text-green-700 px-3 py-2 rounded-20 text-center">Released</p>
                                @elseif ($form->status=="Draft")
                                <p class=" bg-orange-100 text-orange-700 px-3 py-2 rounded-20 text-center">Draft</p>
                                @elseif ($form->status=="Used")
                                <p class=" bg-yellow-100 text-yellow-700 px-3 py-2 rounded-20 text-center">Used</p>
                                
                                    @else
                                    <p class=" bg-orange-100 text-orange-700 px-3 py-2 rounded-20 whitespace-nowrap">On Process</p>
                                @endif
                            </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                  <a href="{{ route('user.application-forms.show', $form->id)}}" class=" mx-2 text-indigo-600 hover:text-indigo-900">View</a>
                                     @if ($form->status === "Accepted")
                                        @if(!$form->file_name)
                                            <a href="{{ route('user.get-permit.show', $form->id)}}" class="mx-2 text-indigo-600 hover:text-indigo-900">Encode OR</a>
                                        @elseif($form->file_name && $form->status==="Accepted")
                                            <a  class="mx-2 text-yellow-600 ">Processing</a>
                                         @endif
                                    @elseif ($form->status === "Released")

                                        <form action="{{ route('user.print-permit', $form->id)}} " class="inline" method="POST" target="_blank">
                                            @csrf
                                            <button type="submit" class="mx-2 text-indigo-600">Print</button>
                                        </form>
                                    
                                    @endif
                                                               
                              </td>

                              <td>
                                  
                              </tr>
                        @endforeach
                  
                </tbody>
            </table>
            <div class="p-4">
              <nav class="flex items-center justify-between">
                  <div class="flex-1 flex justify-between">
                      <!-- Previous Page Link -->
                      @if ($usersWithPermit->onFirstPage())
                          <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-md">
                              {!! __('pagination.previous') !!}
                          </span>
                      @else
                          <a href="{{ $usersWithPermit->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:ring-opacity-50">
                              {!! __('pagination.previous') !!}
                          </a>
                      @endif
                          <!-- Pagination Information -->
                    <div class="text-sm text-gray-500">
                      <span>{!! __('Showing') !!}</span>
                      <span class="font-medium">{{ $usersWithPermit->firstItem() }}</span>
                      <span>{!! __('to') !!}</span>
                      <span class="font-medium">{{ $usersWithPermit->lastItem() }}</span>
                      <span>{!! __('of') !!}</span>
                      <span class="font-medium">{{ $usersWithPermit->total() }}</span>
                      <span>{!! __('results') !!}</span>
                  </div>
                      <!-- Next Page Link -->
                      @if ($usersWithPermit->hasMorePages())
                          <a href="{{ $usersWithPermit->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:ring-opacity-50">
                              {!! __('pagination.next') !!}
                          </a>
                      @else
                          <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-md">
                              {!! __('pagination.next') !!}
                          </span>
                      @endif
                  </div>
          
                  
              </nav>
              
               
            
            
        </div>

        
    </div>
        

    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
    <script>
        function Menu(e){
            let list  = document.querySelector("ul")
            e.name === 'menu' ? (e.name = "close", list.classList.add('top-[55px]'), list.classList.add('opacity-100')) : (e.name = "menu", list.classList.remove('top-[55px]'), list.classList.remove('opacity-100'))
        
        }
    </script>
    <script src="{{ asset('js/customize-form.js') }}"></script>

</body>
</html>