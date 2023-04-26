<?php
    if(isset($_GET['action'])){        
        if($_GET['action'] != 'login'){
            require_once './view/header.php';
            switch($_GET['action']){
                case 'trave':
                    require './view/trave.php';
                    break;
                case 'thongtindatcho':
                    require './view/thongtindatcho.php';
                    break;
                case 'khuyenmai':
                    require './view/khuyenmai.php';
                    break;
                case 'quydinhchung':
                    require './view/quydinhchung.php';
                    break;
                case 'lienhe':
                    require './view/lienhe.php';
                    break;
                default:
                    require './view/home.php';
                    break;
            }
             require_once './view/footer.php';
        }
        else {
            header("Location: /view/admin/login.html");
        }
    }
    else {
        require_once './view/header.php';
        require './view/home.php';
        require_once './view/footer.php';
    }
?> 

