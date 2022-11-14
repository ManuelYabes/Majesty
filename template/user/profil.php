<?php 

require 'func/functions.php';
session_start();

$idUser = $_SESSION['userID'];
$profil = query("SELECT * FROM pengguna WHERE id = $idUser");
$history = query("SELECT * FROM peminjam INNER JOIN daftar_baju on peminjam.id_baju = daftar_baju.id WHERE id_pengguna = $idUser");
$favorit = query("SELECT * FROM favorit INNER JOIN daftar_baju on favorit.id_baju = daftar_baju.id WHERE id_pengguna = $idUser");
// var_dump($favorit);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <input type="text" value="<?=  $profil[0]['nama'] ?>">
    <input type="email" value="<?=  $profil[0]['email'] ?>">
    <input type="password" value="<?=  $profil[0]['password'] ?>">

    <a href="list.php">kembali ke daftar baju</a>
    <div>
        <h1>peminjaman</h1>
        <?php foreach($history as $row): ?>
            <img src="../../media/img/<?= $row['foto'] ?>" alt="">
            <p><?= $row['tanggal'] ?></p>
        <?php endforeach ?>
    </div>
    
    <div>
        <h1>favorit</h1>
        <?php foreach($favorit as $row): ?>
            <img src="../../media/img/<?= $row['foto'] ?>" alt="">
        <?php endforeach ?>
    </div>

</body>
</html>