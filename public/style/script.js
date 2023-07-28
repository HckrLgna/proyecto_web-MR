let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
  arrow[i].addEventListener("click", (e)=>{
 let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
 arrowParent.classList.toggle("showMenu");
  });
}

let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");
//console.log(sidebarBtn);
sidebarBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("close");
});


changeTheme = function(){
  var css = document.getElementById("theme");
    console.log(css)
  var btnTheme = document.getElementById("btn-change-theme");
  var menuMode = document.getElementById("menu-mode");
  var bootMode = document.getElementById("usuarios");
  fileName = css.getAttribute("href");
    console.log(fileName)
  if(fileName == "style/dark.css"){
      css.setAttribute("href", "style/light.css");
      btnTheme.innerHTML = '<i class="fas fa-moon"></i><span class="link_name">Night</span>';
      menuMode.innerHTML = '<li><a class="link_name" href="#">Night</a></li>';
      bootMode.setAttribute("data-bs-theme", "light");
  }else{
      css.setAttribute("href", "style/dark.css");
      btnTheme.innerHTML = '<i class="fas fa-sun"></i><span class="link_name">Light</span>';
      menuMode.innerHTML = '<li><a class="link_name" href="#">Light</a></li>';
      bootMode.setAttribute("data-bs-theme", "dark");
  }
}
var changeThemeAuto = () => {
    let day = new Date();
    var hour = day.getHours();
    var css = document.getElementById("theme");
    var btnTheme = document.getElementById("btn-change-theme");
    var menuMode = document.getElementById("menu-mode");

    /**               MODIFICAR ***/
    var bootMode = document.getElementById("usuarios");

    fileName = css.getAttribute("href");
    console.log(hour);
    if (hour>=8 && hour<18) {
        css.setAttribute("href", "style/light.css");
        btnTheme.innerHTML = '<i class="fas fa-moon"></i><span class="link_name">Night</span>';
        menuMode.innerHTML = '<li><a class="link_name" href="#">Night</a></li>';

        /**               MODIFICAR ***/
        bootMode.setAttribute("data-bs-theme", "light");

    } else {
        css.setAttribute("href", "style/dark.css");
        btnTheme.innerHTML = '<i class="fas fa-sun"></i><span class="link_name">Light</span>';
        menuMode.innerHTML = '<li><a class="link_name" href="#">Light</a></li>';

        /**               MODIFICAR ***/
        bootMode.setAttribute("data-bs-theme", "dark");
    }
}
let btnTheme = document.getElementById("btn-change-theme");
btnTheme.addEventListener("click", changeTheme);
//changeThemeAuto()
