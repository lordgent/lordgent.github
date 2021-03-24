<?php 

require 'config.php';
error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">User</a>
      </li>

    <li class="nav-link">
     
    </li>

    </ul>
  </div>
  </div>
</nav>
<?php   



$parameter = $_POST['nama_produk'];

if($parameter !== ''){

  $data = mysqli_query($conn, "SELECT * FROM produk WHERE nama_produk LIKE '%$parameter%' ");


} else {

  $data = mysqli_query($conn, "SELECT * FROM produk");

}


?>

<br><br>
<h1 class="text-center">Data Produk</h1>

<div class="container">

<form method="post" action="" class="d-flex">
      <input class="form-control" type="text" placeholder="Masukan Produk yang di cari" name="nama_produk">
      <button class="btn btn-success" type="submit" name="cari">Search</button>
    </form>
    <br><br>
<a href="add.php" class="btn btn-primary">Add Produk</a>

<table class="table">
  <thead class="thead-dark">
    <tr>
    <th scope="col">No</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Harga</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Config</th>
    </tr>
  </thead>
  <tbody>

  <?php 
  $i = 1;
  foreach($data as $row) : ?>
    <tr>
    <th><?= $i; ?></th>
      <th> <?= $row['nama_produk']; ?> </th>
      <td> <?= $row['keterangan']; ?> </td>
      <td><?=  $row['harga']; ?></td>
      <td><?= $row['jumlah']; ?></td>
      <td> 
      <a href="edit.php?id=<?= $row['idproduk']; ?>" class="btn btn-warning">edit</a>
      <a href="hapus.php?id=<?= $row['idproduk']; ?>" class="btn btn-danger" onclick="return confirm('Kamu yakin mau hapus Data ini?');">Hapus</a>
      </td>
    </tr>
    <?php $i++; ?>
    <?php  endforeach; ?>
  </tbody>
</table>
</div>


    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>