<?php
include "../../koneksi.php";
$id_obat = $_GET['idobat'];

$query_obat = mysqli_query($koneksi, "SELECT * FROM tb_obat WHERE id_obat=$id_obat");
$row = mysqli_fetch_assoc($query_obat);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Obat</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
    }

    h1 {
        margin-bottom: 20px;
    }

    #all {
        width: 95%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    #title {
        color: #FF6347;
    }

    #form {
        width: 50%;
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 5px;
        background-color: #DCDCDC;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-family: 'Poppins';
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    select,
    textarea {
        width: 95%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    textarea {
        resize: vertical;
    }

    input[type="submit"] {
        background-color: #FF6347;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <div id="all">
        <h1 id="title">Tambah Obat</h1>
        <form action="proses_edit_obat.php" method="post" id="form">
            <input type="text" hidden id="id_obat" name="id_obat" value="<?=$row['id_obat']?>">

            <label for="id_supplier">ID Supplier:</label>
            <select id="id_supplier" name="id_supplier">
                <?php
                    $id_supplier = $row['id_supplier']; //mengambil id supplier dari variabel $row
                    $query_supplier = mysqli_query($koneksi, "SELECT id_supplier, perusahaan FROM tb_supplier WHERE id_supplier=$id_supplier");
                    $baris_supplier = mysqli_fetch_assoc($query_supplier);
                    $query = "SELECT * FROM tb_supplier";
                    $data = mysqli_query($koneksi, $query); 
                    while($baris = mysqli_fetch_assoc($data)){
                    ?>
                <option <?php if($baris_supplier['id_supplier']==$baris['id_supplier']){echo "selected";} ?>
                    value="<?= $baris['id_supplier']; ?>">
                    <?= $baris['perusahaan']; ?></option>
                <?php
                };
                var_dump($data);
                ?>
            </select>

            <label for="nama_obat">Nama Obat:</label>
            <input type="text" id="nama_obat" name="nama_obat" value="<?=$row['nama_obat']?>">

            <label for="kategori_obat">Kategori Obat:</label>
            <input type="text" id="kategori_obat" name="kategori_obat" value="<?=$row['kategori_obat']?>">

            <label for="harga_jual">Harga Jual:</label>
            <input type="number" id="harga_jual" name="harga_jual" value="<?=$row['harga_jual']?>">

            <label for="harga_beli">Harga Beli:</label>
            <input type="number" id="harga_beli" name="harga_beli" value="<?=$row['harga_beli']?>">

            <label for="stok_obat">Stok:</label>
            <input type="number" id="stok_obat" name="stok_obat" value="<?=$row['stok_obat']?>">

            <label for="keterangan">Keterangan:</label>
            <textarea id="keterangan" name="keterangan" value="<?=$row['keterangan']?>"></textarea>

            <input type="submit" value="Edit Data Obat">
        </form>
    </div>
</body>

</html>