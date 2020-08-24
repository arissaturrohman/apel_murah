<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pengguna</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Nama</th>                      
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                    
                    $no = 1;
                    
                    $tampil = $conn->query("SELECT * FROM tb_user");
                    while($data=$tampil->fetch_assoc()){
                      
                    
                    ?>

                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $data['username']; ?></td>
                      <td><?= $data['nama']; ?></td>
                      <td>
                        <a href="#" class="btn btn-success btn-circle btn-sm" title="edit" data-toggle="modal" data-target="#modalUbahForm<?= $data['id_user']?>">
                        <i class="fas fa-edit"></i>
                        </a>

                       <form method="POST">
                          
                      <input type="hidden" class="form-control " name="id_user" value="<?= $data['id_user']?>">

                      <button onclick="return confirm('Yakin menghapus data ini..?')" type="submit" name="hapus" class="btn btn-danger btn-circle btn-sm" title="hapus">
                        <i class="fas fa-trash"></i>
                      </button>
                      </form>

                      </td>
                    </tr>

                      <!-- modal ubah-->
            <div class="modal fade" id="modalUbahForm<?= $data['id_user']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Form Ubah Pengguna</h4>
                   
                  </div>
                  <div class="modal-body mx-3 mb-4">                  
                  
                    <form class="user" method="POST">

                    <?php 
                    $id_user = $data['id_user'];
                    $sql_ubah = $conn->query("SELECT * FROM tb_user WHERE id_user='$id_user'");
                    while ($data_ubah=$sql_ubah->fetch_assoc()) {
                    
                    ?>
                  
                    <div class="form-group">
                    <input type="hidden" class="form-control " name="id_user" value="<?= $data_ubah['id_user']?>">
                    </div>
                      <div class="form-group">
                      <input type="text" class="form-control " name="username" value="<?= $data_ubah['username']?>">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control " name="password">
                      </div>                      
                      <div class="form-group">
                        <input type="text" class="form-control " name="nama" value="<?= $data_ubah['nama']?>">
                      </div>
                      <hr><br>
                      <button type="submit" name="ubah" class="btn btn-info btn-user btn-block">Submit</button>
                    </form>
                  </div>
                <?php 
                
                if (isset($_POST['ubah'])) {
                  $id_ubah    = $_POST['id_user'];
                  $username   = $_POST['username'];
                  $password   = $_POST['password'];
                  $nama       = $_POST['nama'];

                  $ubah = $conn->query("UPDATE tb_user SET 
                  username    ='$username', 
                  password    ='$password', 
                  nama        ='$nama'

                  WHERE id_user='$id_ubah'
                  ");
                  if ($ubah) {
                    ?>
                      <script>
                      alert("Data berhasil diubah");
                      window.location.href="?page=pengguna";
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
                 $id_user_hapus = $_POST['id_user'];

                 $hapus = $conn->query("DELETE FROM tb_user WHERE id_user='$id_user_hapus'");

                if ($hapus) {
                    ?>
                   <script>
                     alert("Data berhasil dihapus");
                     window.location.href="?page=pengguna";
                   </script>
                  <?php
                    }
                  }
            ?>


            