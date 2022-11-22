<?php

require 'func/functions.php';
session_start()

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
  <form action="" method="POST" enctype="multipart/form-data" class="w-screen h-screen">
    <div class="m-auto grid grid-cols-1 grid-flow-colum w-96">
      <input type="file" name="fotoBaju" id="" />
      <input type="text" name="namaBaju" id="" />
      <input type="text" name="ukuran" id="" />
      <input type="text" name="pembayaran" id="" />
      <input type="text" name="stok" id="" />
      <input type="text" name="berat" id="" />
      <select type="text" name="kondisi" id="">
        <option value="Masih Baru">Masih Baru</option>
        <option value="Sudah Dicuci">Sudah Dicuci</option>
       </select>
      <select type="text" name="kategori" id="">
        <option value="Pernikahan">pernikahan</option>
        <option value="Adat">Adat</option>
        <option value="Pesta">Pesta</option>
        <option value="Formal">Formal</option>
      </select>
      <input type="text" name="deskripsi" id="" />
    </div>
  </form>
</body>

</html>