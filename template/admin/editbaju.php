<?php

require 'func/functions.php';
session_start();

if (isset($_POST['submit'])) {
    if (ubahBaju($_POST) > 0) {
        echo " <script>
        alert('suksess');
        document.location.href = 'daftarbaju.php';
      </script>";
    } else {
        echo "<script>
        alert('gagal');
        document.location.href = 'daftarbaju.php';
      </script>";
    }
}

$id = $_GET['id_baju'];
$baju = query("SELECT * FROM daftar_baju WHERE id_baju = $id");

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
        <form class="p-6 text-center" action="" method="POST" enctype="multipart/form-data">
            <h1 class="font-bold text-2xl">Edit Pakaian</h1>
            <div class="relative z-0 mb-6 mt-6 w-full group">
                <input type="hidden" name="fotoBajuLama" value="<?= $baju[0]['foto'] ?>">
                <input type="hidden" name="id_baju" value="<?= $baju[0]['id_baju'] ?>">
                <input type="file" name="fotoBaju" id="fotoBaju"
                    class="block w-full text-sm text-gray-900 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" "/>
            </div>
            <div class="text-start grid grid-cols-2 gap-4">
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" name="namaBaju" id="floating_namaBaju"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparents border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="<?= $baju[0]['nama'] ?>" />
                    <label for="floating_namaBaju"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                        Baju</label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <select name="kategori" id="kategori" value="<?= $baju[0]['kategori'] ?>"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option value="Pernikahan">Pernikahan</option>
                        <option value="Adat">Adat</option>
                        <option value="Pasta">Pasta</option>
                        <option value="Formal">Formal</option>
                    </select>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" name="deskripsi" id="floating_deskripsi"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparents border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="<?= $baju[0]['deskripsi'] ?>" />
                    <label for="floating_deskripsi"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Deskripsi</label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" name="harga" id="floating_harga"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparents border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="<?= $baju[0]['harga'] ?>" />
                    <label for="floating_harga"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Harga</label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" name="pembayaran" id="floating_pembayaran"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparents border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="<?= $baju[0]['pembayaran'] ?>" />
                    <label for="floating_pembayaran"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Pembayaran</label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" name="ukuran" id="floating_ukuran"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparents border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="<?= $baju[0]['ukuran'] ?>" />
                    <label for="floating_ukuran"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ukuran</label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="number" name="stok" id="floating_stok"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparents border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="<?= $baju[0]['stok'] ?>" />
                    <label for="floating_stok"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Stok</label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <select name="kondisi" id="kondisi" value="<?= $baju[0]['kondisi'] ?>"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option value="Baru Belum Pernah Dicuci">
                            Baru Belum Pernah Dicuci
                        </option>
                        <option value="Sudah Dicuci">Sudah Dicuci</option>
                    </select>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="number" name="berat" id="floating_berat"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparents border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="<?= $baju[0]['berat'] ?>" />
                    <label for="floating_berat"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Berat</label>
                </div>
                <div class="flex">
                    <button type="submit" name="submit"
                        class="w-[90%] h-[50%] mx-4 my-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </body>

</html>