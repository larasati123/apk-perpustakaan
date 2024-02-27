<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Peminjaman</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
	<div class ="container text-center">
	<div class="content mt-3">
		<div class="card bg-success bg-black">
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
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Laporan Peminjaman</h2>
        <?php
        // Koneksi ke database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "digitallibrary";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Menampilkan data peminjaman dalam tabel
        $sql = "SELECT * FROM peminjaman";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>PeminjamanID</th><th>UserID</th><th>BukuID</th><th>TanggalPeminjaman</th><th>TanggalPengembalian</th><th>StatusPeminjaman</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["PeminjamanID"]."</td><td>".$row["UserID"]."</td><td>".$row["BukuID"]."</td><td>".$row["TanggalPeminjaman"]."</td><td>".$row["TanggalPengembalian"]."</td><td>".$row["StatusPeminjaman"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Tidak ada data peminjaman.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
