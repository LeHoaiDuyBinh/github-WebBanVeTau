<?php
    if(isset($_GET['type'])){
        if($_GET['type'] == 'admin'){
            if(isset($_GET['page'])){
                require_once './view/admin/menu_bar_admin.php';
                switch($_GET['page']){
                    case 'ga':
                        require './view/admin/dashboard_ga.php';
                        break;
                    case 'bangve':
                        require './view/admin/dashboard_bangve.php';
                        break;
                    case 'chuyentau':
                        require './view/admin/dashboard_chuyentau.php';
                        break;
                    case 'lienhe_admin':
                        require './view/admin/dashboard_lienhe.php';
                        break;
                    case 'loaitoa':
                        require './view/admin/dashboard_loaitoa.php';
                        break;
                    case 'tau':
                        require './view/admin/dashboard_tau.php';
                        break;
                    case 'toa':
                        require './view/admin/dashboard_toa.php';
                        break;
                    case 'tuyenduong':
                        require './view/admin/dashboard_tuyenduong.php';
                        break;
                    case 'home':
                        require './view/admin/dashboard_home.php';
                        break;
                    default:
                        require './view/admin/dashboard_ga.php';
                        break;
                }
            }
            else {
                require_once './view/admin/menu_bar_admin.php';
                require './view/admin/dashboard_ga.php';
            }
        }
        else {
            require_once './view/admin/menu_bar_admin.php';
            require './view/admin/dashboard_ga.php';
        }
    }
        else{
            if(isset($_GET['page'])) {
                if($_GET['page'] != 'login') {
                    require_once './view/header.php';
                        switch($_GET['page']){
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
                        require './view/admin/login.html';
                    }
            }
            else {
                require_once './view/header.php';
                require './view/home.php';
                require_once './view/footer.php';
            }
        }
?> 

