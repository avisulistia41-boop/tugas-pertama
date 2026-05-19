<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
</head>
<body>

<h2>Tambah Produk</h2>

<form action="proses_tambah.php" method="POST">

    <label>Nama Produk</label>
    <br>
    <input type="text" name="nama_produk" required>

    <br><br>

    <label>Harga</label>
    <br>
    <input type="number" name="harga" required>

    <br><br>

    <label>Stok</label>
    <br>
    <input type="number" name="stok" required>

    <br><br>

    <label>Nama File Gambar</label>
    <br>
    <input type="text" name="gambar" placeholder="contoh: pisang.jpg" required>

    <br><br>

    <button type="submit">
        Simpan Produk
    </button>

</form>

<br>

<a href="index.php">Kembali</a>

</body>
</html>