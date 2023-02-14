
const btnmenu = document.querySelector(".iconmenu");
const listmenu = document.querySelector(".main-menu");
const btnclosemenu = document.querySelector(".menu-close");


btnmenu.onclick = () => {
  listmenu.classList.toggle("show-menu");
}

btnclosemenu.onclick = () => {
  listmenu.classList.toggle("show-menu");
}


$('main').click(function(){
  listmenu.classList.remove("show-menu");
});