<?php 

include('inc/config.php');
include('inc/tgl_indo.php');
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
ob_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap CSS -->
   
    <title>Cetak Pengajuan</title>
  </head>
<body>

      <table style="margin-left: auto; margin-right: auto; text-align: center;">
        <tr>
          <td rowspan="3">
            <img src="assets/img/logo.png" style="width:70px; height:90px; margin-right: 30px;" />
          </td>
          <td style="text-align: center;">
            <h3 style="margin-bottom:0px; margin-top:0px;">PEMERINTAH KABUPATEN DEMAK</h3>
          </td>
        </tr>
        <tr>
          <td>
            <h2 style="margin-bottom:0px; margin-top:0px;">DESA SUKODONO</h2>
          </td>
        </tr>
        <tr>
          <td>
            Alamat : Desa Sukodono No. 44
          </td>
        </tr>
      </table>

      <!-- <hr size="10" /> -->
      <hr class="mt-0" color="black" size="9" />
      <h4 style="text-align:center; font-weight:bold; margin-bottom:0px">
        <u>SURAT KETERANGAN PENGANTAR</u>
      </h4>
      <p style="text-align:center; margin-top:1px">NOMOR :</p>
      <br />
      <p style="margin-bottom: 5px">Yang bertanda tangan dibawah ini :</p>

      <table style="margin-left: 2em">
        <tr>
          <td>Nama</td>
          <td width="5%"></td>
          <td width="70%">: Arissatur Rohman</td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td width="5%"></td>
          <td width="70%">: Kepala Desa</td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td width="5%"></td>
          <td width="80%">: Desa Sukodono RT 04 RW 03 Kec. Bonang Kab. Demak</td>
        </tr>
        </table>
      <br />
      <p>Dengan ini menerangkan bahwa :</p>
      <?php 
      // include('inc/config.php');
      // $id = $_POST["id_pengajuan"];
      // if ($id) {
        # code...
      
      $tampil = $conn->query("SELECT * FROM tb_pengajuan WHERE id_pengajuan");
        while ($data=$tampil->fetch_assoc()) {
          $kode = $data['kode'];
        
             
          // var_dump($data);
          // die;
                    
        ?>
      
      <table style="margin-left: 2em">

        <tr>
          <td>Nama Lengkap</td>
          <td width="5%"></td>
        <?php 
            $warga_id = $data['id_warga'];
            $penduduk = $conn->query("SELECT * FROM tb_penduduk WHERE id_warga='$warga_id'");
              while ($data_penduduk = $penduduk->fetch_assoc()) {
                
               ?>
               </td>
          <td width="70%">: <?= $data_penduduk['nama']; ?></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td width="5%"></td>
          <td width="70%">: <?= $data_penduduk['jk']; ?></td>
        </tr>
        <tr>
          <td>Agama</td>
          <td width="5%"></td>
          <td width="70%">: <?= $data_penduduk['agama']; ?></td>
        </tr>
        <tr>
          <td>Status</td>
          <td width="5%"></td>
          <td width="70%">: <?= $data_penduduk['status_kawin']; ?></td>
        </tr>
        <tr>
          <td>NIK</td>
          <td width="5%"></td>
          <td width="70%">: <?= $data_penduduk['nik']; ?></td>
        </tr>
        <tr>
          <td>Tempat, Tanggal lahir</td>
          <td width="5%"></td>
          <td width="70%">: <?= $data_penduduk['tmp_lahir'] . "," . TanggalIndo($data_penduduk['tgl_lahir'])  ?></td>
        </tr>
        <tr>
          <td>Pekerjaan</td>
          <td width="5%"></td>
          <td width="70%">: <?= $data_penduduk['pekerjaan']; ?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td width="5%"></td>
          <td width="70%">
            : <?= $data_penduduk['alamat']; ?>
          </td>
              <?php } ?>
        </tr>
        <tr>
          <td>Keperluan</td>
          <td width="5%"></td>
          <td width="70%">: <?= $data['pengajuan']; ?></td>
        </tr>
        <tr>
          <td>Keterangan lain-lain</td>
          <td width="5%"></td>
          <td width="70%">: Keterangan secara lengkap terlampir</td>
        </tr>
        <tr>
          <td>Berlaku mulai tanggal</td>
          <td width="5%"></td>
          <td width="70%">: <?php $date = date("Y-m-d");
          $date = date("Y-m-d");
          $dhari = array(
               'Sunday' => 'Minggu',
               'Monday' => 'Senin',
               'Tuesday' => 'Selasa',
               'Wednesday' => 'Rabu',
               'Thursday' => 'Kamis',
               'Friday' => 'Jumat',
               'Saturday' => 'Sabtu'
          );
           $hari = date('l', strtotime($date));
          
          ?> <?= TanggalIndo($date); ?> - Selesai</td>
        </tr>
      </table>
      <!-- </form> -->
      <br />
      <p>Demikian Suat Keterangan ini dibuat untuk digunakan seperlunya.</p>
      <p style="margin-left:65%; margin-bottom:0px">Dibuat di : Sukodono</p>
      <p style="margin-left:65%; margin-top:0px"><u>Pada tanggal : <?= TanggalIndo($date); ?></u></p>
      <table style="margin-left: auto; margin-right: auto; text-align: center;">
          <tr>
            <td>Tanda Tangan Pemegang</td>
            <td style="width: 30%;"></td>
            <td>Kepala Desa Sukodono</td>
          </tr>
          <tr>
            <td>
              <p>ttd</p>
            </td>
            <td></td>
            <td>
            <img src="qr_code/<?= $data['qr_code']; ?>" width="20%">            
            </td>
          </tr>         
          <tr>
            <td>( Lisnawati )</td>
            <td></td>
            <td>( Arissatur Rohman )</td>
          </tr>
      </table>
        <?php } ?>
    <br />

    </body>
</html>

<?php

 $html = ob_get_contents(); 
 ob_end_clean();
 $mpdf->WriteHTML(utf8_encode($html));
 $mpdf->Output("pdf/$kode.pdf", 'F');

?>