<?php

include "../koneksi.php";

$idobat = $_POST['idobat'];
$idsupplier = $_POST['id_supplier'];
$namaobat = $_POST['nama_obat'];
$kategori = $_POST['kategori'];
$hargajual = $_POST['harga_jual'];
$hargabeli = $_POST['harga_beli'];
$stokobat = $_POST['stok_obat'];
$keterangan = $_POST['keterangan'];

$query = mysqli_query($koneksi, "UPDATE tb_obat SET id_supplier='$idsupplier', namaobat='$namaobat', kategoriobat='$kategori', hargajual='$hargajual', hargabeli='$hargabeli', stok_obat='$stokobat', keterangan='$keterangan' WHERE id_obat='$idobat'");


if(!$query){
    echo "Gagal Mengedit Data Obat ". mysqli_error($koneksi); //jika gagal maka akan mencetak teks dan erornya
}else{
    // header('Location:view_obat.php');
    // exit;
    echo "<script>location.href='view_obat.php';</script>"; //pindah ke halaman view obat ketika berhasil
}