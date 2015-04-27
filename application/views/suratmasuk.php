  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>


<?php
if ((validation_errors())){
	?>

<div class="alert alert-danger">
   <a href="#" class="close" data-dismiss="alert">
      &times;
   </a>
   <strong>Warning!</strong> <?php echo validation_errors(); ?>
</div>
<?php
}
?>
<div class="container">
	<h3 class="title" style="margin-top:60px;">SURAT MASUK</h3>

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form action="<?php echo site_url('surat/insertsuratmasuk');?>" method="post"  enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="nosurat">No Surat :</label>
				    <input type="text" class="form-control" id="nosurat" name="nosurat" placeholder="No Surat">
				  </div>
				  <div class="form-group">
				    <label for="datepicker">Tanggal Surat : </label>
				    <input type="text" class="form-control" id="datepicker" name="tanggal" placeholder="Tanggal Surat">
				  </div>
				  <div class="form-group">
				    <label for="perihal">Perihal : </label>
				    <input type="text" class="form-control" id="perihal" name="perihal" placeholder="Perihal Surat">
				  </div>
				  <div class="form-group">
				    <label for="Pengirim">Pengirim : </label>
				    <input type="text" class="form-control" id="Pengirim" name="pengirim" placeholder="Nama Pengirim">
				  </div>
				  <div class="form-group">
				    <label for="tujukan">Di Tujukan :</label>
				    <input type="text" class="form-control" id="tujukan" name="tujukan" placeholder="Di TUjukan Kepada">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputFile">File input</label>
				    <input type="file" id="exampleInputFile" name="filefoto">
				  </div>
				  <div class="form-group">
				    <label for="tujukan">Status :</label>
				    <select class="form-control" name="status">
				    	<option>Penting</option>
				    	<option>Biasa</option>
				    </select>
				  </div>
				  <div class="form-group">
				    <label for="keterangan">Keterangan :</label>
				    <textarea  type="text" class="form-control" id="keterangan" name="keterangan"> </textarea>
				  </div>

				  <button type="submit" class="btn btn-md btn-success" style="margin-bottom:50px;">DAFTARKAN SURAT</button>
			</form>
		</div>
	</div>
</div>