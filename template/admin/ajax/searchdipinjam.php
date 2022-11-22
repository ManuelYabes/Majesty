<?php

require '../func/functions.php';

date_default_timezone_set("Asia/jakarta");
$tanggal = date('Y-m-d');

$keyword  = $_GET["dipinjam"];
$result = query("SELECT * FROM pengguna CROSS JOIN peminjam ON peminjam.id_pengguna = pengguna.id WHERE peminjam.tanggal <= '$tanggal' AND peminjam.tanggal_ >= $tanggal AND peminjam.code LIKE '%$keyword%'");

?>

<?php foreach ($result as $row) : ?>
    <tr class="bg-[#A2DBFA] border-b text-">
        <th scope="row" class="py-4 px-6 font-light text-black whitespace-nowrap">
            <?= $row['nama_pengguna'] ?>
        </th>
        <td class="py-4 px-6"><?= $row['nama'] ?></td>
        <td class="py-4 px-6"><?= $row['email'] ?></td>
        <td class="py-4 px-6"><?= $row['no_telepon'] ?></td>
    </tr>
<?php endforeach ?>