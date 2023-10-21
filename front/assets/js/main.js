const fyear = document.querySelector(".fyear")
date = new Date()
fyear.textContent = date.getFullYear()

const hamburger = document.querySelector(".menu-btn")
const menu = document.querySelector(".menu")
const menuBg = document.querySelector(".menu-bg")
const closeMenuBtn = document.querySelector(".close-menu")

hamburger.onclick = ()=>{
    openMenu()
}
closeMenuBtn.onclick = ()=>{
    closeMenu()
}
menuBg.onclick = ()=>{
    closeMenu()
}

function openMenu(){
    menu.classList.remove("d-none")
    menu.classList.add("slide-in-right")
    menuBg.classList.remove("d-none")
}
function closeMenu(){
    menu.classList.add("d-none")
    menu.classList.remove("slide-in-right")
    menuBg.classList.add("d-none")
}

// notify
const notify = document.querySelector(".notify")
function notifyUser(type, msg){
    notify.innerHTML= `
    <div class="alert alert-${type} alert-dismissible fade show" role="alert">
    ${msg}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    `
    notify.classList.add("slide-top")
}

// loader
const loader = document.querySelector(".loader-wrap")
function hideLoader(){
    loader.classList.add("d-none")
}
function showLoader(){
    loader.classList.remove("d-none")
}