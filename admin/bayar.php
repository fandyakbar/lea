<h2>PEMBAYARAN</h2>



<?php 
$ambil=$koneksi->query("SELECT * FROM pembelian JOIN menu ON pembelian.kode=menu.kode WHERE pembelian.id_beli='$_GET[id]'");
$pecah=$ambil->fetch_assoc();


$baruambil=$koneksi->query("SELECT pembelian.id_beli FROM pembelian");


 ?>

 <form method="post" enctype="multipart/form-data">
 	<div class="form-group">
 		<label>Total Tagihan :</label>
 		<?php 
 		echo "Rp ";
 		echo number_format($pecah['harga']*$pecah['jumlah']); ?>
 	</div>
 	<div class="form-group">
 		<label>Masukkan Uang Yang Dibayar</label>
 	</div>
 	<input type="number" class="form-group" name="uang">
 	<button class="btn btn-primary" name="save">hitung</button>
 	<button class="btn btn-danger" name="hilang">hapus pesanan</button>



 </form>

 <?php 
if(isset($_POST['save'])){

	$uang=$_POST['uang'];
 $total=$pecah['harga']*$pecah['jumlah'];
$kembalian=$uang-$total;

echo "Kembalian : Rp ";
echo number_format($kembalian);
$oke=$koneksi->query("SELECT * FROM pembelian");
$koneksi->query("INSERT INTO laporan (pemasukkan, id_beli) VALUES ('$total','$oke[id_beli]')");
}
elseif (isset($_POST['hilang'])) {
	$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_beli='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM pembelian WHERE id_beli='$_GET[id]'");


echo "<div class='alert alert-info'>Data Terhapus</div>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pemesanan'>";
}


  ?>
