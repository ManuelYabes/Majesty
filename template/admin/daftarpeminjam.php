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



$peminjam = query("SELECT * FROM peminjam");

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
          <a href="daftarpeminjam.php" class="block mb-8"><img src="../../static/foto/masukhitam.svg" alt="" /></a>
          <a href="daftardipinjam.php" class="block"><img src="../../static/foto/keluar.svg" alt="" /></a>
        </div>
      </div>
      <button class="mt-auto z-20 group" data-modal-toggle="popup-modal">
        <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path class="group-focus:stroke-black" d="M23.375 22L28.875 16.5M28.875 16.5L23.375 11M28.875 16.5L9.625 16.5M17.875 22V23.375C17.875 25.6532 16.0282 27.5 13.75 27.5H8.25C5.97183 27.5 4.125 25.6532 4.125 23.375V9.625C4.125 7.34683 5.97183 5.5 8.25 5.5H13.75C16.0282 5.5 17.875 7.34683 17.875 9.625V11" stroke="#E5E7EB" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </button>
    </div>
    <div class="m-10 w-full">
      <h1 class="text-[36px]">Permintaan Masuk</h1>

      <div class="flex mt-10">
        <form>
          <div class="flex">
            <div class="relative w-fit">
              <input type="search" id="searchP" class="block p-2.5 w-[441px] z-20 text-sm text-black bg-white rounded-r-lg rounded-l-lg border border-black" placeholder="Cari User" required />
            </div>
          </div>
        </form>
      </div>

      <div class="h-[29.4rem] overflow-y-auto relative mt-5">
        <table class="w-full text-black text-xl">
          <thead class="text-black-700 text-center bg-[#39A2DB]">
            <tr>
              <th scope="col" class="py-3 px-6">Username</th>
              <th scope="col" class="py-3 px-6">Barang</th>
              <th scope="col" class="py-3 px-6">Tanggal Pinjam</th>
              <th scope="col" class="py-3 px-6">Tanggal kembali</th>
              <th scope="col" class="py-3 px-6">Total Harga</th>
            </tr>
          </thead>
          <tbody class="text-center" id="Container">
            <?php foreach ($peminjam as $row) : ?>
              <tr class="bg-[#A2DBFA] border-b text-">
                <th scope="row" class="py-4 px-6 font-normal text-black whitespace-nowrap">
                  <?= $row['nama_pengguna'] ?>
                </th>
                <td class="py-4 px-6"><?= $row['nama'] ?></td>
                <td class="py-4 px-6"><?= $row['tanggal'] ?></td>
                <td class="py-4 px-6"><?= $row['tanggal_'] ?></td>
                <td class="py-4 px-6"><?= $row['total_harga'] ?></td>
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