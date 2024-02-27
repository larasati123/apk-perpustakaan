<?php
include "koneksi.php";

$query = "SELECT * FROM user";
$result = mysqli_query($koneksi, $query);
$dataUser = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User</title>
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
            font-family: 'Arial', sans-serif;
            background-color: white;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: #FFF8DC;
        }

        h2 {
            color: #333;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #FFF8DC;
            color: black;
        }
    </style>
</head>
<body>

    <h2>Data User</h2>

    <table>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
            <th>Nama Lengkap</th>
            <th>Alamat</th>
            <th>Level</th>
        </tr>
        <?php foreach ($dataUser as $user) : ?>
            <tr>
                <td><?= $user['UserID']; ?></td>
                <td><?= $user['Username']; ?></td>
                <td><?= $user['Password']; ?></td>
                <td><?= $user['Email']; ?></td>
                <td><?= $user['NamaLengkap']; ?></td>
                <td><?= $user['Alamat']; ?></td>
                <td><?= $user['Level']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
