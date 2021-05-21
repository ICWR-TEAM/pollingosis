<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tag wajib -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard admin</title>

    <!-- Pertama Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets"); ?>/dist/css/bootstrap.min.css">
    <!-- Kemudian Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- dan Reza Admin CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/dist/css/reza-admin.min.css">
    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url("assets"); ?>/dist/img/Reza_Admin.ico">
</head>
<body>
  <!-- navbar -->
  <nav class="navbar justify-content-start navbar--white">
      <a class="navbar__sidebar-toggler" href="#"><span class="fa fa-bars"></span></a>
      <a class="navbar-brand ml-3 text-dark">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="black" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
  <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
</svg>
          <b><?php echo $this->session->userdata("username") ?></b>
      </a>

  </nav>

  <!-- sidebar -->
  <aside class="sidebar">
      <ul class="sidebar__nav">
          <li class="sidebar__item sidebar__item--header">Dashboard</li>
          <?php if($cek_setting->atur=="berjalan"){ ?>
              <li class="sidebar__item">
                  <a href="<?php echo base_url('dash_admin/') ?>"><span class="fas fa-home"></span> Home</a>
              </li>
              <hr style="width: 100%; border-top: 1px solid; color:#8dd2e1;">
              <li class="sidebar__item sidebar__item--dropdown-active">
                  <a class="sidebar__btn-dropdown" href="#">
                      <span class="fa fa-file-text"></span> Data
                  </a>
                  <ul class="sidebar__dropdown sidebar__dropdown--show">
                      <li class="sidebar__dropdown-item sidebar__dropdown-item--active"><a href="<?php echo base_url("dash_admin/data_sekolah") ?>">Sekolah</a></li>
                      <li class="sidebar__dropdown-item"><a href="<?php echo base_url("dash_admin/data_kelas") ?>">Kelas</a></li>
                  </ul>
              </li>
              <hr style="width: 100%; border-top: 1px solid; color:#8dd2e1;">
              <li class="sidebar__item">
                  <a class="sidebar__btn-dropdown" href="#">
                      <span class="fas fa-address-card"></span> Calon
                  </a>
                  <ul class="sidebar__dropdown">
                      <li class="sidebar__dropdown-item"><a href="<?php echo base_url("dash_admin/calon_osis") ?>">Osis</a></li>
                      <li class="sidebar__dropdown-item"><a href="<?php echo base_url("dash_admin/calon_pemilih") ?>">Pemilih</a></li>
                  </ul>
              </li>
              <hr style="width: 100%; border-top: 1px solid; color:#8dd2e1;">
              <li class="sidebar__item">
                  <a class="sidebar__btn-dropdown" href="#">
                      <span class="fa fa-file"></span> Hasil
                  </a>
                  <ul class="sidebar__dropdown">
                      <li class="sidebar__dropdown-item"><a href="<?php echo base_url("dash_admin/hasil") ?>">Hasil Pemilihan</a></li>
                  </ul>
              </li>
              <hr style="width: 100%; border-top: 1px solid; color:#8dd2e1;">
              <li class="sidebar__item sidebar__item--header">Action</li>
              <li class="sidebar__item">
                  <a href="<?php echo base_url("dash_admin/users/") ?>"><span class="fas fa-user"></span> Pengguna</a>
                  <a href="<?php echo base_url("dash_admin/logout/") ?>"><span class="fas fa-sign-out-alt"></span> Logout</a>
              </li>
          <?php } ?>
      </ul>
  </aside>
