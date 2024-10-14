<?php 

class About {
  public function index($nama = 'Marsa', $pekerjaan = 'Mahasiswa', $umur = '20'){
    echo "Halo, nama saya adalah $nama, saya adalah seorang $pekerjaan, Saya Berumur $umur";
  }

  public function page(){
    echo 'About/page';
  }
}
?>