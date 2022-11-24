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
	header("Location: list.php");
	exit();
}

date_default_timezone_set("Asia/jakarta");

$listUkuran = explode(',',$_POST['listUkuran']);
$listBayar = explode(',',$_POST['listBayar']);

$nama = $_POST['nama'];
$id = $_POST['id'];
$idUser = $_POST["iduser"];
$tanggal = date('Y-m-d');
$stok = $_POST['stokBaju'];

$info = query("SELECT * FROM daftar_baju WHERE id_baju=$id");

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

<?php include('nav.php'); ?>

<main class="w-full flex flex-col px-12 xl:px-32 py-12">

    <span class="text-4xl">Checkout</span>

    <div class="w-auto h-auto mt-12 flex flex-col sm:flex-row gap-5">
        <div class="w-fit h-auto"><img class="h-full" src="../../media/img/<?= $info[0]['foto'] ?>"></div>
        <div class="w-full h-auto flex flex-col gap-y-2">
            <span class="font-base text-2xl md:text-3xl pl-1"><?= $info[0]["nama"] ?></span>
            <span class="font-base text-lg md:text-xl pl-1">Harga: Rp.<?= $info[0]["harga"] ?>/ Hari</span>
            <span class="font-base text-lg md:text-xl pl-1">berat:<?= $info[0]["berat"] ?></span>
            <span class="font-base text-lg md:text-xl pl-1">kondisi:<?= $info[0]["kondisi"] ?></span>
            <span class="font-base text-lg md:text-xl pl-1">Kategori:<?= $info[0]["kategori"] ?></span>
        </div>
    </div>


    <form action="func/checkout.php" method="POST" class="mt-10 flex flex-col w-full md:w-5/12 gap-y-10">
        <div class="flex flex-col">
            <span>Pilih Ukuran</span>
            <select class="rounded-full" name="ukuran" id="" required>
                <?php foreach($listUkuran as $row): ?>
                    <option value="<?= $row ?>"><?= $row ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="flex flex-col">
        <span>Pilih Metode Pembayaran</span>
            <select class="rounded-full" name="pembayaran" id="" required>
                <?php foreach($listBayar as $row): ?>
                    <option value="<?= $row ?>"><?= $row ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="flex flex-col">
            <span>Tentukan Tanggal Pengambilan Dan Pengembalian</span>
            <div class="flex items-center mt-2"> 
                <input class="rounded-full" type="date" name="tanggal" id="tanggal1" value="<?= $tanggal ?>" min="<?= $tanggal ?>" required>
                <span class="mx-4"> - </span>
                <input class="rounded-full" type="date" name="tanggal2" id="tanggal2" value="<?= $tanggal ?>" min="<?= $tanggal ?>" required>
            </div>
            <input type="hidden" name="harga" id="harga" value="<?= $info[0]['harga'] ?>">
            <input type="hidden" name="nama" value="<?= $nama ?>">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="iduser" value="<?= $idUser ?>">
            <input type="hidden" name="stokBaju" value="<?= $stok ?>">
            <button class="fixed right-2 md:right-24 bottom-2 md:bottom-24 py-2 px-10 rounded-full bg-[#d7a86e]" type="submit" name="submit-checkout" id="submit">Checkout</button>
            <div class="w-auto mt-6 font-thin text-xl bg-gray-100 rounded-md py-1 px-2">Total Harga :<span id="total_harga"></span></div>
        </div>
    </form>

</main>

    <script src="../../node_modules/flowbite/dist/flowbite.js"></script>
    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>