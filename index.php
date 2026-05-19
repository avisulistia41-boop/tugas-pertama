<?php
include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM produk");

if (!$data) {
    die("Query Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <head>
    <meta charset="UTF-8">
    <title>A v e e y</title>
</head>
    <style>

        body{
            font-family: Arial;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .navbar{
            background: #222;
            color: white;
            padding: 20px;
        }

        .navbar h2{
            margin: 0;
        }

        .container{
            width: 90%;
            margin: auto;
            margin-top: 30px;
        }

        .header{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn{
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            color: white;
            font-size: 14px;
        }

        .btn-tambah{
            background: green;
        }

        .btn-keranjang{
            background: orange;
        }

        .produk{
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card{
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

        .card img{
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .card-body{
            padding: 20px;
        }

        .card h3{
            margin-top: 0;
        }

        .harga{
            color: blue;
            font-size: 22px;
            font-weight: bold;
        }

        .stok{
            margin-top: 10px;
        }

        .aksi{
            margin-top: 20px;
        }

        .aksi a{
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            color: white;
            font-size: 13px;
            margin-right: 5px;
        }

        .edit{
            background: #3498db;
        }

        .hapus{
            background: red;
        }

        .keranjang{
            background: green;
        }

    </style>

</head>
<body>

<div class="navbar">
    <h2>A v e e y</h2>
</div>

<div class="container">

    <div class="header">

        <h1>Daftar Produk</h1>

        <div>

            <a href="tambah_produk.php" class="btn btn-tambah">
                + Tambah Produk
            </a>

            <a href="keranjang.php" class="btn btn-keranjang">
                🛒 Lihat Keranjang
            </a>

        </div>

    </div>

    <div class="produk">

    <?php
    while ($produk = mysqli_fetch_assoc($data)) {
    ?>

        <div class="card">

            <img src="gambar/<?php echo $produk['gambar']; ?>">

            <div class="card-body">

                <h3>
                    <?php echo $produk['nama_produk']; ?>
                </h3>

                <p class="harga">
                    Rp <?php echo number_format($produk['harga']); ?>
                </p>

                <p class="stok">
                    Stok : <?php echo $produk['stok']; ?>
                </p>

                <div class="aksi">

                    <a class="edit"
                    href="edit_produk.php?id=<?php echo $produk['id']; ?>">
                        Edit
                    </a>

                    <a class="hapus"
                    href="hapus_produk.php?id=<?php echo $produk['id']; ?>"
                    onclick="return confirm('Yakin ingin menghapus?')">
                        Hapus
                    </a>

                    <a class="keranjang"
                    href="tambah_keranjang.php?id=<?php echo $produk['id']; ?>">
                        + Keranjang
                    </a>

                </div>

            </div>

        </div>

    <?php } ?>

    </div>

</div>

</body>
</html>