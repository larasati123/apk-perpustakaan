<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Kategori Buku</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: ;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            max-width: 400px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            box-sizing: border-box;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Input Data Kategori Buku</h2>

        <form action="procces_input_kategori.php" method="post">
            <label for="kategoriID">Kategori ID:</label>
            <input type="text" id="kategoriID" name="kategoriID" required>

            <label for="NamaKategori">Nama Kategori:</label>
            <input type="text" id="NamaKategori" name="NamaKategori" required>

            <button type="submit">Simpan</button>
        </form>
    </div>

</body>
</html>
