<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kategoriID = $_POST["kategoriID"];
    $namaKategori = $_POST["namaKategori"];

    $stmt = $conn->prepare("INSERT INTO kategoribuku (KategoriID, NamaKategori) VALUES (?, ?)");
    $stmt->bindParam(1, $kategoriID);
    $stmt->bindParam(2, $namaKategori);

    try {
        $stmt->execute();
        header("Location: input_kategori.php");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

$conn = null;
?>
