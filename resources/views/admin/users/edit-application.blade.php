@include('admin.layout.header')

<body class="bg-custom-light-tint-blue"> 
@include('admin.layout.dashboard-nav')

        <div class="md:ml-64">
          <div class="m-4 p-4 bg-white ">
                <form action="{{ route('update-application', $form->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="mt-5">
                    <label class="block" for="name">Name: </label>
                    <input class="" type="text" name="name" id="name" value="{{ $form->name}}">
                    @error('name')
                    <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                    @enderror
                 </div>
               
                  <div class="mt-5">
                    <label class="block" for="address">Address: </label>
                    <input class="" type="text" name="address" id="address" value="{{ $form->address}}">
                    @error('address')
                    <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                   @enderror
                  </div>
                 
                  <div class="mt-5">
                    <label class="block" for="transportAddress">Transport Address: </label>
                    <input class="" type="text" name="transportAddress" id="transportAddress" value="{{ $form->transport_address}}">
                    @error('transportAddress')
                    <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                   @enderror
                  </div>
                 
                  <div class="mt-5">
                    <label class="block" for="transportDate">Date of Tranport: </label>
                    <input class="" type="date" name="transportDate" id="transportDate" value="{{ $form->transport_date}}">
                    @error('transportDate')
                    <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                   @enderror
                  </div>
                 
                  <div class="mt-5">
                    <label class="block" for="purpose">Purpose: </label>
                    <input class="" type="text" name="purpose" id="transportAddress" value="{{ $form->purpose}}">
                    @error('purpose')
                    <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                   @enderror
                  </div>
                 

                  <div class="mt-5">
                    <label class="block" for="purpose">Status: </label>
                    <input class="" type="text" name="status" id="status" value="{{ $form->status}}">
                    @error('status')
                    <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                   @enderror
                  </div>
                 
                  <div class="mt-5">
                    <label class="block" for="modeOfTransport">Mode Of Transport: </label>
                    <input class="" type="text" name="modeOfTransport" id="modeOfTransport" value="{{ $form->mode_of_transport}}">
                    @error('modeOfTransport')
                    <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                   @enderror
                  </div>
                 
                  <p>BUtterfly Details</p>
              
                       
                         
                   
                  @foreach ($form->butterflies as $butterfly)
                  
                        <div class="flex justify-between w-6/12">    
                          <label for="butter_name[]" class="">Buttername: </label>
                                          
                           <input class="" type="text" name="butterfly_name[]" id="butterfly_name" value="{{ $butterfly->name}}">
                           <label for="butter_quantity[]">Quantity: </label>                 
                          <input class="" type="number" name="butterfly_quantity[]" id="butterfly_quantity" value="{{ $butterfly->quantity}}">
                        </div>
                
                  @endforeach
            
                  <button class="mt-5 bg-black p-2 rounded-md text-white" type="submit">Save Application Form</button>
                </form>

            </div>
        </div>
@include('admin.layout.body-footer')

@include('admin.layout.footer')
   