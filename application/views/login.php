<?php 
  if (!($this->session->userdata('username'))){
    
  }else{
     redirect('utama/beranda');                            
  }
?>
<head>
	  <!-- Library CSS -->
	  <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-social.css');?>">

	  	<!-- Custom Fonts -->
	<link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">

	<style type="text/css">
		.space-sep30 { clear: both; display: block; height: 20px;
}.space-sep50 { clear: both; display: block; height: 120px;
}.space-sep10 { clear: both; display: block; height: 10px;
}
	</style>
</head>

<body style="background-image:url('<?php echo base_url('assets/img/blur.jpg'); ?>');">
<div class="space-sep50"></div>
<div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-4 col-md-offset-4">                    
            <div class="panel panel-info" >
                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                        <div class="col-md-12">
				            <div class="form-group">
				              <label for="nama" class="col-sm-6 col-sm-offset-3 control-label" style="text-align:center;color:#403106">Login With :</label>
				            </div>
				        </div>
				          <div class="space-sep30"></div>
				        <div class="col-md-12">
				            <div class="form-group">
				                 <div class="col-md-6">
				                      <a class="btn btn-sm btn-block btn-social btn-twitter">
				                        <i class="fa fa-twitter"></i> Twitter
				                      </a>
				                 </div>
				                 <div class="col-md-6 ">
				                      <a class="btn btn-sm btn-block btn-social btn-facebook">
				                        <i class="fa fa-facebook"></i> Facebook
				                      </a>
				                 </div>
				            </div>
				        </div>

                            <div class="space-sep30"></div>

                        <form id="loginform" class="form-horizontal" role="form" action="<?php echo site_url('utama/verifikasi');?>" method="post" >
                                    
                           			 <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">                                        
                                    </div>
                                
                           			 <div style="margin-bottom: 15px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                    </div>
                                    
                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                                    <div class="col-sm-7 col-md-offset-2 controls">
                                      <div class="input-group">
	                                    <input id="btn-Login" type="submit" class="btn btn-sm btn-success" style="width:200px; text-align:center;" value="MASUK">
                           			   </div>
                           			   <div class="space-sep10"></div>
                          			   
                                    </div>     
                                </div>                       
                                <div class="form-group">
                                    <div class="col-md-12 control">
                                      <div  style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                        <div class="col-md-8">
                                        	<div>
	                                            Tidak Punya Akun ?!
	                                        <a href="#">
	                                            Daftar Disini
	                                        </a>
	                                        </div>
                                        </div>
                                        <div>
                                        </div>
                                      </div>
                                    </div>
                                </div>  
                              </div>  
                            </form>     



                        </div>                     
                    </div>  
        </div>
    </div>

</body>