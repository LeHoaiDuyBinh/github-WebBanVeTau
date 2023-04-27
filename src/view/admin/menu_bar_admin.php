<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
	
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/view/css/dashboard.css">
    
</head>
<body>


<div id="page_wrapper">
  <div id="sidenav" class="sidenav">
    <div class="sidenav_header">
      <div class="logo_section">
        
        <h3>PTIT-Train</h3>
      </div>
      
      <a href="?type=admin&page=ga" class="sidenav_link active">
        <i class='bx bx-home'></i>
        <h3>Ga</h3>
      </a>
      
      <a href="?type=admin&page=tuyenduong" class="sidenav_link">
        <i class='bx bx-briefcase'></i>
        <h3>Tuyến đường</h3>
      </a>
      
      <a href="?type=admin&page=toa" class="sidenav_link">
        <i class='bx bx-cable-car'></i>
        <h3>Toa</h3>
      </a>

      <a href="?type=admin&page=loaitoa" class="sidenav_link">
        <i class='bx bx-file'></i>
        <h3>Loại toa</h3>
      </a>

      <a href="?type=admin&page=tau" class="sidenav_link">
        <i class='bx bx-train'></i>
        <h3>Tàu</h3>
      </a>
      
      <a href="?type=admin&page=chuyentau" class="sidenav_link">
        <i class='bx bx-calendar'></i>
        <h3>Chuyến tàu</h3>
      </a>

      <a href="?type=admin&page=bangve" class="sidenav_link">
        <i class='bx bx-receipt'></i>
        <h3>Bảng vé</h3>
      </a>

    </div>
    <div class="sidenav_footer">
      <a href="?type=admin&page=lienhe_admin" class="sidenav_link">
        <i class='bx bx-rocket'></i>
        <h3>Liên hệ</h3>
      </a>
    </div>
    
      <button id="nav_collapse_btn">
        <i class='bx bxs-chevrons-left'></i>
      </button>
    </div>