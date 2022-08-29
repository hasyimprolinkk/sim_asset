<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Data table -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
    <style>
    .text-warning {
      color: #FFB400;
    }
    .swal2-popup {
      font-size: 1.6rem !important;
    }
  </style>
<!-- JQUERY JS -->
<script src="<?= base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/bower_components/sweetalert2/sweetalert2.all.min.js"></script>

</head>
<body class="skin-green sidebar-mini fixed <?= $this->uri->segment(1) == 'sales' ? 'sidebar-collapse' : null; ?>">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url(); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<?= base_url('assets/dist/img/nj.png'); ?>" alt=""></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="<?= base_url('assets/dist/img/nj.png'); ?>" alt=""> <b>Asset</b>-App</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url('uploads/users/' . $user['image']) ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $user['nama']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= base_url('uploads/users/' . $user['image']) ?>" class="img-circle" alt="User Image">

                <p>
                  <?= $user['nama']; ?>
                  <small><?= $user['jabatan']; ?></small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= base_url('profile/'. encrypt_url($user['id_user'])); ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= base_url('auth/logout'); ?>" class="btn btn-default bg-red">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('uploads/users/' . $user['image']) ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p class="<?= $user['id_user'] == 1 ? 'text-warning' : ''; ?>">
            <?= $user['level'] == 1 ? "Admin" : "Petugas"; ?>
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li class="header">MAIN NAVIGATION</li>
        
        <?php $uri = $this->uri->segment(1); $uri2 = $this->uri->segment(2);  ?>

        <li <?= $uri == "monitoring" || $uri == '' ? "class='active'" : ""; ?>>
          <a href="<?= base_url(); ?>">
            <i class="fa fa-dashboard"></i> <span>Monitoring</span>
          </a>
        </li>

        <?php if ($user['level'] == '1') : ?>
        <li class="treeview <?= $uri == 'asset' || $uri == 'kategori' || $uri == 'jenis' ? 'active' : ''; ?>">
          <a href="#">
            <i class="fa fa-archive"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $uri == "asset" ? "class='active'" : ""; ?>>
              <a href="<?= base_url('asset'); ?>"><i class="fa fa-circle-o"></i> Asset</a>
            </li>
            <li <?= $uri == "kategori" ? "class='active'" : ""; ?>>
              <a href="<?= base_url('kategori'); ?>"><i class="fa fa-circle-o"></i> Kategori Asset</a>
            </li>
            <li <?= $uri == "jenis" ? "class='active'" : ""; ?>>
              <a href="<?= base_url('jenis'); ?>"><i class="fa fa-circle-o"></i> Jenis Asset</a>
            </li>
          </ul>
        </li>
        <?php endif; ?>

        <li class="treeview <?= $uri == 'pemakaian' || $uri == 'pengadaan' || $uri == 'pengelolaan' || $uri == 'penghapusan' ? 'active' : ''; ?>">
          <a href="#">
            <i class="fa fa-shopping-cart"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $uri == "pemakaian" ? "class='active'" : ""; ?>>
              <a href="<?= base_url('pemakaian'); ?>"><i class="fa fa-circle-o"></i> Pemakaian</a>
            </li>
            <li <?= $uri == "in" ? "class='active'" : ""; ?>>
              <a href="<?= base_url('pengadaan'); ?>"><i class="fa fa-circle-o"></i> Pengadaan</a>
            </li>
            <li <?= $uri == "out" ? "class='active'" : ""; ?>>
              <a href="<?= base_url('pengelolaan'); ?>"><i class="fa fa-circle-o"></i> Pengelolaan</a>
            </li>
            <li <?= $uri == "out" ? "class='active'" : ""; ?>>
              <a href="<?= base_url('penghapusan'); ?>"><i class="fa fa-circle-o"></i> Penghapusan</a>
            </li>
          </ul>
        </li>

        <li class="treeview <?= $uri2 == 'laporan' ? 'active' : ''; ?>">
          <a href="#">
            <i class="fa fa-print"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $uri == "pemakaian" && $uri2 == 'laporan' ? "class='active'" : ""; ?>>
              <a href="<?= base_url('pemakaian/laporan'); ?>"><i class="fa fa-circle-o"></i> Pemakaian</a>
            </li>
            <li <?= $uri == "pengadaan" && $uri2 == 'pengadaan' ? "class='active'" : ""; ?>>
              <a href="<?= base_url('pengadaan/laporan'); ?>"><i class="fa fa-circle-o"></i> Pengadaan</a>
            </li>
            <li <?= $uri == "pengelolaan" && $uri2 == 'pengelolaan' ? "class='active'" : ""; ?>>
              <a href="<?= base_url('pengelolaan/laporan'); ?>"><i class="fa fa-circle-o"></i> Pengelolaan</a>
            </li>
            <li <?= $uri == "penghapusan" && $uri2 == 'penghapusan' ? "class='active'" : ""; ?>>
              <a href="<?= base_url('penghapusan/laporan'); ?>"><i class="fa fa-circle-o"></i> Penghapusan</a>
            </li>
          </ul>
        </li>
        
        <li class="header">SETTINGS</li>
        <li <?= $uri == "profile" ? "class='active'" : ""; ?>>
          <a href="<?= base_url('profile/'. encrypt_url($user['id_user'])); ?>"><i class="fa fa-user"></i> <span>Profile</span></a>
        </li>
        <?php if ($user['level'] == 1) : ?>
          <li <?= $uri == "users" ? "class='active'" : ""; ?>>
            <a href="<?= base_url('users'); ?>"><i class="fa fa-user"></i> <span>User</span></a>
          </li>
        <?php endif; ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  
  <!-- ============================================================================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">