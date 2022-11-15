<?php 

require 'func/functions.php';

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

$id = $_GET['id'];
$item = query("SELECT * FROM daftar_baju WHERE id_baju = $id");
if(isset($_GET['error'])){
    $error = $_GET['error'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link rel="stylesheet" href="../../tailwind/output.css">
    <style>
        @font-face {
            font-family: 'Poppins', sans-serif;
            src: url(../../staic/Assets/Poppins-ExtraLight.ttf);
        }
        *{
            font-family: 'Poppins', sans-serif;
        }
    </style></head>
<body>

<?php include('nav.php'); ?>

    <?php if(isset($error)): ?>
        <?php if( $error === 'tru' ): ?>
            <span class="text-2xl text-red-400 underline">Peminjaman Gagal: </span>
            <span class="text-2xl text-red-400">PASTIKAN TANGGAL PENGEMBALIAN SETELAH TANGGAL PENGAMBILAN</span>
        <?php endif ?>
    <?php endif ?>
    <main class="w-full py-6 px-12">

        <div class="flex flex-col w-[100%]">
            <div class="flex flex-col md:flex-row w-[70%]">
                <img src="../../media/img/<?= $item[0]["foto"] ?>" alt="">
                <div class="flex flex-col md:pl-6 h-auto">
                    <span class="text-lg md:text-4xl font-normal h-[40%]"><?= $item[0]["nama"] ?></span>
                    <span class="text-lg md:text-2xl font-normal">Ukuran: </span>
                    <span class="text-lg md:text-2xl font-normal"><?= $item[0]["ukuran"] ?></span>
                    <span class="text-lg md:text-2xl font-normal">Stok:<?= $item[0]["stok"] ?></span>
                </div>
            </div>
            <br>
            <br>
            <div class="w-full md:w-[47%] flex flex-col gap-y-2">
                <span class="font-base text-lg md:text-xl pl-1">Harga: Rp.<?= $item[0]["harga"] ?>/ pcs</span>
                <span class="font-base text-lg md:text-xl pl-1">berat:<?= $item[0]["berat"] ?></span>
                <span class="font-base text-lg md:text-xl pl-1">kondisi:<?= $item[0]["kondisi"] ?></span>
                <span class="font-base text-lg md:text-xl pl-1">Kategori:<?= $item[0]["kategori"] ?></span>
                <br>
                <span class="font-base text-lg md:text-xl">Deskripsi:<?= $item[0]["deskripsi"] ?></span>
            </div>
        </div>
    
        
    </main>
    <br>
        
    <form action="checkout.php" method="POST">
        <input type="hidden" name="listUkuran" id="" value="<?= $item[0]['ukuran'] ?>">
        <input type="hidden" name="listBayar" id="" value="<?= $item[0]['pembayaran'] ?>">
        <input type="hidden" name="nama" id="" value="<?= $item[0]['nama'] ?>">
        <input type="hidden" name="id" id="idbaju" value="<?= $item[0]['id_baju'] ?>">
        <input type="hidden" name="iduser" id="iduser" value="<?= $_SESSION['userID'] ?>">
        <button class="fixed right-2 md:right-24 bottom-2 md:bottom-24 py-2 px-10 rounded-full bg-[#d7a86e]" type="submit" name="submit" id="">Pesan</button>
    </form>

    <button id="fav">FAV</button>
    <div id="container"></div>

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/script.js"></script>
    <script src="../../node_modules/flowbite/dist/flowbite.js"></script>

</body>
</html>