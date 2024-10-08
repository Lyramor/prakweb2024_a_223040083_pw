<?php 

class Produk
{
  private $judul, $penulis, $penerbit, $harga, $diskon = 0;

  public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0)
  {
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
  }

  public function setJudul($judul){
    $this->judul = $judul;
  }

  public function setPenulis($penulis){
    $this->penulis = $penulis;
  }

  // Perbaikan di sini: getPenulis tidak menerima parameter
  public function getPenulis(){
    return $this->penulis;
  }

  public function setDiskon($diskon){
    $this->diskon = $diskon;
  }

  public function getJudul(){
    return $this->judul;
  }

  public function getHarga()
  {
    return $this->harga - ($this->harga * $this->diskon / 100);
  }

  // Perbaikan di sini: getDiskon mengembalikan $this->diskon
  public function getDiskon(){
    return $this->diskon;
  }

  public function getLabel()
  {
    return "$this->penulis, $this->penerbit";
  }

  public function getInfoProduk()
  {
    $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
    return $str;
  }
}

class Komik extends Produk
{
  public $jmlHalaman;

  public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0, $jmlHalaman = 0)
  {
    parent::__construct($judul, $penulis, $penerbit, $harga);
    $this->jmlHalaman = $jmlHalaman;
  }

  public function getInfoProduk()
  {
    $str = "Komik : " . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman.";
    return $str;
  }
}

class Game extends Produk
{
  public $waktuMain;

  public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0, $waktuMain = 0)
  {
    parent::__construct($judul, $penulis, $penerbit, $harga);
    $this->waktuMain = $waktuMain;
  }

  public function getInfoProduk()
  {
    $str = "Game : " . parent::getInfoProduk() . " - {$this->waktuMain} Jam.";
    return $str;
  }
}

class CetakInfoProduk
{
  public function cetak(Produk $produk)
  {
    // Perbaikan: Menggunakan metode getJudul() dan getHarga() untuk mengakses properti private
    $str = "{$produk->getJudul()} | {$produk->getLabel()} (Rp. {$produk->getHarga()})";
    return $str;
  }
}

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";

$produk2->setDiskon(50);
echo $produk2->getHarga();
echo "<hr>";

// Perbaikan: getPenulis tidak menerima parameter
$produk1->setPenulis("Muhamad Marsa Nur Jaman");
echo $produk1->getPenulis();

?>
