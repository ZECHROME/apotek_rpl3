<!DOCTYPE html>
<html>

<head>
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
        width: 98%;
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
        <h1 id="title">TAMBAH PELANGGAN</h1>
        <form action="proses_add_pelanggan.php" method="post" id="form" enctype="multipart/form-data">
            <!-- <label for="id_obat">ID Obat:</label>
            <input type="text" id="id_obat" name="id_obat" required> -->

            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap">

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat">

            <label for="telp">Nomer Telpon:</label>
            <input type="number" id="telp" name="telp">

            <label for="usia">Usia:</label>
            <input type="number" id="usia" name="usia">

            <label for="bukti_foto_resep">Buti Foto Resep:</label>
            <input type="file" id="bukti_foto_resep" name="bukti_foto_resep">

            <input type="submit" value="Simpan Data Pelanggan">
        </form>
    </div>
</body>

</html>