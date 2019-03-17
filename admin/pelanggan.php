<h2>Laporan Pemasukkan</h2>

<table class="table table-bordered">
	<tbody>
		<?php $angka=1; ?>
		<?php  $jumlah=0; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM laporan"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<?php $jumlah=$jumlah+$pecah['pemasukkan']; ?>
			</tbody>
		<?php } ?>
</table>

<?php //Table 2 ?>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Menu Yang Dipesan</th>
			<th>Banyak Pesanan</th>
			<th>Tanggal Pemasukan(Th/Bl/Tgl)</th>
			<th>Uang Masuk</th>
		</tr>
	</thead>
	<tbody>
		<?php $angka=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM struk"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
		
			<th><?php  echo $angka; ?></th>
			<th><?php echo $pecah['nama'] ?></th>
			<th><?php echo $pecah['jumlah'] ?></th>
			<th><?php echo $pecah['tanggal'] ?></th>
			<th><?php echo $pecah['jumlah']*$pecah['harga']; ?></th>
		</tr>
			</tbody>
			<?php  $angka++;  ?>

		<?php } ?>
</table>

<?php //table ?>


<h3 class="alert alert-info">
<?php 
echo "Total Pemasukkan Anda : Rp "; 
echo number_format($jumlah);
echo ",00";
 ?>
</h3>