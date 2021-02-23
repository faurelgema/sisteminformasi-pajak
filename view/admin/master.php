<?php
    $controller = new AdminMasterController();
    $data = $controller->getAllData();
    $fields = $controller->model->showFields;

    if(isset($_POST['submit'])) {                
        $controller->insertData();
    }

    if(isset($_POST['update'])) {
        $controller->updateData();
    }

    if(isset($_GET['action'])) {
        if($_GET['action'] === 'hapus') {
            $controller->deleteData($_GET['id']);
        }
        if($_GET['action'] === 'edit') {
            $oneData = $controller->model->getOneData($_GET['id']);
        }
    }
?>



<?php require("./view/admin/form-modal.php"); ?>

<div class="container" style="padding: 20px;">
    <div class="row">
        <div class="col-12">
            <?php if($_GET['table'] === 'kasun') { ?>
                <h3>DATA KEPALA DUSUN</h3>
            <?php } else { ?>
                <h3>DATA <?php echo strtoupper($_GET['table']); ?></h3>
            <?php } ?>
            <a href="<?php echo url('admin-master', [
                'table' => $controller->model->table,
                'action' => 'tambah'
            ]); ?>" class="btn btn-success float-right" style="margin-bottom: 20px;">TAMBAH</a>
            <div class="table-responsive">
                <table id="data" class="table table-striped">
                    <thead>
                        <?php foreach($fields as $key=>$field) { ?>
                            <th style="min-width: 150px;"><?php echo $field; ?></th>
                        <?php } ?>
                        <th style="min-width: 150px;">AKSI</th>
                    </thead>
                    <tbody>
                        <?php while($row = $data->fetch_assoc()) { ?>
                            <tr>
                                <?php foreach($fields as $key=>$field) { ?>
                                    <td><?php echo valueTransformer($key, $row[$key]); ?></td>
                                <?php } ?>
                                <td style="width: 150px;">
                                    <a href="<?php echo url('admin-master', [
                                        'table' => $controller->model->table,
                                        'action' => 'edit',
                                        'id' => $row[$controller->model->primaryKey]
                                    ]); ?>" class="btn btn-warning" style="font-size: 8pt;">UBAH</a>
                                    <a href="#" 
                                        onclick="dialogKonfirmasi('<?php echo url('admin-master', [
                                            'table' => $controller->model->table,
                                            'action' => 'hapus',
                                            'id' => $row[$controller->model->primaryKey]
                                        ]); ?>')" 
                                    class="btn btn-danger" style="font-size: 8pt;">HAPUS</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>