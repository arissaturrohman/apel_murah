<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Appel Sukodono</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">


<?php 

if ($page == "pengguna") {
  $pengguna = 'active';
}

if ($page == "penduduk") {
  $penduduk = 'active';
}
if ($page == "pengajuan") {
  $pengajuan = 'active';
}

?>
<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<?php 

$level = $_SESSION['level'] == 'petugas';
if ($level) {
  
?>

<!-- Nav Item - Charts -->
<li class="nav-item<?php echo $penduduk;?>">
  <a class="nav-link" href="?page=penduduk">
    <i class="fas fa-fw fa-table"></i>
    <span>Data Penduduk</span></a>
</li>

<!-- Nav Item - Charts
<li class="nav-item<?php echo $pengajuan;?>">
  <a class="nav-link" href="?page=pengajuan">
    <i class="fas fa-fw fa-edit"></i>
    <span>Data Pengajuan</span></a>
</li> -->

<li class="nav-item"<?php echo $pengajuan;?>">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
     <i class="fas fa-fw fa-edit"></i>
        <span>Data Pelayanan</span>

        <?php 
        
            include('../inc/config.php');  
            
            $sql = mysqli_fetch_array($conn->query("SELECT COUNT(*) FROM tb_pengajuan WHERE status = 'pending'"))[0];
            echo"<span class='badge badge-danger badge-counter'>" . $sql; "</span>";

        ?>
            
        </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
       <div class="bg-white py-2 collapse-inner rounded">
         <h6 class="collapse-header">Data Pengajuan</h6>
         <?php 
        
            include('../inc/config.php');  
            
            $sql = mysqli_fetch_array($conn->query("SELECT COUNT(*) FROM tb_pengajuan WHERE status = 'pending'"))[0];
            // echo"<span class='badge badge-danger badge-counter'>" . $sql; "</span>";

          echo"<a class='collapse-item' href='?page=pengajuan'>Pending
          <span class='badge badge-danger badge-counter'>" . $sql; "</span>
          
          </a>";
        ?>
          <a class="collapse-item" href="?page=pengajuan1">Diterima</a>
          <a class="collapse-item" href="?page=pengajuan2">Konfirmasi</a>
          <a class="collapse-item" href="?page=pengajuan4">Selesai</a>
      </div>
    </div>
</li>


<!-- Nav Item - Tables -->
<li class="nav-item<?php echo $pengguna;?>">
  <a class="nav-link" href="?page=pengguna">
    <i class="fas fa-fw fa-users"></i>
    <span>Pengguna</span></a>
</li>

<?php } else { ?>
<!-- Nav Item - Tables -->
<li class="nav-item<?php echo $pengajuan;?>">
  <a class="nav-link" href="?page=pengajuan3">
    <i class="fas fa-fw fa-edit"></i>
    <span>Pengajuan</span></a>
</li>
<?php } ?>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
