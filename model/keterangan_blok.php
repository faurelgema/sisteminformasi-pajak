<?php
class KeteranganBlok extends MasterModel {
    function __construct() {
        parent::__construct();
        $this->schema = [
            'id_keterangan_blok' => 'primary:auto',
            'nama_keterangan_blok' => 'required:text:200'            
        ];
        $this->table = 'keterangan_blok';
        $this->primaryKey = 'id_keterangan_blok';
        $this->showFields = [            
            'id_keterangan_blok' => 'ID',
            'nama_keterangan_blok' => 'NAMA KET. BLOK'
        ];
    }
}
?>