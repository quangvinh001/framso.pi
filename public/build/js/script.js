const body = document.querySelector("body"),
      modeToggle = body.querySelector(".mode-toggle");
      sidebar = body.querySelector("nav");
      sidebarToggle = body.querySelector(".sidebar-toggle"),
      leftSide = document.querySelector('.sidebar');
let getMode = localStorage.getItem("mode");
if(getMode && getMode ==="dark"){
    body.classList.toggle("dark");
}

let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    sidebar.classList.toggle("close");
}

modeToggle.addEventListener("click", () =>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        localStorage.setItem("mode", "dark");
    }else{
        localStorage.setItem("mode", "light");
    }
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    }else{
        localStorage.setItem("status", "open");
    }
    const sidebarItem = leftSide.querySelectorAll('li.showMenu');
    Array.from(sidebarItem).forEach((item) => {
        item.classList.remove('showMenu');
    })
})

const sidebarItem = leftSide.querySelectorAll('li');
Array.from(sidebarItem).forEach((item) => {
    item.addEventListener('click', () => {
        const subMenu = item.querySelector('.sub-menu');
        if (!subMenu) return;
        item.classList.toggle("showMenu");
    })
})