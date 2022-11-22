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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="nama" id="">
        <input type="password" name="password" id="">
        <input type="submit" name="submit" id="">
    </form>
    <!-- <form action="" method="POST">
        <input type="text" name="nama" id="">
        <input type="password" name="password" id="">
        <button>
            <input type="submit" name="reg" id="">
        </button>
    </form> -->
</body>

</html>