<?php
require 'func/functions.php';
session_start();

if(isset($_SESSION["id"]) && isset($_SESSION["uniqueID"])){
    header("Location: daftaruser.php");
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $result = query("SELECT * FROM pengguna WHERE nama = '$nama'");
    if (!empty($result)) {
        if (password_verify($password, $result[0]['password'])) {
            $_SESSION['id'] = $result[0]['id'];
            $_SESSION['uniqueID'] = hash('sha256', $result[0]['nama']);
            header('Location: daftaruser.php');
        }
    } else {
        $error = true;
    }
}
if (isset($_POST['reg'])) {
    global $conn;
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO pengguna (nama,password) VALUES('$nama','$password')");
}


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Majesty</title>
    <link rel="stylesheet" href="../../tailwind/output.css" />
    <style>
      @font-face {
        font-family: "Poppins", sans-serif;
        src: url(../../staic/Assets/Poppins-ExtraLight.ttf);
      }
      * {
        font-family: "Poppins", sans-serif;
      }
    </style>
  </head>
  <body style="background-color: #8b5cf6">
    <div class="grid grid-cols-2 gap-2 h-screen">
      <div class="w-full grid">
        <img src="../../static/foto/foto.svg" style="width: 400px" class="m-auto" alt="" />
      </div>
      <div class="p-5 bg-white m-auto w-[400px]">
        <div class="grid text-center justify-center">
          <h1 class="text-xl">Login Admin</h1>
          <img src="../../static/foto/teks.svg" class="w-[150px]" alt="" />
        </div>
        <form action="" method="POST" class="mt-8">
          <label for="username" class="font-bold text-xl">Username</label>
          <input
            type="text"
            name="nama"
            id="username"
            class="w-full border border-black rounded-2xl h-[40px] mb- px-2"
          />
          <label for="password" class="font-bold text-xl">Password</label>
          <input
            type="password"
            name="password"
            id="password"
            class="w-full border border-black rounded-2xl h-[40px] px-2"
          />
          <button
            type="submit" name="submit"
            class="w-full border border-black hover:bg-black hover:text-white rounded-2xl font-bold text-2xl py-1 mt-20 mb-10"
          >
            Login
          </button>
        </form>
      </div>
    </div>
    <script src="../../node_modules/flowbite/dist/flowbite.js"></script>
  </body>
</html>
