<?php

require "func/functions.php";
session_start();

if (isset($_COOKIE["key"]) && isset($_COOKIE["id"])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE["key"];

    $result = mysqli_query($conn, "SELECT * FROM pengguna WHERE id = $id");
    $rows = mysqli_fetch_assoc($result);

    if ($key === hash('sha256', $rows["email"])) {
        $_SESSION['user'] = $rows["nama"];
        $_SESSION['userID'] = $rows["id"];
    }
}

if (!isset($_SESSION['user']) && !isset($_SESSION['userID'])) {
    header("Location: list.php");
    exit();
}


$idUser = $_SESSION['userID'];
$idnext = $_GET["idnext"];
$history = query("SELECT peminjam.id,peminjam.nama,peminjam.id_pengguna,peminjam.pembayaran,peminjam.tanggal,peminjam.tanggal_,peminjam.nama,peminjam.ukuran,peminjam.code,daftar_baju.foto FROM peminjam LEFT JOIN daftar_baju ON peminjam.id_baju = daftar_baju.id_baju WHERE peminjam.id = '$idnext' AND peminjam.id_pengguna = $idUser");
// var_dump($history);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../tailwind/output.css">
    <style>
        @font-face {
            font-family: 'Poppins', sans-serif;
            src: url(../../staic/Assets/Poppins-ExtraLight.ttf);
        }

        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>

    <?php include('nav.php'); ?>

    <main>
        <div class="flex flex-col items-center text-lg md:text-2xl mt-4">
            <Span>Terimakasih telah meminjam pakaian di kami</Span>
            <span>jangan lupa tunjukan pesan ini ke kasir Untuk pengambilan</span>
            <span class="text-xl">klik gambar untuk ke riwayat</span>
        </div>
        <div>
            <div class="flex flex-row justify-center w-full p-10">
                <a href="profil.php" class="flex flex-col md:flex-row justify-around w-[90%] md:w-[60%] border-2">
                    <img class="" src="../../media/img/<?= $history[0]['foto'] ?>" alt="">
                    <div class="flex flex-col justify-center">
                        <span class="text-2xl md:text-3xl font-[100]"><?= $history[0]['nama'] ?></span>
                        <span class="text-lg md:text-xl mt-4">Ukuran <?= $history[0]['ukuran'] ?></span>
                        <span class="text-lg md:text-xl">Pembayaran <?= $history[0]['pembayaran'] ?></span>
                        <span class="text-lg md:text-xl">Tanggal <?= $history[0]['tanggal'] ?> Sampai <?= $history[0]['tanggal_'] ?> </span>
                        <span class="text-lg md:text-xl">Code <?= $history[0]['code'] ?></span>
                    </div>
                </a>
            </div>
        </div>
    </main>
    <script src="../../node_modules/flowbite/dist/flowbite.js"></script>

</body>

</html>