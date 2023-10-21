const preLoader = document.querySelector(".preloader")
const selection = document.querySelector(".selection")
const selectBoxes = document.querySelectorAll(".select-box")

window.addEventListener("load", ()=>{
    hidePreLoader()
    selection.classList.add("puff-in-center")
})

selectBoxes.forEach(selectBox => {
    selectBox.onmouseover = ()=>{
        selectBox.classList.add("scale-up-center")
    }
    selectBox.onmouseout = ()=>{
        selectBox.classList.remove("scale-up-center")
    }
    selectBox.onclick = ()=>{
        selectBox.classList.add("slide-out-blurred-top")
    }
});

function hidePreLoader(){
    preLoader.classList.add("d-none")
}
function showPreLoader(){
    preLoader.classList.remove("d-none")
}