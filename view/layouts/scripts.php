    
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<script src="./assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<script src="./assets/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    $('#data').DataTable();
});
$(document).ready( function () {
    $('#table-transaksi').DataTable();
});
$(window).on('load',function(){
    $('#masterModal').modal('show');
});
$(window).on('load',function(){
    $('#formTransaksi').modal('show');
});
function dialogKonfirmasi(url) {
    if (confirm("Yakin ingin menghapus data ini?")) {
        window.location.href = url
    }
}
</script>