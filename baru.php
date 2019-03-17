<h2>halooo</h2>


<?php 
$koneksi= new mysqli("localhost","root","","lea");

$ambil=$koneksi->query("SELECT * FROM menu");

echo $ambil['nama'];

 ?>