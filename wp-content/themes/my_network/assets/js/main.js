
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




(function () {

  /**
   * Main stopscrollwheelzoom constructor
   */
  let SSWZ = function () {

      /**
       * Handler for scroll- control must be pressed.
       * @param e
       */
      this.keyScrollHandler = function (e) {
          if (e.ctrlKey) {
              e.preventDefault();
              return false;
          }
      }
  };

  if (window === top) {
      let sswz = new SSWZ();
      window.addEventListener('wheel', sswz.keyScrollHandler, { passive: false });
  }

})();