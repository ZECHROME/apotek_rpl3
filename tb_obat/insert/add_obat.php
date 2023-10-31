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
        padding: 12px 20px;
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
        <h1 id="title">Tambah Obat</h1>
        <form action="proses_add_obat.php" method="post" id="form">
            <!-- <label for="id_obat">ID Obat:</label>
            <input type="text" id="id_obat" name="id_obat" required> -->

            <label for="id_supplier">ID Supplier:</label>
            <select id="id_supplier" name="id_supplier">
                <?php
                    include "../../koneksi.php";
                    $query = "SELECT * FROM tb_supplier";
                    $data = mysqli_query($koneksi, $query);
                    while($baris = mysqli_fetch_assoc($data)){
                    ?>
                <option value="<?= $baris['id_supplier']; ?>"><?= $baris['perusahaan']; ?></option>
                <?php
                };
                var_dump($data);
                ?>
            </select>

            <label for="nama_obat">Nama Obat:</label>
            <input type="text" id="nama_obat" name="nama_obat">

            <label for="kategori_obat">Kategori Obat:</label>
            <input type="text" id="kategori_obat" name="kategori_obat">

            <label for="harga_jual">Harga Jual:</label>
            <input type="number" id="harga_jual" name="harga_jual">

            <label for="harga_beli">Harga Beli:</label>
            <input type="number" id="harga_beli" name="harga_beli">

            <label for="stok_obat">Stok:</label>
            <input type="number" id="stok_obat" name="stok_obat">

            <label for="keterangan">Keterangan:</label>
            <textarea id="keterangan" name="keterangan" rows="4" cols="50"></textarea>

            <input type="submit" value="Simpan Data Obat">
        </form>
    </div>
</body>

</html>