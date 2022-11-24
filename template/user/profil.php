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
        <div class="hidden md:flex justify-center w-[20%] h-full p-4 ">
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
        <div class="w-full md:w-[80%] h-full md:h-[80%] p-4 flex justify-center">
            <div class="w-[100%] h-full md:h-[100%] border-2 flex flex-col md:flex-row items-center rounded-xl">
                <div class="w-[100%] md:w-[20%] h-[30%] md:h-full border-2 flex flex-col justify-start items-center pt-3 md:pt-5">
                    <img class="w-[40%] md:w-[80%] aspect-square" src="../../media/img/<?= $profil[0]['foto'] ?>" alt="Profil">
                </div>
                <div class="w-full md:w-[80%] h-[100%] flex-wrap flex flex-col items-start rounded-xl gap-8">
                    <span class="w-[90%] mt-6 mx-auto flex justify-between text-lg md:text-xl font-bold">Ubah Biodata<span class="font-medium underline"><a href="ubahprofile.php">Tambah / Ubah Profil</a></span></span>
                    <div class="w-[90%] mx-auto flex justify-between"><span>Nama </span><span><?=  $profil[0]['nama'] ?></span></div>
                    <div class="w-[90%] mx-auto flex justify-between"><span>Tanggal Lahir </span><span><?=  $profil[0]['tanggal_lahir'] ?></span></div>
                    <div class="w-[90%] mx-auto flex justify-between"><span>Jenis Kelamin </span><span><?=  $profil[0]['jenis_kelamin'] ?></span></div>
                    <span class="w-[90%] mt-6 mx-auto flex justify-between text-lg md:text-xl font-bold">Ubah Kontak</span>
                    <div class="w-[90%] mx-auto flex flex-col md:flex-row md:justify-between"><span>Email </span><span> <?=  $profil[0]['email'] ?></span></div>
                    <div class="w-[90%] mx-auto flex flex-col md:flex-row md:justify-between"><span>No telepon </span> <?=  $profil[0]['no_telepon'] ?></span></div>
                </div>
            </div>
        </div>
    </main>

    <script src="../../node_modules/flowbite/dist/flowbite.js"></script>

</body>
</html>