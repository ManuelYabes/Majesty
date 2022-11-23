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

$baju = query("SELECT * FROM daftar_baju");

?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
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

  <body>
    <div class="flex">
      <div class="grid p-5 bg-[#8B5CF6] w-[91px] h-screen">
        <div class="absolute h-screen grid p-5 top-0 left-0">
          <div class="my-auto">
            <a href="daftaruser.php" class="block mb-8"><img src="../../static/foto/user.svg" alt="" /></a>
            <a href="daftarbaju.php" class="block mb-8"><img src="../../static/foto/clipboard-list.svg" alt="" /></a>
            <a href="daftarpeminjam.php" class="block mb-8"><img src="../../static/foto/masuk.svg" alt="" /></a>
            <a href="daftardipinjam.php" class="block"><img src="../../static/foto/keluar.svg" alt="" /></a>
          </div>
        </div>
        <a href="func/logout.php" class="mt-auto z-20 group" data-modal-toggle="popup-modal">
          <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="group-focus:stroke-black"
              d="M23.375 22L28.875 16.5M28.875 16.5L23.375 11M28.875 16.5L9.625 16.5M17.875 22V23.375C17.875 25.6532 16.0282 27.5 13.75 27.5H8.25C5.97183 27.5 4.125 25.6532 4.125 23.375V9.625C4.125 7.34683 5.97183 5.5 8.25 5.5H13.75C16.0282 5.5 17.875 7.34683 17.875 9.625V11"
              stroke="#E5E7EB" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </a>
      </div>
      <div class="mx-10 mt-9 w-full">
        <h1 class="text-[36px]">Daftar Pakaian</h1>

        <div class="flex mt-10">
          <form>
            <div class="flex">
              <div class="relative w-fit">
                <input type="search" id="searchB"
                  class="block p-2.5 w-[441px] z-20 text-sm text-black bg-white rounded-r-lg rounded-l-lg border border-black"
                  placeholder="Cari Barang" required />
                <button type="submit"
                  class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-white rounded-r-lg border border border-black hover:bg-black group">
                  <svg aria-hidden="true" class="w-5 h-5 group-hover:stroke-white" fill="none" stroke="black"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                  </svg>
                </button>
              </div>
            </div>
          </form>
          <a href="tambahbaju.php" class="ml-auto py-2 px-3 h-fit border border-green rounded-2xl">
            Tambah Pakaian
          </a>
        </div>

        <div class="h-[29.4rem] overflow-y-auto relative mt-5">
          <table class="w-full text-black text-xl">
            <thead class="text-black-700 text-center bg-[#39A2DB]">
              <tr>
                <th scope="col" class="py-3 px-6">Foto</th>
                <th scope="col" class="py-3 px-6">Nama Baju</th>
                <th scope="col" class="py-3 px-6">Stok</th>
                <th scope="col" class="py-3 px-6">Kategori</th>
                <th scope="col" class="py-3 px-6">Kondisi</th>
                <th scope="col" class="py-3 px-6">Harga</th>
                <th scope="col" class="py-3 px-6">Berat</th>
                <th scope="col" class="py-3 px-6">Aksi</th>
              </tr>
            </thead>
            <tbody class="text-center" id="Container">
              <?php foreach ($baju as $row): ?>
              <tr class="bg-[#A2DBFA] border-b text-">
                <td class="py-4 px-6">
                  <img src="../../media/img/<?= $row['foto'] ?>" alt="" />
                </td>
                <th scope="row" class="py-4 px-6 font-light text-black whitespace-nowrap">
                  <?= $row['nama'] ?> </th>
                <td class="py-4 px-6">
                  <?= $row['stok'] ?></td>
                <td class="py-4 px-6">
                  <?= $row['kategori'] ?></td>
                <td class="py-4 px-6">
                  <?= $row['kondisi'] ?></td>
                <td class="py-4 px-6">
                  <?= $row['harga'] ?></td>
                <td class="py-4 px-6">
                  <?= $row['berat'] ?></td>
                <td class="py-4 px-6">
                  <a href="editbaju.php?id_baju=<?= $row['id_baju'] ?>" class="my-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                  </a>
                  <a href="func/deletebaju.php?id_baju=<?= $row['id_baju'] ?>" class="my-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </a>
                </td>
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