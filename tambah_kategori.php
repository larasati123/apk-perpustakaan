<?php
include "koneksi2.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NamaKategori = $_POST["NamaKategori"];

    $query = "INSERT INTO kategoribuku (NamaKategori) VALUES ('$NamaKategori')";

    if (mysqli_query($koneksi, $query)) {
        echo "Data berhasil ditambahkan ke database.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>
