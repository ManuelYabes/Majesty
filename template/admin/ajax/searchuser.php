<?php

require '../func/functions.php';

$keyword  = $_GET["user"];
$result = query("SELECT * FROM pengguna WHERE nama LIKE '%$keyword%' LIMIT 0,5");

?>

<?php foreach($result as $row): ?>
    <li class="flex items-center p-1 gap-2"><?= $row["nama"] ?></li>
<?php endforeach ?>