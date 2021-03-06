
<div class="container" style="margin-top:50px;">
  <h3 class="title">SURAT MASUK</h3>
</div>

<div class="container">
  <div class="row">
    <table class="table table-hover">

      <thead>
        <tr>
        <th>ID_Surat</th>
        <th>No Surat</th>
        <th>Tanggal Surat</th>
        <th>Perihal</th>
        <th>Pengirim</th>
        <th>Di Tujukan</th>
        <th>Status</th>
        <th>Keterangan</th>
        <th rowspan="2">Lampiran</th>
      </tr>
      </thead>
      <tbody>
        <?php
              foreach ($suratmasuk as $key) 
              {
              ?>
              <tr>
                <td><?php echo $key['id_surat']; ?></td>
                <td><?php echo $key['no_surat']; ?></td>
                <td><?php echo $key['tgl_surat']; ?></td>
                <td><?php echo $key['perihal']; ?></td>
                <td><?php echo $key['pengirim']; ?></td>
                <td><?php echo $key['di_tujukan']; ?></td>
                <td><?php echo $key['status']; ?></td>
                <td><?php echo $key['keterangan']; ?></td>
                <td ><a href="<?php echo base_url('uploads/'.$key['file']); ?>" target="_blank" class="btn btn-sm btn-danger">Lihat</a></td>
                <td><a href="<?php echo site_url('surat/editsuratmasuk/'.$key['id_surat']); ?>" class="btn btn-sm btn-warning">Edit</a></td>
                <td><a  onclick="return confirm('Hapus Data Ini ?');" href="<?php echo site_url('surat/hapussuratmasuk/'.$key['id_surat']); ?>" class="btn btn-sm btn-info">Hapus</a></td>
              </tr>
              <?php
              }
              ?>
      </tr>
      </tbody>
    </table>
  </div>
</div>

<div class="container">
  <h3 class="title">SURAT KELUAR</h3>
</div>

<div class="container">
  <div class="row">
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
        <th rowspan="2">Lampiran</th>
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
                <td><a href="<?php echo base_url('uploads/'.$key2['file']); ?>" target="_blank" class="btn btn-sm btn-success">Lihat</a></td>
                <td><a href="<?php echo site_url('surat/editsuratkeluar/'.$key2['id_surat']); ?>" class="btn btn-sm btn-primary">Edit</a></td>
                <td><a onclick="return confirm('Hapus Data Ini ?');" href="<?php echo site_url('surat/hapussuratkeluar/'.$key2['id_surat']); ?>" class="btn btn-sm btn-info">Hapus</a></td>
              </tr>
              <?php
              }
              ?>
      </tr>
      </tbody>
    </table>
  </div>
</div>