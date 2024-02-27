<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Perpustakaan</title>
    <link rel="stylesheet" href="style.css"> 
    
</head>
<body>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 100vh;
    }

    h2 {
        color: #333;
    }

    form {
        width: 60%;
        margin-top: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 12px;
        box-sizing: border-box;
    }

    select {
        width: 100%;
        padding: 8px;
        margin-bottom: 12px;
        box-sizing: border-box;
    }

    button {
        background-color: #3498db;
        color: #fff;
        border: none;
        padding: 8px 12px;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #2980b9;
    }
</style>

    
</body>
</html>
<h3> Tambah Buku</h3>
<form action="" method="post">
<table>
    <tr>
        <td width="130">Kode Buku</td>
        <td>
        <input type="number" name="BukuID" id="title" placeholder="Contoh: 01202401">
</tr>
<tr>
    <td> Judul Buku </td>
    <td><input type="text" name="Judul" id="title" placeholder="Contoh: Laskar Pelangi"></td>
</tr>
<tr>
    <td> Penulis </td>
   <td> <input type="text" name="Penulis" id="title" placeholder="Contoh: Chiku"></td>
</tr>
<tr>
    <td> Penerbit </td>
    <td><input type="text" name="Penerbit" id="title" placeholder="Contoh: Laskar J"></td>
</tr>
<tr>
    <td> Tahun Terbit </td>
    <td><input type="number" name="TahunTerbit" id="title" placeholder="Contoh: 2023">
</tr>
<tr>
    <td></td>
    <td><input type="submit" value="Simpan" name="proses"></td>
</tr>
<tr>
    <td><a href="index.php" class ="btn text-light">Dashboard</a></td>
</tr>

<?php
include "koneksi.php";

if(isset($_POST['proses'])){
    mysqli_query($koneksi,"insert into buku set 
    BukuID = '$_POST[BukuID]',
    Judul = '$_POST[Judul]',
    Penulis = '$_POST[Penulis]',
    Penerbit = '$_POST[Penerbit]',
    TahunTerbit = '$_POST[TahunTerbit]'");
echo "Data Sudah Tersimpan.!";
}
?>