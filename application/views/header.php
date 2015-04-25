<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
   
<head>
      <meta charset="utf-8">
      <title>Aplikasi Surat Pemerintahan</title>
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Google Fonts -->
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Lato:400,300,400italic,700,300italic' rel='stylesheet' type='text/css'>
      <!-- Library CSS -->
      <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-theme.css'); ?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/css/fonts/font-awesome/css/font-awesome.css'); ?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/css/animations.css'); ?>" media="screen">
      <link rel="stylesheet" href="<?php echo base_url('assets/css/superfish.css'); ?>" media="screen">
      <link rel="stylesheet" href="<?php echo base_url('assets/css/revolution-slider/css/settings.css'); ?>" media="screen">
      <link rel="stylesheet" href="<?php echo base_url('assets/css/prettyPhoto.css'); ?>" media="screen">
      <!-- Theme CSS -->
      <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/css/global.css'); ?>">
      <!-- Skin -->
      <link rel="stylesheet" href="<?php echo base_url('assets/css/colors/blue.css'); ?>" class="colors">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="<?php echo base_url('assets/css/theme-responsive.css'); ?>">

      <!-- Favicons -->
      <link rel="shortcut icon" href="img/ico/favicon.ico">
      <link rel="apple-touch-icon" href="img/ico/apple-touch-icon.png">
      <link rel="apple-touch-icon" sizes="72x72" href="img/ico/apple-touch-icon-72.png">
      <link rel="apple-touch-icon" sizes="114x114" href="img/ico/apple-touch-icon-114.png">
      <link rel="apple-touch-icon" sizes="144x144" href="img/ico/apple-touch-icon-144.png">
      <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
      <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script src="js/respond.min.js"></script>
      <![endif]-->
      <!--[if IE]>
      <link rel="stylesheet" href="css/ie.css">
      <![endif]-->
   </head>
   <body class="home">
      <div class="page-mask">
            <div class="page-loader"> 

                <div class="spinner"></div>
                Loading...
            </div>

      </div>
      <div class="wrap">
         <!-- Header Start -->
         <header id="header">
            
            <!-- Main Header Start -->
            <div class="main-header">
               <div class="container">
                  <!-- TopNav Start -->
                  <div class="topnav navbar-header">
                     <a class="navbar-toggle down-button" data-toggle="collapse" data-target=".slidedown">
                     <i class="fa fa-angle-down icon-current"></i>
                     </a> 
                  </div>
                  <!-- TopNav End -->
                  <!-- Logo Start -->
                  <div class="logo pull-left">
                     <h1>
                        <a href="index.html">
                        <img src="<?php echo base_url('assets/img/logobandung.png');?>" alt="Bandung" width="100" height="60">
                        </a>
                     </h1>
                  </div>
                  <!-- Logo End -->
                  <!-- Mobile Menu Start -->
                  <div class="mobile navbar-header">
                     <a class="navbar-toggle" data-toggle="collapse" href=".html">
                     <i class="fa fa-bars fa-2x"></i>
                     </a> 
                  </div>
                  <!-- Mobile Menu End -->
                  <!-- Menu Start -->
                  <nav class="collapse navbar-collapse menu">
                     <ul class="nav navbar-nav sf-menu">
                        <li>
                           <a href="<?php echo site_url('utama/beranda');?>">
                           Home
                           
                           </a>
                          
                        </li>
                        <li>
                           <a href="<?php echo site_url('utama/suratmasuk');?>" class="sf-with-ul">
                           Surat Masuk
                           </a>
                         
                        </li>
                        <li>
                           <a href="<?php echo site_url('utama/suratkeluar');?>" class="sf-with-ul">
                           Surat Keluar
                           
                           </a>
                           
                        </li>
                        <li>
                           <a href="#" class="sf-with-ul">
                           Cetak Surat
                           </a>
                           
                        </li>

                        <li><a href="#">
                            <i class="fa fa-user"></i>
                            <?php 
                              if (!($this->session->userdata('username'))){
                                 redirect('utama');
                              }else{
                                 echo $this->session->userdata('username');
                              }
                            ?>
                            <span class="sf-sub-indicator">
                              <i class="fa fa-angle-down"></i>
                            </span>
                            </a>
                            <ul>
                              <li><a href="<?php echo site_url('utama/logout');?>" class="sf-with-ul">Logout</a></li>
                            </ul>
                         </li>
                     </ul>
                  </nav>
                  <!-- Menu End --> 
               </div>
            </div>
            <!-- Main Header End -->
         </header>

         <!-- Header End --> 
         <!-- Content Start -->
 <div id="main">
         <!-- Slider Start-->
         <div class="fullwidthbanner-container">
             <div class="fullwidthbanner rslider">
                 <ul>
                     <!-- THE FIRST SLIDE -->
                     <li data-transition="fade" data-slotamount="7" data-masterspeed="500"  data-saveperformance="on">
                         <img src="<?php echo base_url('assets/img/slider/bandungx.jpg');?>"  alt="Pixma" data-lazyload="<?php echo base_url('assets/img/slider/bandung.jpg');?>" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

                         <div class="caption modern_big_bluebg h1 lft tp-caption start"
                              data-x="40"
                              data-y="85"
                              data-speed="700"
                              data-endspeed="800"
                              data-start="1000"
                              data-easing="easeOutQuint"
                              data-endeasing="easeOutQuint">
                             <h3>BANDUNG KOTA KEMBANG</h3>
                         </div>
                         <div class="caption list_slide lfb tp-caption start"
                              data-easing="easeOutExpo"
                              data-start="1400"
                              data-speed="1050"
                              data-y="180"
                              data-x="40">
                             <div class="list-slide">
                                 <i class="fa fa-camera slide-icon"></i>
                                 <h5 class="dblue"> Banyak Tempat Wisata</h5>
                             </div>
                         </div>
                         <div class="caption list_slide lfb tp-caption start"
                              data-easing="easeOutExpo"
                              data-start="1800"
                              data-speed="1200"
                              data-y="220"
                              data-x="40">
                             <div class="list-slide">
                                 <i class="fa fa-search slide-icon"></i>
                                 <h5 class="dblue"> Kota Kuliner</h5>
                             </div>
                         </div>
                         <div class="caption list_slide lfb tp-caption start"
                              data-easing="easeOutExpo"
                              data-start="2200"
                              data-speed="1350"
                              data-y="260"
                              data-x="40">
                             <div class="list-slide">
                                 <i class="fa fa-code slide-icon"></i>
                                 <h5 class="dblue"> Kota Penuh Dengan Seni</h5>
                             </div>
                         </div>
                         
                     </li>
                     <!-- THE FIRST SLIDE -->
                     
                 </ul>
             </div>
         </div>
         <!-- Slider End-->
</div>