@include("layout.header", ['title' => "Register"])
@include("layout.nav")


<div class=" p-4 my-7 mx-10 xl:mx-48 bg-custom-dark-800 rounded-sm">
    <div class="flex flex-col-reverse xl:flex-row ">
        <div class="mx-auto w-10/12 p-2 xl:px-14  py-2">
            <h1 class="text-center xl:text-left text-custom-dark-600 text-4xl font-lora font-bold">CREATE <span class="text-white">AN ACCOUNT AS ADMIN</span></h1>
            <p class="text-center xl:text-left text-custom-dark-500" >Lorem ipsum dolor sit amet, consectetur..</p>
        
            <form class="mt-5 " action="/admin/register/process" method="post">
                @csrf
                

                <label class="my-2 block text-sm text-custom-white-p" for="username">Username:
                    <input class="w-11/12 block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                    type="text" name="username" id="username" placeholder="Enter username"></label>
                    @error('username')
                    <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                    @enderror                
                <label class="my-2 block text-sm text-custom-white-p" for="email">Email Address:
                    <input class="w-11/12 block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                    type="email" name="email" id="email" placeholder="Enter Email Address"></label>
                    @error('email')
                    <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                    @enderror
                    <label class="my-2 block text-sm text-custom-white-p" for="password">Password:
                        <input class="w-11/12 block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                        type="password" name="password" id="password" placeholder="Enter Password"></label>
                        @error('password')
                        <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                        @enderror
                    <label class="my-2 block text-sm text-custom-white-p" for="password_confirmation">Confirm Password:
                        <input class="w-11/12 block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                        type="password" name="password_confirmation" id="password_confirmation" placeholder="Enter Password"></label>
                        @error('password_confirmation')
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