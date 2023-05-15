@include('admin.layout.header')

<body class="bg-custom-light-tint-blue"> 
@include('admin.layout.dashboard-nav')

        <div class="md:ml-64">
          <div class="m-4 bg-white ">
              <h1 class="p-4 font-roboto font-bold text-3xl">LIST OF APPLICATION FORM</h1>
              <div class="overflow-x-auto">
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
                      @foreach($usersWithPermit as $user)
                          @foreach($user->applicationForms as $form)
                              <tr>
                                  <td class="px-6 py-4">{{ $form->id }}</td>
                                  <td class="px-6 py-4">{{ $form->name }}</td>
                                  <td class="px-6 py-4">{{ $form->transport_date }}</td>
                                  <td class="px-6 py-4">{{ $form->created_at }}</td>
                                  
                                  <td class="px-6 py-4">
                                      <a href="" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $form->status}}</a>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('application-forms.show', $form->id)}}" class="mx-2 text-indigo-600 hover:text-indigo-900">View</a>
                                    <a href="{{ route('edit-application', $form->id)}}" class="mx-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ Route('delete-application', $form->id)}}" method="POST" style="display: inline-block;">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="mx-2 text-red-600 hover:text-indigo-900" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                    </form>                                    
                                </td>

                                <td>
                                    <div class="flex">
                                        <form action="{{route('approve-application', $form->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="mr-2 bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-4 rounded">Approve</button>
                                        </form>
                                        <form action="{{route('deny-application', $form->id)}}" method="POST">
                                            @csrf
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded">Denied</button>
                                        </form>
                                    </td>
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
@include('admin.layout.body-footer')
@include('admin.layout.footer')
   