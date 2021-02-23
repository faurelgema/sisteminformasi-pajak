<?php
class Transaksi extends MasterModel {
    function __construct() {
        parent::__construct();
        $this->schema = [
            'id_transaksi' => 'auto',
            'tgl_transaksi' => 'date',
            'total_transaksi' => 'required:number:20',
            'catatan_transaksi' => 'required:textarea:200',
            'nop_pajak' => 'foreign:pajak|nop_pajak'
        ];
        $this->table = 'transaksi';
        $this->primaryKey = 'id_transaksi';
        $this->showFields = [            
            'id_transaksi' => 'NO. TRANSAKSI',
            'tgl_transaksi' => 'TGL. TRANSAKSI',
            'total_transaksi' => 'TOTAL',
            'catatan_transaksi' => 'CATATAN',
            'nop_pajak' => 'NOP.'
        ];
    }    
}
?>