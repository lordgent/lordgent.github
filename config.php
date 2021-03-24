<?php 

$conn = mysqli_connect('localhost', 'root', '', 'arkademy');
if($conn) {

} else{
    echo 'db error' . mysqli_connect_error();
        die;
}


?>