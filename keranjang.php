<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Keranjang Belanja</title>
</head>
<body>

<h2>Keranjang Belanja</h2>

<a href="index.php">Kembali ke Produk</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>No</th>
    <th>Nama Produk</th>
    <th>Harga</th>
    <th>Qty</th>
    <th>Subtotal</th>
    <th>Aksi</th>
</tr>

<?php

$total = 0;

if (!empty($_SESSION['keranjang'])) {

    $no = 1;

    foreach ($_SESSION['keranjang'] as $index => $item) {

        $subtotal = $item['harga'] * $item['qty'];

        $total += $subtotal;
?>

<tr>

    <td><?php echo $no++; ?></td>

    <td><?php echo $item['nama_produk']; ?></td>

    <td>Rp <?php echo number_format($item['harga']); ?></td>

    <td><?php echo $item['qty']; ?></td>

    <td>Rp <?php echo number_format($subtotal); ?></td>

    <td>

        <a href="hapus_keranjang.php?index=<?php echo $index; ?>">
            Hapus
        </a>

    </td>

</tr>

<?php
    }
?>

<tr>

    <td colspan="4">
        <b>Total</b>
    </td>

    <td colspan="2">
        <b>Rp <?php echo number_format($total); ?></b>
    </td>

</tr>

<?php
} else {
?>

<tr>
    <td colspan="6">
        Keranjang kosong
    </td>
</tr>

<?php } ?>

</table>

</body>
</html>