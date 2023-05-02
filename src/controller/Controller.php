<?php 
    class Controller{
        public function header(){
            include 'view/ticketing/header.php';
        }
        public function footer(){
            include 'view/ticketing/footer.php';
        }
        public function home(){
            include 'view/ticketing/home.php';
        }
        public function trave(){
            include 'view/ticketing/trave.php';
        }
        public function khuyenmai(){
            include 'view/ticketing/khuyenmai.php';
        }
        public function lienhe(){
            include 'view/ticketing/lienhe.php';
        }
        public function quydinhchung(){
            include 'view/ticketing/quydinhchung.php';
        }
        public function thongtindatcho(){
            include 'view/ticketing/thongtindatcho.php';
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