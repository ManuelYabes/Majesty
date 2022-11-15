<?php

$conn = mysqli_connect('localhost','root','','majesty');

function query($query)
{
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function randomSTR($lenght)
{
	$str = uniqid();
	return substr(str_shuffle($str), 0, $lenght);
}
function pinjam($data){
    global $conn;
    $ukuran = $data["ukuran"];
    $pembayaran = $data["pembayaran"];
    $tanggal = $data["tanggal"];
    $tanggal2 = $data["tanggal2"];
        if($tanggal > $tanggal2 ){
            return false;
        }
    $nama = $data["nama"];
    $id = intval($data["id"]);
    $idUser = intval($data['iduser']);
    $code = randomSTR(6);

    mysqli_query($conn,"INSERT INTO peminjam VALUES('',$id,$idUser,'$nama','$ukuran','$pembayaran','$tanggal','$tanggal2','$code')");
    $idnext = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id FROM peminjam WHERE code = '$code'"));
    return $idnext['id'];
}

?>
