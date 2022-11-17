<?php

require '../func/functions.php';

$keyword  = $_GET["baju"];
$result = query("SELECT nama FROM daftar_baju WHERE nama LIKE '%$keyword%' LIMIT 0,5");

?>

<?php foreach($result as $row): ?>
    <li class="flex items-center p-1 gap-2 list-disc"><?= $row["nama"] ?></li>
<?php endforeach ?>