  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });

  function kosong(){
  	alert('File Tidak Ada');
  }
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
	<h3 class="title" style="margin-top:60px;">SURAT KELUAR</h3>

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form action="<?php echo site_url('utama/insertsuratkeluar');?>" method="post"  enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="idsurat">ID Surat :</label>
				    <input type="text" class="form-control" id="idsurat" name="idsurat" value="<?php echo $suratkeluar['id_surat'];?>" readonly>
				  </div>
				  <div class="form-group">
				    <label for="nosurat">No Surat :</label>
				    <input type="text" class="form-control" id="nosurat" name="nosurat" value="<?php echo $suratkeluar['no_surat'];?>">
				  </div>
				  <div class="form-group">
				    <label for="datepicker">Tanggal Surat : </label>
				    <input type="text" class="form-control" id="datepicker" name="tanggal" value="<?php echo $suratkeluar['tgl_surat'];?>">
				  </div>
				  <div class="form-group">
				    <label for="perihal">Perihal : </label>
				    <input type="text" class="form-control" id="perihal" name="perihal" value="<?php echo $suratkeluar['perihal'];?>">
				  </div>
				  <div class="form-group">
				    <label for="tujuan">Tujuan : </label>
				    <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?php echo $suratkeluar['tujuan'];?>">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputFile">File input Baru :</label>
				    <input type="file" id="exampleInputFile" name="filefoto">
				    <?php 
		              if ($suratkeluar['file'] == null){
		                ?>
		               <p>File Dahulu : </p><a onclick="kosong()" class="btn btn-sm btn-warning">Lihat</a>
		                <?php
		              }
		              else{
		                ?>
		                <p>File Dahulu : </p><a href="<?php echo base_url('uploads/'.$suratkeluar['file']); ?>" target="_blank" class="btn btn-sm btn-warning">Lihat</a>  
		                <?php
		              }
		            ?>
				    
				  </div>
				  <div class="form-group">
				    <label for="tujukan">Status :</label>
				    <select class="form-control" name="status">
				    	<?php
			              if ($suratkeluar['status'] == "Biasa"){
			            ?>
			                <option><?php echo $suratkeluar['status'];?></option>
			                <option>Penting</option>
			            <?php
			              }
			            ?>
			             <?php
			              if ($suratkeluar['status'] == "Penting"){
			            ?>
			                <option><?php echo $suratkeluar['status'];?></option>
			                <option>Biasa</option>
			            <?php
			              }
			            ?>
				    </select>
				  </div>
				  <div class="form-group">
				    <label for="keterangan">Keterangan :</label>
				    <textarea  type="text" class="form-control" id="keterangan" name="keterangan"><?php echo $suratkeluar['keterangan'];?></textarea>
				  </div>

				  <button type="submit" class="btn btn-md btn-success" style="margin-bottom:50px;">DAFTARKAN SURAT</button>
			</form>
		</div>
	</div>
</div>