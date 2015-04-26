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
<div class="container">
  <h3 class="title" style="margin-top:60px;">SURAT MASUK</h3>

  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <form action="<?php echo site_url('utama/editsuratmasuk_proses');?>" method="post"  enctype="multipart/form-data">
          <div class="form-group">
            <label for="idsurat">ID Surat :</label>
            <input type="text" class="form-control" id="idsurat" name="idsurat" placeholder="No Surat" value="<?php echo $suratmasuk['id_surat'];?>" readonly>
          </div>
          <div class="form-group">
            <label for="nosurat">No Surat :</label>
            <input type="text" class="form-control" id="nosurat" name="nosurat" placeholder="No Surat" value="<?php echo $suratmasuk['no_surat'];?>">
          </div>
          <div class="form-group">
            <label for="datepicker">Tanggal Surat : </label>
            <input type="text" class="form-control" id="datepicker" name="tanggal" placeholder="Tanggal Surat" value="<?php echo $suratmasuk['tgl_surat'];?>">
          </div>
          <div class="form-group">
            <label for="perihal">Perihal : </label>
            <input type="text" class="form-control" id="perihal" name="perihal" placeholder="Perihal Surat" value="<?php echo $suratmasuk['perihal'];?>">
          </div>
          <div class="form-group">
            <label for="Pengirim">Pengirim : </label>
            <input type="text" class="form-control" id="Pengirim" name="pengirim" placeholder="Nama Pengirim" value="<?php echo $suratmasuk['pengirim'];?>">
          </div>
          <div class="form-group">
            <label for="tujukan">Di Tujukan :</label>
            <input type="text" class="form-control" id="tujukan" name="tujukan" placeholder="Di TUjukan Kepada" value="<?php echo $suratmasuk['di_tujukan'];?>">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">File input Baru : </label>
            <input type="file" id="exampleInputFile" name="filefoto">
            <?php 
                  if ($suratmasuk['file'] == null){
                    ?>
                   <p>File Dahulu : </p><a onclick="kosong()" class="btn btn-sm btn-warning">Lihat</a>
                    <?php
                  }
                  else{
                    ?>
                    <p>File Dahulu : </p><a href="<?php echo base_url('uploads/'.$suratmasuk['file']); ?>" target="_blank" class="btn btn-sm btn-warning">Lihat</a>  
                    <?php
                  }
                ?>
          </div>
          <div class="form-group">
            <label for="status">Status :</label>
            <select class="form-control" name="status" >
            <?php
              if ($suratmasuk['status'] == "Biasa"){
            ?>
                <option><?php echo $suratmasuk['status'];?></option>
                <option>Penting</option>
            <?php
              }
            ?>
             <?php
              if ($suratmasuk['status'] == "Penting"){
            ?>
                <option><?php echo $suratmasuk['status'];?></option>
                <option>Biasa</option>
            <?php
              }
            ?>
              
            </select>
          </div>
          <div class="form-group">
            <label for="keterangan">Keterangan :</label>
            <textarea  type="text" class="form-control" id="keterangan" name="keterangan" ><?php echo $suratmasuk['keterangan'];?></textarea>
          </div>

          <button type="submit" class="btn btn-md btn-success" style="margin-bottom:50px;">DAFTARKAN SURAT</button>
      </form>
    </div>
  </div>
</div>