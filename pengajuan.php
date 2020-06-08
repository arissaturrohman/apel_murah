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
                                    <form action="" class="p-1">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nik">NIK</label>
                                                <input type="number" name="nik" id="nik" placeholder=""
                                                    class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="no_kk">KK</label>
                                                <input type="number" name="no_kk" id="no_kk" placeholder=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" name="nama" id="nama" placeholder=""
                                                class="form-control">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">

                                                <label for="jk">Jenis Kelamin</label>
                                                <select name="jk" id="jk" class="form-control">
                                                    <option value="">-</option>
                                                    <option value="">Laki-laki</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="lahir">Tempat Lahir</label>
                                                <input type="text" name="lahir" id="lahir" placeholder=""
                                                    class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="username">Tanggal Lahir</label>
                                                <input type="date" name="tgl_lahir " id="tgl_lahir" placeholder=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label for="alamat">Alamat</label>
                                                <input name="alamat" id="alamat" rows="5" class="form-control">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="rt">RT</label>
                                                <input type="text" name="rt" id="rt" placeholder=""
                                                    class="form-control">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="rw">RW</label>
                                                <input type="text" name="rw" id="rw" placeholder=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="keperluan">Keperluan</label>
                                            <textarea name="keperluan" id="keperluan" rows="6" class="form-control"
                                                placeholder="Tulis keperluan Anda. contoh: Perekaman e-KTP"></textarea>
                                        </div>
                                    </form>
                                    <button type="sumbit" name="kirim" class="btn btn-success">Kirim</button>

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


                <!-- <div class="col-md-3 mb-md-0 mb-3">

        
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled">
            <li>
              <a href="#">Home</a>
            </li>
            <li>
              <a href="#!">Pelayanan</a>
            </li>
            <li>
              <a href="#!">Riwayat</a>
            </li>
          </ul>

        </div> -->
                <!-- Grid column -->

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
    <!-- Footer -->

    <!-- FOOTER
  <footer class="sticky-footer bg-dark">
    <div class="container">
      <p class="text-white-50 mt-1">&copy; 2017-2020 Pemerintah Desa Sukodono &middot; <a href="#">Privacy</a>
        &middot; <a href="#">Terms</a></p>
    </div>
    <p class="float-right text-white"><a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a></p>
  </footer> -->

    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="text-center modal-header">
          <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer text-center d-flex justify-content-center">
          <button type="button" class="btn btn-outline-secondary">Login</button>
        </div>
      </div>
    </div>
  </div> -->


    <!--Modal1-->

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
                <div class="modal-body mx-3 mb-4">
                    <form action="" class="user">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <i class="fas fa-envelope input-group-text grey-text pt-3"></i>
                            </div>
                            <input type="text" class="form-control form-control-user" placeholder="Username">
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <i class="fas fa-lock input-group-text grey-text pt-3"></i>
                            </div>
                            <input type="password" class="form-control form-control-user" placeholder="Password">
                        </div>
                        <hr><br>
                        <button class="btn btn-dark btn-user btn-block">Login</button>
                    </form>
                </div>
                <!-- <div class="modal-footer d-flex justify-content-center">
          <button class="btn btn-dark btn-user p-2">Login</button>
        </div> -->
            </div>
        </div>
    </div>

<?php include('inc/footer.php'); ?>