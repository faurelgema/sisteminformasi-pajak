<?php

class TransaksiController extends MasterController {
    function __construct() {
        parent::__construct();
        $this->model = new Transaksi();
        $this->modelPajak = new Pajak();
    }

    function getAllPajak() {
        $data_pajak = [];
        $data_transaksi = [];
        $data_total_transaksi = [];
        
        $get_data_pajak = $this->modelPajak->getAllData();
        while($pajak = $get_data_pajak->fetch_assoc()) {
            array_push($data_pajak, $pajak);
            
            $nop = $pajak['nop_pajak'];
            $data_transaksi[$nop] = [];
            $total_transaksi = 0;

            $temp_data_transaksi = $this->model->getWhere('nop_pajak', $nop);
            while($transaksi = $temp_data_transaksi->fetch_assoc()) {
                array_push($data_transaksi[$nop], $transaksi);
                $total_transaksi += $transaksi['total_transaksi'];
            }
            $data_total_transaksi[$nop] = $total_transaksi;
        }

        return [
            'data_pajak' => $data_pajak,
            'data_transaksi' => $data_transaksi,
            'data_total_transaksi' => $data_total_transaksi
        ];
    }
}