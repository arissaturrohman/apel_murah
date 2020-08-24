<?php 

if (isset($_GET['page'])) {
    if ($_GET['page']=='penduduk') {
        // $pendudukaktif = 'active';
        include "penduduk/penduduk.php";
    } elseif ($_GET['page']=='pengajuan') {
        include "pengajuan/pengajuan.php";
    } elseif ($_GET['page']=='pengajuan1') {
        include "pengajuan/pengajuan1.php";
    } elseif ($_GET['page']=='pengajuan2') {
        include "pengajuan/pengajuan2.php";
    } elseif ($_GET['page']=='pengajuan3') {
        include "pengajuan/pengajuan3.php";
    } elseif ($_GET['page']=='pengguna') {
        include "pengguna/pengguna.php";
    }
    else{
        echo "Halaman tidak ditemukan";
    }
} else {
    include('dashboard.php');
}

?>