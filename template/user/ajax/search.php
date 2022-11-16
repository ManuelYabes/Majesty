<?php

require '../func/functions.php';

$keyword  = $_GET["baju"];
$result = query("SELECT nama,id_baju FROM daftar_baju WHERE nama LIKE '%$keyword%' LIMIT 0,5");

?>

<?php foreach($result as $row): ?>
    <li><a href="detail.php?id=<?= $row["id_baju"] ?>"><?= $row["nama"] ?></a></li>
<?php endforeach ?>