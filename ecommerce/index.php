<?php

// koneksi database
$koneksi = mysqli_connect("localhost", "root", "", "ecommerce_db");

// cek koneksi
if (!$koneksi) {
    die("Koneksi gagal : " . mysqli_connect_error());
}

// filter kategori
$kategori = "";

if (isset($_GET['kategori'])) {
    $kategori = $_GET['kategori'];

    $query = "SELECT * FROM produk 
              WHERE kategori='$kategori'";
} else {

    $query = "SELECT * FROM produk";
}

// ambil data produk
$result = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce PHP</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f5f5;
        }

        .card:hover{
            transform: scale(1.03);
            transition:0.3s;
        }

        .produk-img{
            height:220px;
            object-fit:cover;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="" class="navbar-brand fw-bold">
           Aveey
        </a>
    </div>
</nav>

<div class="container mt-4">

    <!-- Judul -->
    <div class="text-center mb-4">
        <h1 class="fw-bold">Daftar Produk</h1>
        <p class="text-muted">
            E-Commerce PHP & MySQL
        </p>
    </div>

    <!-- Filter Kategori -->
    <div class="mb-4 text-center">

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

                <img src="<?php echo $data['gambar']; ?>" 
                     class="card-img-top produk-img">

                <div class="card-body">

                    <h5 class="card-title">
                        <?php echo $data['nama_produk']; ?>
                    </h5>

                    <p class="badge bg-dark">
                        <?php echo $data['kategori']; ?>
                    </p>

                    <p class="card-text">
                        <?php echo $data['deskripsi']; ?>
                    </p>

                    <h4 class="text-primary">
                        Rp <?php echo number_format($data['harga']); ?>
                    </h4>

                    <button class="btn btn-success w-100">
                        Beli Sekarang
                    </button>

                </div>
            </div>

        </div>

        <?php } ?>

    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center p-3 mt-5">
    Copyright © 2026 Aveey
</footer>

</body>
</html>