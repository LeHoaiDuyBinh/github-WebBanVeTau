// Chế độ sáng tối cho trang
let darkMode = localStorage.getItem('dark_mode');
var toggleBtn = document.querySelector('#theme_switch');

const enableDarkMode = () => {
  document.body.classList.add('dark_mode');
  localStorage.setItem('dark_mode', 'enabled');
}

const disableDarkMode = () => {
  document.body.classList.remove('dark_mode');
  localStorage.setItem('dark_mode', 'disabled');
}

// Kiểm tra trạng thái chế độ tối mặc định
if (darkMode === 'enabled') {
  enableDarkMode(); 
} else {
  disableDarkMode();
}

toggleBtn.addEventListener('click', ()=>{
  darkMode = localStorage.getItem('dark_mode');
  
  if(darkMode === 'disabled'){
    enableDarkMode();
  } else {
    disableDarkMode();
  }
})

//Log out về admin
const themeSwitch = document.querySelector(".log");

themeSwitch.addEventListener("click", function() {
  window.location.replace("/?action=logout");
});

























