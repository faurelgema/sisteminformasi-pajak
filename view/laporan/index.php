<?php
    $controller = new LaporanController();
    $laporan = $controller->getAllLaporan();        
?>

<style>
@media print{
   printed-div{
       display:block;
   }
   .logo-print{
       width:100px;
       height:100px;
       display: list-item;
       list-style-image: url(./assets/img/logo.png);
       list-style-position: inside;
   }
}
</style>

<div class="container" style="padding: 20px;">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    LAPORAN BANK
                </div>
                <div class="card-body">
                  <div class="container">
                    <form action="<?php url('laporan-bank') ?>" method="get">
                      <input type="hidden" name="page" value="laporan-bank">
                      <div class="row">
                        <div class="col-3">
                          <div class="form-group">
                            <label>MULAI TANGGAL</label>
                            <input type="date" class="form-control" name="mulai-tanggal" value="<?php if(isset($_GET['mulai-tanggal'])) { echo $_GET['mulai-tanggal']; } else { echo ''; } ?>" required>
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="form-group">
                            <label>SAMPAI TANGGAL</label>
                            <input type="date" class="form-control" name="sampai-tanggal" value="<?php if(isset($_GET['sampai-tanggal'])) { echo $_GET['sampai-tanggal']; } else { echo ''; } ?>" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-3">
                          <button type="submit" class="btn btn-primary">TAMPILKAN</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="container">
                    <div class="row">
                      <div class="col-12 align-right">
                        <button type="button" class="btn btn-success float-right" onclick="printArea('#table-laporan-bank')">PRINT</button>
                      </div>
                    </div>
                  </div>
                  <div id="table-laporan-bank" class="container printed-div" style="margin-top: 18px;">
                    <div class="row" style="margin-bottom: 18px;">
                      <div class="col-2">
                        <img class="logo-print" width="100" height="100" src="./assets/img/logo.png"/>
                      </div>
                      <div class="col-10">
                        <h2>KANTOR DESA WANGUNSARI</h2>
                        <p>Jl UTAMA Kp. Wangunsari, Kecamatan Lembang, Kabupaten Bandung Barat</p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>NAMA</th>
                              <th>NOMOR OPERASIONAL PEMBAYARAN</th>
                              <th class="hide">BLOK</th>
                              <th>ALAMAT</th>
                              <th class="hide">KEPALA DUSUN</th>
                              <th>JUMLAH LUNAS</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $total_setoran = 0; ?>
                          <?php 
                          if($laporan) {
                            while($row = $laporan->fetch_assoc()) { 
                              $total_setoran = $row['total_transaksi'];
                          ?>
                            <tr>
                              <td><?php echo $row['nama_penduduk']; ?></td>
                              <td><?php echo $row['nop_pajak']; ?></td>
                              <td class="hide"><?php echo $row['no_blok']; ?></td>
                              <td><?php echo $row['alamat_penduduk']; ?></td>
                              <td class="hide"><?php echo $row['nama_kasun']; ?></td>
                              <td><?php echo valueTransformer('total_transaksi', $row['total_transaksi']); ?></td>
                            </tr>
                          <?php 
                              }
                            } else {
                          ?>
                            <tr>
                              <td colspan="5">Belum ada data laporan di tanggal ini. Silahkan pilih tanggal terlebih dahulu.</td>
                            </tr>
                          <?php } ?>
                            <tr>
                              <td colspan="4" style="text-align: right;">JUMLAH SETOR : </td>
                              <td colspan="1" style="background-color: green; color: white;"><?php echo valueTransformer('total_transaksi', $total_setoran); ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>  
</div>