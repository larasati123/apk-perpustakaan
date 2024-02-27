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
</div>
<head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2 class="mt-3 mb-3">Kategori Buku</h2>
        <form id="categoryForm">
            <label for="namaKategori" class="form-label">Nama Kategori:</label>
            <input type="text" class="form-control" id="namaKategori" name="namaKategori" placeholder="Masukkan Nama Kategori">
            <button type="button" onclick="tambahKategori()" class="btn btn-primary">Tambah Kategori</button>
        </form>
    </div>

    <table id="tableKategori" class="table table-striped">
        <thead>
            <tr>
                <th>Kategori ID</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    
    <script>
        function tambahKategori() {
            var namaKategori = document.getElementById("namaKategori").value;

            if (namaKategori) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "tambah_kategori.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        alert(xhr.responseText);
                        if (xhr.responseText.includes("berhasil")) {
                            tampilkanData();
                        }
                    }
                };
                xhr.send("namaKategori=" + namaKategori);
            } else {
                alert("Mohon isi Nama Kategori");
            }
        }

        function hapusKategori(kategoriID) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "hapus_kategori.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText);
                    if (xhr.responseText.includes("berhasil")) {
                        tampilkanData();
                    }
                }
            };
            xhr.send("kategoriID=" + kategoriID);
        }

        function editKategori(kategoriID) {
            // Implementasi fungsi edit kategori di sini
            alert("Klik OK Untuk Mengubah Data");
        }

        function tampilkanData() {
            var tableBody = document.querySelector("#tableKategori tbody");
            tableBody.innerHTML = "";

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "data_kategori.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var dataKategori = JSON.parse(xhr.responseText);

                    dataKategori.forEach(function (kategori) {
                        var newRow = tableBody.insertRow();
                        newRow.innerHTML = `
                            <td>${kategori.KategoriID}</td>
                            <td>${kategori.NamaKategori}</td>
                            <td>
                                <button onclick="editKategori(${kategori.KategoriID})" class="btn btn-primary">  <a href=" http://localhost/digitallibrary/admin/edit_kategori.php" class ="btn text-light">EDIT</a>
                                </button>                            
                              
                                <button onclick="hapusKategori(${kategori.KategoriID})" class="btn btn-danger">Hapus</button>
                            </td>
                        `;
                    });
                }
            };
            xhr.send();
        }

        tampilkanData();
        
    </script>
</body>
</html>

