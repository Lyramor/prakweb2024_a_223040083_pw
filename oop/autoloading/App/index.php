<?php 
require_once 'init.php';

// require_once __DIR__ . '/Produk/InfoProduk.php';
// require_once __DIR__ . '/Produk/Produk.php';
// require_once __DIR__ . '/Produk/Komik.php';
// require_once __DIR__ . '/Produk/Game.php';
// require_once __DIR__ . '/Produk/CetakInfoProduk.php';

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);

echo $cetakProduk->cetak();
?>