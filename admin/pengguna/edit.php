            
                  <div class="card shadow">
                    <div class="card-body">
                    <form class="user" method="POST">

                      <?php 
                  $id_user = $_GET['id_user'];
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
                  <?php } ?>
                      <button type="submit" name="ubah" class="btn btn-info btn-user btn-block">Submit</button>
                    
                  </div>
                  </form>
                <?php 
                  
                if (isset($_POST['ubah'])) {
                  $id_user   = $_POST['id_user'];
                  $username  = $_POST['username'];
                  $password  = $_POST['password'];
                  $nama      = $_POST['nama'];

                  $ubah = $conn->query("UPDATE tb_user SET 
                  username      ='$username', 
                  password      ='$password', 
                  nama          ='$nama'
                  WHERE id_user ='$id_user'
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