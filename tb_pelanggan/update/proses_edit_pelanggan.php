<?php
include "../../koneksi.php";

$id_pelanggan = $_POST['id_pelanggan'];
$nama_lengkap = $_POST['nama_lengkap'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$usia = $_POST['usia'];
$bukti_foto_resep = $_FILES['bukti_foto_resep']['name'];

move_uploaded_file($_FILES['bukti_foto_resep']['tmp_name'], "../../images/".$_FILES['bukti_foto_resep']['name']);

$query = mysqli_query($koneksi, "UPDATE tb_pelanggan SET nama_lengkap='$nama_lengkap', alamat='$alamat',telp='$telp', usia='$usia', bukti_foto_resep='$bukti_foto_resep' WHERE id_pelanggan='$id_pelanggan'");

if(!$query){
    echo "Gagal Memasukkan Data Obat ".mysqli_error($koneksi);
} else{
    // header('Location:view_obat.php');
    // exit;
    echo "<script>location.href='../select/view_pelanggan.php';</script>"; //pindah ke halaman obat jika berhasil
} 