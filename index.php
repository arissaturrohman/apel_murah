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

  <title>Aplikasi Pelayanan Desa Sukodono</title>
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
                <div class="col-lg-6 d-none d-lg-block">
                  <img src="assets/img/bg.png" alt="" width="100%" height="100%">
                </div>
                <div class="col-lg-6">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h3 text-gray-900 mb-2">Selamat Datang!</h1>
                      <h3 class="h4 text-gray-900 mb-3">Silahkan Masukkan <strong>NIK</strong> Anda untuk pengecekan
                        data Anda.
                      </h3>
                    </div>
                      <?php 
                      
                      $nik = $_POST['nik'];
                      
                      if (isset($_POST['cari'])) {
                        
                        $sql = $conn->query("SELECT* FROM tb_penduduk WHERE nik='$nik'");
                        $data = $sql->fetch_assoc();
                        
                        if (mysqli_num_rows($sql) == 0) {
                          
                          $gagal = true;
                        }
                      }
                      ?>
                    <?php if(isset($gagal)): ?>                      
                      <div class="alert alert-danger">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      Data tidak ditemukan, mohon periksa kembali</div>
                    <?php endif; ?>
                    <form action="" class="user" method="POST">
                      <div class="form-group">
                        <input type="number" name="nik" id="nik" class="form-control form-control-user" placeholder="Masukkan NIK Anda">
                      </div>
                      <button type="submit" name="cari" class="btn btn-dark btn-user btn-block" >
                        Submit
                      </button>
                      <a href="pengajuan.php" class="btn btn-success btn-user btn-block">
                        Permohonan
                      </a>

                      <div class="text-center">
                      <?= $data['nik'];?>
                      <?= $data['nama']; ?>
                      </div>

                    </form>                      

                    <hr>
                    <div class="text-center">
                      Belum terdaftar? <br> Silahkan Registrasi
                    </div>
                    <div class="text-center">
                      <a class="small" href="#">Registrasi!</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4  text-center text-dark">
          <i class="fas fa-rocket" style="font-size: 14vh;"></i>
          <h2>Cepat</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh
            ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
            Praesent commodo cursus magna.</p>
          <!-- <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p> -->
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4 text-center text-dark">
          <i class="fas fa-wallet" style="font-size: 14vh;"></i>
          <h2>Murah</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
            Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo,
            tortor mauris condimentum nibh.</p>
          <!-- <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p> -->
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4 text-dark text-center">
          <i class="fas fa-cogs" style="font-size: 14vh;"></i>
          <h2>Mudah</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id
            ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris
            condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <!-- <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p> -->
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your
              mind.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis
            euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus,
            tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
          <img src="assets/img/cepat.png"
            class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500"
            preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: cepat"
            alt="cepat">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for
              yourself.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis
            euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus,
            tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5 order-md-1">
          <img src="assets/img/wallet.png"
            class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto text-dark" width="500"
            height="500" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"
            aria-label="Placeholder: cepat" alt="cepat">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis
            euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus,
            tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
          <img src="assets/img/mudah.png"
            class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500"
            preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: murah" alt="">
        </div>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->

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
    <div class="footer-copyright text-white-50 text-center py-3">&copy; 2019-2020 Pemerintah Desa Sukodono | created by
      :
      <!-- <a href="https://github.com/arissaturrohman">Nang Aris</a> -->
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


  <?php include('inc/footer.php'); ?>


