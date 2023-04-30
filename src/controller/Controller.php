<?php 
    class Controller{
        public function header(){
            include 'view/header.php';
        }
        public function footer(){
            include 'view/footer.php';
        }
        public function home(){
            include 'view/home.php';
        }
        public function trave(){
            include 'view/trave.php';
        }
        public function khuyenmai(){
            include 'view/khuyenmai.php';
        }
        public function lienhe(){
            include 'view/lienhe.php';
        }
        public function quydinhchung(){
            include 'view/quydinhchung.php';
        }
        public function thongtindatcho(){
            include 'view/thongtindatcho.php';
        }
        public function menu_bar(){
            include 'view/admin/menu_bar_admin.php';
        }
        public function dashboard_home(){
            include 'view/admin/dashboard_home.php';
        }
        public function page_403(){
            include 'view/403.html';
        }
    }
?>