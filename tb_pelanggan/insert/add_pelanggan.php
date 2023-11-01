<!DOCTYPE html>
<html>

<head>
    <title>Formulir Obat</title>
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