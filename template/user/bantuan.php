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

    <main class="flex flex-col md:flex-row w-full h-screen border-4">
        <div class="hidden md:flex justify-center w-[20%] h-full p-4 ">
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
            <div class="w-[100%] h-[80%] border-2 flex flex-col items-center rounded-xl">
                <span class="w-[90%] mt-6 mx-auto flex justify-center text-xl font-bold">Apakah ada kesulitan?</span>
                    <div class="w-[90%] mt-6 mx-auto flex justify-between text-xl font-medium">Hubungi Kami Melalui: </div>
                    <div class="w-[90%] mx-auto mt-2 flex justify-between"><a href=""><img src="../../static/Foto/gmail.png"></a></div>
                    <div class="w-[90%] mx-auto mt-2 flex justify-between"><a href=""><img src="../../static/Foto/phone.png"></a></div>
                    
                    <span class="w-[90%] mt-6 mx-auto flex justify-between text-xl font-medium">Kontak kami lainya: </span>
                    <div class="w-[90%] mx-auto mt-2 flex justify-between"><a href=""><img src="../../static/Foto/instagram.png"></a></div>
                    <div class="w-[90%] mx-auto mt-2 flex justify-between"><a href=""><img src="../../static/Foto/tiktok.png"></a></div>
                    <div class="w-[90%] mx-auto mt-2 flex justify-between"><a href=""><img src="../../static/Foto/youtube.png"></a></div>
            </div>
        </div>
    </main>


    <script src="../../node_modules/flowbite/dist/flowbite.js"></script>

</body>
</html>