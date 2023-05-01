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
      <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
      @enderror
      </div>

      <div class="w-6/12 mx-auto">
         <label class="text-left mt-2 block text-sm text-custom-white-p" for="address">Address:</label>
         <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
         type="text" name="address" id="address" placeholder="Enter Address">
         @error('address')
         <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
         @enderror
      </div>

      <div class="w-6/12 mx-auto">
         <label class="text-left mt-2 block text-sm text-custom-white-p" for="transportAddress">Transport to Address:</label>
         <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
         type="text" name="transportAddress" id="name" placeholder="Enter Transport to Address">
         @error('transportAddress')
         <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
         @enderror
      </div>

      <div class="w-6/12 mx-auto">
         <label class="text-left mt-2 block text-sm text-custom-white-p" for="transportDate">Date of Transport:</label>
         <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
         type="date" name="transportDate" id="transportDate">
         @error('transportDate')
         <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
         @enderror
      </div>

      <p class="text-left mx-auto w-6/12 text-custom-dark-500 font-semibold mt-6">~Butterfly Details~</p>
         
  
   </form>

    

</div>




@include("layout.body-footer")

   <script>
      
   </script>
@include("layout.footer")