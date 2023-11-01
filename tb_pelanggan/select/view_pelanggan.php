<?php
include "../../koneksi.php";
if(!@$_COOKIE['username']) {
    echo "<script>alert('silahkan login terlebih dahulu');window.location.href='../../login.php'</script>";
}else if(@$_COOKIE['level'] == 'karyawan'){
    echo "<script>alert('silahkan login('anda karyawan');window.location.href='../../login.php';</script>";
}
$query = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan ORDER BY id_pelanggan DESC");
 //ASCENDING mengurutkan dari kecil ke besar
 //DESCENDING mengurutkan dari besar ke kecil
    # code...
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Pelanggan</title>
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
        echo $_COOKIE['username'];
    ?>
    <center>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Id Pelanggan</th>
                <th>Nama Lengkap</th>
                <th>Alamat</th>
                <th>Nomer Telpon</th>
                <th>Usia</th>
                <th>Buti Foto Resep</th>
                <th colspan="2">Aksi</th>
            </tr>
            <?php 
                while ($baris = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
                <td><?= $baris['id_pelanggan']; ?></td>
                <td><?= $baris['nama_lengkap']; ?></td>
                <td><?= $baris['alamat']; ?></td>
                <td><?= $baris['telp']; ?></td>
                <td><?= $baris['usia']; ?></td>
                <td><img src="../../images/<?=$baris['bukti_foto_resep']; ?>" alt="" width="100px"></td>
                <td><a href="../update/edit_pelanggan.php?idpelanggan=<?= $baris['id_pelanggan'];?>">Edit</a></td>
                <?php
                    $id_pelanggan = $baris['id_pelanggan'];
                    $hide_delete = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_transaksi INNER JOIN tb_pelanggan USING(id_pelanggan) WHERE id_pelanggan = $id_pelanggan");
                    $cek = mysqli_fetch_row($hide_delete);

                    if($cek['0']==0){
                        ?>
                <td><a href="../delete/delete_pelanggan.php?idpelanggan=<?= $baris['id_pelanggan'];?>">Delete</a></td>
                <?php
                    } else {
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