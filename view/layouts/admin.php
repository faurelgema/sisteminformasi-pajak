<!-- Sidebar -->
<div class="d-flex" id="wrapper">
  <div class="bg-light border-right" id="sidebar-wrapper">
  <div class="sidebar-heading">
  <img
    src="./assets/img/logo.png"
    style="width: 30px; height: 30px"
  />
  <span style="font-size: 9pt; font-weight: bold;">SISTEM INFORMASI PAJAK KANTOR DESA WANGUNSARI</span> </div>
    <div class="list-group list-group-flush">
      <a href="<?php url('admin'); ?>" class="list-group-item list-group-item-action bg-light">BERANDA</a>
      <a href="<?php url('admin-master', ['table' => 'kasun']); ?>" class="list-group-item list-group-item-action bg-light">DATA KEPALA DESA</a>
      <a href="<?php url('admin-master', ['table' => 'penduduk']); ?>" class="list-group-item list-group-item-action bg-light">DATA PENDUDUK</a>
      <a href="<?php url('admin-master', ['table' => 'blok']); ?>" class="list-group-item list-group-item-action bg-light">DATA BLOK</a>    
      <a href="<?php url('admin-master', ['table' => 'wilayah']); ?>" class="list-group-item list-group-item-action bg-light">DATA WILAYAH</a>
      <a href="<?php url('admin-master', ['table' => 'pajak']); ?>" class="list-group-item list-group-item-action bg-light">DATA PAJAK</a>          
      <a href="<?php url('admin-master', ['table' => 'keterangan_blok']); ?>" class="list-group-item list-group-item-action bg-light">DATA KET. BLOK</a>          
      <a href="<?php url('transaksi'); ?>" class="list-group-item list-group-item-action bg-light">DATA TRANSAKSI</a>    
      <a href="<?php url('laporan-bank'); ?>" class="list-group-item list-group-item-action bg-light">DATA LAPORAN BANK</a>
    </div>
  </div>
  <!-- /#sidebar-wrapper -->

  <!-- Page Content -->
  <div id="page-content-wrapper">

  <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <button class="btn btn-primary" id="menu-toggle">MENU</button>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Hi, Admin!
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php url('logout'); ?>">Logout</a>            
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid">

<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">SI PAJAK - DESA WANGUNSARI</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php url('admin'); ?>">BERANDA</a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" href="<?php url('admin-master', ['table' => 'kasun']); ?>">DATA KASUN</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php url('admin-master', ['table' => 'penduduk']); ?>">DATA PENDUDUK</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php url('admin-master', ['table' => 'wilayah']); ?>">DATA WILAYAH</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php url('admin-master', ['table' => 'pajak']); ?>">DATA PAJAK</a>
      </li>            
    </ul>   
    <a class="btn btn-danger pull-right" href="<?php url('logout'); ?>">LOGOUT</a>
  </div>
</nav> -->