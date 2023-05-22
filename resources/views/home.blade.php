<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&family=Poppins:wght@400;500;700&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

</head>
<body> 
    <div class="min-h-screen ">
        <div class="bg-custom-dark-800 md:bg-transparent">
        <div class="swiper  absolute overflow-x-hidden  top-0 -z-10 w-full sm:max-w-none sm:w-full md:max-w-1440 md:w-full">
           
            <div class="swiper-wrapper">
          
              <div class="swiper-slide "><img class="hidden md:block object-cover object-center w-full h-799" src="{{asset('images/slide-img-1.png')}}" alt=""></div>
              <div class="swiper-slide "><img class="hidden md:block object-cover object-center w-full h-799" src="{{asset('images/slide-img-2.png')}}" alt=""></div>
              <div class="swiper-slide "><img class="hidden md:block object-cover object-center w-full h-799" src="{{asset('images/slide-img-3.png')}}" alt=""></div>
           
            </div>
            
            <div class="swiper-pagination "></div>                               
          </div>
      
          @include('layout.user-nav')
    
        <div class="w-full md:w-7/12 py-10 px-16 text-center md:text-left">
            @auth
            <p class="text-2xl mb-4 font-roboto font-semibold text-gray-400">Welcome, {{Auth::user()->first_name}}! </p>
            @endauth
           
           
           <h3 class="md:text-justify text-1xl md:text-xs   xl:text-2xl  text-center  text-custom-dark-600 font-roboto font-light">LOCAL TRANSPORT PERMIT FOR WILDLIFE</h3>
           <h1 class="md:text-justify text-2xl mt-2 mx-auto md:mx-0 md:text-xl xl:text-3xl leading-normal md:leading-10 text-center  w-full md:w-9/12   font-roboto font-semibold text-custom-white">Obtain Your <span class="text-custom-light-blue">Wildlife Transport Permits</span> with 
            Ease - Apply Online Now
            and Simplify the Process</h1>
            <p class="md:text-justify md-text-center my-2 w-full mx-auto md:mx-0 xl:mx-0 md:w-9/12  xl:text-lg md:text-md sm:text-sm text-center  text-custom-white-p">Welcome to our online platform for wildlife transport permitting and transactions. Apply for permits, track your applications, and manage your a easily and securely on our website. Streamline your wildlife transport permitting process today.</p>
            
            <div class="flex justify-between gap-5 mt-5  text-center w-full md:w-9/12  mx-auto md:mx-0">
                <a href="/permit/apply" class="font-poppins text-xs xl:text-xl text-white bg-custom-blue  w-6/12 py-2 xl:py-4 border-none rounded-xl">Apply For Permit</a>
                <a href="#learn-more" class="font-poppins text-xs xl:text-xl text-white bg-transparent w-6/12 py-2 xl:py-4  border-white border-2 rounded-xl">Learn More</a>
            </div>
        </div>
    </div>


    <section id="features" class="mt-8 md:mt-16 pt-0 md:pt-12">
        <div class="">
           <h1 class="mt-48 text-4xl w-6/12 lg:w-5/12 text-center mx-auto font-raleway font-bold"><span class="text-custom-blue">Key Features</span> of our Butterfly Permitting System</h1>

            <div class="grid grid-row xl:grid-cols-3 gap-4 my-36">

                <div class="w-full mb-20 md:mb-0 ">
                    <img class="mx-auto w-258 h-258" src="{{asset('images/feature-1.png')}}" alt="">
                    <h3 class="font-bold mx-auto w-3/6 text-center mt-4">Permitting Status Traching:</h3>
                    <p class="font-light mx-auto w-8/12 text-center mt-2">The website provides a convenient platform for users to submit their butterfly permit applications online.</p>
                </div>

                
                <div class="w-full mb-20 md:mb-0">
                    <img class="mx-auto w-258 h-258" src="{{asset('images/feature-2.png')}}" alt="">
                    <h3 class="font-bold mx-auto w-3/6 text-center mt-4">Permit Applications:</h3>
                    <p class="font-light mx-auto w-8/12 text-center mt-2">
                        The website provides a convenient platform for users to submit their butterfly permit applications online.</p>
                </div>

                
                <div class="w-full ">
                    <img class="mx-auto w-258 h-258" src="{{asset('images/feature-3.png')}}" alt="">
                    <h3 class="font-bold mx-auto w-3/6 text-center mt-4">User-Friendly Interface:</h3>
                    <p class="font-light mx-auto w-6/12 text-center mt-2">
                        The website offers a clean and intuitive interface, making it easy for users to navigate through the various features and sections.</p>
                </div>


            </div>
        </section>

        <section id="learn-more">
            <h1 class="text-4xl w-7/12 md:w-3/12 text-center mx-auto font-raleway font-bold"><span class="text-custom-blue">How To Apply In </span>Our Website</h1>

            <div class="grid grid-row xl:grid-cols-3 gap-4 my-36">

                <div class="w-full mb-20 md:mb-0">
                    <p class="font-roboto font-bold text-9xl text-center text-custom-red">01</p>
                    <h3 class="font-bold mx-auto w-3/6 text-center mt-2">Start an Application</h3>
                    <p class="font-light mx-auto w-8/12 text-center mt-2">Click on the "Apply for a Butterfly Permit" or similar option to begin the application process.</p>
                </div>

                
                <div class="w-full mb-20 md:mb-0">
                    <p class="font-roboto font-bold text-9xl text-center text-custom-pink">02</p>
                    <h3 class="font-bold mx-auto w-3/6 text-center mt-2">Fill out the Application Form</h3>
                    <p class="font-light mx-auto w-8/12 text-center mt-2">
                    Filling out the application form with necessary details</p>
                </div>

                
                <div class="w-full mb-20 md:mb-0">
                    <p class="font-roboto font-bold text-9xl text-center text-custom-violet">03</p>
                    <h3 class="font-bold mx-auto w-3/6 text-center mt-2">Submitting the application for review</h3>
                    <p class="font-light mx-auto w-6/12 text-center mt-2">
                    Click the "Submit" or similar button to send your application for review.</p>
                </div>


            </div>

        </div>
    </section>
    
    <footer class="bg-custom-dark-900">
       
        <div class="flex flex-col md:flex-row justify-between pt-4">
            <div class="w-full pl-8 "> 
                <h1 class=" text-3xl font-poppins font-bold text-custom-white"><span class="text-custom-light-blue">WILD</span>LIFE</h1>
                <p class="text-custom-white w-69 ">
                    The largest Butterfly marketplace. Authenthic and truly unique delicious. Signed and issued by the creator, made possible by blockchain technology.
                </p>
            </div>
            <div class="flex justify-evenly  w-full sm:my-8 md:my-0 py-8 sm:pt-6 md:pt-0">
                <div class="w-full text-custom-white text-center md:ml-16">
                    <ul>
                    <li><a href="#"></a>LINKS</li>
                    <li><a href="#"></a>Features</li>
                    <li><a href="#"></a>Cotact Us!</li>
                    <li><a href="#"></a>Our Services</li>
                    </ul>
                </div>
                <div class="w-full text-custom-white text-center">
                    <ul>
                    <li><a href="#"></a>AFFLIATED LINKS</li>
                    <li><a href="#"></a>Office of the President</li>
                    <li><a href="#"></a>Office of the Vice President</li>
                    <li><a href="#"></a>Senate of the Philippines</li>
                    </ul>
                </div>
            </div>
            
            
            
            <div class="w-full md:w-3/6 px-10 mx-auto md:ml-24">
            <div class="text-left text-custom-white">
            <p class="text-sm md:text-xl pb-1 font-bold">Join our Newsletter</p>
                <form action="" class="flex ">                    
                    <input type="email" placeholder="Your Email Address" class="text-custom-dark-900  font-poppins font-bold p-2 sm:w-full md:w-auto">
                    <button type="submit" class="font-poppins font-bold bg-custom-blue p-2 sm:w-full md:w-auto">Subscribe</button>
                </form>                
            <p class="mt-2">Get the latest updates on butterfly permits.</p>
            </div>
            </div>
        </div>

        <div class="text-custom-white text-center flex mt-6 mx-10 pb-6">
            <p class="flex-1 text-xs xl:text-xl">@All Rights Reserved |</p>
            <p class="flex-1 text-xs xl:text-xl">wildlifebutterfly01@gmail.com</p>
            <p class="flex-1 text-xs xl:text-xl">| +63 123456789</p>
        
        </div>
    </footer>
        
    </div>

   
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
    <script>
        function Menu(e){
            let list  = document.querySelector("ul")
            e.name === 'menu' ? (e.name = "close", list.classList.add('top-[55px]'), list.classList.add('opacity-100')) : (e.name = "menu", list.classList.remove('top-[55px]'), list.classList.remove('opacity-100'))
        
        }

        const swiper = new Swiper('.swiper', {
       
        effect: 'fade',
        autoplay:{
            delay:8000,
            disableOnInteraction: false,
        },
        direction: 'horizontal',
        loop: true,

        
        pagination: {
            el: '.swiper-pagination',
        },

       
        });
    
        
    </script>
</body>
</html>