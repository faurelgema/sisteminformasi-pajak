<?php
class Blok extends MasterModel {
    function __construct() {
        parent::__construct();
        $this->schema = [
            'id_blok' => 'primary:auto',
            'no_blok' => 'required:text:50',
            'id_keterangan_blok' => 'required:select:keterangan_blok|id_keterangan_blok|nama_keterangan_blok'
        ];
        $this->table = 'blok';
        $this->primaryKey = 'id_blok';
        $this->showFields = [            
            'id_blok' => 'ID',
            'no_blok' => 'NO. BLOK',
            'nama_keterangan_blok' => 'NAMA KET. BLOK'
        ];
    }

    function getAllData() {
        $query = "SELECT * FROM blok bl INNER JOIN keterangan_blok kb "
                . "ON bl.id_keterangan_blok = kb.id_keterangan_blok "                
                . "ORDER BY bl.id_blok DESC";
        return $this->db->query($query);
    }
}
?>