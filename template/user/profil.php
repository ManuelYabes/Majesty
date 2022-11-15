<?php 

require 'func/functions.php';
session_start();

$idUser = $_SESSION['userID'];
$profil = query("SELECT * FROM pengguna WHERE id = $idUser");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <main class="flex flex-row w-full h-screen border-4">
        <div class="w-[20%] h-full p-4 flex justify-center">
            <div class="w-[80%] h-[80%] border-2 flex flex-col justify-around items-center text-2xl rounded-xl">
                <span class="h-[5%]"><?= $profil[0]['nama'] ?></span>
                <div class="max-h-[60%] flex flex-col justify-around gap-4">
                    <a href="profil.php">Profile</a>
                    <a href="favorit.php">Favorit</a>
                    <a href="riwayat.php">Riwayat</a>
                    <a href="bantuan.php">Bantuan</a>
                </div>
                <a class="h-[20%]" href="func/logout.php">LogOut</a>
            </div>
        </div>



        <div class="w-[80%] h-full p-4 flex justify-center">
            <div class="w-[100%] h-[80%] border-2 flex flex-row items-center rounded-xl">
                <div class="w-[20%] h-[100%] border-2 flex flex-col justify-around items-center">
                    <img src="max-w-[100%] max-h-[50%]" alt="Profil">
                </div>
                <div class="w-[80%] h-[100%] border-2 border-2 flex flex-col items-start rounded-xl gap-8">
                    <span class="w-[90%] mt-6 mx-auto flex justify-between text-xl font-bold">Ubah BioData<span class="font-medium underline"><a href="">Tambah / Ubah Profil</a></span></span>
                    <div class="w-[90%] mx-auto flex justify-between"><span>Nama </span><span><?=  $profil[0]['nama'] ?></span></div>
                    <div class="w-[90%] mx-auto flex justify-between"><span>Tanggal Lahir </span><span><?=  $profil[0]['tanggal_lahir'] ?></span></div>
                    <div class="w-[90%] mx-auto flex justify-between"><span>Jenis Kelamin </span><span><?=  $profil[0]['jenis_kelamin'] ?></span></div>
                    <span class="w-[90%] mt-6 mx-auto flex justify-between text-xl font-bold">Ubah Kontak</span>
                    <div class="w-[90%] mx-auto flex justify-between"><span>Email </span><span> <?=  $profil[0]['email'] ?></span></div>
                    <div class="w-[90%] mx-auto flex justify-between"><span>No telepon </span> <?=  $profil[0]['no_telepon'] ?></span></div>
                </div>
            </div>
        </div>
    </main>


    <a href="list.php">kembali ke daftar baju</a>
    <script src="../../node_modules/flowbite/dist/flowbite.js"></script>

</body>
</html>