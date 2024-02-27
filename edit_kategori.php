<?php
include "koneksi2.php";

// Fungsi untuk mendapatkan daftar kategori buku
function getKategoriBuku()
{
    global $koneksi;
    $query = "SELECT * FROM kategoribuku";
    $result = mysqli_query($koneksi, $query);
    $kategoriBuku = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $kategoriBuku[] = $row;
    }
    return $kategoriBuku;
}

// Fungsi untuk menyimpan perubahan data kategori ke database
function updateKategoriBuku($kategoriID, $namaKategori)
{
    global $koneksi;
    $query = "UPDATE kategoribuku SET NamaKategori = '$namaKategori' WHERE KategoriID = '$kategoriID'";
    return mysqli_query($koneksi, $query);
}

// Ambil data dari form jika ada pengiriman POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kategoriID = $_POST["kategoriID"];
    $namaKategori = $_POST["namaKategori"];

    // Update data kategori di database
    if (updateKategoriBuku($kategoriID, $namaKategori)) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Gagal memperbarui data.";
    }
}

// Mendapatkan daftar kategori buku
$daftarKategori = getKategoriBuku();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<title>KATEGORI BUKU</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
</head>
<body>
	<div class ="container">
	<div class="content mt-3">
        <div class="card-body text-center">
		<div class="card bg-black bg-black">
			<div class="card-body">
					
            <a href="http://localhost/digitallibrary/admin/" class ="btn text-light">HOME</a>
				<a href="http://localhost/digitallibrary/admin/kategoribuku.php" class ="btn text-light">KATEGORI BUKU</a>
				<a href="http://localhost/digitallibrary/admin/tampil_buku.php
                " class ="btn text-light">BUKU</a>
				<a href="http://localhost/digitallibrary/admin/user/tampil_user.php" class ="btn text-light" >USERS</a>
                <a href="http://localhost/digitallibrary/peminjam/form_peminjaman.php/" class ="btn text-light">PEMINJAMAN</a>
				<a href="http://localhost/digitallibrary/peminjam/laporanpeminjam.php" class ="btn text-light">LAPORAN PEMINJAMAN</a>
				<a href="../logout.php" class ="btn text-light">LOGOUT</a>
			</div>
		</div>
	</div>
</div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Kategori Buku</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($daftarKategori as $kategori) : ?>
                    <tr>
                        <td><?php echo $kategori['KategoriID']; ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="kategoriID" value="<?php echo $kategori['KategoriID']; ?>">
                                <input type="text" name="namaKategori" value="<?php echo $kategori['NamaKategori']; ?>">
                        </td>
                        <td>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
