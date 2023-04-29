<?php
   require_once 'controller/AuthController.php';
   
   if (isset($_GET['action']) && $_GET['action'] == 'login') {
       (new AuthController)->login();
       exit();
   }
   
   $publicPages = ['home', 'trave', 'thongtindatcho', 'khuyenmai', 'quydinhchung', 'lienhe'];
   $adminPages = ['ga', 'bangve', 'chuyentau', 'lienhe_admin', 'loaitoa', 'tau', 'toa', 'tuyenduong'];
   
   if (isset($_GET['type']) && $_GET['type'] == 'admin') {
           require_once 'view/admin/menu_bar_admin.php';
       if (isset($_GET['page']) && in_array($_GET['page'], $adminPages)) {
           require_once "view/admin/dashboard_{$_GET['page']}.php";
       } else {
           require_once 'view/admin/dashboard_home.php';
       }
   } else {
        require_once 'view/header.php';
       if (isset($_GET['page']) && in_array($_GET['page'], $publicPages)) {
           require_once "view/{$_GET['page']}.php";
       } else {
           require_once 'view/home.php';
       }
       require_once 'view/footer.php';
   }
   
?> 

