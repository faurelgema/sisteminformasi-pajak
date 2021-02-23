<?php
class Wilayah extends MasterModel {
    function __construct() {
        parent::__construct();
        $this->schema = [
            'id_wilayah' => 'primary:auto',
            'nama_wilayah' => 'required:text:50',
            'pajak_bumi' => 'required:number:10',
            'pajak_bangunan' => 'required:number:10',
            'tahun' => 'required:number:4'
        ];
        $this->table = 'wilayah';
        $this->primaryKey = 'id_wilayah';
        $this->showFields = [            
            'id_wilayah' => 'ID',
            'nama_wilayah' => 'NAMA',
            'pajak_bumi' => 'PAJAK BUMI',
            'pajak_bangunan' => 'PAJAK BANGUNAN',
            'tahun' => 'TAHUN'
        ];
    }
}
?>