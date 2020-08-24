<?php 

$conn = mysqli_connect("localhost","root","","db_pelayanan");

$nama = $_GET['nama'];
$sql = $conn->query("SELECT * FROM tb_penduduk WHERE nama LIKE '%".$nama."%'");

$row = $sql->fetch_assoc();
    $data = array(
        'nama' => $row['nama']
    );

echo json_encode($data);
?>