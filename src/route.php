<?php
   require_once 'controller/Controller.php';
   require_once 'controller/AuthController.php';
   require_once 'controller/GaController.php';
   require_once 'controller/TuyenDuongController.php';
   require_once 'controller/TauController.php';
   require_once 'controller/LoaiToaController.php';
   require_once 'controller/ToaController.php';
   require_once 'controller/DatVeController.php';
   require_once 'controller/ChuyenTauController.php';
   require_once 'controller/NguoiDatChoController.php';
   require_once 'controller/KhachHangController.php';
   require_once 'controller/ketquatimve.php';
    $action = $_GET['action'] ?? 'index';
    $page = $_GET['page'] ?? 'base';
    $type = $_GET['type'] ?? '';
    (new ChuyenTauController)->checkChuyenTau();
     
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
                            (new TuyenDuongController)->index();
                            break;
                        case 'create':
                            (new TuyenDuongController)->create();
                            break;
                        case 'edit':
                            (new TuyenDuongController)->edit();
                            break;
                        case 'delete':
                            (new TuyenDuongController)->remove();
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
                case 'toa':
                    switch($action){
                        case 'index':
                            (new Controller)->menu_bar();
                            (new ToaController)->index();
                            break;
                        case 'create':
                            (new ToaController)->create();
                            break;
                        case 'edit':
                            (new ToaController)->edit();
                            break;
                        case 'delete':
                            (new ToaController)->remove();
                            break;
                    }
                    break;
                case 'chuyentau':
                    switch($action){
                        case 'index':
                            (new Controller)->menu_bar();
                            (new ChuyenTauController)->index();
                            break;
                        case 'create':
                            (new ChuyenTauController)->create();
                            break;
                        case 'edit':
                            (new ChuyenTauController)->edit();
                            break;
                        case 'delete':
                            (new ChuyenTauController)->remove();
                            break;
                    }
                    break;
                case 'nguoidatcho':
                    switch($action){
                        case 'index':

                            // mới sửa
                            (new Controller)->menu_bar();
                            (new NguoiDatChoController)->index();
                            break;
                        case 'create':
                            (new ChuyenTauController)->create();
                            break;
                        case 'edit':
                            (new ChuyenTauController)->edit();
                            break;
                        case 'delete':
                            (new ChuyenTauController)->remove();
                            break;
                    }
                    break;
                case 'khachhang':
                    switch($action){
                        case 'index':
                            // mới sửa
                            (new Controller)->menu_bar();
                            (new KhachHangController)->index();
                            break;
                        case 'create':
                            (new ChuyenTauController)->create();
                            break;
                        case 'edit':
                            (new ChuyenTauController)->edit();
                            break;
                        case 'delete':
                            (new ChuyenTauController)->remove();
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
           if($action != 'login' && $action != 'logout'){
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
                    case 'ketquatimve':
                        (new KetQuaTimVe)->index();
                        break;
		            case 'dienthongtin':
                        (new DatVeController)->dienthongtin();
                        break;
                    default:
                        (new Controller)->home();
                        break;
			    }
                (new Controller)->footer();
           }
           else {
                if($action == 'login'){
                    (new AuthController)->login();
                }
                else{
                    (new AuthController)->logout();
                }
           }
           break;
        default:
           (new Controller)->page_403();
           break;
	}
?> 

