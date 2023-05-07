@include('admin.layout.header')

<body class="bg-custom-light-tint-blue"> 
@include('admin.layout.dashboard-nav')

        <div class="md:ml-64">
          <div class="m-4 bg-white ">
            <h1 class="p-4 font-roboto font-bold text-3xl">APPLICATION FORM DETAILS</h1>
            <div class="m-4">
                <div class="grid grid-cols-2 gap-4 pb-4">
                    <div class="col-span-2 sm:col-span-1">
                        <label for="name" class="block text-sm font-medium text-gray-700">Application Name:</label>
                        <p id="name" class="mt-2 text-sm text-gray-500">{{ $form->name }}</p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                        <p id="email" class="mt-2 text-sm text-gray-500">{{ $form->user->email }}</p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="address" class="block text-sm font-medium text-gray-700">Address:</label>
                        <p id="address" class="mt-2 text-sm text-gray-500">{{ $form->address }}</p>
                    </div>
                   
                    <div class="col-span-2 sm:col-span-1">
                        <label for="transport_date" class="block text-sm font-medium text-gray-700">Date of Transport:</label>
                        <p id="transport_date" class="mt-2 text-sm text-gray-500">{{ $form->transport_date }}</p>
                    </div>
                   
                    <div class="col-span-2 sm:col-span-1">
                        <label for="purpose" class="block text-sm font-medium text-gray-700">Purpose:</label>
                        <p id="purpose" class="mt-2 text-sm text-gray-500">{{ $form->purpose }}</p>
                    </div>
                   
                    <div class="col-span-2 sm:col-span-1">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status:</label>
                        <p id="status" class="mt-2 text-sm text-gray-500">{{ $form->status }}</p>
                    </div>
                 
                </div>

               
                
            </div>

          </div>
          <div class="m-4 p-2 bg-white mt-3">
            <div class="col-span-2 sm:col-span-1"> 
                <label for="status" class="block text-sm font-medium text-gray-700">Butterfly Details:</label>
                <div class="grid grid-flow-col w-6/12">
                    <p id="butterfly" class="mt-2 text-sm text-gray-700 "> Butterfly Name</p>
                    <p id="butterfly" class="mt-2 text-sm text-gray-700 "> Quantity </p>
                </div>   
                @foreach ($form->butterflies as $butterfly)
                     <div class="grid grid-flow-col w-6/12">
                        <p id="butterfly" class="mt-2 text-sm text-gray-500">{{ $butterfly->name }}</p>
                        <p id="butterfly" class="mt-2 text-sm text-gray-500">{{ $butterfly->quantity }}</p>
                    </div>            
                
            @endforeach
            </div>

      </div>

     
    </div>
@include('admin.layout.body-footer')
@include('admin.layout.footer')
   