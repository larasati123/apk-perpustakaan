<?php
// Membuat koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "digitallibrary";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah formulir telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $userID = $_POST['UserID'];
    $bukuID = $_POST['BukuID'];
    $tanggalPeminjaman = $_POST['TanggalPeminjaman'];
    $tanggalPengembalian = $_POST['TanggalPengembalian'];
    
    // Menyiapkan dan mengeksekusi pernyataan SQL untuk menyimpan data ke dalam tabel peminjaman
    $sql = "INSERT INTO peminjaman (UserID, BukuID, TanggalPeminjaman, TanggalPengembalian, StatusPengembalian)
            VALUES ('$userID', '$bukuID', '$tanggalPeminjaman', '$tanggalPengembalian', 'Belum Dikembalikan')";

    if ($conn->query($sql) === TRUE) {
        // Jika data berhasil disimpan, kembali ke halaman form_peminjaman.php
        header("Location: form_peminjaman.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
