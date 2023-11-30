<?php
$koneksi = mysqli_connect("localhost","root","","project_iot_vokasi");
// cek koneksi
if (!$koneksi){
  die("Error koneksi: " . mysqli_connect_errno());
}
?>
