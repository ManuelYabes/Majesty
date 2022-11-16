<?php

require '../func/functions.php';

$keyword  = $_GET["baju"];
$result = query("SELECT nama,id_baju,foto FROM daftar_baju WHERE nama LIKE '%$keyword%' LIMIT 0,5");

?>

<?php foreach($result as $row): ?>
    <li class="flex items-center p-1 gap-2"><img class="w-8" src="../../media/img/<?= $row['foto'] ?>" alt=""><a class="text-base font-medium" href="detail.php?id=<?= $row["id_baju"] ?>"><?= $row["nama"] ?></a></li>
<?php endforeach ?>