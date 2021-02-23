<?php
    $controller = new LoginController();
    if(isset($_POST['login'])) {        
        $controller->doLogin();        
    }
?>

<div class="container" style="padding: 20px;">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Sistem Informasi Pajak - Login
                </div>
                <div class="card-body">
                    <p>Silahkan login menggunakan username dan password anda.</p>
                    <?php printAlert(); ?>
                    <div class="row">
                        <div class="col-12">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Masukkan username anda...">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Masukkan password anda...">
                                </div>
                                <div class="form-group">
                                    <button name='login' type="submit" class="btn btn-primary">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>