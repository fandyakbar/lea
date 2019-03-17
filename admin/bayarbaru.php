<h2>PEMBAYARAN TERBARU</h2>



 <table class="table table-bordered">
 	<thead>
 		<tr class="alert alert-info">
 			<th>No</th>
 			<th>Nama</th>
 			<th>Jumlah</th>
 			<th>Tagihan</th>
	 		</tr>
 	</thead>
 	<tbody>
 		<?php 
 			$angka=1;
 			$total=0;
			$ambil=$koneksi->query("SELECT * FROM laporan JOIN pembelian ON laporan.id_laporan=pembelian.id_laporan JOIN menu ON pembelian.kode=menu.kode WHERE pembelian.meja='$_GET[id]'");
			while($pecah=$ambil->fetch_assoc()){
 		?>
 		<tr>
 			<?php $benar=$pecah['id_laporan']; ?>
 			<th><?php echo $angka ?></th>
 			<th><?php echo$pecah['nama']; ?></th>
			<th><?php echo $pecah['jumlah']; ?></th>
			<th><?php echo number_format($pecah['jumlah']* $pecah['harga']); ?>
				<?php $jumlah=$pecah['jumlah']* $pecah['harga']; ?>
				<?php $total=$total+$jumlah; ?>
			</th>
 		</tr>
 		<?php $angka++; } ?>
 		<tr class="alert alert-success">
 			<th>Total Tagihan</th>
 			<th><?php echo number_format($total); ?></th>
 		</tr>
 	</tbody>
 </table>

<?php //PEMBAYARAN ?>

<form method="post" enctype="multipart/form-data">
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
	if($uang>=$total){
	$kembalian=$uang-$total;
	echo "Kembalian : Rp ";
	echo number_format($kembalian);
	$koneksi->query("UPDATE laporan SET pemasukkan=$total WHERE id_laporan=$benar");
	}
	else{
		$sisa=$total-$uang;
		$iuran=$uang;
		echo "<div class='alert alert-danger'>Maaf Uang Anda Masih Kurang : $sisa </div>";	}

}
elseif (isset($_POST['hilang'])) {
	$ambil = $koneksi->query("SELECT * FROM pembelian JOIN menu ON pembelian.kode=menu.kode WHERE meja ='$_GET[id]'");
	$tanggal=date('Y-m-d');
	while($pecah = $ambil->fetch_assoc()){
$koneksi->query("INSERT INTO struk (nama, jumlah, harga, tanggal) VALUES ('$pecah[nama]','$pecah[jumlah]','$pecah[harga]','$tanggal')");
     }
$koneksi->query("DELETE FROM pembelian WHERE meja='$_GET[id]'");


echo "<div class='alert alert-info'>Data Terhapus</div>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pemesanan'>";
}
  ?>