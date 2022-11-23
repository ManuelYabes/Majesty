<?php

require 'func/functions.php';
session_start();

if (isset($_SESSION['user']) && isset($_SESSION['userID'])) {
    header("Location: list.php");
    exit();
}

function signup($data)
{
    global $conn;
    $nama = $data['nama'];
    $email = $data['email'];
    $password = $data['password'];

    mysqli_query($conn, "INSERT INTO pengguna VALUES('','$nama','$email','$password','','','','')");
    return mysqli_affected_rows($conn);
}

if (isset($_POST["submit"])) {
    if (signup($_POST) > 0) {
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
    <title>Majesty</title>
    <link rel="stylesheet" href="../../tailwind/output.css">
    <style>
        @font-face {
            font-family: 'Poppins', sans-serif;
            src: url(../../static/Assets/Poppins-ExtraLight.ttf);
        }

        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <nav class="top-0 fixed flex justify-center md:justify-between items-center w-full h-[9%] bg-transparent drop-shadow-xxl md:px-16 z-10">
        <img data-popover-target="popover-bottom" data-popover-placement="bottom" class="md:hidden p-2.5" src="../../static/Foto/Majesty.png" alt="">
        <img class="hidden md:flex p-2.5" src="../../static/Foto/Majesty.png" alt="">
        <ul data-popover id="ul" class="md:w-[50%] hidden md:flex flex-row justify-around list-none">
            <li class="font-normal text-xl text-center"><a class="text-white no-underline hover:pointer hover:underline" href="index.php#heading">Dashboard</a></li>
            <li class="font-normal text-xl text-center"><a class="text-white no-underline hover:pointer hover:underline" href="index.php#about">About</a></li>
            <li class="font-normal text-xl text-center"><a class="text-white no-underline hover:pointer hover:underline" href="index.php#galeri">Galeri</a></li>
            <li class="font-normal text-xl text-center"><a class="text-white no-underline hover:pointer hover:underline" href="index.php#kontak">Kontak</a></li>
            <li class="font-normal text-xl text-center"><a class="text-white no-underline hover:pointer hover:underline" href="login.php">Login</a></li>
            <li class="font-normal text-xl text-center"><a class="text-white no-underline hover:pointer hover:underline" href="signup.php">Signup</a></li>
            <li><a href=""></a></li>
        </ul>
    </nav>

    <div data-popover id="popover-bottom" role="tooltip" class="inline-block absolute invisible z-20 w-[60%] text-sm font-light text-gray-500 bg-white rounded border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        <ul class="w-[100%] flex flex-col items-center list-none gap-4">
            <li class="font-normal text-xl text-center"><a class="text-black no-underline hover:pointer hover:underline" href="index.php#heading">Dashboard</a></li>
            <li class="font-normal text-xl text-center"><a class="text-black no-underline hover:pointer hover:underline" href="index.php#about">About</a></li>
            <li class="font-normal text-xl text-center"><a class="text-black no-underline hover:pointer hover:underline" href="index.php#galeri">Galeri</a></li>
            <li class="font-normal text-xl text-center"><a class="text-black no-underline hover:pointer hover:underline" href="index.php#kontak">Kontak</a></li>
            <li class="font-normal text-xl text-center"><a class="text-black no-underline hover:pointer hover:underline" href="login.php">Login</a></li>
            <li class="font-normal text-xl text-center"><a class="text-black no-underline hover:pointer hover:underline" href="signup.php">Signup</a></li>
        </ul>
    </div>
    <div class="fixed w-screen h-screen top-0 bottom-0 right-0 left-0 bg-[#d7a86e] text-[#d7a86e] z-0">
        <img class="fixed w-screen h-screen top-0 bottom-0 right-0 left-0" src="../../static/foto/—Pngtree—golden thai pattern batik_5824941 1.png" alt="">
    </div>
    <main class="w-[100%] h-screen flex flex-col md:flex-row justify-evenly items-center">
        <!-- <img class="mt-24 md:my-auto w-[90%] md:w-[40%]" src="../../static/Foto/undraw_secure_login_pdn4 1.png" alt=""> -->
        <form action="" method="POST" class="mt-4 md:mt-0 flex flex-col items-center w-[80%] md:w-[30%] h-[50%] md:h-[60%] bg-white drop-shadow-xxl rounded-xl">
            <span class="mt-8">Daftar</span>
            <span>Sudah Punya Akun?<a href="login.php" class="underline">Login</a></span>

            <div class="relative mt-6 w-full">
                <input placeholder=" " type="email" name="email" id="email" class="border-2 rounded-lg w-[80%] h-9 mx-auto block rounded-t-lg px-2.5 pb-2.5 pt-5 text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                <label for="email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-1.5 z-10 origin-[0] left-12 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">email</label>
            </div>
            <div class="relative mt-6 w-full">
                <input placeholder=" " type="text" name="nama" id="nama" class="border-2 rounded-lg w-[80%] h-9 mx-auto block rounded-t-lg px-2.5 pb-2.5 pt-5 text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                <label for="nama" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-1.5 z-10 origin-[0] left-12 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">nama</label>
            </div>
            <div class="relative mt-4 w-full">
                <input placeholder=" " type="password" name="password" id="password" class="border-2 rounded-lg w-[80%] h-9 mx-auto block rounded-t-lg px-2.5 pb-2.5 pt-5 text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                <label for="password" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-1.5 z-10 origin-[0] left-12 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">password</label>
            </div>
            <button class="bg-gray-300 w-[80%] h-10 rounded-lg mt-4" type="submit" name="submit">SignUp</button>
        </form>
    </main>
    <script src="../../node_modules/flowbite/dist/flowbite.js"></script>

</body>

</html>