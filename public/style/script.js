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
  var btnTheme = document.getElementById("btn-change-theme");
  var menuMode = document.getElementById("menu-mode");

  fileName = css.getAttribute("href");
  if(fileName == "style/dark.css"){
      css.setAttribute("href", "style/light.css");
      btnTheme.innerHTML = '<i class="fas fa-moon"></i><span class="link_name">Night</span>';
      menuMode.innerHTML = '<li><a class="link_name" href="#">Night</a></li>';
  }else{
      css.setAttribute("href", "style/dark.css");
      btnTheme.innerHTML = '<i class="fas fa-sun"></i><span class="link_name">Light</span>';
      menuMode.innerHTML = '<li><a class="link_name" href="#">Light</a></li>';
  }
}

let btnTheme = document.getElementById("btn-change-theme");
btnTheme.addEventListener("click", changeTheme);