<h2>Menambah Menu</h2>

<form method="post" enctype="multipart/form-data">
<div class="form-group">
	<label>nama</label>
	<input type="text" class="form-control" name="nama">
</div> 
<div class="form-group">
	<label>harga(Rp)</label>
	<input type="number" class="form-control" name="harga">
</div>

<div class="form-group">
	<label>Jenis</label>
	<select name="jenis">
		<option value="makanan">makanan</option>
		<option value="minuman">minuman</option>
		<option value="cemilan">cemilan</option>
</select>
</div>
<div class="form-group">
	<label> foto</label>
	<input type="file" class="form-control" name="foto">
</div>
<button class="btn btn-primary" name="save">Masukkan</button>
</form>

<?php
//upload foto 
if(isset($_POST['save'])){
$fotobaru = $_FILES['foto']['name'];
$lokasi=$_FILES['foto']['tmp_name'];
move_uploaded_file($lokasi,"../foto/".$fotobaru);
//konek database lagi
$koneksi->query("INSERT INTO menu (nama,harga,jenis,foto) VALUES ('$_POST[nama]','$_POST[harga]','$_POST[jenis]',
	'$fotobaru')");
echo "<div class='alert alert-info'>Data Tersimpan</div>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=menu'>";
}
 ?>


 
 
