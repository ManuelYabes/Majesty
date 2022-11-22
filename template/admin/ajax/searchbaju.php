<?php

require '../func/functions.php';

$keyword  = $_GET["baju"];
$result = query("SELECT * FROM daftar_baju WHERE nama LIKE '%$keyword%'");

?>

<?php foreach ($result as $row) : ?>
    <tr class="bg-[#A2DBFA] border-b text-">
        <th scope="row" class="py-4 px-6 font-light text-black whitespace-nowrap">
            <?= $row['nama'] ?>
        </th>
        <td class="py-4 px-6"><?= $row['stok'] ?></td>
        <td class="py-4 px-6"><?= $row['kategori'] ?></td>
        <td class="py-4 px-6"><?= $row['kondisi'] ?></td>
        <td class="py-4 px-6"><?= $row['harga'] ?></td>
        <td class="py-4 px-6"><?= $row['berat'] ?></td>
        <td class="py-4 px-6">
            <button type="button" data-modal-toggle="popup-hapus">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 11L11 1M1 1L11 11" stroke="#EF4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </td>
    </tr>
<?php endforeach ?>