<?php

class Admin extends MasterModel {
    public function login($username, $password) {
        $password = md5($password);
        $query = "SELECT * FROM admin WHERE username_admin='$username' AND password_admin='$password'";        
        $hasil = $this->db->query($query);
        return $hasil->num_rows > 0;
    }
}
?>