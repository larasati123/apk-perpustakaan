<?php
include "koneksi2.php";

$query = "SELECT * FROM kategoribuku";
$result = mysqli_query($koneksi, $query);

$dataKategori = array();

while ($row = mysqli_fetch_assoc($result)) {
    $dataKategori[] = $row;
}

echo json_encode($dataKategori);

mysqli_close($koneksi);
?>
