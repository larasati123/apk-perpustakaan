<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman & Data Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="date"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: black;
            color: white;
            border: none;
            cursor: pointer;
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
        .return-btn {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .return-btn.returned {
            background-color: #3498db;
            color: white;
        }
        .return-btn.not-returned {
            background-color: #A9A9A9;
            color: black;
        }
        .delete-btn {
            padding: 8px 12px;
            background-color: #FFF8DC;
            color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .menu-btn {
            padding: 8px 12px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <div class="content mt-3">
            <div class="card bg-success bg-black">
                <div class="card-body">
                    <a href="http://localhost/digitallibrary/admin/" class="btn text-light">HOME</a>
                    <a href="http://localhost/digitallibrary/admin/kategoribuku.php" class="btn text-light">KATEGORI BUKU</a>
                    <a href="http://localhost/digitallibrary/admin/tampil_buku.php" class="btn text-light">BUKU</a>
                    <a href="http://localhost/digitallibrary/admin/user/tampil_user.php" class="btn text-light">USERS</a>
                    <a href="http://localhost/digitallibrary/peminjam/form_peminjaman.php/" class="btn text-light">PEMINJAMAN</a>
                    <a href="http://localhost/digitallibrary/peminjam/laporanpeminjam.php" class="btn text-light">LAPORAN PEMINJAMAN</a>
                    <a href="../logout.php" class="btn text-light">LOGOUT</a>
                </div>
            </div>
        </div>
        <div class="container">
            <h2>Form Peminjaman Buku</h2>
            <!-- Form Peminjaman -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="UserID">UserID:</label>
                <input type="text" id="UserID" name="UserID" required>

                <label for="BukuID">BukuID:</label>
                <select id="BukuID" name="BukuID" required>
                    <option value="">-- Pilih Buku --</option>
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

                    // Ambil data buku dari tabel buku
                    $query = "SELECT BukuID, Judul FROM buku";
                    $result = $conn->query($query);

                    // Tampilkan opsi select berdasarkan data buku
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["BukuID"] . "'>" . $row["BukuID"] . " - " . $row["Judul"] . "</option>";
                        }
                    }

                    // Tutup koneksi
                    $conn->close();
                    ?>
                </select>

                <label for="TanggalPeminjaman">Tanggal Peminjaman:</label>
                <input type="date" id="TanggalPeminjaman" name="TanggalPeminjaman" required>

                <label for="TanggalPengembalian">Tanggal Pengembalian:</label>
                <input type="date" id="TanggalPengembalian" name="TanggalPengembalian" required>

                <input type="submit" value="Submit">
            </form>

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

            // Jika formulir disubmit
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $UserID = $_POST['UserID'];
                $BukuID = $_POST['BukuID'];
                $TanggalPeminjaman = $_POST['TanggalPeminjaman'];
                $TanggalPengembalian = $_POST['TanggalPengembalian'];
                
                $sql = "INSERT INTO peminjaman (UserID, BukuID, TanggalPeminjaman, TanggalPengembalian, StatusPeminjaman)
                        VALUES ('$UserID', '$BukuID', '$TanggalPeminjaman', '$TanggalPengembalian', 'Belum Dikembalikan')";

                if ($conn->query($sql) === TRUE) {
                    echo "<p>Data peminjaman berhasil disimpan.</p>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

            // Menampilkan data peminjaman dalam tabel
            $sql = "SELECT * FROM peminjaman";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h2>Data Peminjaman</h2>";
                echo "<table>";
                echo "<tr><th>PeminjamanID</th><th>UserID</th><th>BukuID</th><th>Tanggal Peminjaman</th><th>Tanggal Pengembalian</th><th>Action</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["PeminjamanID"]."</td><td>".$row["UserID"]."</td><td>".$row["BukuID"]."</td><td>".$row["TanggalPeminjaman"]."</td><td>".$row["TanggalPengembalian"]."</td><td>";
                    if($row["StatusPeminjaman"] == "Belum Dikembalikan") {
                        echo "<button class='return-btn not-returned' onclick='returnBook(".$row["PeminjamanID"].")'>Sudah Dikembalikan</button>";
                    } else {
                        echo "<button class='return-btn returned'>Sudah Dikembalikan</button>";
                    }
                    echo "<button class='delete-btn' onclick='deleteRecord(".$row["PeminjamanID"].")'>Delete</button>";
                    echo "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Tidak ada data peminjaman.</p>";
            }

            // Proses untuk menandai buku sebagai sudah dikembalikan
            if(isset($_GET['return_id'])) {
                $returnID = $_GET['return_id'];
                $updateSql = "UPDATE peminjaman SET StatusPengembalian = 'Sudah Dikembalikan' WHERE PeminjamanID = $returnID";
                if ($conn->query($updateSql) === TRUE) {
                    echo "<p>Status pengembalian berhasil diperbarui.</p>";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }

            // Proses untuk menghapus entri peminjaman
            if(isset($_GET['delete_id'])) {
                $deleteID = $_GET['delete_id'];
                $deleteSql = "DELETE FROM peminjaman WHERE PeminjamanID = $deleteID";
                if ($conn->query($deleteSql) === TRUE) {
                    echo "<p>Entri berhasil dihapus.</p>";
                } else {
                    echo "Error deleting record: " . $conn->error;
                }
            }

            $conn->close();
            ?>

            <!-- Script JavaScript -->
            <script>
                function returnBook(peminjamanID) {
                    if (confirm("Apakah buku ini sudah dikembalikan?")) {
                        // Kirim request AJAX untuk menandai buku sebagai sudah dikembalikan
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                location.reload(); // Perbarui halaman setelah buku ditandai sebagai sudah dikembalikan
                            }
                        };
                        xhttp.open("GET", "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?return_id=" + peminjamanID, true);
                        xhttp.send();
                    }
                }

                function deleteRecord(peminjamanID) {
                    if (confirm("Apakah Anda yakin ingin menghapus entri ini?")) {
                        // Kirim request AJAX untuk menghapus entri peminjaman
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                location.reload(); // Perbarui halaman setelah entri dihapus
                            }
                        };
                        xhttp.open("GET", "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?delete_id=" + peminjamanID, true);
                        xhttp.send();
                    }
                }
            </script>
            <button class="menu-btn" onclick="window.location.href='http://localhost/digitallibrary/admin/index.php'">Kembali ke Menu</button>
        </div>
    </div>
</body>
</html>
