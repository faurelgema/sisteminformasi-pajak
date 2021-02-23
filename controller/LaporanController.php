<?php

class LaporanController extends MasterController {
    function __construct() {
        parent::__construct();        
        $this->modelPajak = new Pajak();
    }

    function getAllLaporan() {
        if(isset($_GET['mulai-tanggal']) && isset($_GET['sampai-tanggal'])) {
            $mulai_tanggal = $_GET['mulai-tanggal'];
            $sampai_tanggal = $_GET['sampai-tanggal'];

            if($mulai_tanggal && $sampai_tanggal) {
                return $this->modelPajak->getAllLaporan($mulai_tanggal, $sampai_tanggal);
            }            
        }
        return null;
    }
}