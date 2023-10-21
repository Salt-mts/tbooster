







// my modal
const jobPass = document.querySelector(".buy-jobpass")
const myModal = document.querySelector(".my-modal")
const myModalBg = document.querySelector(".my-modal-bg")
const closeMyModalBtn = document.querySelector(".close-my-modal")

jobPass.onclick = ()=>{
    openMyModal()
}
closeMyModalBtn.onclick = ()=>{
    closeMyModal()
}
myModalBg.onclick = ()=>{
    closeMyModal()
}


function openMyModal(){
    myModal.classList.remove("d-none")
    myModal.classList.add("puff-in-center")
    myModalBg.classList.remove("d-none")
}
function closeMyModal(){
    myModal.classList.add("d-none")
    myModal.classList.remove("puff-in-center")
    myModalBg.classList.add("d-none")
}