<!DOCTYPE html>


<?php

     if (!($this->session->userdata('level'))){
    redirect('utama');
    }


?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Beranda Admin Coy</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/dashboard.css'); ?>" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url('assetsjs/ie-emulation-modes-warning.js'); ?>"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Admin Panel</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="<?php echo site_url('admin/logout');?>">Logout</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="<?php echo site_url('utama/admin');?>">Dashboard</a></li>
            <li ><a href="<?php echo site_url('utama/datauser');?>">Data User </a></li>
            <li ><a href="<?php echo site_url('utama/datasuratmasuk');?>">Data Surat Masuk</a></li>
            <li class="active"><a href="<?php echo site_url('utama/datasuratkeluar');?>">Data Surat Keluar <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Data Berkas</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Data Surat Keluar</h1>
          <table class="table table-hover">

      <thead>
        <tr>
        <th>ID_Surat</th>
        <th>No Surat</th>
        <th>Tanggal Surat</th>
        <th>Perihal</th>
        <th>Tujuan Surat</th>
        <th>Status</th>
        <th>Keterangan</th>
        <th colspan="2">Lampiran</th>
      </tr>
      </thead>
           <tbody>
        <?php
              foreach ($suratkeluar as $key2) 
              {
              ?>
              <tr>
                <td><?php echo $key2['id_surat']; ?></td>
                <td><?php echo $key2['no_surat']; ?></td>
                <td><?php echo $key2['tgl_surat']; ?></td>
                <td><?php echo $key2['perihal']; ?></td>
                <td><?php echo $key2['tujuan']; ?></td>
                <td><?php echo $key2['status']; ?></td>
                <td><?php echo $key2['keterangan']; ?></td>
                <td colspan="3"><a href="<?php echo base_url('uploads/'.$key2['file']); ?>" target="_blank" class="btn btn-sm btn-success">Lihat</a></td>
                <td><a href="<?php echo site_url('programmer/edit/'.$key2['id_surat']); ?>" class="btn btn-sm btn-info">Edit</a></td>
                <td><a onclick="return confirm('Hapus Data Ini ?');" href="<?php echo site_url('utama/deletesuratkeluar/'.$key2['id_surat']); ?>" class="btn btn-sm btn-warning">Delete</a>
                </td>
                
              </tr>
              <?php
              }
              ?>
      </tr>
      </tbody>
    </table>
        </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="<?php echo base_url('assets/js/vendor/holder.js'); ?>"></script>
</html>