<?php
class Pajak extends MasterModel {
    function __construct() {
        parent::__construct();
        $this->schema = [
            'nop_pajak' => 'required:text:100',
            'nik_penduduk' => 'required:select:penduduk|nik_penduduk|nama_penduduk',            
            'id_blok' => 'required:select:blok|id_blok|no_blok',
            'jatuh_tempo' => 'required:date',
            'tahun_pajak' => 'required:number:4',
            'total_pajak' => 'required:number:10',                  
            'id_kasun_penarik_pajak' => 'required:select:kasun|id_kasun|nama_kasun',
            'objek_pajak' => 'required:textarea:1000'
        ];
        $this->table = 'pajak';
        $this->primaryKey = 'nop_pajak';
        $this->showFields = [
            'nop_pajak' => 'NOMOR OPERASIONAL PEMBAYARAN',
            'nik_penduduk' => 'NIK',
            'nama_penduduk' => 'NAMA',
            'no_blok' => 'BLOK',
            'jatuh_tempo' => 'JATUH TEMPO',
            'tahun_pajak' => 'TAHUN PAJAK',
            'total_pajak' => 'TOTAL',
            'objek_pajak' => 'OBJEK PAJAK',
            'id_kasun_penarik_pajak' => 'KASUN'
        ];
    }   
    function getAllData() {
        $query = "SELECT * FROM pajak pj INNER JOIN penduduk pd "
                . "ON pd.nik_penduduk = pj.nik_penduduk "
                . "INNER JOIN kasun ks ON pj.id_kasun_penarik_pajak = ks.id_kasun "
                . "INNER JOIN blok bl ON pj.id_blok = bl.id_blok "
                . "ORDER BY jatuh_tempo DESC";
        return $this->db->query($query);
    }

    function getAllLaporan($mulai_tanggal, $sampai_tanggal) {      
        $query = "SELECT pj.*, bl.*, ks.*, pd.*, IFNULL(x.total, 0) as total_transaksi FROM pajak pj INNER JOIN penduduk pd "
        . "ON pd.nik_penduduk = pj.nik_penduduk "
        . "INNER JOIN kasun ks ON pj.id_kasun_penarik_pajak = ks.id_kasun "
        . "INNER JOIN blok bl ON pj.id_blok = bl.id_blok "
        . "LEFT JOIN (SELECT SUM(total_transaksi) as total, nop_pajak FROM transaksi GROUP BY nop_pajak) x "
        . "ON pj.nop_pajak = x.nop_pajak "
        . "WHERE jatuh_tempo >= '$mulai_tanggal' AND jatuh_tempo <= '$sampai_tanggal' "
        . "ORDER BY jatuh_tempo DESC";        
        return $this->db->query($query);
    }
}
?>