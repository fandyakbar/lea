<?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN menu ON pembelian.kode=menu.kode WHERE pembelian.id_beli='$_GET[id]'");
$pecah=$ambil->fetch_assoc(); ?>

<h2>TAMBAHAN PESANAN PADA MEJA <?php echo $pecah['meja']; 
$meja=$pecah['meja'];
$id=$pecah['id_laporan'];?></h2>


<form method="post" enctype="multipart/form-data">
<div class="form-group">
	
</div> 
<div class="form-group">
	<label>MENU</label>
	<select class="form-control" name="kode">
		<?php $ambil=$koneksi->query("SELECT * FROM menu") ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
			<option class="form-control" value="<?php echo $pecah['kode']?>"><?php echo $pecah['nama']?></option>
		<?php } ?>
	</select>
</div>

<div class="form-group">
	<label>JUMlAH</label>
	<input type="number" class="form-control" name="jumlah">
</div>

<button class="btn btn-primary" name="save">Masukkan</button>
</form>
<?php
	if(isset($_POST['save'])){
		$ambil=$koneksi->query("SELECT * FROM pembelian");
		$pecah=$ambil->fetch_assoc();

		$koneksi->query("INSERT INTO pembelian(kode, jumlah, meja,id_laporan) VALUES ('$_POST[kode]','$_POST[jumlah]',$meja,$id)");
		$koneksi->query("UPDATE pembelian SET status=1 WHERE meja=$meja");
			echo "<div class='alert alert-info'>Data Tersimpan</div>";
			echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pemesanan'>";
			

	}


 ?>