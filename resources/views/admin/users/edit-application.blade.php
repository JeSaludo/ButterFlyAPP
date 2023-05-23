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
  
</head>

<body class="bg-custom-admin-bg min-h-screen">
    @include('admin.layout.dashboard-nav')

    <div class="md:ml-64">
        <form action="{{ route('update-application', $form->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <div class="bg-gray-50 w-11/12 rounded-md mx-auto mt-3 mb-3 ">
                    <h1 class="px-6 py-2 font-lora font-bold text-3xl text-custom-dark-blue">APPLICATION FORM DETAILS
                    </h1>

                    <div class="grid grid-flow-row md:grid-flow-col gap-4 px-10 pb-4">
                        <div class="w-full">
                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="name">Applicant Name:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="name" id="name" placeholder="Enter Applicant Name"
                                        value="{{$form->name}}"></label>
                                @error('name')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="name">Address:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="address" id="address" placeholder="Enter Address"
                                        value="{{$form->address}}"></label>
                                @error('address')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="modeOfTransport">Mode of Transport:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="modeOfTransport" id="modeOfTransport"
                                        placeholder="Enter Mode of Transport"
                                        value="{{$form->mode_of_transport}}"></label>
                                @error('modeOfTransport')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label class="my-2 block  text-md font-robot font-medium" for="modeOfTransport">Purpose:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="purpose" id="purpose" placeholder="Enter Purpose"
                                        value="{{$form->purpose}}"></label>
                                @error('purpose')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>


                        </div>

                        <div>

                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="modeOfTransport">Date of
                                    Transport:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="date" name="transportDate" id="transportDate"
                                        placeholder="Enter Date of Transport" value="{{$form->transport_date}}"></label>
                                @error('transportDate')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label class="my-2 block text-md font-robot font-medium" for="transportAddress">Address
                                    of Transport:
                                    <input
                                        class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                        type="text" name="transportAddress" id="transportAddress"
                                        placeholder="Enter Address of Transport"
                                        value="{{$form->transport_address}}"></label>
                                @error('transportAddress')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>

                            <div class="mt-2">
                              <label class="my-2 block text-md font-robot font-medium" for="status">Status:</label>
                              <select name="status" id="status" class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md">
                                  <option value="On Process" @if ($form->status == 'On Process') selected @endif>On Process</option>
                                  <option value="Accepted" @if ($form->status == 'Accepted') selected @endif>Accepted</option>
                                  <option value="Returned" @if ($form->status == 'Returned') selected @endif>Returned</option>
                                  <option value="Expired" @if ($form->status == 'Expired') selected @endif>Expired</option>
                                  <option value="Used" @if ($form->status == 'Used') selected @endif>Used</option>
                                  <option value="Released" @if ($form->status == 'Released') selected @endif>Released</option>
                                
                                </select>
                              @error('status')
                              <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                              @enderror
                          </div>


                        </div>
                    </div>

                    <h1 class="px-6 py-2 font-lora font-bold text-3xl text-custom-dark-blue">BUTTERFLY DETAILS</h1>
                    <div class="grid grid-cols-2  px-10">
                        <p class="my-2 block text-md font-robot font-medium">Butterfly Name:</p>
                        <p class="my-2 block text-md font-robot font-medium">Quantity</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4 px-10 pb-4 ">
                        @foreach ($form->butterflies as $butterfly)
                        <div class="w-full">
                            <div class="mt-2">
                                <input
                                    class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                    type="text" name="butterfly_name[]" id="butterfly_name[]"
                                    placeholder="Enter Butterfly Name" value="{{$butterfly->name}}">
                                @error('butterfly_name[]')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>


                        </div>
                        <div>

                            <div class="mt-2">
                                <input
                                    class="w-full block mt-2 text-custom-dark-900 placeholder:text-custom-dark-800 bg-transparent border-custom-dark-900 border-2 p-1.5 rounded-md"
                                    type="number" name="butterfly_quantity[]" id="butterfly_quantity[]"
                                    placeholder="Enter Quantity" value="{{$butterfly->quantity}}">
                                @error('butterfly_quantity[]')
                                <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                                @enderror
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class=" px-10 py-2 flex  gap-2">
                        <button type="submit"
                            class="w-full mx-auto font-poppins text-xl text-white bg-custom-blue mt-4  py-2 border-none rounded-md">Update
                            Application</button>

                    </div>
                </div>


            </div>


    
    
          </div>


    
        </form>
       
    </div>

    @include('admin.layout.script')
    @include('admin.layout.admin-script')
</body>

</html>
