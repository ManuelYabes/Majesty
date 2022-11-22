<?php
require 'func/functions.php';
session_start();

if (isset($_SESSION['id'])) {
  $idUser = $_SESSION['id'];
  $result = query("SELECT * FROM pengguna WHERE id=$idUser");
  if (hash('sha256', $result[0]['nama']) !== $_SESSION['uniqueID']) {
    header('Location: login.php');
  }
} else {
  header('Location: login.php');
}

date_default_timezone_set("Asia/jakarta");
$tanggal = date('Y-m-d');

$peminjam = query("SELECT * FROM pengguna CROSS JOIN peminjam ON peminjam.id_pengguna = pengguna.id WHERE peminjam.tanggal <= '$tanggal' AND peminjam.tanggal_ >= $tanggal");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
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

<body>
  <div class="flex">
    <div class="grid p-5 bg-[#8B5CF6] w-[91px] h-screen">
      <div class="absolute h-screen grid p-5 top-0 left-0">
        <div class="my-auto">
          <a href="daftaruser.php" class="block mb-8"><img src="../../static/foto/user.svg" alt="" /></a>
          <a href="daftarbaju.php" class="block mb-8"><img src="../../static/foto/list.svg" alt="" /></a>
          <a href="daftarpeminjam.php" class="block mb-8"><img src="../../static/foto/masuk.svg" alt="" /></a>
          <a href="daftardipinjam.php" class="block"><img src="../../static/foto/keluarhitam.svg" alt="" /></a>
        </div>
      </div>
    </div>
    <div class="m-10 w-full">
      <h1 class="text-[36px]">Pakaian Keluar</h1>

      <div class="flex mt-10">
        <form>
          <div class="flex">
            <div class="relative w-fit">
              <input type="search" id="searchD" class="block p-2.5 w-[441px] z-20 text-sm text-black bg-white rounded-r-lg rounded-l-lg border border-black" placeholder="Cari User" autocomplete="off" required />
              <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-white rounded-r-lg border border border-black hover:bg-black group">
                <svg aria-hidden="true" class="w-5 h-5 group-hover:stroke-white" fill="none" stroke="black" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
              </button>
            </div>
          </div>
        </form>
      </div>

      <div class="h-[29.4rem] overflow-y-auto relative mt-5">
        <table class="w-full text-black text-xl">
          <thead class="text-black-700 text-center bg-[#39A2DB]">
            <tr>
              <th scope="col" class="py-3 px-6">Username</th>
              <th scope="col" class="py-3 px-6">Nama Baju</th>
              <th scope="col" class="py-3 px-6">Email</th>
              <th scope="col" class="py-3 px-6">No telepon</th>
            </tr>
          </thead>
          <tbody class="text-center" id="Container">
            <?php foreach($peminjam as $row): ?>
              <tr class="bg-[#A2DBFA] border-b text-">
                <th scope="row" class="py-4 px-6 font-light text-black whitespace-nowrap">
                  <?= $row['nama_pengguna'] ?>
                </th>
                <td class="py-4 px-6"><?= $row['nama'] ?></td>
                <td class="py-4 px-6"><?= $row['email'] ?></td>
                <td class="py-4 px-6"><?= $row['no_telepon'] ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="js/jquery-3.6.1.min.js"></script>
  <script src="js/script.js"></script>
  <script src="../../node_modules/flowbite/dist/flowbite.js"></script>
</body>

</html>