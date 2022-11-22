<?php

require '../func/functions.php';

$keyword  = $_GET["peminjam"];
$result = query("SELECT * FROM peminjam WHERE code LIKE '%$keyword%'");

?>

<?php foreach ($result as $row) : ?>
    <tr class="bg-[#A2DBFA] border-b text-">
        <th scope="row" class="py-4 px-6 font-normal text-black whitespace-nowrap">
            <?= $row['nama_pengguna'] ?>
        </th>
        <td class="py-4 px-6"><?= $row['nama'] ?></td>
        <td class="py-4 px-6"><?= $row['tanggal'] ?></td>
        <td class="py-4 px-6"><?= $row['tanggal_'] ?></td>
    </tr>
<?php endforeach ?>