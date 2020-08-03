

<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/jqvmap/jqvmap.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/toastr/toastr.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/dist/css/adminlte.min.css')?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/daterangepicker/daterangepicker.css')?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/summernote/summernote-bs4.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700'" rel="stylesheet">







<title>MTs Ishlahul Masalik - Admin Page  </title>
<link rel="icon" href="/assets/images/imageWeb/Logo.png" />

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/Admin/Home" class="brand-link">
      <img src="/assets/images/imageWeb/Logo.png" alt="AdminLogo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/assets/images/imageWeb/admin.jpeg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/Admin/Home" class="d-block">
            <?php
              $get_session = $this->session->all_userdata();
              echo($get_session['user']->nama)
            ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/Admin/Home" class="nav-link">
              <i class="nav-icon fas fa-desktop"></i>
              <p> Dashboard </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p> Konten   <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/Admin/Informasi" class="nav-link">
                  <i class="fas fa-info nav-icon"></i>
                  <p>Informasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Admin/Banner" class="nav-link">
                  <i class="far fa-image nav-icon"></i>
                  <p>Banner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Admin/Berita" class="nav-link">
                  <i class="far fa-paper-plane nav-icon"></i>
                  <p>Berita</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Admin/Literasi" class="nav-link">
                  <i class="fa fa-tag nav-icon"></i>
                  <p>Literasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Admin/Galerifoto" class="nav-link">
                  <i class="fa fa-tag nav-icon"></i>
                  <p>Galeri Foto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Admin/Galerividio" class="nav-link">
                  <i class="fa fa-tag nav-icon"></i>
                  <p>Galeri Vidio</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p> Data Sekolah   <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/Admin/Sejarah" class="nav-link">
                  <i class="fas fa-info nav-icon"></i>
                  <p>Sejarah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Admin/Sambutan" class="nav-link">
                  <i class="fa fa-tags nav-icon"></i>
                  <p>Sambutan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Admin/Tentang" class="nav-link">
                  <i class="fa fa-tags nav-icon"></i>
                  <p>Tentang Sekolah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Admin/VisiMisi" class="nav-link">
                  <i class="fa fa-tags nav-icon"></i>
                  <p>Visi & Misi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/Login/logout" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>