<?php

include "../../koneksi.php"; //seolah-olah semua code di koneksi.php bisa kita gunakan

// die('test');

// $id_obat = $_POST['id_obat'];
$nama_lengkap = $_POST['nama_lengkap'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$usia = $_POST['usia'];
$bukti_foto_resep = $_FILES['bukti_foto_resep']['name'];

// var_dump($bukti_foto_resep);

move_uploaded_file($_FILES['bukti_foto_resep']['tmp_name'], "../../images/".$_FILES['bukti_foto_resep']['name']);

$query = mysqli_query($koneksi, "INSERT INTO tb_pelanggan VALUES (NULL,'$nama_lengkap','$alamat','$telp','$usia','$bukti_foto_resep')");


if(!$query){
    echo "Gagal Memasukkan Data Obat ".mysqli_error($koneksi);
}else{
    header('Location:../select/view_obat.php');
    exit;

    echo "<script>location.href='../select/view_obat.php';</script>"; //pindah ke halaman obat jika berhasil
}

echo "berhasil";