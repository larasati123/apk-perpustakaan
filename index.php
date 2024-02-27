<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['Level']==""){
		header("location:../index.php?pesan=info_login");
	}
 
	?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
	<div class ="container text-center">
	<div class="content mt-3">
		<div class="card bg-success bg-black">
			<div class="card-body">
				
				<a href="#" class ="btn text-light">HOME</a>
				<a href="kategoribuku.php" class ="btn text-light">KATEGORI BUKU</a>
				<a href="http://localhost/digitallibrary/admin/tampil_buku.php" class ="btn text-light">BUKU</a>
				<a href="http://localhost/digitallibrary/admin/user/tampil_user.php" class ="btn text-light" >USERS</a>
				<a href="http://localhost/digitallibrary/peminjam/form_peminjaman.php/" class ="btn text-light">PEMINJAMAN</a>
				<a href="http://localhost/digitallibrary/peminjam/laporanpeminjam.php" class ="btn text-light">LAPORAN PEMINJAMAN</a>
				<a href="../logout.php" class ="btn text-light">LOGOUT</a>
			</div>
		</div>
	</div>
		<div class="content mt-3">
				<div class="row">
					<div class="col-sm-3">
					<div class="card">
						<div class="card-body bg-white text-center">
							
							<h2>1</h2>
							<h3>INPUT DATA BUKU</h3>
							<hr>
						<a href = "buku.php" class ="btn btn-dark btn-sm">Lihat Data</a>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
					<div class="card">
						<div class="card-body bg-white text-center">
							<h2>2</h2>
							<h3> KATEGORI BUKU</h3>
							
							<hr>
						<a href = "kategoribuku.php" class ="btn btn-dark btn-sm">Lihat Data</a>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
					<div class="card">
						<div class="card-body bg-white text-center">
						
							<h2>3</h2>
							<h3>USER</h3>
							<hr>
						<a href = "../admin/user/tampil_user.php" class ="btn btn-dark btn-sm">Lihat Data</a>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
					<div class="card">
						<div class="card-body bg-white text-center">
							
							<h2>4</h2>
							<h3>PEMINJAMAN</h3>
							<hr>
						<a href = "http://localhost/digitallibrary/peminjam/form_peminjaman.php/" class ="btn btn-dark btn-sm">Lihat Data</a>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="content mt-3"> 
			<div class="card">
				<div class="card-body">
					<p> Halo <b><?php echo $_SESSION ['Level']; ?></b> Anda Telah Login Sebagai <b><?php 
					echo $_SESSION ['Username']; ?></b>.
					</p>
				</div>
			</div>
		</div>
		<div class="content mt-3"> 
			<p class="text-center">@2024 UKK Aplikasi Perpustakaan Digital By.SMK Koperasi Pontianak</p>
	</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist
    /umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/
    bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>	 
