<?php

require_once "../../koneksi.php"; //seolah-olah semua code di koneksi.php bisa kita gunakan

// die('test');

// $id_obat = $_POST['id_obat'];
$id_supplier = $_POST['id_supplier'];
$nama_obat = $_POST['nama_obat'];
$kategori_obat = $_POST['kategori_obat'];
$harga_jual = $_POST['harga_jual'];
$harga_beli = $_POST['harga_beli'];
$stok_obat = $_POST['stok_obat'];
$keterangan = $_POST['keterangan'];

$query = mysqli_query($koneksi, "INSERT INTO tb_obat VALUES (NULL,'$id_supplier','$nama_obat','$kategori_obat','$harga_jual','$harga_beli','$stok_obat','$keterangan')");

// var_dump($query);
if(!$query){
    echo "Gagal Memasukkan Data Obat ".mysqli_error($koneksi);
}else{
    header('Location:../select/view_obat.php');
    exit;

    echo "<script>location.href='../select/view_obat.php';</script>"; //pindah ke halaman obat jika berhasil
}

echo "berhasil";