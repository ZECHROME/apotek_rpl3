<?php

include "../koneksi.php";

$idsupplier = $_POST['id_supplier'];
$namaobat = $_POST['nama_obat'];
$kategori = $_POST['kategori'];
$hargajual = $_POST['harga_jual'];
$hargabeli = $_POST['harga_beli'];
$stokobat = $_POST['stok_obat'];
$keterangan = $_POST['keterangan'];

$query = mysqli_query($koneksi, "INSERT INTO tb_obat VALUES (NULL,'$idsupplier','$namaobat','$kategori','$hargajual','$hargabeli','$stokobat','$keterangan')");


if(!$query){
    echo "Gagal Memasukan Data Obat ". mysqli_error($koneksi); //jika gagal maka akan mencetak teks dan erornya
}else{
    // header('Location:view_obat.php');
    // exit;
    echo "<script>location.href='../view/view_obat.php';</script>"; //pindah ke halaman view obat ketika berhasil
}