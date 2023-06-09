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
        public function menu_bar($page){
            include_once 'view/admin/menu_bar_admin.php';
        }
        public function dashboard_home(){
            include_once 'view/admin/dashboard_home.php';
        }
        public function page_403(){
            include 'view/403.html';
        }
    }
?>