@include("layout.header")
@include('layout.nav')
   
        <div class=" mx-6 my-4 bg-custom-dark-800 border-none rounded-xl">
            <div class="flex justify-between flex-col-reverse md:flex-row p-2">
                <div class="w-full p-12">
                   <h3 class="text-justify text-sm  xl:text-xl md:text-left lg:text-lg md:text-sm sm:text-xl   text-custom-dark-600 font-roboto font-light">LOCAL TRANSPORT PERMIT FOR WILDLIFE</h3>
                   <h1 class="text-justify mt-2 text-3xl xl:text-6xl md:text-left lg:text-4xl md:text-2xl  sm:text-2xl  font-roboto font-semibold text-custom-white">Obtain Your <span class="text-custom-light-blue">Wildlife Transport Permits</span> with 
                    Ease - Apply Online Now
                    and Simplify the Process</h1>
                    <p class="text-justify md-text-center m-2 lg:text-xl md:text-md sm:text-sm  text-custom-white-p">Welcome to our online platform for wildlife transport permitting and transactions. Apply for permits, track your applications, and manage your a easily and securely on our website. Streamline your wildlife transport permitting process today.</p>
                    
                    <div class="flex w-full justify-between gap-5 mt-5 text-center">
                        <a href="#" class="font-poppins text-xl text-white bg-custom-blue w-6/12 py-4 border-none rounded-xl">Apply Now</a>
                        <a href="#" class="font-poppins text-xl text-white bg-transparent w-6/12 py-4  border-white border-2 rounded-xl">Learn More</a>
                    </div>
                </div>

                <div class="flex items-center gap-8 w-full justify-center p-2">
                    <div class="hidden md:block">
                        <img class="rounded-md md:w-52 md:rounded-80p " src="{{asset('images/hero-img-1.png')}}" alt="">
                    </div>
                    <div class="hidden md:block">
                        <img class="w-52 " src="{{asset('images/hero-img-2.png')}}" alt="">
                        <img class="w-52 mt-4"  src="{{asset('images/hero-img-3.png')}}" alt="">
                    </div>
                    <div class="hidden md:block">
                        <img class="w-52 " src="{{asset('images/hero-img-4.png')}}" alt="">
                        <img class="w-52 mt-4"  src="{{asset('images/hero-img-5.png')}}" alt="">
                    </div>

                </div>

               
            </div>

        </div>
   

@include("layout.footer")