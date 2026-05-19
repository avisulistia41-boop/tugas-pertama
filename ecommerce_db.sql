-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 08. Mei 2026 jam 23:12
-- Versi Server: 5.1.41
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommerce_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `orders`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `deskripsi` text,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `nama_produk`, `harga`, `deskripsi`, `stok`) VALUES
(1, 'Laptop Lenovo IdeaPad', '3000000.00', 'Laptop untuk kerja dan kuliah', 8),
(2, 'Mouse Gaming RGB', '120000.00', 'Mouse gaming dengan lampu RGB', 25),
(3, 'Keyboard Wireless', '275000.00', 'Keyboard bluetooth slim', 15),
(4, 'Headset Bluetooth', '350000.00', 'Headset wireless suara jernih', 18),
(5, 'Monitor LG 22 Inch', '1850000.00', 'Monitor Full HD IPS', 8),
(6, 'Flashdisk Toshiba 32GB', '65000.00', 'Flashdisk USB cepat', 40),
(7, 'SSD Samsung 1TB', '1450000.00', 'SSD performa tinggi', 12),
(8, 'Printer Canon PIXMA', '2100000.00', 'Printer warna multifungsi', 6),
(9, 'Powerbank 20000mAh', '320000.00', 'Powerbank fast charging', 20),
(10, 'Speaker Mini Bluetooth', '150000.00', 'Speaker portable', 14),
(11, 'Smartwatch Realme', '425000.00', 'Jam tangan pintar sporty', 11),
(12, 'Tas Sekolah', '95000.00', 'Tas kuat dan ringan', 30),
(13, 'Sepatu Running', '420000.00', 'Sepatu olahraga nyaman', 9),
(14, 'Kaos Oversize', '85000.00', 'Kaos fashion kekinian', 35),
(15, 'Botol Minum Stainless', '55000.00', 'Botol tahan panas dan dingin', 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `users`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
