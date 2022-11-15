<?php 

require 'func/functions.php';
session_start();

$idUser = $_SESSION['userID'];
$profil = query("SELECT * FROM pengguna WHERE id = $idUser");
$history = query("SELECT peminjam.id,peminjam.id_baju,peminjam.id_pengguna,peminjam.tanggal,peminjam.tanggal_,peminjam.code,peminjam.ukuran,peminjam.pembayaran,daftar_baju.id_baju,daftar_baju.foto,daftar_baju.nama FROM peminjam LEFT JOIN daftar_baju ON peminjam.id_baju = daftar_baju.id_baju WHERE peminjam.id_pengguna = $idUser ORDER BY peminjam.id DESC LIMIT 0,12");
// $favorit = query("SELECT * FROM favorit CROSS JOIN daftar_baju on favorit.id_baju = daftar_baju.id_baju WHERE id_pengguna = $idUser");

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
            <div class="w-full h-full flex flex-row flex-wrap justify-center overflow-auto rounded-xl border-2 z-10"> 
                <?php foreach( $history as $row): ?>
                    <a href="historydetail.php?<?= $row['id'] ?>" class="w-[95%] h-fit aspect[20/4] rounded-xl gap-10 flex flex-row justify-star flex-wrap drop-shadow-xl bg-white mt-4">
                        <img class="h-fit w-[20%]" src="../../media/img/<?= $row['foto'] ?>" alt="">
                        <div class="flex flex-col w-[60%]">
                            <span class="text-xl font-bold"><?= $row['nama'] ?></span>
                            <span class="text-lg">Peminjaman dilakukan pada tanggal: <?= $row['tanggal'] ?> sampai <?= $row['tanggal_'] ?></span>
                            <span class="text-xl">Pembayaran <?= $row['pembayaran'] ?></span>
                            <span class="text-xl">Ukuran <?= $row['ukuran'] ?></span>
                            <span class="text-xl">code <?= $row['code'] ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </main>


    <a href="list.php">kembali ke daftar baju</a>
    <script src="../../node_modules/flowbite/dist/flowbite.js"></script>

</body>
</html>

    <!-- <section class="flex flex-row flex-wrap max-w-[900px]">
        <div class="p-[20px] bg-[#e6e6e6] rounded w-[300px] objext-cover m-[2px]">
            <h1>Simple Flex Box</h1>
        </div>
        <img src="https://placeimg.com/200/300/animals" alt="Placeholder">
        <img class="h-[200px] grow object-cover m-[2px]" src="https://placeimg.com/200/100/animals" alt="Placeholder">
        <img class="h-[200px] grow object-cover m-[2px]" src="https://placeimg.com/200/340/animals" alt="Placeholder">
        <img class="h-[200px] grow object-cover m-[2px]" src="https://placeimg.com/200/300/animals" alt="Placeholder">
        <img class="h-[200px] grow object-cover m-[2px]" src="https://placeimg.com/200/340/animals" alt="Placeholder">
        <a href="#" class="w-auto"><img class="grow object-cover h-[200px] m-[2px]" src="../../media/img/" alt=""></a>
    </section> -->