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
        background-color: #f0f0f0;
        /* Background color for the entire page */
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
        color: #007BFF;
        /* Blue as the primary color */
    }

    #form {
        width: 50%;
        padding: 20px;
        border-radius: 10px;
        background-color: #ffffff;
        /* White background */
        box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.2), -4px -4px 8px rgba(255, 255, 255, 0.5);
        /* Neumorphism shadow */
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-family: 'Poppins';
        font-weight: bold;
        color: #007BFF;
        /* Blue as the label color */
    }

    input[type="text"],
    input[type="number"],
    input[type="file"],
    select,
    textarea {
        width: 95%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
        background-color: #f0f0f0;
        /* Light gray background for input fields */
    }

    textarea {
        resize: vertical;
    }

    input[type="submit"] {
        background-color: #007BFF;
        /* Blue as the submit button background color */
        color: #fff;
        padding: 12px 15px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s ease;
        /* Smooth transition */
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
        /* Darker blue on hover */
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

            <label for="bukti_foto_resep">Bukti Foto Resep:
                <img src="../../images/<?=$row['bukti_foto_resep']?>" alt="" width="100px">
            </label>

            <input type="file" id="bukti_foto_resep" name="bukti_foto_resep" value="<?=$row['bukti_foto_resep']?>">

            <input type="submit" value="Edit Data pelanggan">
        </form>
    </div>
</body>

</html>