<h2>PILIHAN PESANAN</h2>

<form method="post" enctype="multipart/form-data">


<div class="form-group">
	<label>KODE MEJA</label>
	<select class="form-control" name="meja">
		<option class="form-control" value="1">1</option>
		<option class="form-control" value="2">2</option>
		<option class="form-control" value="3">3</option>
		<option class="form-control" value="4">4</option>
		<option class="form-control" value="5">5</option>
		<option class="form-control" value="6">6</option>
		<option class="form-control" value="7">7</option>
		<option class="form-control" value="8">8</option>
		<option class="form-control" value="9">9</option>
		<option class="form-control" value="10">10</option>
		<option class="form-control" value="0">Take Away</option>
	</select>
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
		$ambil=$koneksi->query("SELECT * FROM pembelian WHERE meja='$_POST[meja]'");
		$pecah=$ambil->fetch_assoc();
		if($pecah['status']==0){
		$koneksi->query("INSERT INTO laporan(pemasukkan) VALUES ('0')");
		$ambilbaru=$koneksi->query("SELECT * FROM laporan");
		while($pecah=$ambilbaru->fetch_assoc()){$idbenar=$pecah['id_laporan'];}
		$koneksi->query("INSERT INTO pembelian(kode, jumlah, meja,id_laporan) VALUES ('$_POST[kode]','$_POST[jumlah]','$_POST[meja]','$idbenar')");

		$koneksi->query("UPDATE pembelian SET status=1 WHERE meja='$_POST[meja]'");
			echo "<div class='alert alert-info'>Data Tersimpan</div>";
			echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pemesanan'>";
		}
		elseif ($pecah['status']==1) {
				echo "<div class='alert alert-danger'>Meja Sudah Terisi</div>";
			}	

	}


 ?>