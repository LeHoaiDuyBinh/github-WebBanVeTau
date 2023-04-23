// Chế độ sáng tối cho trang
let wholePage = document.getElementById('page_wrapper');
let btn = document.getElementById('nav_collapse_btn');


btn.addEventListener('click', collapse);

function collapse() {
  wholePage.classList.toggle('collapsed');
  if(wholePage.classList.contains('collapsed')){
    btn.innerHTML = "<i class='bx bxs-chevrons-right'></i>"; 
  } else {
    btn.innerHTML = "<i class='bx bxs-chevrons-left'></i>"; 
  } 
}

//   let darkMode = localStorage.getItem('dark_mode');
// var toggleBtn = document.querySelector('#theme_switch');

// const enableDarkMode = () => {
//   document.body.classList.add('dark_mode');
//   localStorage.setItem('darkMode', 'enabled');
//   console.log('enabled');
// }

// const disableDarkMode = () => {
//   document.body.classList.remove('dark_mode');
//   localStorage.setItem('darkMode', null);
//   console.log('null');
// }

// toggleBtn.addEventListener('click', ()=>{
//   darkMode = localStorage.getItem('darkMode');
  
//   if(darkMode !== 'enabled'){
//     enableDarkMode();
//   } else {
//     disableDarkMode();
//   }
// })

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
//     }
//   }
// });
const tab = document.querySelector('#myTable');

tab.addEventListener('click', function(event) {
  if (event.target.classList.contains('fa-trash')) {
    if (confirm("Bạn có chắc muốn xóa dữ liệu này?")) {
      const row = event.target.closest('tr');
      row.remove();
    } else {
      event.stopPropagation(); // ngăn chặn hành động mặc định của sự kiện
    }
  }
});



/*Chỉnh sửa thông tin*/

// const pencilIcons = document.querySelectorAll('.fa-pencil');

// pencilIcons.forEach(pencilIcon => {
//   // Lấy element table row cha của button pencil
//   const tableRow = pencilIcon.closest('tr');

//   // Lấy tất cả các element td của row
//   const tdElements = tableRow.querySelectorAll('td');

//   // Thêm sự kiện click vào button pencil
//   pencilIcon.addEventListener('click', () => {
//     // Hiển thị form để cập nhật thông tin
//     tdElements.forEach((tdElement) => {
//       // Tạo input mới để nhập giá trị mới
//       if (tdElement.getAttribute('data-label') !== "Period" && tdElement.getAttribute('data-label') !== "Account") {
//         const input = document.createElement('input');
//         input.type = 'text';
//         input.value = tdElement.textContent;
//         tdElement.innerHTML = '';
//         tdElement.appendChild(input);
//       }
//     });

//     // Thêm sự kiện enter để xác nhận cập nhật thông tin
//     document.addEventListener('keydown', (event) => {
//       if (event.key === 'Enter') {
//         const confirmUpdate = confirm('Bạn có muốn cập nhật thông tin không?');
//         if (confirmUpdate) {
//           // Cập nhật thông tin
//           tdElements.forEach((tdElement, index) => {
//             if (tdElement.getAttribute('data-label') !== "Period" && tdElement.getAttribute('data-label') !== "Account") {
//               const input = tdElement.querySelector('input');
//               const newValue = input.value;
//               const initialValue = initialTdValues[index];
//               if (newValue !== initialValue) {
//                 tdElement.textContent = newValue;
//               } else {
//                 tdElement.textContent = initialValue;
//               }
//               input.remove();
//             }
//           });
//         } else {
//           // Khôi phục lại giá trị ban đầu
//           tdElements.forEach((tdElement) => {
//             tdElement.querySelector('input').remove();
//           });
//           tdElements.forEach((tdElement, index) => {
//             tdElement.textContent = initialTdValues[index];
//           });
//         }
//       }
//     });
  
//     // Lưu lại giá trị ban đầu để phục hồi giá trị khi người dùng hủy cập nhật
//     const initialTdValues = [];
//     tdElements.forEach((tdElement) => {
//       initialTdValues.push(tdElement.textContent);
//     });
//   });
// });

//Log out về admin
const themeSwitch = document.querySelector(".log");

themeSwitch.addEventListener("click", function() {
  window.location.replace("./admin.html");
});



















