<?php
include "../../koneksi.php";
session_start();

if(!@$_SESSION['username']){
    echo "<script>alert('Login terlebih dahulu!!');window.location.href='../../login.php';</script>";
}elseif(@$_SESSION['level']=='karyawan'){
    echo "<script>alert('anda karyawan, silahkan login terlebih dahulu');window.location.href='../../login.php';</script>";
}else{

$query = mysqli_query($koneksi, "SELECT * FROM tb_obat INNER JOIN tb_supplier USING(id_supplier) ORDER BY id_obat DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Obat</title>

    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f6f7f0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px auto;
    }

    table,
    th,
    td {
        border: 1px solid #ccc;
    }

    th,
    td {
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #007BFF;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    a {
        text-decoration: none;
        color: #0074d9;
    }

    a:hover {
        color: #0056b3;
    }
    </style>
</head>

<body>
    <?php
        echo "selamat datang ", $_SESSION['username'];
        echo $_SESSION['level'];
    ?>
    <center>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Id Obat</th>
                <th>Nama Perusahaan</th>
                <th>Nama Obat</th>
                <th>Kategori Obat</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok Obat</th>
                <th>Keterangan</th>
                <th colspan="2">Aksi</th>
            </tr>
            <?php
                while($baris = mysqli_fetch_assoc($query)){
                    // var_dump($baris);
            ?>
            <tr>
                <td><?= $baris['id_obat']; ?></td>
                <td><?= $baris['id_supplier']; ?></td>
                <td><?= $baris['nama_obat']; ?></td>
                <td><?= $baris['kategori_obat']; ?></td>
                <td><?= $baris['harga_jual']; ?></td>
                <td><?= $baris['harga_beli']; ?></td>
                <td><?= $baris['stok_obat']; ?></td>
                <td><?= $baris['keterangan']; ?></td>
                <td><a href="../update/edit_obat.php?idobat=<?= $baris['id_obat'];?>">Edit</a></td>

                <?php
                 $id_obat = $baris['id_obat'];
                 $hide_delete = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_obat INNER JOIN tb_detail_transaksi ON tb_obat.id_obat = tb_detail_transaksi.id_obat WHERE tb_obat.id_obat = $id_obat");
                 $cek = mysqli_fetch_row($hide_delete);
                    
                if($cek['0']==0){
                ?>
                <td><a href="../delete/delete_obat.php?idobat=<?= $baris['id_obat'];?>">Delete</a></td>
                <?php  
                }else{
                    echo "<td></td>";
                }
                ?>


            </tr>
            <?php
            }
            ?>
        </table>
    </center>


</body>

</html>
<?php
}
?>