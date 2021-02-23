<?php 
    if(isset($_GET['action'])) {
        if($_GET['action'] === 'detail' && $_GET['nop']) {            
?>
    <div id="formTransaksi" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">TRANSAKSI - NOP. : <?php echo $_GET['nop']; ?> </h5>
            <button type="button" class="close" onclick="window.location.href='<?php url('transaksi'); ?>'" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <form action="" method="POST">
                <input type="hidden" name="nop_pajak" value="<?php echo $_GET['nop']; ?>">
                <div class="modal-body">                                    
                    <button type="button" onclick="printTransaksi()" class="btn btn-primary float-right">PRINT</button>
                    <div id="print-area" class="table-responsive" style="margin-bottom: 20px">
                        <?php 
                            if ($_GET['is_lunas']) {
                                echo "<span style='margin-bottom: 20px;' class='badge badge-success'>LUNAS</span>";
                            } else {
                                echo "<span style='margin-bottom: 20px;' class='badge badge-warning'>BELUM LUNAS</span>";
                            }
                        ?>    
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="small-table" style="min-width: 50px!important;">No TRANS.</th>
                                    <th class="small-table">TGL.</th>
                                    <th class="small-table">TOTAL</th>
                                    <th class="small-table">CATATAN</th>
                                    <th class="small-table hide">HAPUS</th>
                                </tr>
                            </thead>                            
                            <tbody>
                                <?php 
                                    $total_dibayar = 0;
                                    if(count($data['data_transaksi'][$_GET['nop']]) > 0) {
                                        foreach($data['data_transaksi'][$_GET['nop']] as $transaksi) {
                                            $total_dibayar += $transaksi['total_transaksi'];
                                ?>
                                    <tr>
                                        <td style="min-width: 50px!important;" class="small-table"><?php echo $transaksi['id_transaksi']; ?></td>
                                        <td class="small-table"><?php echo $transaksi['tgl_transaksi']; ?></td>
                                        <td class="small-table"><?php echo formatRupiah($transaksi['total_transaksi']); ?></td>
                                        <td class="small-table"><?php echo $transaksi['catatan_transaksi']; ?></td>
                                        <td class="small-table hide">
                                        <a href="#" onclick="dialogKonfirmasi('<?php echo url('transaksi', [
                                            'action' => 'hapus',
                                            'id_transaksi' => $transaksi['id_transaksi'],
                                            'nop' => $_GET['nop']
                                        ]); ?>')" class="btn btn-danger" style="font-size: 8pt;">HAPUS</a>
                                        </td>
                                    </tr>
                                <?php 
                                        }
                                ?>                                    
                                <?php  
                                    } else {
                                ?>
                                    <tr>
                                        <td colspan="5">Belum ada data transaksi.</td>
                                    </tr>
                                <?php } ?>                                                                    
                            </tbody>
                        </table>                        

                        <table class="table table-striped">
                            <tr>
                                <td colspan="5">
                                    <b>NAMA PENDUDUK : <?php echo $_GET['nama_penduduk']; ?></b>
                                </td>                                        
                            </tr>                                  
                            <tr>
                                <td colspan="5">
                                    <b>NOP. : <?php echo $_GET['nop']; ?></b>
                                </td>                                        
                            </tr>                                  
                            <tr>
                                <td colspan="5">
                                    <b>BLOK : <?php echo $_GET['blok']; ?></b>
                                </td>                                        
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <b>TOTAL PAJAK : <?php echo formatRupiah($_GET['total_pajak']); ?></b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <b>TOTAL DIBAYAR : <?php echo formatRupiah($total_dibayar); ?></b>
                                </td>
                            </tr>
                        </table>
                    </div>                 

                    <?php printAlert(); ?>
                    <H4>TAMBAH TRANSAKSI</H4>
                    <div class="form-group" >                    
                        <label>TGL. TRANSAKSI</label>
                        <input type="date" name="tgl_transaksi" class="form-control" required>
                    </div>
                    <div class="form-group">                    
                        <label>TOTAL TRANSAKSI</label>
                        <input type="number" name="total_transaksi" class="form-control" required>
                    </div>
                    <div class="form-group">                    
                        <label>CATATAN</label>
                        <textarea type="date" name="catatan_transaksi" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">                    
                    <button type="submit" name="submit" class="btn btn-success">BUAT TRANSAKSI</button>                    
                </div>
            </form>
        </div>
    </div>
    </div>
<?php 
    }
}
?>