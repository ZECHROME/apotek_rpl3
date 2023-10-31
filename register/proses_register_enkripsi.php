<?php
include "../koneksi.php";

$id_karyawan = $_POST['id_karyawan'];
$username_rgst = $_POST['username'];
$password_rgst = $_POST['password'];

$pass_hash = password_hash($password_rgst, PASSWORD_DEFAULT); //enkripsi password


$level = $_POST['leveluser'];

$query_username = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_login WHERE username='$username_rgst'");
$cek_username = mysqli_fetch_row($query_username);

if($cek_username['0'] != 0){
    echo "<script>alert('Username sudah ada, silahkan menggunakan username yang lain');window.location.href='register.php'</script>";
}else{
    $query = "INSERT INTO tb_login VALUES('$username_rgst', '$pass_hash', '$level', '$id_karyawan')";
    $hasil = mysqli_query($koneksi, $query);
    
    if(!$hasil){
        echo "Gagal Register : ". mysqli_error($koneksi);
    }else{
        header('Location:../login.php');  
        exit;
    } 
}

?>