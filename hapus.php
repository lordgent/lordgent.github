<?php
require 'config.php';

$id = $_GET['id'];

if(mysqli_query($conn, "DELETE FROM produk WHERE idproduk = $id") ) {
    echo ' <script> alert("Produk Berhasil dihapus"); window.location.href= "index.php"; </script> ';

}





?>