<h2>halaman Menu</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>kode menu</th>
			<th>nama</th>
			<th>harga</th>
			<th>jenis</th>
			<th>foto</th>
			<th>aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $angka=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM menu"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<th><?php echo $pecah['kode']; ?></th>
			<th><?php echo $pecah['nama']; ?></th>
			<th><?php echo $pecah['harga']; ?></th>
			<th><?php echo $pecah['jenis']; ?></th>
			<th>
				<img src="../foto/<?php echo $pecah['foto']; ?>" width="100">
			</th>
			<th>
				<a href="index.php?halaman=hapus&id=<?php echo $pecah['kode']; ?>" class="btn-danger btn">hapus</a>
			</th>
		</tr>
		<?php $angka++; ?>
	<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahproduk">Tambah Menu</a>