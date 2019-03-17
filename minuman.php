<title>Cafe Terlalu Maju</title>
<?php 
$koneksi = new mysqli("localhost","root","","lea");
session_start();
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<div class="alert alert-danger" role="alert">
  <h1>Selamat Datang di Cafe <span class="badge badge-secondary">INI</span></h1>
    <h3>Silahkan Pilih Menu Kami</h3>
</div>
 	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
 </head>
 <body>
<!--navbar-->
<nav class="navbar navbar-default">
	<div class="container">
		<ul class="nav navbar-nav">
			<li><a href="index.php">Makanan</a></li>
			<li><a href="minuman.php">Minuman</a></li>
			<li><a href="dessert.php">Dessert</a></li>
			<li><a href="pesan.php">Pesanan</a></li>
			
		</ul>
	</div>
</nav> 

<!--konten-->
<section class="konten">
	<div class="container">
		
		<div class="row">

			<?php 
				$ambil=$koneksi->query("SELECT * FROM menu");
				while($satuan=$ambil->fetch_assoc()){
					if ($satuan['jenis']=="minuman"){
			 ?>

			<div class="col-md-3">
				
				<div class="thumbnail">
				<img src="foto/<?php echo $satuan['foto']; ?>" width="300">
				<div class="caption">
					<h3><?php echo $satuan['nama']; ?></h3>
					<h5>Rp<?php echo number_format($satuan['harga']); ?></h5>
					
				</div>
			
			</div>
			</div>
			

		<?php }} ?>
		</div>
	</div>
</section>

 </body>
 </html>


