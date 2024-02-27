<?php
$host = "localhost";
$username = "root"; // Ganti dengan username MySQL Anda (biasanya "root" di XAMPP)
$password = ""; // Biarkan kosong jika tidak ada password
$database = "digitallibrary"; // Ganti dengan nama database Anda

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
