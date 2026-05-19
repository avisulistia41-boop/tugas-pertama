<?php

include 'koneksi.php';

$id = $_POST['id'];
$nama_produk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];

$query = "UPDATE produk SET
nama_produk='$nama_produk',
harga='$harga',
deskripsi='$deskripsi'
WHERE id='$id'";

$update = mysqli_query($conn, $query);

if ($update) {
    header("Location: index.php");
} else {
    echo "Gagal update produk";
}

?>