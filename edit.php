<?php
require 'config.php';

$id = $_GET['id'];

$sel = mysqli_query($conn, "SELECT * FROM produk WHERE idproduk = $id");

if(isset($_POST['submit']) ) {

$idp = $_POST['idproduk'];
$nama = $_POST['nama_produk'];
$ket = $_POST['keterangan'];
$harga = $_POST['harga'];
$jmlh = $_POST['jumlah'];

$uptd = "UPDATE produk SET nama_produk = '$nama', keterangan = '$ket', harga = $harga, jumlah = $jmlh  WHERE idproduk = $id";

if(mysqli_query($conn, $uptd)) {

    echo '<script> alert("Produk Berhasil di Update"); window.location.href= "index.php"; </script>';

}



}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
  <a class="navbar-brand" href="#">Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">User</a>
      </li>
    </ul>
  </div>
  </div>
</nav>
<br><br>
<h2 class="text-center">Tambah Produk</h2>

<form method="post" action="">
<div class="container">
<?php  foreach($sel as $row) : ?>
    <input type="hidden" value=" <?=  $row['idproduk']; ?> " name="idproduk">
<div class="form-group">
    <label for="exampleInputEmail1">Nama Produk</label>
    <input type="text" class="form-control" name="nama_produk" value="  <?=$row['nama_produk']; ?>  ">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Keterangan</label>
    <textarea name="keterangan" id="" rows="10" class="form-control" value="  "><?=$row['keterangan']; ?></textarea>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Harga</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="harga" value=" <?=  $row['harga']; ?> ">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Jumlah</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="jumlah" value="  <?=  $row['jumlah']; ?>  "> 
  </div>
  
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  <a href="index.php" class="btn btn-danger">Batal</a>
  </div>
  <?php endforeach; ?>
</form>


    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>