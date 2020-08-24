<?php 

session_start();
include('inc/config.php');

if (isset($_POST["login"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $conn->query("SELECT * FROM tb_user WHERE username='$username'");

    //cek username
    if (mysqli_num_rows($query) === 1) {
        
        //cek password
        $row = mysqli_fetch_assoc($query);
        if (password_verify($password, $row["password"])) {

          $_SESSION['login'] = true;
          if ($row['level'] == "petugas") {
            $_SESSION['username'] = $username;
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['nik'] = $row['nik'];
            $_SESSION['level'] = "petugas";
            
            header('location:admin/index.php');
            exit;
          } elseif ($row['level'] == "admin") {
            $_SESSION['username'] = $username;
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['nik'] = $row['nik'];
            $_SESSION['level'] = "admin";
                      
            header('location:admin/index.php');
            exit;
        }
    }
  }

    $error = true;
}

?>

<!DOCTYPE html>
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

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Silahkan Login</h1>
                  </div>
                  <?php if(isset($error)): ?>
                    <p style="color:red; font-style:italic; text-align:center">Username / Password salah</p>
                    <?php endif; ?>
                  <form class="user" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Username" class="form-control" autofocus>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" class="form-control">
                    </div>
                    <button class="btn btn-primary btn-user btn-block" type="submit" name="login">
                      Login
                    </button>  
                    <div class="text-center">
                      <a class="small" href="http://localhost/apel_murah/">Pelayanan</a>
                    </div>                 
                </div>
              </div>
            </div>
          </div>
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
</body>
</html>