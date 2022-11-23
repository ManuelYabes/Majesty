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

if(isset($_POST["ubah"])){
    if(ubah($_POST)>0){
        echo "<script>   
            alert('sukses');
            document.location.href = 'profil.php';
        </script>";
    }else{
        echo "<script>   
            alert('gagal');
            document.location.href = 'profil.php';
        </script>";
    }
}

if(isset($_POST["submit"])){
    if(uploadPP($_POST)>0){
        echo "<script>   
            alert('sukses');
            document.location.href = 'profil.php';
        </script>";
    } else {
        echo "<script>   
            alert('gagal');
            document.location.href = 'profil.php';
        </script>";
    }
}

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
        <div class="w-full md:w-[80%] h-full md:h-[80%] md:h-full p-4 flex justify-center">
            <div class="w-[100%] h-full border-2 flex flex-col md:flex-row items-center rounded-xl">
                <form action="" method="POST" enctype="multipart/form-data" class="w-full md:w-[20%] h-[30%] md:h-full border-2 md:border-r-2 flex flex-row md:flex-col justify-around items-center">
                    <img class="w-[40%] md:w-[80%] aspect-square" src="../../media/img/<?= $profil[0]['foto'] ?>" alt="Profil">
                    <input type="hidden" name="id_pengguna" id="" value="<?= $profil[0]['id'] ?>">
                    <div class="flex flex-col gap-4">
                        <Label for="pp" class="cursor-pointer flex gap-2 font-semibold items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m6.75 12l-3-3m0 0l-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                            <span>
                                Upload
                            </span>
                        </Label>
                        <input type="file" name="pp" id="pp" class="hidden">
                        <button type="submit" name="submit" class="flex">
                            <span class="font-semiboldtext-lg ">Next</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </button>
                    </div>
                </form>
                <form action="" method="POST" class="w-full md:w-[80%] h-[100%] flex-wrap flex flex-col items-start rounded gap-8">
                    <input type="hidden" name="id_pengguna" id="" value="<?= $profil[0]['id'] ?>">
                    <span class="w-[90%] mt-6 mx-auto flex justify-between text-lg md:text-xl font-bold">Ubah BioData<span class="font-medium"><button class="underline" type="submit" name="ubah">Save</button></span></span>
                    <div class="w-[90%] mx-auto text-lg flex justify-between md:items-center"><span>Nama </span><input type="text" name="nama" value="<?=  $profil[0]['nama'] ?>" class="h-7 rounded border-0 drop-shadow"></div>
                    <div class="w-[90%] mx-auto text-lg flex justify-between md:items-center"><span>Tanggal Lahir </span><input type="date" name="lahir" value="<?=  $profil[0]['tanggal_lahir'] ?>" class="h-7 rounded border-0 drop-shadow"></div>
                    <div class="w-[90%] mx-auto text-lg flex justify-between md:items-center"><span>Jenis Kelamin </span><select type="text" name="gender" value="" class="rounded text-sm h-9 w-32 rounded border-0 drop-shadow"><option value="pria">Pria</option><option value="wanita">Wanita</option></select></div>
                    <span class="w-[90%] mt-3 mx-auto flex justify-between text-lg md:text-xl font-bold">Ubah Kontak</span>
                    <div class="w-[90%] mx-auto text-lg flex flex-col md:flex-row md:justify-between md:items-center"><span>Email </span><input type="email" name="email" value="<?=  $profil[0]['email'] ?>" class="rounded border-0 drop-shadow"></div>
                    <div class="w-[90%] mx-auto text-lg flex flex-col md:flex-row md:justify-between md:items-center"><span>No telepon </span><input type="number" name="phone" value="<?=  $profil[0]['no_telepon'] ?>" class="h-7 rounded border-0 drop-shadow"></div>
                </form>
            </div>
        </div>
    </main>

    <script src="../../node_modules/flowbite/dist/flowbite.js"></script>

</body>
</html>