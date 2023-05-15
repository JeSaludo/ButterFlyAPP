@include("layout.header", ['title' => "Apply Permit"])
@include("layout.nav")


<div class=" p-4 my-7 mx-10 xl:mx-64 bg-custom-dark-800 rounded-sm">
   <h1 class="text-center  text-custom-dark-600 text-4xl font-lora font-bold">REGISTER <span class="text-white">APPLICATION</span></h1>
   
   <form action="/permit/apply-permit-process" method="post" class="text-center">
   @csrf
   <p class="text-left mx-auto w-6/12 text-custom-dark-500 font-semibold mt-6">~Personal  Details~</p>
      <div class="w-6/12 mx-auto">
      <label class="text-left mt-6 block text-sm text-custom-white-p" for="name">Full Name:</label>
      <input class="w-full block mt-2 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
      type="text" name="name" id="name" placeholder="Enter Full Name">
      @error('name')
      <div class="text-left mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
      @enderror
      </div>

      <div class="w-6/12 mx-auto">
         <label class="text-left mt-2 block text-sm text-custom-white-p" for="address">Address:</label>
         <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
         type="text" name="address" id="address" placeholder="Enter Address">
         @error('address')
         <div class="text-left mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
         @enderror
      </div>
      <div class="w-6/12 mx-auto">
         <label class="text-left mt-2 block text-sm text-custom-white-p" for="purpose">Mode Of Transport:</label>
         <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
         type="text" name="modeOfTransport" id="modeOfTransport" placeholder="Enter Mode of Transport">
         @error('modeOfTransport')
         <div class="text-left mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
         @enderror
      </div>
      <div class="w-6/12 mx-auto">
         <label class="text-left mt-2 block text-sm text-custom-white-p" for="transportAddress">Transport to Address:</label>
         <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
         type="text" name="transportAddress" id="name" placeholder="Enter Transport to Address">
         @error('transportAddress')
         <div class="text-left mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
         @enderror
      </div>

      <div class="w-6/12 mx-auto">
         <label class="text-left mt-2 block text-sm text-custom-white-p" for="transportDate">Date of Transport:</label>
         <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
         type="date" name="transportDate" id="transportDate">
         @error('transportDate')
         <div class="text-left mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
         @enderror
      </div>

     
      <div class="w-6/12 mx-auto">
         <label class="text-left mt-2 block text-sm text-custom-white-p" for="purpose">Purpose:</label>
         <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
         type="text" name="purpose" id="purpose" placeholder="Enter purpose of transport">
         @error('purpose')
         <div class="text-left mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
         @enderror
      </div>

      <p class="text-left mx-auto w-6/12 text-custom-dark-500 font-semibold mt-6">~Butterfly Details~</p>
     
      <div class="grid grid-flow-col gap-2 w-6/12 mx-auto mb-4">
         <input type="text" class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md" placeholder="Enter Butterfly" name="butterfly_name[]">
         <input type="number" class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md" placeholder="Enter Quantity" name="butterfly_quantity[]">
      </div>
      <div class="text-white flex justify-between w-6/12 mx-auto">
         <h2>Add Butterfly</h2>
         <a href="#" class="add text-white  border-custom-dark-500 border-2 p-1.5 rounded-md  py-0">&plus;</a>
      </div>

      <div class="inp-group w-6/12 mx-auto">
        
      </div>

      <button type="submit" class="w-6/12 mx-auto font-poppins text-xl text-white bg-custom-blue mt-4  py-2 border-none rounded-md">Login</button>
            
   </form>

    

</div>




@include("layout.body-footer")

   
   <script src="{{ asset('js/customize-form.js') }}"></script>
 
@include("layout.footer")

