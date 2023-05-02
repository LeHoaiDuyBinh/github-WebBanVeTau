<?php
   require_once 'controller/Controller.php';
   require_once 'controller/AuthController.php';
   require_once 'controller/GaController.php';
   require_once 'controller/TuyenController.php';
   require_once 'controller/TauController.php';
   require_once 'controller/LoaiToaController.php';
   
//    if (isset($_GET['action']) && $_GET['action'] == 'login') {
//        (new AuthController)->login();
//     //    $a = "AuthController";
//     //    $b = "login";
//     //    (new $a)->$b();
//        exit();
//    }
   
//    $publicPages = ['home', 'trave', 'thongtindatcho', 'khuyenmai', 'quydinhchung', 'lienhe'];
//    $adminPages = ['ga', 'bangve', 'chuyentau', 'lienhe', 'loaitoa', 'tau', 'toa', 'tuyenduong'];
   
//    if (isset($_GET['type']) && $_GET['type'] == 'admin') {
//            require_once 'view/admin/menu_bar_admin.php';
//        if (isset($_GET['page']) && in_array($_GET['page'], $adminPages)) {
//            require_once "view/admin/dashboard_{$_GET['page']}.php";
//        } else {
//            require_once 'view/admin/dashboard_home.php';
//        }
//    } else {
//         require_once 'view/header.php';
//        if (isset($_GET['page']) && in_array($_GET['page'], $publicPages)) {
//            require_once "view/{$_GET['page']}.php";
//        } else {
//            require_once 'view/home.php';
//        }
//        require_once 'view/footer.php';
//    }

    $action = $_GET['action'] ?? 'index';
    $page = $_GET['page'] ?? 'base';
    $type = $_GET['type'] ?? '';

    switch($type){
		case 'admin':
			switch($page){
				case 'base':
					(new Controller)->menu_bar();
					(new Controller)->dashboard_home();
					break;
				case 'ga':
					switch($action){
						case 'index':
                            (new Controller)->menu_bar();
							(new GaController)->index();
							break;
						case 'create':
							(new GaController)->create();
							break;
                        case 'edit':
                            (new GaController)->edit();
                            break;
                        case 'delete':
                            (new GaController)->remove();
                            break;
					}
                    break;
                case 'tuyenduong':
                    switch($action){
                        case 'index':
                            (new Controller)->menu_bar();
                            (new TuyenController)->index();
                            break;
                        case 'create':
                            (new TuyenController)->create();
                            break;
                        case 'edit':
                            (new TuyenController)->edit();
                            break;
                        case 'delete':
                            (new TuyenController)->remove();
                            break;
                    }
                    break;    
                case 'tau':
                    switch($action){
                        case 'index':
                            (new Controller)->menu_bar();
                            (new TauController)->index();
                            break;
                        case 'create':
                            (new TauController)->create();
                            break;
                        case 'edit':
                            (new TauController)->edit();
                            break;
                        case 'delete':
                            (new TauController)->remove();
                            break;
                    }
                    break;
                case 'loaitoa':
                    switch($action){
                        case 'index':
                            (new Controller)->menu_bar();
                            (new LoaiToaController)->index();
                            break;
                        case 'create':
                            (new LoaiToaController)->create();
                            break;
                        case 'edit':
                            (new LoaiToaController)->edit();
                            break;
                        case 'delete':
                            (new LoaiToaController)->remove();
                            break;
                    }
                    break;    
                default:
                    (new Controller)->menu_bar();
                    (new Controller)->dashboard_home();
                    break;
			}
            break;
		case '':
           if($action != 'login'){
                (new Controller)->header();
			    switch($page){
				    case 'base':
					    (new Controller)->home();
					    break;
				    case 'lienhe':
					    (new Controller)->lienhe();
					    break;
                    case 'trave':
                        (new Controller)->trave();
                        break;
                    case 'khuyenmai':
                        (new Controller)->khuyenmai();
                        break;
                    case 'quydinhchung':
                        (new Controller)->quydinhchung();
                        break;
                    case 'thongtindatcho':
                        (new Controller)->thongtindatcho();
                        break;
                    default:
                        (new Controller)->home();
                        break;
			    }
                (new Controller)->footer();
           }
           else {
                (new AuthController)->login();
                exit();
           }
           break;
        default:
           (new Controller)->page_403();
           break;
	}
   
?> 

