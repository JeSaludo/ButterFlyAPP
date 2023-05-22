const sidebar = document.querySelector(".sidebar");
const toggle = document.querySelector(".toggle");
const sideText = document.querySelectorAll(".text");
const home = document.querySelector(".main");
toggle.addEventListener("click", ()=> {
    sidebar.classList.toggle('w-72');
    for (var i = 0; i < sideText.length; i++) {
        sideText[i].classList.toggle("opacity-0"); 
    }
    if(sidebar.classList.contains('w-72')){
        
        home.classList.add('home');
        home.classList.remove('home-close');
    }
    else{
       
        home.classList.remove('home');
        home.classList.add('home-close');
    }
})

function checkSidebarWidth() {
    const windowWidth = window.innerWidth;
    if (windowWidth <= 768) {
        sidebar.classList.toggle('w-72');
        for (var i = 0; i < sideText.length; i++) {
            sideText[i].classList.add("opacity-0"); 
        }
      sidebar.classList.remove("w-72");
      home.classList.remove("home");
      home.classList.add("home-close");
    }
  }
  
  // Check sidebar width on initial page load
  checkSidebarWidth();
  
  // Listen for window resize event
  window.addEventListener("resize", checkSidebarWidth);