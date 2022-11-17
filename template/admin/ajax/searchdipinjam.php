<?php

require '../func/functions.php';

date_default_timezone_set("Asia/jakarta");
$tanggal = date('Y-m-d');

$keyword  = $_GET["dipinjam"];
$result = query("SELECT * FROM peminjam WHERE nama_pengguna LIKE '%$keyword%' AND tanggal <= '$tanggal' AND tanggal_ >= $tanggal LIMIT 0,5");

?>

<?php foreach($result as $row): ?>
    <li class="flex items-center p-1 gap-2 list-disc"><?= $row["nama_pengguna"] ?> <span><?= $row['nama'] ?></span></li>
<?php endforeach ?>