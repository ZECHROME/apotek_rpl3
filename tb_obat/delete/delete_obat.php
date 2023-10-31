<?php
    include "../../koneksi.php";
    $id_obat = $_GET['idobat'];
    $query_delete = mysqli_query($koneksi, "DELETE FROM tb_obat WHERE id_obat=$id_obat");

    if(!$query_delete){
        echo "Gagal delete".mysqli_error($koneksi);
    }else{
        header('Location:../select/view_obat.php');
    }
?>