<?php
class Kasun extends MasterModel {
    function __construct() {
        parent::__construct();
        $this->schema = [
            'id_kasun' => 'auto',
            'nama_kasun' => 'required:text:50',
            'alamat_kasun' => 'required:textarea:200',
            'id_wilayah' => 'required:select:wilayah|id_wilayah|nama_wilayah'
        ];
        $this->table = 'kasun';
        $this->primaryKey = 'id_kasun';
        $this->showFields = [
            'id_kasun' => 'ID',
            'nama_kasun' => 'NAMA',
            'alamat_kasun' => 'ALAMAT',
            'nama_wilayah' => 'WILAYAH'
        ];
    }   
    function getAllData() {
        $query = "SELECT * FROM kasun k INNER JOIN wilayah w "
                . "ON k.id_wilayah = w.id_wilayah";
        return $this->db->query($query);
    }
}
?>