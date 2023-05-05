@include("layout.header", ['title' => "Register"])
@include("layout.nav")


<div class=" p-4 my-7 mx-10 xl:mx-48 bg-custom-dark-800 rounded-sm">
    <div class="flex flex-col-reverse xl:flex-row ">
        <div class="mx-auto w-10/12 p-2 xl:px-14  py-2">
            <h1 class="text-center xl:text-left text-custom-dark-600 text-4xl font-lora font-bold">CREATE <span class="text-white">AN ACCOUNT</span></h1>
            <p class="text-center xl:text-left text-custom-dark-500" >Get started by creating your profile</p>
        
            <form class="mt-5 " action="/register/process" method="post">
                @csrf
                <div class="grid grid-flow-col w-11/12 gap-4  ">
                    <div>
                        <label class=" block text-sm text-custom-white-p" for="firstName">First Name:</label>
                        <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                        type="text" name="firstName" id="firstName" placeholder="Enter First Name">
                        @error('firstName')
                        <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                    @enderror
                    </div>

                    <div>
                        <label class="block text-sm text-custom-white-p" for="lastName">Last Name:</label>
                        <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                        type="text" name="lastName" id="lastName" placeholder="Enter Last Name">
                        @error('lastName')
                        <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <label class="my-2 block text-sm text-custom-white-p" for="wildlifePermit">WFP or WCP:
                    <input class="w-11/12 block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                    type="text" name="wildlifePermit" id="wildlifePermit" placeholder="Enter WCP or WFP"></label>
                    @error('wildlifePermit')
                    <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                    @enderror
                <label class="my-2 block text-sm text-custom-white-p" for="firstName">Business Name:
                    <input class="w-11/12 block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                    type="text" name="businessName" id="businessName" placeholder="Enter Business Name"></label>
                    @error('businessName')
                    <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                    @enderror
                <label class="my-2 block text-sm text-custom-white-p" for="ownerName">Owner Name:
                    <input class="w-11/12 block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                    type="text" name="ownerName" id="ownerName" placeholder="Enter Owner Name"></label>
                    @error('ownerName')
                    <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                    @enderror
                <label class="my-2 block text-sm text-custom-white-p" for="contact">Contact Number:
                    <input class="w-11/12 block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                    type="text" name="contact" id="contact" placeholder="Enter Contact Number"></label>
                    @error('contact')
                    <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                    @enderror
                <label class="my-2 block text-sm text-custom-white-p" for="address">Address:
                    <input class="w-11/12 block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                    type="text" name="address" id="address" placeholder="Enter Address"></label>
                    @error('address')
                    <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                    @enderror
                <label class="my-2 block text-sm text-custom-white-p" for="email">Email Address:
                    <input class="w-11/12 block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                    type="email" name="email" id="email" placeholder="Enter Email Address"></label>
                    @error('email')
                    <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                    @enderror
                <button type="submit" class="font-poppins text-xl text-white bg-custom-blue mt-4 w-11/12 py-2 border-none rounded-md">Create an Account</button>
            
            
            </form>
        
        </div>  

        <div class="w-full">
            <img class="mx-auto"  src="{{asset("images/login-img.png")}}" alt="" srcset="">

        </div>

    </div>

</div>




@include("layout.body-footer")
@include("layout.footer")