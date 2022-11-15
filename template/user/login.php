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

if (isset($_SESSION['user']) && isset($_SESSION['userID'])) {
	header("Location: list.php");
	exit();
}

function login($data){
    global $conn;
    $email = $data['email'];
    $password = $data['password'];

    $check = mysqli_query($conn, "SELECT * FROM pengguna WHERE email = '$email'");
    if(mysqli_num_rows($check)===1){
        $row = mysqli_fetch_assoc($check);
        if($password === $row["password"]){
            $_SESSION['user'] = $row["nama"];
            $_SESSION['userID'] = $row["id"];

            if (isset($_POST["rememberme"])) {
            setcookie('key', hash('sha256', $row['email']), time() + 60 * 60 * 24, '/');
            setcookie('id', $row['id'],time() + 60 * 60 * 24, '/');
            }
            header('Location: list.php');
        } else{
            global $noPassword;
            $noPassword = true;
        }

    } else{
        global $noUser;
        $noUser = true;
    }
}

if(isset($_POST["submit"])){
    login($_POST);
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
            font-family: 'Poppins', sans-serif;
            src: url(../../staic/Assets/Poppins-ExtraLight.ttf);
        }
        *{
            font-family: 'Poppins', sans-serif;
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
    <?php if(isset($noPassword)): ?>
        <p>password salah</p>
    <?php endif ?>
    <?php if(isset($noUser)): ?>
        <p>tidak ada user</p>
    <?php endif ?>

    <main class="w-[100%] h-screen flex justify-evenly items-center">
        <img class="my-auto w-[40%]" src="../../static/Foto/undraw_secure_login_pdn4 1.png" alt="">
        <form action="" method="POST" class="flex flex-col items-center  w-[30%] h-[60%] bg-white drop-shadow-xl rounded-xl">
            <span class="mt-8">Login</span>
            <span>Belum Punya AKun?<a href="sign.php" class="underline">SignUp</a></span>

            <div class="relative mt-6 w-full">
                <input placeholder=" " type="email" name="email" id="email" class="border-2 rounded-lg w-[80%] h-9 mx-auto block rounded-t-lg px-2.5 pb-2.5 pt-5 text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                <label for="email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-1.5 z-10 origin-[0] left-12 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">email</label>
            </div>
            <div class="relative mt-4 w-full">
                <input placeholder=" " type="password" name="password" id="password" class="border-2 rounded-lg w-[80%] h-9 mx-auto block rounded-t-lg px-2.5 pb-2.5 pt-5 text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                <label for="password" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-1.5 z-10 origin-[0] left-12 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">password</label>
            </div>
            <div class="mt-2.5 flex flex-row w-full">
                <label class="ml-12" for="rememberme">rememberme</label>
                <input class="ml-1" type="checkbox" name="rememberme" id="rememberme">
            </div>
            <button class="bg-gray-300 w-[80%] h-10 rounded-lg mt-4" type="submit" name="submit" >LogIn</button>
        </form>
    </main>
<script src="../../node_modules/flowbite/dist/flowbite.js"></script>

</body>
</html>