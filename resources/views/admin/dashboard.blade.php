<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> ADMIN | OFSPTS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&family=Poppins:wght@400;500;700&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-custom-light-tint-blue"> 
    <div class="min-h-screen">
        <aside id="sidenav" class="opacity-0 md:opacity-100 fixed w-52 md:w-64 h-full  left-0 bg-custom-dark-900 overflow-hidden  transition-all ease-in duration-500">
          <span class="block text-white p-4 px-2"><img src="{{ asset('images/Dashboard-logo (1).png')}}" class="w-8 h-8 inline"><span class="font-medium font-poppins"> ADMIN</span> Dashboard</span>
       
            <p class="mt-5 text-white text-xs px-4">MENU</p>            
            <ul class="px-6 ">
                <li class="text-xs md:text-md py-2 px-2 hover:bg-custom-dark-700 hover:rounded-md mt-2"><a href= "/admin/dashboard/users" class="text-white "><img class="w-4 md:w-7 inline" src="{{ asset('images/List-icon.png')}}"> LIST OF USERS</a></li>
                <li class="text-xs md:text-md py-2 px-2 hover:bg-custom-dark-700 hover:rounded-md"><a href= "/admin/dashboard/butterflies" class="text-white "><img class="w-4 md:w-7 inline " src="{{ asset('images/List-icon.png')}}"> BUTTERFLY SPECIES</a></li>
                <li class="text-xs md:text-md py-2 px-2 hover:bg-custom-dark-700 hover:rounded-md"><a href= "/admin/dashboard/monitoring" class="text-white "><img class="w-4 md:w-7 inline" src="{{ asset('images/List-icon.png')}}"> MONITORING</a></li>
                <li class="text-xs md:text-md py-2 px-2 hover:bg-custom-dark-700 hover:rounded-md"><a href= "/admin/dashboard/reports" class="text-white "><img class="w-4 md:w-7 inline" src="{{ asset('images/List-icon.png')}}"> REPORTS</a></li>
            </ul>

            <p class="px-4 mt-5 text-white text-xs">OPTION</p>
            <ul class="px-6">
              
           
                <li class="mt-2 py-2 px-2 hover:bg-custom-dark-700 hover:rounded-md"><a href= "/admin/logout" class="text-white  ">LOG OUT</a></li>
                
            </ul>
       
        </aside>
        <div class="bg-white md:ml-64">
           <div class="flex justify-between md:block  p-2">
              
            <span class="block md:hidden text-black py-2"><img src="{{ asset('images/Dashboard-logo (2).png')}}" class="w-8 h-8 inline"><span class="font-medium font-poppins"> ADMIN</span> Dashboard</span>
            
            <div class="flex justify-between  py-2">
                <p class="hidden md:block px-2 text-xl font-bold font-roboto"> Overview</p>
              @auth('admin')
                <a href="#" class="text-right px-2 ">Hi, {{ Auth::guard('admin')->user()->username}} </a>
                @endauth
              <span class="text-3xl text-black cursor-pointer mx-2 md:hidden block"><ion-icon name="menu-outline" onclick="Menu(this)"></ion-icon>
              </span>
                
                
               
               
            </div>
           </div>
        </div>

        <div class="md:ml-64">
          <div class="m-4 bg-white h-96">
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
                                    @if($user->is_activated == "1")
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Activate</span>
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
              </div>
          </div>
      </div>
      
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
      <script>
        function Menu(e){
            let list  = document.querySelector("#sidenav")
            e.name === 'menu' ? (e.name = "close", list.classList.add('opacity-100')) : (e.name = "menu", list.classList.remove('opacity-100'))
        
        }
    
        
    </script>
      <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>