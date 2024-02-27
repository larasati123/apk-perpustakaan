<?php
include 'koneksi.php';

$Username = $_POST['Username'];
$Password = md5 ($_POST['Password']);
$Email = $_POST ['Email'];
$NamaLengkap = $_POST['NamaLengkap'];
$Alamat = $_POST ['Alamat'];

mysqli_query($koneksi,"insert into user values('','$Username','$Password','$Email','$NamaLengkap','$Alamat','3')");

header("location: index.php?pesan=info_daftar");

?>
