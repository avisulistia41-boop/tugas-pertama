<?php

include 'koneksi.php';

$nama_produk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$gambar = $_POST['gambar'];

$query = "INSERT INTO produk
(nama_produk, harga, stok, gambar)
VALUES
('$nama_produk', '$harga', '$stok', '$gambar')";

$simpan = mysqli_query($conn, $query);

if ($simpan) {

    header("Location: index.php");

} else {

    echo "Gagal menambahkan produk: " . mysqli_error($conn);

}

?>