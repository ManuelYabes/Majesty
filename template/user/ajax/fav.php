<?php 

require '../func/functions.php';

$iduser = intval($_GET['iduser']);
$idbaju = intval($_GET['idbaju']);

$check = query("SELECT * FROM favorit WHERE id_pengguna = $iduser AND id_baju = $idbaju");

if(empty($check)){
    mysqli_query($conn,"INSERT INTO favorit VALUES('',$iduser,$idbaju)");
} else {
    mysqli_query($conn,"DELETE FROM favorit WHERE id_pengguna = $iduser AND id_baju = $idbaju");
}

?>