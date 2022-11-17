<?php

$conn = mysqli_connect('localhost','root','','majesty');
// session_start();

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
    $namaUser = $_SESSION['user'];
    $code = randomSTR(6);

    mysqli_query($conn,"INSERT INTO peminjam VALUES('',$id,$idUser,'$nama','$namaUser','$ukuran','$pembayaran','$tanggal','$tanggal2','$code')");
    $idnext = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id FROM peminjam WHERE code = '$code'"));
    return $idnext['id'];
}

function ubah($data){
    global $conn;
    $id = $data['id_pengguna'];
    $nama = $data['nama'];
    $lahir = $data['lahir'];
    $gender = $data['gender'];
    $email = $data['email'];
    $phone = $data['phone'];
    
    $result = query("SELECT * FROM pengguna WHERE email = '$email' AND id != $id");
    if(!empty($result)){
        return false;
    }
    mysqli_query($conn,"UPDATE pengguna SET 
                    nama = '$nama',
                    email = '$email',
                    tanggal_lahir = '$lahir',
                    jenis_kelamin = '$gender',
                    no_telepon = $phone
                WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function uploadPP($data){
    global $conn;
    $foto = upload();
    if(!$foto){
        return false;
    }
    $id = $data['id_pengguna'];
    mysqli_query($conn,"UPDATE pengguna SET foto = '$foto' WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function upload(){
	$namaFile = $_FILES['pp']['name'];
	$ukuranFile = $_FILES['pp']['size'];
	$error = $_FILES['pp']['error'];
	$tmpName = $_FILES['pp']['tmp_name'];

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
