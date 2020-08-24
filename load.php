<?php 

$conn = mysqli_connect("localhost","root","","db_pelayanan");

// $id_warga = $_GET['id_warga'];
$cari = $_GET['nik'];
$sql = $conn->query("SELECT * FROM tb_penduduk WHERE nik='$cari'");

$data = $sql->fetch_assoc(); 
$a = array(    
    'nama'         => $data['nama'],
    'kk'          => $data['kk'],
    'jk'          => $data['jk'],
    'tmp_lahir'   => $data['tmp_lahir'],
    'tgl_lahir'   => $data['tgl_lahir'],
    'alamat'      => $data['alamat'],
    'rt'          => $data['rt'],
    'rw'          => $data['rw'],
);
    
echo json_encode($a);

?>