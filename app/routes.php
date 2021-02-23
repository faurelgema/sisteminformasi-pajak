<?php

if(isset($_GET['page'])) {          
    $page = $_GET['page'];
    $is_admin = isset($_SESSION['admin']);

    //Membedakan layout untuk tamu dan admin
    if($is_admin) {        
        require_once("./view/layouts/admin.php");
    } else {            
        require_once("./view/layouts/guest.php");
    }   
    
    if(((strpos($page, 'admin') !== false) || (strpos($page, 'transaksi') !== false)) && !$is_admin) {    
        redirect('login');//Jika belum login, akan kembali ke halaman login
    } else if(strpos($page, 'login') !== false && $is_admin){        
        redirect('admin');//Jika sudah login, akan dibawa ke halaman admin
    } else {
        //Menentukan halaman mana yang akan dimuat
        switch($page) {
            case 'login':                
                require_once('./view/login.php'); break;
            case 'logout':
                $controller = new LoginController(); 
                $controller->doLogout();
                break;
            case 'admin':
                require_once('./view/admin/index.php'); break;
            case 'admin-master':
                require_once('./view/admin/master.php'); break; 
            case 'transaksi':
                require_once('./view/transaksi/index.php'); break;
            case 'laporan-bank':
                require_once('./view/laporan/index.php'); break;
            default:
                require_once('./view/index.php'); break;
        }
    }
} else {
    redirectUrl(getActualLink().'/si-pajak/?page=login');
}
?>