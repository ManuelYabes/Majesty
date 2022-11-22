<?php

require '../func/functions.php';

$keyword  = $_GET["user"];
$result = query("SELECT * FROM pengguna WHERE nama LIKE '%$keyword%'");

?>

<?php foreach ($result as $row) : ?>
    <tr class="bg-[#A2DBFA] border-b text-">
        <th scope="row" class="py-4 px-6 font-light text-black whitespace-nowrap">
            <?= $row['nama'] ?>
        </th>
        <td class="py-4 px-6"><?= $row['email'] ?></td>
        <td class="py-4 px-6"><?= $row['no_telepon'] ?></td>
        <td class="py-4 px-6"><?= $row['jenis_kelamin'] ?></td>
    </tr>
<?php endforeach ?>