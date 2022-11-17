<?php

require '../func/functions.php';

$keyword  = $_GET["peminjam"];
$result = query("SELECT * FROM peminjam WHERE nama_pengguna LIKE '%$keyword%' LIMIT 0,5");

?>

<?php foreach($result as $row): ?>
    <li class="flex items-center p-1 gap-2 list-disc"><?= $row["nama_pengguna"] ?> <span><?= $row['nama'] ?></span></li>
<?php endforeach ?>