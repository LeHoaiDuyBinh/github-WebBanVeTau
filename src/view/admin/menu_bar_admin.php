<?php
  session_start();

  // Kiểm tra xem phiên đăng nhập đã được thiết lập hay chưa
  if (!isset($_SESSION['login_id']) ||!isset($_SESSION['ChucVu'])) {
      // Phiên đăng nhập không tồn tại hoặc không hợp lệ, chuyển hướng đến trang đăng nhập
      header('Location: /login.php');
      exit;
  }

  if(isset($_SESSION['ChucVu']) && $_SESSION['ChucVu'] == 'Admin' && $page == 'user'){
    header('Location: /?type=admin&page=home_admin');
      exit;
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">

	<link rel="shortcut icon" type="image/png" href="./view/image/PTITIcon.png">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.js"></script>
  <link rel="stylesheet" href="https://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.css"></link>
  <link rel="stylesheet" href="https://unpkg.com/sweetalert2@11.0.0/dist/sweetalert2.min.css">
  <script src="https://unpkg.com/sweetalert2@11.0.0/dist/sweetalert2.min.js"></script>
  <link href="https://unpkg.com/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://unpkg.com/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/view/css/dashboard.css">
    	<link rel="stylesheet" href="/view/css/train.css">
</head>
<body>


<div id="page_wrapper">
  <div id="sidenav" class="sidenav">
    <div class="sidenav_header">
      <div class="logo_section">
        
        <h3>PTIT-Train</h3>
      </div>

      <a href="?type=admin&page=home_admin" class="sidenav_link home">
        <i class='bx bx-home'></i>
        <h3>Home</h3>
      </a>
      
      <a href="?type=admin&page=ga" class="sidenav_link ga">
        <i class='bx bx-home'></i>
        <h3>Ga</h3>
      </a>
      
      <a href="?type=admin&page=tuyenduong" class="sidenav_link tuyenduong">
        <i class='bx bx-briefcase'></i>
        <h3>Tuyến đường</h3>
      </a>
      
      <a href="?type=admin&page=toa" class="sidenav_link toa">
        <i class='bx bx-cable-car'></i>
        <h3>Toa</h3>
      </a>

      <a href="?type=admin&page=loaitoa" class="sidenav_link loaitoa">
        <i class='bx bx-file'></i>
        <h3>Loại toa</h3>
      </a>

      <a href="?type=admin&page=tau" class="sidenav_link tau">
        <i class='bx bx-train'></i>
        <h3>Tàu</h3>
      </a>
      
      <a href="?type=admin&page=chuyentau" class="sidenav_link chuyentau">
        <i class='bx bx-calendar'></i>
        <h3>Chuyến tàu</h3>
      </a>

      <!-- mới thêm chưa có hiệu ứng trên navbar -->
      <a href="?type=admin&page=nguoidatcho" class="sidenav_link nguoidatcho">
        <i class='bx bx-receipt'></i>
        <h3>Người đặt chổ</h3>
      </a>

      <a href="?type=admin&page=khachhang" class="sidenav_link khachhang">
        <i class='bx bx-receipt'></i>
        <h3>Khách hàng</h3>
      </a>


      <a href="?type=admin&page=user" class="sidenav_link user">
        <i class='bx bx-receipt'></i>
        <h3>User</h3>
      </a>

      <a href="?type=admin&page=bangve" class="sidenav_link bangve">
        <i class='bx bx-receipt'></i>
        <h3>Bảng vé</h3>
      </a>

    </div>
    <div class="sidenav_footer">
      <a href="?type=admin&page=lienhe" class="sidenav_link lienhe">
        <i class='bx bx-rocket'></i>
        <h3>Liên hệ</h3>
      </a>
  </div>
    
      <button id="nav_collapse_btn">
        <i class='bx bxs-chevrons-left'></i>
      </button>
</div>
    
    
<script>
//Mở rộng hoặc thu hẹp bảng
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
</script>
