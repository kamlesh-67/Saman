// --------------------Pre Loader--------------
let preloader = document.getElementById("preloader");

window.addEventListener('load',()=>{
    preloader.style.display="none"
})

let menu_box = document.getElementById("menu")
// menu_box.style.right = "-200px"

function menu(){
    menu_box.style.right = "0px";
    console.log("clicked")
}

function cross(){
    menu_box.style.right = '-300px';
    // menu_box.style.opacity = '0';

}