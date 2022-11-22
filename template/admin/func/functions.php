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

function tambahBaju($data){
    global $conn;
    $foto = upload();
    if(!$foto){
        return false;
    }
    $namaBaju = $data['namaBaju'];
    $kategori = $data['kategori'];
    $deskripsi = $data['deskripsi'];
    $harga = $data['harga'];
    $pembayaran = $data['pembayaran'];
    $ukuran = $data['ukuran'];
    $stok = $data['stok'];
    $kondisi = $data['kondisi'];
    $berat = $data['berat'];

    $insert = "INSERT INTO daftar_baju VALUES('','$foto','$namaBaju','$ukuran','$pembayaran','$stok','$harga','$berat','$kondisi','$kategori','$deskripsi')";
    mysqli_query($conn,$insert);
    return mysqli_affected_rows($conn);
    
}

function upload(){
	$namaFile = $_FILES['fotoBaju']['name'];
	$ukuranFile = $_FILES['fotoBaju']['size'];
	$error = $_FILES['fotoBaju']['error'];
	$tmpName = $_FILES['fotoBaju']['tmp_name'];

	if ($error === 4){
		echo "<script>
        alert('pilih gambar dulu mbak / mas');
        document.location.href = 'tambahbuku.php';
        </script>";
		return false;
	}

	$ekstensiGambarValid = ["jpg","png","jpeg"];
	$ekstensiGambar = explode(".",$namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if( !in_array($ekstensiGambar,$ekstensiGambarValid) ){
		echo "<script>
			alert('hayo upload apa???');
		</script>";
		return false;
	}

	if($ukuranFile > 10000000){
		echo "<script>
			alert('kegedean mas / mbak');
		</script>";
		return false;
	}
	
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName,"../../media/img/" . $namaFileBaru);

	return $namaFileBaru;

}
?>
