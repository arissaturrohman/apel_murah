<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan status diterima</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>NIK</th>
                      <th>No KK</th>
                      <th>Status Keluarga</th>
                      <th>Nama</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th>Jenis Kelamin</th>
                      <th>Agama</th>
                      <th>Status Perkawinan</th>
                      <th>Pekerjaan</th>
                      <th>Kewarganegaraan</th>
                      <th>Gol. Darah</th>
                      <th>Alamat</th>
                      <th>RT / RW</th>
                      <th>Desa</th>
                      <th>Kode Pos</th>
                      <th>Pengajuan</th>
                      <th>Status</th>
                      <th>QR Code</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                    
                    $no = 1;
                    // $id = $_POST['id_pengajuan'];
                    $tampil = $conn->query("SELECT * FROM tb_pengajuan WHERE status='ttd'");
                    while($data=$tampil->fetch_assoc()){
                      
                    
                    ?>

                    <tr>
                      <td><?= $no++; ?></td>
                      <td style="font-weight:bold;"><?= $data['kode']; ?></td>
                      <td>
                      <?php
                       $warga_id = $data['id_warga'];
                       $penduduk = $conn->query("SELECT * FROM tb_penduduk WHERE id_warga='$warga_id'");
                       while ($data_penduduk = $penduduk->fetch_assoc()) {
                         echo $data_penduduk['nik'];?>
                      </td>

                      <td><?= $data_penduduk['kk']; ?></td>
                      <td><?= $data_penduduk['status_kk']; ?></td>
                      <td><?= $data_penduduk['nama']; ?></td>
                      <td><?= $data_penduduk['tmp_lahir']; ?></td>
                      <td><?= $data_penduduk['tgl_lahir']; ?></td>
                      <td><?= $data_penduduk['jk']; ?></td>
                      <td><?= $data_penduduk['agama']; ?></td>
                      <td><?= $data_penduduk['status_kawin']; ?></td>
                      <td><?= $data_penduduk['pekerjaan']; ?></td>
                      <td><?= $data_penduduk['negara']; ?></td>
                      <td><?= $data_penduduk['gol_darah']; ?></td>
                      <td><?= $data_penduduk['alamat']; ?></td>
                      <td><?= $data_penduduk['rt']; ?> / <?= $data_penduduk['rw']; ?></td>
                      <td><?= $data_penduduk['desa']; ?></td>
                      <td><?= $data_penduduk['kode_pos']; ?></td>
                      <?php } ?>
                      <td><?= $data['pengajuan']; ?></td>
                      <td><?= $data['status']; ?></td>
                      <td>
                        <img src="../qr_code/<?= $data['qr_code']; ?>" width="130%">

                      </td>
                      <td>
                      <form action="../cetak.php?id=<?php echo $data['id_pengajuan']; ?>" method="POST">
                      <input type="hidden" name="pengajuan" value="<?php echo $data['id_pengajuan']; ?>">
                      <!-- <button type="submit" target="_blank">Cetak</button> -->
                      <a href="../cetak.php?id=<?php echo $data['id_pengajuan']; ?>" onClick="javascript:window.close();" type="submit" target="_blank" class="btn btn-success">Cetak</a>
                      </form>
                      </td>
                    </tr>


                      <!-- modal ubah-->
            <div class="modal fade" id="modalUbahForm<?= $data['id_pengajuan']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Form Konfirmasi Pengajuan</h4>
                   
                  </div>
                  <div class="modal-body mx-3 mb-4">                  
                  
                    <form class="user" method="POST">

                    <?php 
                    $id_pengajuan = $data['id_pengajuan'];
                    $sql_ubah = $conn->query("SELECT * FROM tb_pengajuan WHERE id_pengajuan='$id_pengajuan'");
                    while ($data_ubah=$sql_ubah->fetch_assoc()) {
                    
                    ?>
                  
                    <div class="form-group">
                    <input type="hidden" class="form-control " name="id_pengajuan" value="<?= $data_ubah['id_pengajuan']?>">
                    </div>                     
                      <div class="form-group">
                        <input type="number" class="form-control " name="nik" value="<?= $_SESSION['nik']?>" readonly>
                      </div>                      
                      <div class="form-group">
                        <input type="text" class="form-control " name="kode" required>
                      </div>
                      <hr>
                      
                      <p style="font-size:8pt;">* jika klik <strong>Submit</strong> maka status berubah Diterima. Data tidak bisa dirubah</p>
                      <button type="submit" name="ubah" class="btn btn-info btn-user btn-block">Submit</button>
                    </form>
                  </div>
                  <?php
                  $error = true;
                
                if (isset($_POST['ubah'])) {
                  $id_ubah    = $_POST['id_pengajuan'];
                  $kode       = $_POST['kode'];
                  $folder     = '../qr_code/';
                  $type       = '.png';
                  $quality    = QR_ECLEVEL_H;
                  $ukuran     = 5;
                  $padding    = 1;
                  $status     = 'ttd';
                  
                  $sql = $conn->query("SELECT * FROM tb_pengajuan WHERE id_pengajuan = '$id_pengajuan'");
                  $data = $sql->fetch_assoc();
                  $namaQR     = "http://localhost/apel_murah/pdf/".$data['kode'].'pdf';
                  // $QR         = 'http://localhost/apel_murah/pdf/'.$namaQR.'.pdf';

                  QRCode::png($namaQR,$folder.$namaQR, $quality, $ukuran, $padding);

                  if ($kode == 'Apel20') {
                                      
                  $ubah = $conn->query("UPDATE tb_pengajuan SET status ='$status', qr_code = '$QR' WHERE id_pengajuan='$id_ubah'");
                  

                     ?>
                      <script>
                      alert("Data berhasil ditandatangani");
                      window.location.href="?page=pengajuan";
                      </script>
                    <?php
                  } 
                  else {
                    // sampai disini belum clear
                    $error = " <div class='alert alert-danger' role='alert'>Phasparse yang Anda Masukkan salah</div>";
                  }
                    }
                  
                ?>
                </div>
              </div>              
            </div>
                    <?php } }?>
                  </tbody>
                </table>
                
              </div>
            </div>
            </div>
            
            <button class="btn btn-info" data-toggle="modal" data-target="#modalTambahForm">Tambah</button>

            
           