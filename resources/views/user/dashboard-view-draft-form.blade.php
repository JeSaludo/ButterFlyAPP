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
        <div class="bg-custom-dark-900">
            @include('layout.user-nav-dashboard')
        </div>

        <div>
            <div class="bg-gray-50 w-9/12 rounded-md mx-auto mt-10 ">
            <h1 class="p-4 font-roboto font-bold text-3xl text-custom-dark-blue">LIST OF DRAFT APPLICATIONS</h1>
            <div class="overflow-x-auto">
              <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Application ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Application Name</th>                
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Of Submission</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($usersWithPermit as $user)
                        @foreach($user->applicationForms as $form)
                            <tr>
                                <td class="px-6 py-4">PMDQ-LTP-{{$form->created_at->year}}-{{sprintf('%06d', $form->id)}}</td>
                                <td class="px-6 py-4">{{ $form->name }}</td>
                                <td class="px-6 py-4">{{ $form->transport_date }}</td>
                                <td class="px-6 py-4">{{ $form->created_at }}</td>
                                
                                <td class="px-6 py-4">
                                    <a href="" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">On Draft</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                  <a href="{{ route('user.application-forms.show', $form->id)}}" class="mx-2 text-indigo-600 hover:text-indigo-900">View</a>
                                  <a href="{{ route('user.edit-application', $form->id)}}" class="mx-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                                  <form action="{{ Route('user.delete-application', $form->id)}}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="mx-2 text-red-600 hover:text-indigo-900" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                  </form>                                    
                              </td>

                              <td>
                                  
                              </tr>
                        @endforeach
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
                          <a href="{{ $users->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:ring-opacity-50">
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
                          <a href="{{ $users->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:ring-opacity-50">
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