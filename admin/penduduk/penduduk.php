<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Penduduk</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
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
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                    
                    $no = 1;
                    
                    $tampil = $conn->query("SELECT * FROM tb_penduduk");
                    while($data=$tampil->fetch_assoc()){
                      
                    
                    ?>

                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $data['nik']; ?></td>
                      <td><?= $data['kk']; ?></td>
                      <td><?= $data['status_kk']; ?></td>
                      <td><?= $data['nama']; ?></td>
                      <td><?= $data['tmp_lahir']; ?></td>
                      <td><?= $data['tgl_lahir']; ?></td>
                      <td><?= $data['jk']; ?></td>
                      <td><?= $data['agama']; ?></td>
                      <td><?= $data['status_kawin']; ?></td>
                      <td><?= $data['pekerjaan']; ?></td>
                      <td><?= $data['negara']; ?></td>
                      <td><?= $data['gol_darah']; ?></td>
                      <td><?= $data['alamat']; ?></td>
                      <td><?= $data['rt']; ?> / <?= $data['rw']; ?></td>
                      <td><?= $data['desa']; ?></td>
                      <td><?= $data['kode_pos']; ?></td>
                      <td>
                        <a href="#" class="btn btn-success btn-circle btn-sm" title="edit" data-toggle="modal" data-target="#modalUbahForm<?= $data['id_warga']?>">
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
            <div class="modal fade" id="modalUbahForm<?= $data['id_warga']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Form Ubah Penduduk</h4>
                   
                  </div>
                  <div class="modal-body mx-3 mb-4">                  
                  
                    <form class="user" method="POST">

                    <?php 
                    $id_warga = $data['id_warga'];
                    $sql_ubah = $conn->query("SELECT * FROM tb_penduduk WHERE id_warga='$id_warga'");
                    while ($data_ubah=$sql_ubah->fetch_assoc()) {
                    
                    ?>
                  
                    <div class="form-group">
                    <input type="hidden" class="form-control " name="id_warga" value="<?= $data_ubah['id_warga']?>">
                    </div>
                      <div class="form-group">
                      <input type="text" class="form-control " name="nik" value="<?= $data_ubah['nik']?>">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control " name="kk" value="<?= $data_ubah['kk']?>">
                      </div>
                      <div class="form-group">
                        <select name="status_kk" class="form-control ">
                        <option <?php if($data['status_kk']=='Kepala Keluarga'){echo "selected";} ?> value="Kepala Keluarga">Kepala Keluarga</option>
                        <option <?php if($data['status_kk']=='Istri'){echo "selected";} ?> value="Istri">Istri</option>
                        <option <?php if($data['status_kk']=='Anak'){echo "selected";} ?> value="Anak">Anak</option>
                        <option <?php if($data['status_kk']=='Ayah'){echo "selected";} ?> value="Ayah">Ayah</option>
                        <option <?php if($data['status_kk']=='Ibu'){echo "selected";} ?> value="Ibu">Ibu</option>
                                                
                        </select>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control " name="nama" value="<?= $data_ubah['nama']?>">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="tempat_lahir" value="<?= $data_ubah['tmp_lahir']?>">
                      </div>
                      <div class="form-group">
                        <input type="date" class="form-control " name="tgl_lahir" value="<?= $data_ubah['tgl_lahir']?>">
                      </div>
                      <div class="form-group">
                        <select name="jk" class="form-control">
                        
                        <option <?php if($data['jk']=='Laki-Laki'){echo "selected";} ?> value="Laki-laki">Laki-Laki</option>
                        <option <?php if($data['jk']=='Perempuan'){echo "selected";} ?> value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                      <select name="agama" class="form-control ">
                        <option <?php if($data['agama']=='Islam'){echo "selected";} ?> value="Islam">Islam</option>
                        <option <?php if($data['agama']=='Kristen'){echo "selected";} ?> value="Kristen">Kristen</option>
                        <option <?php if($data['agama']=='Hindu'){echo "selected";} ?> value="Hindu">Hindu</option>
                        <option <?php if($data['agama']=='Budha'){echo "selected";} ?> value="Budha">Budha</option>
                        <option <?php if($data['agama']=='Katholik'){echo "selected";} ?> value="Katholik">Katholik</option>
                        </select>
                      </div>
                      <div class="form-group">
                      <select name="status" class="form-control ">
                        <option <?php if($data['status_kawin']=='Belum Kawin'){echo "selected";} ?> value="Belum Kawin">Belum Kawin</option>
                        <option <?php if($data['status_kawin']=='Kawin'){echo "selected";} ?> value="Kawin">Kawin</option>
                        <option <?php if($data['status_kawin']=='Cerai Hidup'){echo "selected";} ?> value="Cerai Hidup">Cerai Hidup</option>
                        <option <?php if($data['status_kawin']=='Cerai Mati'){echo "selected";} ?> value="Cerai Mati">Cerai Mati</option>                        
                        </select>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control " name="pekerjaan" value="<?= $data_ubah['pekerjaan'];?>">
                      </div>
                      <div class="form-group">
                      <select name="warga" class="form-control ">
                        <option <?php if($data['negara']=='WNI (Warga Negara Indonesia'){echo "selected";} ?> value="WNI (Warga Negara Indonesia)">WNI (Warga Negara Indonesia)</option>
                        <option  <?php if($data['negara']=='WNA (Warga Negara Asing'){echo "selected";} ?> value="WNA (Warga Negara Asing)">WNA (Warga Negara Asing)</option>                    
                        </select>
                      </div>
                      <div class="form-group">
                      <select name="darah" class="form-control ">
                        <option <?php if($data['gol_darah']=='Gol. Darah A'){echo "selected";} ?> value="Gol. Darah A">Gol. Darah A</option>
                        <option <?php if($data['gol_darah']=='Gol. Darah B'){echo "selected";} ?> value="Gol. Darah B">Gol. Darah B</option>
                        <option <?php if($data['gol_darah']=='Gol. Darah AB'){echo "selected";} ?> value="Gol. Darah AB">Gol. Darah AB</option>
                        <option <?php if($data['gol_darah']=='Gol. Darah O'){echo "selected";} ?> value="Gol. Darah O">Gol. Darah O</option>                        
                        </select>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control " name="alamat" value="<?= $data_ubah['alamat'];?>">
                      </div>
                      <div class="form-group">
                      <div class="row">
                      <div class="col">                      
                        <input type="text" class="form-control " name="rt" value="<?= $data_ubah['rt'];?>">
                      </div>
                      <div class="col">                      
                        <input type="text" class="form-control " name="rw" value="<?= $data_ubah['rw'];?>">
                      </div>
                      </div>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control " name="desa" value="<?= $data_ubah['desa'];?>">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control " name="kode_pos" value="<?= $data_ubah['kode_pos'];?>">
                      </div>
                      <hr><br>
                      <button type="submit" name="ubah" class="btn btn-info btn-user btn-block">Submit</button>
                    </form>
                  </div>
                <?php 
                
                if (isset($_POST['ubah'])) {
                  $id_ubah    = $_POST['id_warga'];
                  $nik        = $_POST['nik'];
                  $kk         = $_POST['kk'];
                  $nama       = $_POST['nama'];
                  $tmp_lahir  = $_POST['tempat_lahir'];
                  $tgl_lahir  = $_POST['tgl_lahir'];
                  $jk         = $_POST['jk'];
                  $agama      = $_POST['agama'];
                  $status     = $_POST['status'];
                  $pekerjaan  = $_POST['pekerjaan'];
                  $warga      = $_POST['warga'];
                  $darah      = $_POST['darah'];
                  $alamat     = $_POST['alamat'];
                  $rt         = $_POST['rt'];
                  $rw         = $_POST['rw'];
                  $desa       = $_POST['desa'];
                  $kd_pos     = $_POST['kode_pos'];
                  $status_kk  = $_POST['status_kk'];

                  $ubah = $conn->query("UPDATE tb_penduduk SET 
                  nik         ='$nik', 
                  kk          ='$kk', 
                  nama        ='$nama', 
                  jk          ='$jk', 
                  tmp_lahir   ='$tmp_lahir', 
                  tgl_lahir   ='$tgl_lahir', 
                  agama       ='$agama', 
                  negara      ='$warga', 
                  gol_darah   ='$darah', 
                  status_kawin='$status', 
                  alamat      ='$alamat', 
                  rt          ='$rt', 
                  rw          ='$rw', 
                  desa        ='$desa', 
                  status_kk   ='$status_kk', 
                  pekerjaan   ='$pekerjaan', 
                  kode_pos    ='$kd_pos' 
                  WHERE id_warga='$id_ubah'
                  ");
                  if ($ubah) {
                    ?>
                      <script>
                      alert("Data berhasil diubah");
                      window.location.href="?page=penduduk";
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
                    <h4 class="modal-title w-100 font-weight-bold">Form Tambah Penduduk</h4>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button> -->
                  </div>
                
                  <div class="modal-body mx-3 mb-4">
                    <form class="user" method="POST">
                      <div class="form-group">
                        <input type="text" class="form-control " placeholder="NIK" name="nik">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control " placeholder="No KK" name="kk">
                      </div>
                      <div class="form-group">
                        <select name="status_kk" class="form-control ">
                        <option value="Kepala Keluarga">Kepala Keluarga</option>
                        <option value="Istri">Istri</option>
                        <option value="Anak">Anak</option>
                        <option value="Ayah">Ayah</option>
                        <option value="Ibu">Ibu</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control " placeholder="Nama Lengkap" name="nama">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control " placeholder="Tempat Lahir" name="tempat_lahir">
                      </div>
                      <div class="form-group">
                        <input type="date" class="form-control " name="tgl_lahir">
                      </div>
                      <div class="form-group">
                        <select name="jk" class="form-control ">
                        <option value="Laki-laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                      <select name="agama" class="form-control ">
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Katholik">Katholik</option>
                        </select>
                      </div>
                      <div class="form-group">
                      <select name="status" class="form-control ">
                        <option value="Belum Kawin">Belum Kawin</option>
                        <option value="Kawin">Kawin</option>
                        <option value="Cerai Hidup">Cerai Hidup</option>
                        <option value="Cerai Mati">Cerai Mati</option>                        
                        </select>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control " placeholder="Pekerjaan" name="pekerjaan">
                      </div>
                      <div class="form-group">
                      <select name="warga" class="form-control ">
                        <option value="WNI (Warga Negara Indonesia)">WNI (Warga Negara Indonesia)</option>
                        <option value="WNA (Warga Negara Asing)">WNA (Warga Negara Asing)</option>                    
                        </select>
                      </div>
                      <div class="form-group">
                      <select name="darah" class="form-control ">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>                        
                        </select>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control " placeholder="Alamat" name="alamat">
                      </div>
                      <div class="form-group">
                      <div class="row">
                      <div class="col">                      
                        <input type="text" class="form-control " placeholder="RT" name="rt">
                      </div>
                      <div class="col">                      
                        <input type="text" class="form-control " placeholder="RW" name="rw">
                      </div>
                      </div>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control " placeholder="Desa" name="desa">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control " placeholder="Kode Pos" name="kode_pos">
                      </div>
                      <hr><br>
                      <button type="submit" name="tambah" class="btn btn-info btn-user btn-block">Submit</button>
                    
                  </div>
                </div>
              </div>
            </div>

            <?php 

            
            if (isset($_POST['tambah'])) {
              
              $nik        = $_POST['nik'];
              $kk         = $_POST['kk'];
              $nama       = $_POST['nama'];
              $tmp_lahir  = $_POST['tempat_lahir'];
              $tgl_lahir  = $_POST['tgl_lahir'];
              $jk         = $_POST['jk'];
              $agama      = $_POST['agama'];
              $status     = $_POST['status'];
              $pekerjaan  = $_POST['pekerjaan'];
              $warga      = $_POST['warga'];
              $darah      = $_POST['darah'];
              $alamat     = $_POST['alamat'];
              $rt         = $_POST['rt'];
              $rw         = $_POST['rw'];
              $desa       = $_POST['desa'];
              $kd_pos     = $_POST['kode_pos'];
              $status_kk  = $_POST['status_kk'];

              



              $tambah = $conn->query("INSERT INTO tb_penduduk (nik, kk, nama, jk, tmp_lahir, tgl_lahir, agama, negara, gol_darah, status_kawin, alamat, rt, rw, desa, status_kk, pekerjaan, kode_pos) VALUES 
              ('$nik',
              '$kk',
              '$nama',
              '$jk',
              '$tmp_lahir',
              '$tgl_lahir',
              '$agama',
              '$warga',
              '$darah',
              '$status',
              '$alamat',
              '$rt',
              '$rw',
              '$desa',
              '$status_kk',
              '$pekerjaan',
              '$kd_pos'
              )
              ");
              if ($tambah) {
                ?>
                <script>
                alert("Data berhasil ditambahkan");
                window.location.href="?page=penduduk";
                </script>
                <?php
              }
            }


            ?>

            
            <?php 
              if (isset($_POST['hapus'])) {
                 $id_warga_hapus = $_POST['id_warga'];

                 $hapus = $conn->query("DELETE FROM tb_penduduk WHERE id_warga='$id_warga_hapus'");

                if ($hapus) {
                    ?>
                   <script>
                     alert("Data berhasil dihapus");
                     window.location.href="?page=penduduk";
                   </script>
                  <?php
                    }
                  }
            ?>


            