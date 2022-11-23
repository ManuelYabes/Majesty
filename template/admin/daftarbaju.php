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

if (isset($_POST['submit'])) {
  if (tambahBaju($_POST) > 0) {
    echo "<script>   
        alert('suksess')
        document.location.href = 'daftarbaju.php';
    </script>";
  } else {
    echo "<script>   
        alert('gagal')
        document.location.href = 'daftarbaju.php';
    </script>";
  }
}

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
          <a href="daftarbaju.php" class="block mb-8"><img src="../../static/foto/clipboard-list.svg" alt="" /></a>
          <a href="daftarpeminjam.php" class="block mb-8"><img src="../../static/foto/masuk.svg" alt="" /></a>
          <a href="daftardipinjam.php" class="block"><img src="../../static/foto/keluar.svg" alt="" /></a>
        </div>
      </div>
      <button class="mt-auto z-20 group" data-modal-toggle="popup-modal">
        <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path class="group-focus:stroke-black" d="M23.375 22L28.875 16.5M28.875 16.5L23.375 11M28.875 16.5L9.625 16.5M17.875 22V23.375C17.875 25.6532 16.0282 27.5 13.75 27.5H8.25C5.97183 27.5 4.125 25.6532 4.125 23.375V9.625C4.125 7.34683 5.97183 5.5 8.25 5.5H13.75C16.0282 5.5 17.875 7.34683 17.875 9.625V11" stroke="#E5E7EB" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </button>
    </div>
    <div class="mx-10 mt-9 w-full">
      <h1 class="text-[36px]">Daftar Pakaian</h1>

      <div class="flex mt-10">
        <form>
          <div class="flex">
            <div class="relative w-fit">
              <input type="search" id="searchB" class="block p-2.5 w-[441px] z-20 text-sm text-black bg-white rounded-r-lg rounded-l-lg border border-black" placeholder="Cari Barang" required />
              <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-white rounded-r-lg border border border-black hover:bg-black group">
                <svg aria-hidden="true" class="w-5 h-5 group-hover:stroke-white" fill="none" stroke="black" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
              </button>
            </div>
          </div>
        </form>
        <button class="ml-auto py-2 px-3 h-fit border border-green rounded-2xl" type="button" data-modal-toggle="popup-tambah">
          Tambah Pakaian
        </button>
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
            <?php foreach ($baju as $row) : ?>
              <tr class="bg-[#A2DBFA] border-b text-">
                <td class="py-4 px-6"><img src="../../media/img/<?= $row['foto'] ?>" alt=""></td>
                <th scope="row" class="py-4 px-6 font-light text-black whitespace-nowrap">
                  <?= $row['nama'] ?>
                </th>
                <td class="py-4 px-6"><?= $row['stok'] ?></td>
                <td class="py-4 px-6"><?= $row['kategori'] ?></td>
                <td class="py-4 px-6"><?= $row['kondisi'] ?></td>
                <td class="py-4 px-6"><?= $row['harga'] ?></td>
                <td class="py-4 px-6"><?= $row['berat'] ?></td>
                <td class="py-4 px-6">
                  <button type="button" data-modal-toggle="popup-hapus" class="my-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                  </button>
                  <button type="button" data-modal-toggle="popup-hapus" class="my-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>

        <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 md:inset-0 h-modal md:h-full">
          <div class="relative w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
              </button>
              <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                  Apakah anda ingin logout?
                </h3>
                <a href="login.html" data-modal-toggle="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                  Logout
                </a>
                <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                  Batal
                </button>
              </div>
            </div>
          </div>
        </div>

        <div id="popup-hapus" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 md:inset-0 h-modal md:h-full">
          <div class="relative w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparents hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-hapus">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
              </button>
              <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                  Are you sure you want to delete this product?
                </h3>
                <button data-modal-toggle="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                  Yes, I'm sure
                </button>
                <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                  No, cancel
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="popup-tambah" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 md:inset-0 h-modal md:h-full">
    <div class="relative w-full max-w-md h-full md:h-auto">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparents hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-tambah">
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
        <form class="p-6 text-center" action="" method="POST" enctype="multipart/form-data">
          <h1 class="font-bold text-2xl">Tambah Pakaian</h1>
          <div class="relative z-0 mb-6 mt-6 w-full group">
            <input type="file" name="fotoBaju" id="fotoBaju" class="block w-full text-sm text-gray-900 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          </div>
          <div class="text-start grid grid-cols-2 gap-4">

            <div class="relative z-0 mb-6 w-full group">
              <input type="text" name="namaBaju" id="floating_namaBaju" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparents border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_namaBaju" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Baju</label>
            </div>
            <div class="relative z-0 mb-6 w-full group">
              <select name="kategori" id="kategori" class="block py-2.5 px-0 w-full text-sm text-gray-900 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                <option value="Pernikahan">Pernikahan</option>
                <option value="Adat">Adat</option>
                <option value="Pasta">Pasta</option>
                <option value="Formal">Formal</option>
              </select>
            </div>
            <div class="relative z-0 mb-6 w-full group">
              <input type="text" name="deskripsi" id="floating_deskripsi" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparents border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_deskripsi" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Deskripsi</label>
            </div>
            <div class="relative z-0 mb-6 w-full group">
              <input type="text" name="harga" id="floating_harga" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparents border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_harga" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Harga</label>
            </div>
            <div class="relative z-0 mb-6 w-full group">
              <input type="text" name="pembayaran" id="floating_pembayaran" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparents border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_pembayaran" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Pembayaran</label>
            </div>
            <div class="relative z-0 mb-6 w-full group">
              <input type="text" name="ukuran" id="floating_ukuran" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparents border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_ukuran" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ukuran</label>
            </div>
            <div class="relative z-0 mb-6 w-full group">
              <input type="number" name="stok" id="floating_stok" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparents border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_stok" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Stok</label>
            </div>
            <div class="relative z-0 mb-6 w-full group">
              <select name="kondisi" id="kondisi" class="block py-2.5 px-0 w-full text-sm text-gray-900 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                <option value="Baru Belum Pernah Dicuci">Baru Belum Pernah Dicuci</option>
                <option value="Sudah Dicuci">Sudah Dicuci</option>
              </select>
            </div>
            <div class="relative z-0 mb-6 w-full group">
              <input type="number" name="berat" id="floating_berat" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparents border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_berat" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Berat</label>
            </div>
            <div class="flex">
              <button type="submit" name="submit" class="w-[90%] h-[50%] mx-4 my-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="js/jquery-3.6.1.min.js"></script>
  <script src="js/script.js"></script>
  <script src="../../node_modules/flowbite/dist/flowbite.js"></script>

</body>

</html>