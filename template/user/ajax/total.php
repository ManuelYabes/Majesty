<?php

require '../func/functions.php';
$hargaBaju = $_GET['harga'];

$tanggal_ = strtotime($_GET['tanggal1']);
$tanggal2_ = strtotime($_GET['tanggal2']);
$hasil = $tanggal2_ - $tanggal_;
$hari = $hasil / 86400;
$totalHarga = $hari === 0 ? $hargaBaju : $hari * $hargaBaju;
if(!date_parse($_GET['tanggal1']) || !date_parse($_GET['tanggal2'])){
    $totalHarga = 0;
}

?>

<span><?= $totalHarga ?></span> 