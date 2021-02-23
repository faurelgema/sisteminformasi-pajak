<?php
class Penduduk extends MasterModel {
    function __construct() {
        parent::__construct();
        $this->schema = [
            'nik_penduduk' => 'required:text:16',
            'nama_penduduk' => 'required:text:50',
            'alamat_penduduk' => 'required:textarea:200',
            'status_wajib_pajak_penduduk' => 'boolean'
        ];
        $this->table = 'penduduk';
        $this->primaryKey = 'nik_penduduk';
        $this->showFields = [            
            'nik_penduduk' => 'NIK',
            'nama_penduduk' => 'NAMA',
            'alamat_penduduk' => 'ALAMAT',
            'status_wajib_pajak_penduduk' => 'WAJIB PAJAK'            
        ];
    }    
}
?>