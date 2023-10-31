<?php
    include "../../koneksi.php";
    $id_pelanggan = $_GET['id_pelanggan'];
    
    $query_gambar = mysqli_query ("SELECT bukti_foto_resep FROM tb_pelanggan WHERE id_pelanggan=$id_pelanggan");
    $baris = mysqli_fetch_assoc($query_gambar);
    unlink("../../images/".$baris['bukti_foto_resep']);
    $query_delete = mysqli_query($koneksi, "DELETE FROM tb_pelanggan WHERE id_pelanggan='$id_pelanggan'");

    if(!$query_delete){
        echo "Gagal delete".mysqli_error($koneksi);
    }else{
        header('Location:../select/view_pelanggan.php');
    }
?>