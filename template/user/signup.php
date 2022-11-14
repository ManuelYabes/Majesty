<?php 

require 'func/functions.php';

function signup($data){
    global $conn;
    $nama = $data['nama'];
    $email = $data['email'];
    $password = $data['password'];

    mysqli_query($conn, "INSERT INTO pengguna VALUES('','$nama','$email','$password')");
    return mysqli_affected_rows($conn);
}

if(isset($_POST["submit"])){
    if(signup($_POST) > 0){
        echo "<script>
        alert('SUKSESS');
        </script>";
        header('Location: login.php');
    } else {
        echo "<script>
        alert('GAGAL');
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
    <title>Document</title>
    <link rel="stylesheet" href="../../tailwind/output.css">
    <style>
        @font-face {
            font-family: 'Poppins';
            src: url(../../static/Assets/Poppins-ExtraLight.ttf);
        }
        *{
            font-family: 'Poppins';
        }
    </style>
</head>
<body>
    <nav class="top-0 fixed flex justify-between items-center w-full h-[9%] bg-transparent drop-shadow-xxl px-16 z-10">
        <img class="p-2.5" src="../../static/Foto/Majesty.png" alt="">
        <ul class="w-[50%] flex flex-row justify-around list-none">
            <li class="font-normal text-xl text-center"><a class="text-white no-underline hover:pointer hover:underline" href="#heading">Dashboard</a></li>
            <li class="font-normal text-xl text-center"><a class="text-white no-underline hover:pointer hover:underline" href="#about">About</a></li>
            <li class="font-normal text-xl text-center"><a class="text-white no-underline hover:pointer hover:underline" href="#galeri">Galeri</a></li>
            <li class="font-normal text-xl text-center"><a class="text-white no-underline hover:pointer hover:underline" href="#kontak">Kontak</a></li>
            <li class="font-normal text-xl text-center"><a class="text-white no-underline hover:pointer hover:underline" href="login.php">Login</a></li>
            <li class="font-normal text-xl text-center"><a class="text-white no-underline hover:pointer hover:underline" href="signup.php">Signup</a></li>
            <li><a href=""></a></li>
        </ul>
    </nav>
    <main class="w-[100%] h-screen flex justify-evenly items-center">
        <img class="my-auto w-[40%]" src="../../static/Foto/undraw_secure_login_pdn4 1.png" alt="">
        <form action="" method="POST" class="flex flex-col items-center  w-[30%] h-[60%] bg-white drop-shadow-xl rounded-xl">
            <span class="mt-8">Daftar</span>
            <span>Sudah Punya AKun?<a href="login.php" class="underline">Login</a></span>
            
            <div class="mt-6 flex flex-col w-full">
                <label class="ml-12" for="email">email</label>
                <input class="border-2 rounded-lg w-[80%] h-9 mx-auto" type="email" name="email" id="email">
            </div>
            <div class="mt-2.5 flex flex-col w-full">
                <label class="ml-12" for="nama">nama</label>
                <input class="border-2 rounded-lg w-[80%] h-9 mx-auto" type="text" name="nama" id="nama">
            </div>
            <div class="mt-2.5 flex flex-col w-full">
                <label class="ml-12" for="password">password</label>
                <input class="border-2 rounded-lg w-[80%] h-9 mx-auto"  type="password" name="password" id="password">
            </div>
            <button class="bg-gray-300 w-[80%] h-10 rounded-lg mt-4" type="submit" name="submit" >SignUp</button>
        </form>
    </main>
</body>
</html>