<?php 

if (isset($_GET['page'])) {
    if ($_GET['page']=='penduduk') {
        include "penduduk/penduduk.php";
    } elseif ($_GET['page']=='pelayanan') {
        include "pelayanan/pelayanan.php";
    }
    else{
        echo "Halaman tidak ditemukan";
    }
} else {
    include('dashboard.php');
}

?>