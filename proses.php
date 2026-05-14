<?php

// Mengecek apakah form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Mengambil data dari form
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    // Menampilkan hasil input
    echo "<h2>Data Produk</h2>";

    echo "Nama Produk : " . $nama . "<br><br>";
    echo "Harga Produk : Rp " . number_format($harga, 0, ',', '.') . "<br><br>";
    echo "Deskripsi : " . $deskripsi . "<br><br>";

    // Contoh percabangan if else
    if ($harga >= 100000) {
        echo "Kategori Produk : Mahal";
    } else {
        echo "Kategori Produk : Murah";
    }

} else {

    echo "Form belum dikirim.";

}

?>