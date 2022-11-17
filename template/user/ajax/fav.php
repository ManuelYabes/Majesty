<?php 

require '../func/functions.php';

$iduser = intval($_GET['iduser']);
$idbaju = intval($_GET['idbaju']);

$check = query("SELECT * FROM favorit WHERE id_pengguna = $iduser AND id_baju = $idbaju");

if(empty($check)){
    mysqli_query($conn,"INSERT INTO favorit VALUES('',$iduser,$idbaju)");
} else {
    mysqli_query($conn,"DELETE FROM favorit WHERE id_pengguna = $iduser AND id_baju = $idbaju");
}
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

?>