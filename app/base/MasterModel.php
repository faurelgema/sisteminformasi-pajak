<?php

abstract class MasterModel {
    
    public $schema;
    public $table;
    public $primaryKey;

    function __construct() {
        $this->initDB();
    }

    private function initDB() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "skripsipajak";
        //Membuat koneksi baru ke database
        $db = new mysqli($servername, $username, $password, $database);
        //Mengecek apakah koneksi ke database berhasil
        if ($db->connect_error) {
            die("Koneksi ke database gagal. Cek folder app/database/db.php mungkin anda salah memasukkan username dan password mysql." . $conn->connect_error);
        }
        $this->db = $db;
    }

    function getAllData() {
        $query = "SELECT * FROM $this->table";
        return $this->db->query($query);
    }

    function getOneData($id) {
        $query = "SELECT * FROM $this->table WHERE ".$this->primaryKey."='$id'";
        $result = mysqli_query($this->db, $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public function insert($data) {
        $query = "INSERT INTO {$this->table} VALUES (";
        foreach($this->schema as $field=>$rule) {
            if(stringContains($rule, 'auto')) {
                $query .= "NULL,";
            } else {
                $query .= "'{$data[$field]}',";                
            }
        }        
        $query = rtrim($query , ',');
        $query .= ")";        
        $action = $this->db->query($query);        
        if($this->db->error) {
            showAlert($this->db->error);
        }        
        return  $action === TRUE;        
    }

    public function update($data) {
        $query = "UPDATE {$this->table} SET ";
        foreach($this->schema as $field=>$rule) {
            if(!stringContains($rule, 'auto')) {
                $query .= "$field='{$data[$field]}',";
            }
        }
        $query = rtrim($query , ',');
        $query .= " WHERE $this->primaryKey='{$data[$this->primaryKey]}'";
        $action = $this->db->query($query);        
        if($this->db->error) {
            showAlert($this->db->error);
        }        
        return  $action === TRUE;        
    }

    

    public function delete($id) {
        $query = "DELETE FROM ".$this->table." WHERE ".$this->primaryKey."='$id'";
        $action = $this->db->query($query);        
        if($this->db->error) {
            showAlert($this->db->error);
        }        
        return  $action === TRUE;
    }

    public function getWhere($field, $value) {
        $query = "SELECT * FROM ".$this->table." WHERE $field='$value'";
        return $this->db->query($query);
    }
}

?>