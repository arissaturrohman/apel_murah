<?php 

session_start();
include('inc/config.php');

error_reporting(E_ALL ^(E_NOTICE | E_WARNING));

if (isset($_POST["login"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $conn->query("SELECT * FROM tb_user WHERE username='$username'");

    //cek username
    if (mysqli_num_rows($query) > 0) {
        
        //cek password
        $row = mysqli_fetch_assoc($query);
        if (password_verify($password, $row["password"])) {
            
            $_SESSION['login'] = true;
          if ($row['level'] == "petugas") {
            $_SESSION['username'] = $username;
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['level'] = "petugas";
            
            header('location:admin/index.php');
            exit;
          } elseif ($row['level'] == "admin") {
            $_SESSION['username'] = $username;
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['level'] = "admin";
                      
            header('location:admin/index.php');
            exit;
        }
    }
  }

    $error = true;
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fontawesome-free/css/all.min.css">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">

    <title>Form Pengajuan | Aplikasi Pelayanan Desa Sukodono</title>
</head>

<body id="page-top">

    <?php include('inc/menu.php'); ?>
    <main role="main">

        <!--Form Pelayanan -->

        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col">
                    <div class="card o-hidden border-0 my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-7">
                                    <h3 class="text-center">Form Pengajuan Pelayanan</h3>
                                    <hr>
                                    
                                    <form action="" class="p-1" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nik">NIK</label>                                                   
                                                <input type="number" name="nik" id="nik" placeholder="Masukkan NIK Anda"
                                                class="form-control">                                                
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="no_kk">KK</label>
                                                <input type="number" name="kk" id="kk" placeholder=""
                                                    class="form-control" disabled>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" name="nama"  id="nama"  class="form-control" disabled>
                                            </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="jk">Jenis Kelamin</label>                                                
                                                <input type="text" name="jk" id="jk"
                                                    class="form-control" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="tmp_lahir">Tempat Lahir</label>
                                                <input type="text" name="tmp_lahir" id="tmp_lahir" placeholder=""
                                                    class="form-control" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="tgl_lahir">Tanggal Lahir</label>
                                                <input type="date" name="tgl_lahir " id="tgl_lahir" placeholder=""
                                                    class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label for="alamat">Alamat</label>
                                                <input name="alamat" id="alamat" rows="5" class="form-control" disabled>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="rt">RT</label>
                                                <input type="text" name="rt" id="rt" placeholder=""
                                                    class="form-control" disabled>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="rw">RW</label>
                                                <input type="text" name="rw" id="rw" placeholder=""
                                                    class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="keperluan">Keperluan</label>
                                            <textarea name="keperluan" id="keperluan" rows="6" class="form-control"
                                                placeholder="contoh: Perekaman e-KTP" required></textarea>
                                        </div>
                                    <button type="sumbit" name="kirim" class="btn btn-success">Kirim</button>
                                    <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                                    </form>

                                </div>
                                <div class="col-lg-5 d-none d-lg-block">
                                    <img src="assets/img/pengajuan.png" alt="pengajuan" width="70%"
                                        class="float-right mr-5">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        </div><!-- /.container -->

    </main>


    <!-- Footer -->
    <footer class="page-footer font-small bg-dark pt-4">

        <!-- Footer Links -->
        <div class="container text-center text-white-50 text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-8 mt-md-0 mt-3">

                    <!-- Content -->
                    <h5 class="text-uppercase">Footer Content</h5>
                    <p>Here you can use rows and columns to organize your footer content.</p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">



                <!-- Grid column -->
                <div class="col-md-4 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase">Tentang</h5>

                    <p>
                        <i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                    <p>
                        <i class="fas fa-envelope mr-3"></i> info@example.com</p>
                    <p>
                        <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-white-50 text-center py-3">&copy; 2019-2020 Pemerintah Desa Sukodono | created
            by
            :
            <a href="https://github.com/arissaturrohman">Nang Aris</a>
            <p class="float-right text-white"><a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a></p>
        </div>
        <!-- Copyright -->

    </footer>


    <!--Login-->

  <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php if(isset($error)): ?>
          <p style="color:red; font-style:italic; text-align:center">Username / Password salah</p>
        <?php endif; ?>
        <div class="modal-body mx-3 mb-4">
          <form class="user" method="POST">
            <div class="form-group">
              <!-- <div class="input-group-prepend">
                <i class="fas fa-envelope input-group-text grey-text pt-3"></i>
              </div> -->
              <input type="text" class="form-control form-control-user" placeholder="Username" name="username">
            </div>
            <div class="form-group">
              <!-- <div class="input-group-prepend">
                <i class="fas fa-lock input-group-text grey-text pt-3"></i>
              </div> -->
              <input type="password" class="form-control form-control-user" placeholder="Password" name="password">
            </div>
            <hr><br>
            <button type="submit" name="login" class="btn btn-dark btn-user btn-block">Login</button>
          
        </div>
      </div>
    </div>
  </div>

   
  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

<script>
$(document).ready(function(){
    $("#nik").change(function(){
        let nik = $('#nik').val();
        $.ajax({
            method: "GET",
            url: "load.php",
            data: {nik: nik}
        }).done(function(data){
            let obj = JSON.parse(data);
            $('#nama').val(obj.nama);
            $('#kk').val(obj.kk);
            $('#jk').val(obj.jk);
            $('#tmp_lahir').val(obj.tmp_lahir);
            $('#tgl_lahir').val(obj.tgl_lahir);
            $('#alamat').val(obj.alamat);
            $('#rt').val(obj.rt);
            $('#rw').val(obj.rw);

        });
    })
});
</script>

<script>
$(document).ready(function(){
    var data = "suggest.php";
    $("#nama").autocomplete({
        source: data
    });
});
</script>

</body>

</html>


<?php 

$nik        = $_POST['nik'];
$keperluan  = $_POST['keperluan'];
$status     = "pending";
$karakter   = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789";
$kode_acak  = substr(str_shuffle($karakter),0,5);

if (isset($_POST['kirim'])) {

    $sql_nik = $conn->query("SELECT * FROM tb_penduduk WHERE nik='$nik'");
    $data = $sql_nik->fetch_assoc();
    $nik = $data['id_warga'];
    
    
    $sql = $conn->query("INSERT INTO tb_pengajuan (id_warga, pengajuan, status, kode)
        values('$nik',
                '$keperluan',
                '$status',
                '$kode_acak')");

    if ($sql) {
        ?>
        <script>
            alert("Pengajuan berhasil ditambahkan");
            window.location.href="pengajuan.php";        
        </script>
        <?php 
    }
}

?>