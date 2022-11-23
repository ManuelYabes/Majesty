<?php

require './functions.php';
$id = $_GET['id_baju'];
mysqli_query($conn,"DELETE FROM daftar_baju WHERE id_baju = $id");
header('Location: ../daftarbaju.php')

?>