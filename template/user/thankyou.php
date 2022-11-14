<?php

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "majesty";

// // Create connectio
// $conn = mysqli_connect($servername, $username, $password);

// // Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }
// $sql = "INSERT INTO peminjam (id_baju,nama,ukuran,pembayaran,tanggal) VALUES (12,'a','b','c','d');";

// $result = mysqli_query($conn,$sql);
// // if (mysqli_query($conn, $sql)) {
// //   echo "New record created successfully";
// // } else {
// //   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// // }

// mysqli_close($conn);

require "func/functions.php";
session_start();

$pernikahaan = query("SELECT * FROM daftar_baju WHERE kategori = 'Pernikahan'");
$formal = query("SELECT * FROM daftar_baju WHERE kategori = 'Formal'");

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
	header("Location: list.php");
	exit();
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
    <h1>thankyou</h1>
    <a href="list.php">kembali ke daftar baju</a>
    <a href="profil.php">ke profil</a>
</body>
</html>