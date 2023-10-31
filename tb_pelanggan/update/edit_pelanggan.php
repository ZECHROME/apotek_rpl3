<?php
    include "../../koneksi.php";
    $id_pelanggan = $_GET['idpelanggan'];
    $query_pelanggan = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan WHERE id_pelanggan=$id_pelanggan");
    $row = mysqli_fetch_assoc($query_pelanggan);
  
    // $baris["nama_pelanggan"];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Formulir Pelanggan</title>
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
        <h1 id="title">Edit Pelanggan</h1>
        <form action="proses_edit_pelanggan.php" method="post" id="form" enctype="multipart/form-data">
            <input type="text" hidden id="id_pelanggan" name="id_pelanggan" value="<?=$row['id_pelanggan']?>">

            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?=$row['nama_lengkap']?>">

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" value="<?=$row['alamat']?>">

            <label for="telp">Telp:</label>
            <input type="number" id="telp" name="telp" value="<?=$row['telp']?>">

            <label for="usia">Usia:</label>
            <input type="number" id="usia" name="usia" value="<?=$row['usia']?>">

            <label for="bukti_foto_resep">Bukti Foto Resep:</label>
            <img src="../../images/<?=$row['bukti_foto_resep']?>" alt="" width="100px">
            <input type="file" id="bukti_foto_resep" name="bukti_foto_resep" value="<?=$row['bukti_foto_resep']?>">

            <input type="submit" value="Edit Data pelanggan">
        </form>
    </div>
</body>

</html>