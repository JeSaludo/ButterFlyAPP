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
                                      <a href="" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Pending</a>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="" class="mx-2 text-indigo-600 hover:text-indigo-900">View</a>
                                    <a href="" class="mx-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="" method="POST" style="display: inline-block;">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="mx-2 text-red-600 hover:text-indigo-900" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                    </form>
                                    
                                </td>
                              </tr>
                          @endforeach
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
   