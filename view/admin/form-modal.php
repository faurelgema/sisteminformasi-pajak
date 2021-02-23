<?php 
    if(isset($_GET['action'])) {
        if($_GET['action'] === 'tambah' || $_GET['action'] === 'edit') {                        
            $model = $controller->model;
?>
    <div id="masterModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><?php echo strtoupper($_GET['action'])." ".strtoupper($_GET['table']); ?></h5>
            <button type="button" class="close" onclick="window.location.href='<?php url('admin-master', ['table' => $_GET['table']]); ?>'" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <?php printAlert(); ?>
                    <?php 
                        if(!isset($oneData)) {
                            generateForm($model->schema, $model->showFields);
                        } else {
                            generateForm($model->schema, $model->showFields, $oneData);
                        }
                    ?>            
                </div>
                <div class="modal-footer">
                    <?php if(!isset($oneData)) { ?>
                        <button type="submit" name="submit" class="btn btn-success">Tambah</button>
                    <?php } else {?>
                        <button type="submit" name="update" class="btn btn-warning">Ubah</button>
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>
    </div>
<?php 
    }
}
?>