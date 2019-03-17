<h2>Tampilan Pemesanan</h2>

<table class="table table-bordered">
	<thead class="alert alert-danger">
		<tr>
			<th>No</th>
			<th>Kode Meja</th>
			<th>Nama Menu</th>
			<th>Jumlah</th>
			<th>Total</th>
			<th>Pilihan</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN menu ON pembelian.kode=menu.kode"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<th><?php echo $nomor; ?></th>
			<th><?php echo($pecah['meja']); ?></th>
			<th><?php echo($pecah['nama']); ?></th>
			<th><?php echo $pecah['jumlah']; ?></th>
			<th><?php echo number_format($pecah['jumlah']* $pecah['harga']); ?></th>
			<th>
				<a href="index.php?halaman=bayar&id=<?php echo $pecah['meja']; ?>" class="btn btn-info">BAYAR</a>
				<a href="index.php?halaman=tambahbaru&id=<?php echo $pecah['id_beli']; ?>" class="btn btn-primary">Tambah Pemesanan</a>
			</th>
		</tr>
	</tbody>
		<?php $nomor++; ?>
			<?php } ?>

</table>
<body>
	<a href="index.php?halaman=tambahpesanan" class="btn btn-success">Pesanan Baru</a>
</body>		
