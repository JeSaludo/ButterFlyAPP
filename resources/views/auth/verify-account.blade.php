@include("layout.header", ['title' => "Verify Account"])
@include("layout.nav")


<div class=" p-4 my-7 mx-10 xl:mx-48 bg-custom-dark-800 rounded-sm">
    <div class="flex flex-col-reverse xl:flex-row">
        <div class="mx-auto w-10/12 p-2 xl:px-14  py-40">
            <h1 class="text-center xl:text-left text-custom-dark-600 text-4xl font-lora font-bold">VERIFY <span class="text-white">EMAIL </span></h1>
            <p class="text-center xl:text-left text-custom-dark-500" >Lorem ipsum dolor sit amet, consectetur..</p>
        
            <form class="mt-5" action="/verify-otp" method="post"> 
                @csrf
                <label class="my-2 block text-sm text-custom-white-p" for="token">OTP Code:
                    <input class="w-11/12 block mt-2 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                    type="number" name="token" id="token" placeholder="Enter 6 Digit Code"></label>
                    @error('token')
                    <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                    @enderror
               
                <button type="submit" class="font-poppins text-xl text-white bg-custom-blue mt-4 w-11/12 py-2 border-none rounded-md">Verify Account</button>
            
            
            </form>
        
        </div>  

        <div class="w-full">
            <img class=""  src="{{asset("images/register-img.png")}}" alt="" srcset="">

        </div>

    </div>

</div>




@include("layout.body-footer")
@include("layout.footer")





