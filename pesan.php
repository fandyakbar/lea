<title>Cafe Terlalu Maju</title>
<?php 
$koneksi = new mysqli("localhost","root","","lea");
session_start();
 ?>


		
		<div class="alert alert-danger" role="alert">
			<h1>Selamat Datang di Cafe <span class="badge badge-secondary">INI</span></h1>
  <h3>Silahkan Periksa Kembali Pesanan Anda</h3>
</div>
		


<!DOCTYPE html>
 <html>
 <head>
 	<title>Lihat Pesanan Anda</title>
 	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
 </head>
 <body>
<!--navbar-->
<nav class="navbar navbar-default">
	<div class="container">
		<ul class="nav navbar-nav">
			<li><a href="index.php">Menu</a></li>
			<li><a href="pesan.php">Pesanan</a></li>
			
		</ul>
	</div>
</nav> 
<!--konten-->
 <div class="container">
<section class="konten">

		<div class="row">

			<?php 
				$ambil=$koneksi->query("SELECT * FROM pembelian JOIN menu WHERE pembelian.kode=menu.kode");
				while($satuan=$ambil->fetch_assoc()){
			 ?>

			<div class="col-md-3">
				<div class="thumbnail">
				
				<div class="caption">

					<table class="table table-bordered">
						<thead class="alert alert-danger">
							<tr>
								<th>Nomor Meja</th>
								<th><?php echo $satuan['meja']; ?></th>
							</tr>
						</thead>
							</table>
					<h3><?php echo $satuan['nama']; ?></h3>
					<table>
						<thead>
							<tr>
								<th>Jumlah : <?php echo $satuan['jumlah']; ?></th>
							</tr>
						</thead>
					</table>
					
					<h5>Total Tagihan :Rp<?php echo number_format($satuan['jumlah']*$satuan['harga']) ?></h5>
				</div>
			</div>
			</div>
			

		<?php } ?>
		</div>
	</div>
</section>

 </body>
 </html>

