<?php 

include('inc/config.php');

if (isset($_POST['daftar'])) {
    $username = $_POST['username'];
    $nama     = $_POST['nama'];
    $level    = $_POST['level'];

    //enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $sql = $conn->query("INSERT INTO tb_user (username, password, nama, level) VALUES(        
        '$username',
        '$password',
        '$nama',
        '$level'
    )");

    if ($sql) {
        ?>
        <script type="text/javascript">
          alert("User berhasil ditambahkan..!");
          window.location.href="index.php";
        </script>
        <?php
    }
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
<body>

<div class="container">
    <form action="" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" required>
        </div>
        <div class="form-group">
            <select name="level" class="form-control" required>
               <option value="petugas">Petugas</option>
               <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit" name="daftar" class="btn btn-success">Daftar</button>
    </form>
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