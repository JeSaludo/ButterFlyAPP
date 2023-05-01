@include("layout.header", ['title' => "HOME"])
@include("layout.nav")


<div class=" p-4 my-7 mx-10 xl:mx-48 bg-custom-dark-800 rounded-sm">
    <div class="flex flex-col-reverse xl:flex-row">
        <div class="mx-auto w-10/12 p-2 xl:px-14  py-20">
            <h1 class="text-center xl:text-left text-custom-dark-600 text-4xl font-lora font-bold">ADD <span class="text-white">WILDLIFE PERMIT</span></h1>
            <p class="text-center xl:text-left text-custom-dark-500" >Lorem ipsum dolor sit amet, consectetur..</p>
        
            <form class="mt-5" action="/admin/store-wildlife-permit" method="post"> 
                @csrf
                <label class="my-2 block text-sm text-custom-white-p" for="permitType">Permit Type:
                    <input class="w-11/12 block mt-2 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                    type="text" name="permitType" id="permitType" placeholder="Enter WCP or WFP"></label>
                    @error('permitType')
                    <div class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</div>
                    @enderror
                <label class="my-2 block text-sm text-custom-white-p" for="permitNo">Permit No:
                    <input class="w-11/12 block mt-2 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
                    type="text" name="permitNo" id="permitNo" placeholder="Enter Permit Number"></label>
                    @error('permitNo')
                    <a class="mt-2 text-red-700 font-roboto font-bold text-xs">{{ $message }}</a>
                    @enderror
               
                <button type="submit" class="font-poppins text-xl text-white bg-custom-blue mt-4 w-11/12 py-2 border-none rounded-md">Login</button>
            
            
            </form>
        
        </div>  

        <div class="w-full">
            <img class=""  src="{{asset("images/register-img.png")}}" alt="" srcset="">

        </div>

    </div>

</div>





@include("layout.footer")