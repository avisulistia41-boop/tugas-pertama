<?php

// menampilkan error
error_reporting(E_ALL);
ini_set('display_errors', 1);

// koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "ecommerce_db");

// cek koneksi
if (!$koneksi) {
    die("Koneksi database gagal : " . mysqli_connect_error());
}

// cek filter kategori
if (isset($_GET['kategori'])) {

    $kategori = $_GET['kategori'];

    // query berdasarkan kategori
    $query = "SELECT * FROM produk 
              WHERE kategori='$kategori'";

} else {

    // query semua produk
    $query = "SELECT * FROM produk";
}

// menjalankan query
$result = mysqli_query($koneksi, $query);

// cek query
if (!$result) {
    die("Query Error : " . mysqli_error($koneksi));
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce PHP</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f5f5;
        }

        .card:hover{
            transform: scale(1.03);
            transition:0.3s;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="" class="navbar-brand fw-bold">
            MyShop
        </a>
    </div>
</nav>

<div class="container mt-5">

    <!-- Judul -->
    <div class="text-center mb-4">
        <h1 class="fw-bold">Daftar Produk</h1>
        <p class="text-muted">
            Website E-Commerce Sederhana
        </p>
    </div>

    <!-- Filter Kategori -->
    <div class="text-center mb-4">

        <a href="index.php" class="btn btn-secondary">
            Semua
        </a>

        <a href="?kategori=Makanan" class="btn btn-primary">
            Makanan
        </a>

        <a href="?kategori=Minuman" class="btn btn-success">
            Minuman
        </a>

        <a href="?kategori=Snack" class="btn btn-warning">
            Snack
        </a>

    </div>

    <!-- Produk -->
    <div class="row">

        <?php while($data = mysqli_fetch_assoc($result)) { ?>

        <div class="col-md-4 mb-4">

            <div class="card shadow border-0 h-100">

                <div class="card-body">

                    <h4>
                        <?php echo $data['nama_produk']; ?>
                    </h4>

                    <span class="badge bg-dark mb-2">
                       
                    </span>

                    <h5 class="text-primary">
                        Rp <?php echo number_format($data['harga']); ?>
                    </h5>

                    <p>
                        Stok :
                        <b><?php echo $data['stok']; ?></b>
                    </p>

                    <button class="btn btn-success w-100">
                        Beli
                    </button>

                </div>

            </div>

        </div>

        <?php } ?>

    </div>

</div>

</body>
</html>