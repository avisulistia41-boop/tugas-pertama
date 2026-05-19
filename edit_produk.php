<?php

include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'");

$produk = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
</head>
<body>

<h2>Edit Produk</h2>

<form action="proses_edit.php" method="POST">

    <input type="hidden" name="id" value="<?= $produk['id']; ?>">

    <label>Nama Produk</label>
    <br>
    <input type="text" 
           name="nama_produk"
           value="<?= $produk['nama_produk']; ?>"
           required>

    <br><br>

    <label>Harga</label>
    <br>
    <input type="number"
           name="harga"
           value="<?= $produk['harga']; ?>"
           required>

    <br><br>

    <label>Deskripsi</label>
    <br>
    <textarea name="deskripsi"><?= $produk['deskripsi']; ?></textarea>

    <br><br>

    <button type="submit">
        Update
    </button>

</form>

<br>

<a href="index.php">Kembali</a>

</body>
</html>