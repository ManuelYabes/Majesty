<?php

require 'functions.php';

$id = $_POST['id'];
if (isset($_POST['submit-checkout'])) {
    $idnext = pinjam($_POST);
    if ($idnext !== false) {
        echo "<script>   
        document.location.href = '../thankyou.php?idnext=$idnext';
    </script>";
    } else {
        echo "<script>   
        document.location.href = '../detail.php?id=$id&error=tru';
    </script>";
    }
}

?>