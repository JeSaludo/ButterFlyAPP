@include('admin.layout.header')

<body class="bg-custom-light-tint-blue"> 
    
  @include('admin.layout.dashboard-nav')
        <div class="md:ml-64">
          <div class="m-4 bg-white ">
              <h1 class="p-4 font-roboto font-bold text-3xl">LIST OF USERS</h1>
              <div class="overflow-x-auto">
                  <table class="w-full divide-y divide-gray-200">
                      <thead>
                          <tr>
                              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Wildlife Permit</th>
                              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email Verified </th>
                              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                          </tr>
                      </thead>
                      <tbody>                        
                          @foreach($users as $user)
                          <tr>
                              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->username}}</td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->wildlife_permit}}</td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                @if($user->email_verified_at)
                                  {{$user->email_verified_at}}
                                @else
                                  Not Verified
                                @endif
                                </td>
                              <td class="px-6 py-4 whitespace-nowrap">   
                                    @if($user->role == 0)
                                      @if($user->is_activated == "1")
                                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Activate</span>
                                      @else
                                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-200 text-red-700">Deactive</span>
                                      @endif  
                                    @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-200 text-red-700">Deactive</span>
                                   @endif                                
                                  
                               
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                  
                                  <a href="{{ route('admin.users.edit', $user->id) }}" class="mx-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                                  <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="mx-2 text-red-600 hover:text-indigo-900" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                  </form>
                                  
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>

                  <div class="py-4">
                    <a href="{{ route('admin.users.create')}}" class="px-4 py-1 bg-black text-white rounded-sm ml-4">ADD</a>
                  </div>
                 
              </div>
          </div>
      </div>
@include('admin.layout.body-footer')
@include('admin.layout.footer')
   