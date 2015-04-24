    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

<html>

	<div class="container">
		<div class="row">
			<div class="col-md-5 col-md-offset-3">
				<form action="<?php echo site_url('utama/cekadmin');?>" method="post">
					    <div class="form-group">
			              <label for="username" class="col-sm-2 control-label">Username</label>
			              <div class="col-sm-10">
			                <input type="text" class="form-control" id="username" placeholder="Username" name="username">
			              </div>
			            </div>
			            <div class="form-group">
			              <label for="password" class="col-sm-2 control-label">Password</label>
			              <div class="col-sm-10">
			                <input type="password" class="form-control" id="password" placeholder="password" name="password">
			              </div>
			            </div>

			            <div class="form-group">
			            	<div class="col-sm-10 col-sm-offset-2">
			            		<input type="submit" class="btn btn-primary">
			            	</div>
						</div>
				</form>
			</div>
		</div>
	</div>
</html>