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

$user = query("SELECT * FROM pengguna");

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
<a href="func/logout.php">log</a>
    <ul>
        <?php foreach($user as $row): ?>
            <li><?= $row['nama'] ?></li>
        <?php endforeach ?>
    </ul>
</body>
</html>