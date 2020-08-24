<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan status pending</h6>
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
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                    
                    $no = 1;
                    
                    $tampil = $conn->query("SELECT * FROM tb_pengajuan WHERE status='pending'");
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
                        <a href="#" class="btn btn-success btn-circle btn-sm" title="verifikasi" data-toggle="modal" data-target="#modalUbahForm<?= $data['id_pengajuan']?>">
                        <i class="fas fa-edit"></i>
                        </a>

                       <form method="POST">
                          
                      <input type="hidden" class="form-control " name="id_warga" value="<?= $data['id_warga']?>">

                      <button onclick="return confirm('Yakin menghapus data ini..?')" type="submit" name="hapus" class="btn btn-danger btn-circle btn-sm" title="hapus">
                        <i class="fas fa-trash"></i>
                      </button>
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
                      <?php 
                      $warga_id = $data_ubah['id_warga'];
                      $sql_warga = $conn->query("SELECT * FROM tb_penduduk WHERE id_warga='$warga_id'");
                      while ($data_warga = $sql_warga->fetch_assoc()) {
                       
                      ?>
                      <input type="number" class="form-control " name="nik" value="<?= $data_warga['nik']?>" readonly>
                      </div>
                      <div class="form-group">
                        <input type="number" class="form-control " name="kk" value="<?= $data_warga['kk']?>" readonly>
                      </div>                      
                      <div class="form-group">
                        <input type="text" class="form-control " name="nama" value="<?= $data_warga['nama']?>" readonly>
                      </div>
                      <?php } ?>
                      <div class="form-group">
                      <label for="pengajuan">Keperluan :</label>
                      <textarea name="pengajuan" rows="3" class="form-control"><?= $data_ubah['pengajuan']?></textarea>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control " name="status" value="<?= "Status: ".$data_ubah['status']?>" readonly>
                      </div>
                      <hr>
                      <p style="font-size:8pt;">* jika klik <strong>Submit</strong> maka status berubah Diterima. Data tidak bisa dirubah</p>
                      <button type="submit" name="ubah" class="btn btn-info btn-user btn-block">Submit</button>
                    </form>
                  </div>
                  <?php
                
                if (isset($_POST['ubah'])) {
                  $id_ubah    = $_POST['id_pengajuan'];
                  $pengajuan  = $_POST['pengajuan'];
                  $status     = 'diterima';

                  $ubah = $conn->query("UPDATE tb_pengajuan SET pengajuan = '$pengajuan', status ='$status' WHERE id_pengajuan='$id_ubah'");
                  if ($ubah) {
                    ?>
                      <script>
                      alert("Data berhasil diterima");
                      window.location.href="?page=pengajuan";
                      </script>
                    <?php
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

            
            <!-- modal tambah-->
            <div class="modal fade" id="modalTambahForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Form Tambah Pengguna</h4>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button> -->
                  </div>
                
                  <div class="modal-body mx-3 mb-4">
                    <form class="user" method="POST">
                      <div class="form-group">
                        <input type="text" class="form-control " placeholder="Username" name="username">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control " placeholder="Password" name="password">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control " placeholder="Nama Lengkap" name="nama">
                      </div>
                      <hr><br>
                      <button type="submit" name="tambah" class="btn btn-info btn-user btn-block">Submit</button>
                    
                  </div>
                </div>
              </div>
            </div>

            <?php 

            
            if (isset($_POST['tambah'])) {
              
              $username    = $_POST['username'];
              $password   = $_POST['password'];
              $nama       = $_POST['nama'];


              $tambah = $conn->query("INSERT INTO tb_user (username, password, nama) VALUES 
              ('$username',
              '$password',
              '$nama'
              )
              ");
              if ($tambah) {
                ?>
                <script>
                alert("Data berhasil ditambahkan");
                window.location.href="?page=pengguna";
                </script>
                <?php
              }
            }


            ?>

            
            <?php 
              if (isset($_POST['hapus'])) {
                 $id_warga_hapus = $_POST['id_warga'];

                 $hapus = $conn->query("DELETE FROM tb_pengajuan WHERE id_warga='$id_warga_hapus'");

                if ($hapus) {
                    ?>
                   <script>
                     alert("Data berhasil dihapus");
                     window.location.href="?page=pengajuan";
                   </script>
                  <?php
                    }
                  }
            ?>


            