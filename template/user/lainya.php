<?php 
require 'func/functions.php';

$kategori = $_GET["kategori"];
$daftar = query("SELECT * FROM daftar_baju WHERE kategori = '$kategori' ORDER BY id_baju ASC");

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

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>title</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    
<?php include('nav.php'); ?>

    <main class="bg-white w-full h-auto py-12 flex flex-col items-center">
        <div class="w-[90%] mb-6 flex flex-col items-start">
        <span class="text-3xl font-thin text-[#8E3200] underline"><a href="list.php">Kembali</a></span>
            <div class="w-full mt-6 grid grid-cols-3 md:grid-cols-6 grid-flow-rows gap-2.5 xl:gap-16">
                <?php foreach( $daftar as $row ): ?>
                    <a class="w-auto h-auto bg-[#FFFFF] flex justify-center items-center" href="detail.php?id=<?= $row['id_baju'] ?>"><img class="w-fit" src="../../media/img/<?= $row['foto'] ?>" alt="me"></a>
                <?php endforeach;?>
            </div>
        </div>
    </main>
<script src="../../node_modules/flowbite/dist/flowbite.js"></script>
</body>
</html>