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

  <title>Riwayat Pengajuan | Aplikasi Pelayanan Desa Sukodono</title>
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
                <div class="col-lg-7 my-2 pt-2 pl-3">
                  <form action="riwayat_lacak.php" class="user" method="POST">
                    <div class="form-row">
                      <?php 
                      $lacak = "";
                      if (isset($lacak)) {
                        $lacak = $_POST['lacak'];
                        
                      } 

                      
                      ?>
                      <div class="form-group col-md-6">
                        <input type="text" name="lacak" value="<?= $lacak; ?>" placeholder="Masukkan Nomor Registrasi Anda"
                          class="form-control form-control-user" autocomplete="off" required autofocus>
                      </div>
                      <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-success btn-user">Lacak</button>
                      </div>
                    </div>
                  </form>

                  <?php 
                  
                  // $pending = "pending";
                  $lacak = $_POST['lacak'];
                  if (isset($_POST['lacak'])) {

                    $sql = $conn->query("SELECT * FROM tb_pengajuan WHERE kode='$lacak'");
                    $data = $sql->fetch_assoc();

                    if ($data['status'] == 'pending') {
                      
                      echo"<h3 class='mb-5'>Lihat Pengajuan Surat Anda.</h3>";

                      echo"<i class='fas fa-edit pr-3 text-success' style='font-size: 13vh;'></i>";

                      echo"<i class='fas fa-angle-right pr-2' style='font-size: 8vh;'></i>";

                      echo"<i class='fas fa-trash pr-3 pl-3' style='font-size: 13vh;'></i>";

                      echo"<i class='fas fa-angle-right pr-3 pl-3' style='font-size: 8vh;'></i>";

                      echo"<i class='fas fa-user pr-3 pl-3' style='font-size: 13vh;'></i>";

                      echo"<i class='fas fa-angle-right pr-3 pl-3' style='font-size: 8vh;'></i>";

                      echo"<i class='fas fa-folder-open pr-3 pl-3' style='font-size: 13vh;'></i>";

                      echo"<h4 class='mt-4'>Status Pengajuan Surat Pengantar Anda : ".$data['status']; ".</h4>";
                    }
                    if ($data['status'] == 'diterima') {
                      
                      echo"<h3 class='mb-5'>Lihat Pengajuan Surat Anda.</h3>";

                      echo"<i class='fas fa-edit pr-3 text-success' style='font-size: 13vh;'></i>";

                      echo"<i class='fas fa-angle-right pr-2 text-success' style='font-size: 8vh;'></i>";

                      echo"<i class='fas fa-trash pr-3 pl-3 text-success' style='font-size: 13vh;'></i>";

                      echo"<i class='fas fa-angle-right pr-3 pl-3' style='font-size: 8vh;'></i>";

                      echo"<i class='fas fa-user pr-3 pl-3' style='font-size: 13vh;'></i>";

                      echo"<i class='fas fa-angle-right pr-3 pl-3' style='font-size: 8vh;'></i>";

                      echo"<i class='fas fa-folder-open pr-3 pl-3' style='font-size: 13vh;'></i>";

                      echo"<h4 class='mt-4'>Status Pengajuan Surat Pengantar Anda : ".$data['status']; ".</h4>";
                    }
                    if ($data['status'] == 'konfirmasi') {
                      
                      echo"<h3 class='mb-5'>Lihat Pengajuan Surat Anda.</h3>";

                      echo"<i class='fas fa-edit pr-3 text-success' style='font-size: 13vh;'></i>";

                      echo"<i class='fas fa-angle-right pr-2 text-success' style='font-size: 8vh;'></i>";

                      echo"<i class='fas fa-trash pr-3 pl-3 text-success' style='font-size: 13vh;'></i>";

                      echo"<i class='fas fa-angle-right pr-3 pl-3 text-success' style='font-size: 8vh;'></i>";

                      echo"<i class='fas fa-user pr-3 pl-3 text-success' style='font-size: 13vh;'></i>";

                      echo"<i class='fas fa-angle-right pr-3 pl-3' style='font-size: 8vh;'></i>";

                      echo"<i class='fas fa-folder-open pr-3 pl-3' style='font-size: 13vh;'></i>";

                      echo"<h4 class='mt-4'>Status Pengajuan Surat Pengantar Anda : ".$data['status']; ".</h4>";
                    } elseif(empty($lacak)) {
                      # code...
                    ?>
                      <h3 class="mb-5">Lihat Pengajuan Surat Anda.</h3>

                  <i class="fas fa-edit pr-3" style="font-size: 13vh;"></i>

                  <i class="fas fa-angle-right pr-2" style="font-size: 8vh;"></i>

                  <i class="fas fa-trash pr-3 pl-3" style="font-size: 13vh;"></i>

                  <i class="fas fa-angle-right pr-3 pl-3" style="font-size: 8vh;"></i>

                  <i class="fas fa-user pr-3 pl-3" style="font-size: 13vh;"></i>

                  <i class="fas fa-angle-right pr-3 pl-3" style="font-size: 8vh;"></i>

                  <i class="fas fa-folder-open pr-3 pl-3" style="font-size: 13vh;"></i>

                  <h4 class="mt-4">Status Pengajuan Surat Pengantar Anda : <?= $data["status"]; ?></h4>

                    <?php }

                    // 24qNs

                    // if (mysqli_num_rows($sql) > 0) {
                    //   # code...
                    // }
                  }
                  ?>
                  <h3 class="mb-5">Lihat Pengajuan Surat Anda.</h3>

                  <i class="fas fa-edit pr-3" style="font-size: 13vh;"></i>

                  <i class="fas fa-angle-right pr-2" style="font-size: 8vh;"></i>

                  <i class="fas fa-trash pr-3 pl-3" style="font-size: 13vh;"></i>

                  <i class="fas fa-angle-right pr-3 pl-3" style="font-size: 8vh;"></i>

                  <i class="fas fa-user pr-3 pl-3" style="font-size: 13vh;"></i>

                  <i class="fas fa-angle-right pr-3 pl-3" style="font-size: 8vh;"></i>

                  <i class="fas fa-folder-open pr-3 pl-3" style="font-size: 13vh;"></i>

                  <h4 class="mt-4">Status Pengajuan Surat Pengantar Anda : <?= $data["status"]; ?></h4>

                </div>
                <div class="col-lg-5 d-none d-lg-block">
                  <img src="assets/img/cari.png" alt="tracking" width="70%" class="float-right">
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
    </div> <!-- /.container -->

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

<?php include('inc/footer.php'); ?>