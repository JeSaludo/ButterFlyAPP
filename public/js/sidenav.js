function Menu(e){
    let list  = document.querySelector("#sidenav")
    e.name === 'menu' ? (e.name = "close", e.classList.add('text-white'), e.classList.add('fixed'), list.classList.add('opacity-100')) : (e.name = "menu", e.classList.remove('text-white'),e.classList.remove('fixed'), list.classList.remove('opacity-100'))
}