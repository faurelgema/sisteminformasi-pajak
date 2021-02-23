<?php

class LoginController {
    function __construct() {
        $this->model = new Admin();
    }

    public function doLogin() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username && $password) {
            $hasilLogin = $this->model->login($username, $password);
            if($hasilLogin) {
                $_SESSION['admin'] = md5($username.$password);
                redirect('admin');
            } else {
                showAlert("danger:Login gagal!");
            }
        } else {
            showAlert("danger:Username dan password tidak boleh kosong!");
        }
    }

    public function doLogout() {
        session_destroy();
        redirect('login');
    }
}

?>