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


/*Xóa thông tin*/
// const tab = document.querySelector('#myTable');

// tab.addEventListener('click', function(event) {
//   if (event.target.classList.contains('fa-trash')) {
//     if (confirm("Bạn có chắc muốn xóa dữ liệu này?")) {
//       const row = event.target.closest('tr');
//       row.remove();
//     } else {
//       event.stopPropagation(); // ngăn chặn hành động mặc định của sự kiện
//     }
//   }
// });

//Log out về admin
const themeSwitch = document.querySelector(".log");

themeSwitch.addEventListener("click", function() {
  window.location.replace("/controller/login.php");
});

























