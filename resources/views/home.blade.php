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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    

</head>
<body> 
    @include('layout.user-nav')
        <div class="bg-custom-dark-800 md:bg-transparent">
            <div
                class="swiper  absolute overflow-x-hidden  top-0 -z-10 w-full sm:max-w-none sm:w-full md:max-w-1440 md:w-full">

                <div class="swiper-wrapper">

                    <div class="swiper-slide "><img class="hidden md:block object-cover object-center w-full h-[600px]"
                            src="{{asset('images/slide-img-1.png')}}" alt=""></div>
                    <div class="swiper-slide "><img class="hidden md:block object-cover object-center w-full h-[600px]"
                            src="{{asset('images/slide-img-2.png')}}" alt=""></div>
                    <div class="swiper-slide "><img class="hidden md:block object-cover object-center w-full h-[600px]"
                            src="{{asset('images/slide-img-3.png')}}" alt=""></div>

                </div>

                <div class="swiper-pagination "></div>
            </div>

          

            <div class="w-full md:w-7/12 py-10 px-16 text-center md:text-left">
                @auth
                <p class="text-2xl mb-4 font-roboto font-semibold text-gray-400">Welcome, {{Auth::user()->first_name}}!
                </p>
                @endauth

                <div class="mt-6">
                    <h3
                        class="md:text-justify text-1xl md:text-xs   xl:text-2xl  text-center  text-custom-dark-600 font-roboto font-light">
                        LOCAL TRANSPORT PERMIT FOR WILDLIFE</h3>
                    <h1
                        class="md:text-justify text-2xl mt-4 mx-auto md:mx-0 md:text-xl xl:text-5xl leading-normal md:leading-10 text-center  w-full md:w-8/12   font-roboto font-semibold text-custom-white">
                        Simplify Your <span class="text-custom-light-blue">Wildlife Transport Compliance</span></h1>
                    <p
                        class="md:text-justify md-text-center mt-6 my-2 w-full mx-auto md:mx-0 xl:mx-0 md:w-7/12  xl:text-xl md:text-md sm:text-sm text-center  text-custom-white-p">
                        Online Frontline Services Permitting and Transaction System Enables Easy Local Butterfly Permitting with its Intuitive Online System</p>
                </div>
                <div class="flex justify-between gap-5 mt-12  text-center w-full md:w-8/12  mx-auto md:mx-0">
                    
                  
                        <a href="/permit/apply" class="font-poppins text-xs xl:text-xl text-white bg-custom-blue hover:bg-[#390A86] w-6/12 py-2 xl:py-4 border-none rounded-xl ">Apply For Permit</a>
                   

                    <a href="#learn-more"
                        class="font-poppins text-xs xl:text-xl text-white bg-transparent w-6/12 py-2 xl:py-4 hover:bg-gray-100 hover:text-black border-white border-2 rounded-xl">Learn
                        More</a>
                </div>
            
                
                @if (auth()->check() && auth()->user()->role === 1)
                <div class="bg-red-200 mt-4 rounded-md w-8/12">
                    <p class="py-2 px-2 text-xs text-red-600 font-medium">*Cannot Apply for Permit because your WFC or WCP has expired. Please update your Permit in the Profile.</p>
                </div>
            @endif
            
              
                   
              
               
                
            </div>
        </div>
        
        <section class="mt-8 md:mt-36"  id="learn-more">
            <h1 class="text-5xl w-7/12 md:w-4/12 text-center my-10 mx-auto font-raleway font-bold"><span
                    class="text-custom-blue">Welcome to </span>OFSPTS</h1>
            <p class="w-9/12 md:w-7/12 mx-auto text-center text-2xl font-raleway">Your trusted online platform for
                obtaining local transport permits for butterflies. Our goal is to streamline the permitting process,
                making it hassle-free for butterfly enthusiasts, researchers, and professionals alike.
                With our user-friendly interface and intuitive features, you can apply for permits in just a few simple
                steps. Our online system enables you to submit applications, track their progress in real-time, and
                receive updates at each stage.</p>
        </section>
        <div class="w-full relative ">
            <div
                class="w-auto md:w-[1142px] h-[380px] bg-[#242424] mx-auto absolute -z-20 left-1/2 transform -translate-x-1/2 translate-y-16 rounded-t-lg">
            </div>
            <img class="mx-auto mt-12 md:mt-24 mb-0 md:mb-4" src="{{asset('images/butterfly-showcase.png')}}" alt="">
            <div class="w-full h-[126px] bg-[#242424]">
                <h1 class="font-raleway font-bold text-2xl md:text-4xl text-white text-center py-10">Learn More About
                    <span class="text-custom-blue">OFSPTS</span></h1>
            </div>
            <div class="bg-[#F2F3FB] py-10" id="features">
                <h1 class="text-2xl md:text-4xl w-7/12 md:w-5/12 text-center pb-10 mx-auto font-raleway font-bold"><span
                        class="text-custom-blue">Key Features </span>Of Our Butterfly Permitting System</h1>
                <div class="grid grid-flow-row md:grid-flow-col justify-items-center">
                    <div class="px-10 mt-10 md:mt-0">
                        <h1 class="text-xl mb-2 font-raleway font-bold flex items-center"><i
                                class='bx bx-check bx-sm text-[#4F85F0]'></i> Online Permit Application</h1>
                        <p class="px-6 text-[18px] w-full font-raleway text-[#3B393A]">Conveniently apply for butterfly
                            transport permits by filling out an online form and uploading required documents.</p>
                    </div>
                    <div class="px-10 mt-10 md:mt-0 md:border-l md:border-r md:border-gray-400">
                        <h1 class="text-xl mb-2 font-raleway font-bold flex items-center"><i
                                class='bx bx-check bx-sm text-[#4F85F0]'></i> Real-time Permit Status Tracking</h1>
                        <p class="px-6 text-[18px] w-full text-[#3B393A]">Track the progress of your permit application
                            in real-time, receiving updates and notifications along the way.</p>
                    </div>
                    <div class="px-10 mt-10 md:mt-0">
                        <h1 class="text-xl mb-2 font-raleway font-bold flex items-center"><i
                                class='bx bx-check bx-sm text-[#4F85F0]'></i> User-Friendly Interface</h1>
                        <p class="px-6 text-[18px] w-full text-[#3B393A]">Save valuable time with our efficient online
                            application process, avoiding the need for manual form filling and long waiting times.</p>
                    </div>
                </div>
            </div>
            <div>

                <div class="grid  md:grid-cols-3 ">
                    <div class="bg-[#023E8A] h-[350px] ">
                        <h1 class="w-8/12 mx-auto text-center font-raleway font-2xl text-4xl text-white mt-20">
                            Convenience</h1>
                        <div class="w-[97px] h-[10px] bg-white mx-auto mt-2"></div>
                        <p
                            class="opacity-0 hover:opacity-100 transition-all duration-300 delay-100 cursor-pointer ease-in  text-center text-white font-raleway font-regular w-9/12 mx-auto mt-6">
                            Ensure that your transportation of butterflies is in full compliance with local regulations
                            and legal requirements by obtaining the necessary permit through our system.</p>
                    </div>
                    <div class="bg-[#0096C7] h-[350px] ">
                        <h1 class="  mx-auto  text-center font-raleway font-2xl text-4xl text-white mt-20 ">Compliance
                            and Legality</h1>
                        <div class="w-[97px] h-[10px] bg-white mx-auto mt-2"></div>
                        <p
                            class="opacity-0 hover:opacity-100 transition-all duration-300 delay-100 cursor-pointer ease-in  text-center text-white font-raleway font-regular w-9/12 mx-auto mt-6">
                            Ensure that your transportation of butterflies is in full compliance with local regulations
                            and legal requirements by obtaining the necessary permit through our system.</p>

                    </div>
                    <div class="bg-[#48CAE4] h-[350px] ">
                        <h1 class="w-8/12 mx-auto text-center font-raleway font-2xl text-4xl text-white mt-20">Time
                            Efficiency</h1>
                        <div class="w-[97px] h-[10px] bg-white mx-auto mt-2"></div>
                        <p
                            class="opacity-0 hover:opacity-100 transition-all duration-300 delay-100 cursor-pointer ease-in  text-center text-white font-raleway font-regular w-9/12 mx-auto mt-6">
                            Save valuable time with our efficient online application process, avoiding the need for
                            manual form filling and long waiting times.</p>

                    </div>
                </div>
                <div class="bg-[#F2F3FB] py-10">
                    <h1 class="text-2xl md:text-4xl w-7/12 md:w-5/12 text-center pb-10 mx-auto font-raleway font-bold"><span
                            class="text-custom-blue">How to apply in </span> our Website</h1>
                    <div class="grid grid-flow-row md:grid-flow-col justify-items-center">
                        <div class="px-10 mt-10 md:mt-0">
                            <h1 class="text-xl text-[#023E8A] font-raleway font-bold flex items-center">01.</h1>
                            <h1 class="text-xl mb-2 font-raleway font-bold flex items-center"> Start An Application</h1>
                            <p class="text-[18px] w-full font-raleway text-[#3B393A]">Conveniently apply for butterfly
                                transport permits by filling out an online form and uploading required documents.</p>
                        </div>
                        <div class="px-10 mt-10 md:mt-0 md:border-l md:border-r md:border-gray-400">
                            <h1 class="text-xl text-[#023E8A] font-raleway font-bold flex items-center">02.</h1>
                            <h1 class="text-xl mb-2 font-raleway font-bold flex items-center"> Fill out the application form</h1>
                            <p class=" text-[18px] w-full text-[#3B393A]">Track the progress of your permit application
                                in real-time, receiving updates and notifications along the way.</p>
                        </div>
                        <div class="px-10 mt-10 md:mt-0">
                            <h1 class="text-xl text-[#023E8A] font-raleway font-bold flex items-center">03.</h1>
                            <h1 class="text-xl mb-2 font-raleway font-bold flex items-center">Submitting the application for review</h1>
                            <p class=" text-[18px] w-full text-[#3B393A]">Save valuable time with our efficient online
                                application process, avoiding the need for manual form filling and long waiting times.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-[#242424] w-full h-[739px]">
                    <h1 class="text-4xl w-11/12 md:w-4/12 text-center px-10 py-10 mx-auto font-raleway font-bold text-white"><span class="text-custom-blue">Local Butterfly Species </span>in Philippines</h1>
      
                    <div class="container flex justify-center items-center w-full mx-auto">
                        <div class="card-slider overflow-hidden">
                          <div class="cards flex transition-transform duration-300">
                            <div class="card flex-none w-[400px] mx-4 p-2 bg-gray-300 shadow-md rounded-lg">
                              <img src="{{asset('images/Butterfly-1.png')}}" alt="Image 1" class="w-full">
                            </div>
                            <div class="card flex-none w-[400px] mx-4 p-2 bg-gray-300 shadow-md  rounded-lg">
                              <img src="{{asset('images/Butterfly-2.png')}}" alt="Image 2" class="w-full">
                            </div>
                            <div class="card flex-none  w-[400px] mx-4 p-2 bg-gray-300 shadow-md  rounded-lg">
                              <img src="{{asset('images/Butterfly-3.png')}}" alt="Image 3" class="w-full">
                            </div>
                            <div class="card flex-none  w-[400px] mx-4 p-2 bg-gray-300 shadow-md rounded-lg">
                                <img src="{{asset('images/Butterfly-4.png')}}" alt="Image 3" class="w-full">
                            </div>
            
                            <div class="card flex-none  w-[400px] mx-4 p-2 bg-gray-300 shadow-md  rounded-lg">
                                <img src="{{asset('images/Butterfly-5.png')}}" alt="Image 3" class="w-full">
                            </div>
                            <div class="card flex-none  w-[400px] mx-4 p-2 bg-gray-300 shadow-md rounded-lg">
                                <img src="{{asset('images/Butterfly-6.png')}}" alt="Image 3" class="w-full">
                            </div>
            
                            <div class="card flex-none  w-[400px] mx-4 p-2 bg-gray-300 shadow-md  rounded-lg">
                                <img src="{{asset('images/Butterfly-7.png')}}" alt="Image 3" class="w-full">
                            </div>
            
                            <div class="card flex-none  w-[400px] mx-4 p-2 bg-gray-300 shadow-md  rounded-lg">
                                <img src="{{asset('images/Butterfly-8.png')}}" alt="Image 3" class="w-full">
                            </div>
            
                            <div class="card flex-none  w-[400px] mx-4 p-2 bg-gray-300 shadow-md  rounded-lg">
                                <img src="{{asset('images/Butterfly-9.png')}}" alt="Image 3" class="w-full">
                            </div>
                          </div>
                        </div>
                        <div class="flex justify-center mt-4">
                            <button id="prevButton" class="prev-button absolute left-0 md:mx-10  text-custom-blue font-bold py-2 px-4 rounded"><i class='bx bx-chevron-left bx-lg'></i></button>
                            <button id="nextButton" class="next-button absolute right-0 md:mx-10 text-custom-blue font-bold py-2 px-4 rounded"><i class='bx bx-chevron-right bx-lg'></i></i></button>
                          </div>
                      </div>
                    </div>
                </div>

               
             
        
                
       
        
        </div>
        <div class="bg-[#0096C7] h-[220px]">
            <div class="flex justify-between flex-col md:flex-row mx-auto w-9/12 py-24">
                <h1 class="text-white font-raleway font-bold text-lg md:text-5xl">JOIN OUR NEWSLETTER</h1>

                <form action="" class="flex ">                    
                    <input type="email" placeholder="Your Email Address" class="text-custom-dark-900  font-poppins font-bold p-2 sm:w-24 md:w-auto">
                    <button type="submit" class="font-poppins font-regular text-white bg-[#48CAE4] p-2 sm:w-full md:w-auto">Subscribe</button>
                </form>  
            </div>
                
        </div>
















        <footer class="bg-custom-dark-900 h-auto md:h-[500px]">
            <div class="grid grid-flow-row md:grid-cols-4">
                <div class="">
                    <h1 class="text-custom-blue font-semibold font-poppins text-4xl px-10 py-8">OFS<span class="text-white">PTS</span></h1>
                    <p class="text-white px-10">Welcome to OFSPTS, the premier online platform for butterfly enthusiasts, researchers, and conservationists. Our website provides a streamlined and convenient process for obtaining butterfly permits, ensuring compliance with regulations while promoting the conservation and study of these mesmerizing creatures.</p>
                    <ul class="px-10 mt-14 text-white">
                        <li class="mt-2"><i class='bx bx-current-location' ></i> MARINDUQUE, PH</li>
                        <li class="mt-2"><i class='bx bx-envelope' ></i>  wildlifebutterfly01@gmail.com</li>
                        <li class="mt-2"><i class='bx bx-phone-call' ></i> +64 203 123 324</li>
                    </ul>
                
                </div>

                <div class="">
                    <h1 class="text-white font-poppins text-2xl px-10 pt-8 ">LINKS</h1>
                    <div class="text-blue-500 w-[40px] h-[10px] "></div>
                    <ul class="px-6 py-8">
                        <li href="features" class="flex items-center mt-2 text-lg text-white"><i class='bx bx-chevron-right bx-sm text-[#0096C7]' ></i>Features</li>
                        <li href="#" class="flex items-center mt-2 text-lg text-white"><i class='bx bx-chevron-right bx-sm text-[#0096C7]' ></i>Contact Us!</li>
                        <li href="#" class="flex items-center mt-2 text-lg text-white"><i class='bx bx-chevron-right bx-sm text-[#0096C7]' ></i>Our Services</li>
                        <li href="#" class="flex items-center mt-2 text-lg text-white"><i class='bx bx-chevron-right bx-sm text-[#0096C7]' ></i>FAQs</li>
                        <li href="#" class="flex items-center mt-2 text-lg text-white"><i class='bx bx-chevron-right bx-sm text-[#0096C7]' ></i>My Butterfly</li>
                    </ul>

                  
                </div>

                <div class="">
                    <h1 class="text-white font-poppins text-2xl px-10 pt-8">AFFILIATED LINKS</h1>
                    <ul class="px-6 py-8">
                        <li class="flex items-center mt-2 text-white"><i class='bx bx-chevron-right bx-sm text-[#0096C7]' ></i>Office of the President</li>
                        <li class="flex items-center mt-2 text-white"><i class='bx bx-chevron-right bx-sm text-[#0096C7]' ></i>Office of the Vice President</li>
                        <li class="flex items-center mt-2 text-white"><i class='bx bx-chevron-right bx-sm text-[#0096C7]' ></i>Senate of the Philippines</li>
                        <li class="flex items-center mt-2 text-white"><i class='bx bx-chevron-right bx-sm text-[#0096C7]' ></i>Sandiganbayan</li>
                        <li class="flex items-center mt-2 text-white"><i class='bx bx-chevron-right bx-sm text-[#0096C7]' ></i>Supreme Court</li>
                        <li class="flex items-center mt-2 text-white"><i class='bx bx-chevron-right bx-sm text-[#0096C7]' ></i>Court of Appeals</li>
                    </ul>
                </div>

                <div class="">
                    <h1 class="text-white font-poppins text-2xl px-10 py-8">QUICK CONTACT</h1>
                    <p class="w-full px-10 text-white">You can contact us by using our contact number or email us below by using our email wildlifebutterfly01@gmail.com</p>
                    <form action="" method="" class="px-10 mt-4">
                        <input type="email" class="bg-[#494646] py-2 w-full rounded-md px-3 text-gray-200 placeholder:text-gray-200" placeholder="Email">
                        <textarea id="message" name="message" rows="4" cols="35" class="mt-2 w-full bg-[#494646] py-2 rounded-md px-3 text-gray-200 placeholder:text-gray-200" ondragstart="return false;" placeholder="Message"></textarea>
                        <button class="w-full bg-custom-blue mt-3 py-2 rounded-md">Send Message</button>
                      </form>
                      
                      
                </div>
            </div>

            
        
        
        </footer>

        <div class="bg-[#151618] h-[100px]">
            <div class="flex justify-start">
            <h1 class="text-custom-blue font-regular font-poppins text-2xl pl-10 py-8">OFS<span class="text-white">PTS</span></h1>
            <p class="text-lg text-white px-2 py-8">| ALL RIGHTS RESERVED  2023</p>  
            </div>
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

        const prevButton = document.getElementById("prevButton");
        const nextButton = document.getElementById("nextButton");
        const cards = document.querySelector(".cards");
        const cardWidth = 435; // Width of each card
        let translateX = 0;
        const numCards = document.querySelectorAll(".card").length;
        const totalWidth = cardWidth * numCards;

        prevButton.addEventListener("click", () => {
        translateX += cardWidth;
        if (translateX > 0) {
            translateX = -totalWidth + cardWidth;
        }
        cards.style.transform = `translateX(${translateX}px)`;
        });

        nextButton.addEventListener("click", () => {
        translateX -= cardWidth;
        if (translateX <= -totalWidth) {
            translateX = 0;
        }
        cards.style.transform = `translateX(${translateX}px)`;
        });



        
        
        
        
    </script>



   
</body>
</html>