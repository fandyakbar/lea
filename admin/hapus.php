<?php 
$ambil = $koneksi->query("SELECT * FROM menu WHERE kode='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotobaru = $pecah['foto'];
if (file_exists("foto/$fotobaru")){
	unlink("foto/$fotobaru");
}

$koneksi->query("DELETE FROM menu WHERE kode='$_GET[id]'");

echo "<div class='alert alert-info'>Data Terhapus</div>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=menu'>";
 ?>

