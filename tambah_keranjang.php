<?php
session_start();

include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'");

$produk = mysqli_fetch_assoc($data);

$item = array(
    "id" => $produk['id'],
    "nama_produk" => $produk['nama_produk'],
    "harga" => $produk['harga'],
    "stok" => $produk['stok'],
    "qty" => 1
);

$_SESSION['keranjang'][] = $item;

header("Location: keranjang.php");
?>