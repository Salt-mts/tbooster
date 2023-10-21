

// open and close notification
const notificationBtn = document.querySelector(".notify-btn")
const notificationBg = document.querySelector(".notification-dropdown-bg")
const notificationDropdwn = document.querySelector(".notification-dropdown")
notificationBtn.addEventListener("click", ()=>{
    notificationDropdwn.classList.toggle("hidden")
    if(notificationBg.classList.contains("hidden")){
        notificationBg.classList.remove("hidden")
    }else{
        notificationBg.classList.add("hidden")
    }
    
})
notificationBg.addEventListener("click", ()=>{
    notificationDropdwn.classList.add("hidden")
    notificationBg.classList.add("hidden")
})

// reponsive menu
const openMenu = document.querySelector(".open-menu")
const closeMenu = document.querySelector(".close-menu")
const sideMenu = document.querySelector(".dashboard__main__sidebar")

openMenu.addEventListener("click", ()=>{
    openMenu.classList.add("hidden")
    closeMenu.classList.remove("hidden")
    sideMenu.style.transform = `translateX(0)`
} )
closeMenu.addEventListener("click", ()=>{
    openMenu.classList.remove("hidden")
    closeMenu.classList.add("hidden")
    sideMenu.style.transform = `translateX(-350px)`
} )


