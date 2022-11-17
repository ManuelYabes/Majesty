<?php
require 'func/functions.php';
session_start();

if(isset($_SESSION['id'])){
    $idUser = $_SESSION['id'];
    $result = query("SELECT * FROM pengguna WHERE id=$idUser");
    if(hash('sha256',$result[0]['nama']) !== $_SESSION['uniqueID']){
        header('Location: login.php');
    }
} else {
    header('Location: login.php'); 
}



$peminjam = query("SELECT * FROM peminjam");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../tailwind/output.css">
</head>
<body>
<a href="func/logout.php">log</a>
    <input data-popover-target="sContainer" data-popover-placement="right" data-popover-trigger="click" type="text" id="searchP" class="">
    <div data-popover id="sContainer" role="tooltip" class="inline-block absolute invisible z-20 w-[60%] text-sm font-light text-gray-500 bg-white rounded border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
            <ul id="Container" class="w-auto">

            </ul>
    </div>
    <ul>
        <?php foreach($peminjam as $row): ?>
            <li><?= $row['nama'] ?>
            <?= $row['nama_pengguna'] ?>
            <?= $row['tanggal'] ?> --
            <?= $row['tanggal_'] ?></li>
        <?php endforeach ?>
    </ul>
    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/script.js"></script>
    <script src="../../node_modules/flowbite/dist/flowbite.js"></script>
</body>
</html>