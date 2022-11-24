<?php 

require 'func/functions.php';
session_start();
if(isset($_COOKIE["key"]) && isset($_COOKIE["id"])){
    $id = $_COOKIE['id'];
    $key = $_COOKIE["key"];

    $result = mysqli_query($conn,"SELECT * FROM pengguna WHERE id = $id");
    $rows = mysqli_fetch_assoc($result);

    if($key === hash('sha256', $rows["email"])){
        $_SESSION['user'] = $rows["nama"];
        $_SESSION['userID'] = $rows["id"];
    }
}

if (!isset($_SESSION['user']) && !isset($_SESSION['userID'])) {
    header("Location: login.php");
    exit();
}

$idUser = $_SESSION['userID'];
$profil = query("SELECT * FROM pengguna WHERE id = $idUser");
// $history = query("SELECT * FROM peminjam INNER JOIN daftar_baju on peminjam.id_baju = daftar_baju.id WHERE id_pengguna = $idUser");
$favorit = query("SELECT * FROM favorit INNER JOIN daftar_baju on favorit.id_baju = daftar_baju.id_baju WHERE id_pengguna = $idUser");
// var_dump($favorit);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Majesty</title>
    <link rel="stylesheet" href="../../tailwind/output.css">
    <style>
        @font-face {
            font-family: 'Poppins', sans-serif;
            src: url(../../staic/Assets/Poppins-ExtraLight.ttf);
        }
        *{
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <?php include('nav.php') ?>

    <main class="flex flex-col md:flex-row w-full h-screen border-4">
        <div class="hidden md:flex justify-center w-[20%] h-full p-4">
            <div class="w-[80%] h-[80%] border-2 flex flex-col justify-around items-center text-2xl rounded-xl">
            <span class="h-[5%] font-bold"><?= $profil[0]['nama'] ?></span>
                <div class="max-h-[60%] flex flex-col justify-around gap-4">
                    <a href="profil.php">Profile</a>
                    <a href="favorit.php">Favorit</a>
                    <a href="riwayat.php">Riwayat</a>
                    <a href="bantuan.php">Bantuan</a>
                </div>
                <a class="h-[20%]" href="func/logout.php">LogOut</a>
            </div>
        </div>
        <div class="md:hidden w-full h-[5%] flex justify-around items-center">
            <div class="underline">
                <a href="profil.php">Profile</a>
                <a href="favorit.php">Favorit</a>
                <a href="riwayat.php">Riwayat</a>
                <a href="bantuan.php">Bantuan</a>
                <a class="h-[20%]" href="func/logout.php">LogOut</a>
            </div>
        </div>

        <div class="w-full md:w-[80%] h-full p-4 flex justify-center">
            <div class="w-full h-full flex flex-row flex-wrap justify-center overflow-auto rounded-xl gap-4 border-2 z-10"> 
                <?php foreach( $favorit as $row): ?>
                    <a href="detail.php?id=<?= $row['id'] ?>" class="w-[95%] h-fit rounded-sm aspect-[20/4] gap-10 flex flex-row justify-star flex-wrap md:drop-shadow-xl bg-white border-2 md:border-none mt-1.5 md:mt-4">
                        <img class="hidden md:flex h-fit w-[20%]" src="../../media/img/<?= $row['foto'] ?>" alt="">
                        <div class="flex flex-col gap-2 w-full md:w-[60%]">
                        <span class="text-xl font-bold"><?= $row['nama'] ?></span>
                        <span class="text-xl"><?= $row['deskripsi'] ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </main>


    <script src="../../node_modules/flowbite/dist/flowbite.js"></script>

</body>
</html>