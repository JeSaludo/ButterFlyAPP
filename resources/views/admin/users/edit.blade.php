@include("layout.header", ['title' => "Register"])
@include("layout.nav")


<div class=" p-4 my-7 mx-10 xl:mx-48 bg-custom-dark-800 rounded-sm">
    <div class="flex flex-col-reverse xl:flex-row ">
        <div class="mx-auto w-10/12 p-2 xl:px-14  py-2">
            <h1 class="text-center xl:text-left text-custom-dark-600 text-3xl font-lora font-bold">UPDATE <span class="text-white">AN ACCOUNT</span></h1>
            <p class="text-center xl:text-left text-custom-dark-500" >Update User Account profile</p>
        
            <form class="mt-5 " action="{{ route('admin.users.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="grid grid-flow-col w-11/12 gap-4  ">
                    <div>
                        <label class=" block text-sm text-custom-white-p" for="firstName">First Name:</label>
                        <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                        type="text" name="firstName" id="firstName" placeholder="Enter First Name" value="{{ $user->first_name }}">
                        @error('firstName')
                        <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                    @enderror
                    </div>

                    <div>
                        <label class="block text-sm text-custom-white-p" for="lastName">Last Name:</label>
                        <input class="w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                        type="text" name="lastName" id="lastName" placeholder="Enter Last Name" value="{{ $user->last_name }}" />
                        @error('lastName')
                        <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <label class="my-2 block text-sm text-custom-white-p" for="username">Username:</label>
                <input class="w-11/12 block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                type="text" name="username" id="username" placeholder="Enter Username" value="{{ $user->username }}" />
                @error('username')
                <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                @enderror

                <label class="my-2 block text-sm text-custom-white-p" for="wildlifePermit">WFP or WCP:</label>
                    <input class="w-11/12 block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                    type="text" name="wildlifePermit" id="wildlifePermit" placeholder="Enter WCP or WFP" value="{{ $user->wildlife_permit }}" />
                    @error('wildlifePermit')
                    <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                    @enderror
                <label class="my-2 block text-sm text-custom-white-p" for="firstName">Business Name:</label>
                    <input class="w-11/12 block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                    type="text" name="businessName" id="businessName" placeholder="Enter Business Name"value="{{ $user->business_name }}" />
                    @error('businessName')
                    <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                    @enderror
                <label class="my-2 block text-sm text-custom-white-p" for="ownerName">Owner Name:</label>
                    <input class="w-11/12 block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                    type="text" name="ownerName" id="ownerName" placeholder="Enter Owner Name" value="{{ $user->owner_name }}">
                    @error('ownerName')
                    <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                    @enderror
                <label class="my-2 block text-sm text-custom-white-p" for="contact">Contact Number:</label>
                    <input class="w-11/12 block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                    type="text" name="contact" id="contact" placeholder="Enter Contact Number" value="{{ $user->contact }}">
                    @error('contact')
                    <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                    @enderror
                <label class="my-2 block text-sm text-custom-white-p" for="address">Address:</label>
                    <input class="w-11/12 block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                    type="text" name="address" id="address" placeholder="Enter Address" value="{{ $user->address }}">
                    @error('address')
                    <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                    @enderror
                <label class="my-2 block text-sm text-custom-white-p" for="email">Email Address:</label>
                    <input class="w-11/12 block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                    type="email" name="email" id="email" placeholder="Enter Email Address" value="{{ $user->email }}">
                    @error('email')
                    <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                    @enderror
                <label class="my-2 block text-sm text-custom-white-p" for="status">Status:</label>
                <input class="w-11/12 block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                type="text" name="status" id="status" placeholder="Enter 0 if Activate or 1 If Deactive this account " value="{{ $user->role }}">
                @error('status')
                <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                @enderror
               
                <button type="submit" class="font-poppins text-xl text-white bg-custom-blue mt-4 w-11/12 py-2 border-none rounded-md">Update User</button>
            
            
            </form>
        
        </div>  

        <div class="w-full">
            <img class="mx-auto"  src="{{asset("images/login-img.png")}}" alt="" srcset="">

        </div>

    </div>

</div>




@include("layout.body-footer")
@include("layout.footer")
