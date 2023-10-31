<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        <h1 id="title">Register</h1>
        <form action="proses_register.php" method="post" id="form">
            <!-- <label for="id_obat">ID Obat:</label>
            <input type="text" id="id_obat" name="id_obat" required> -->

            <label for="id_supplier">Nama Karyawan:</label>
            <select id="id_karyawan" name="id_karyawan">
                <?php
                    include "koneksi.php";
                    $query = "SELECT * FROM tb_karyawan WHERE id_karyawan NOT IN (SELECT id_karyawan FROM tb_login)";
                    $data = mysqli_query($koneksi, $query);
                    while($baris = mysqli_fetch_assoc($data)){
                    ?>
                <option value="<?= $baris['id_karyawan']; ?>"><?= $baris['nama_karyawan']; ?></option>
                <?php
                };
                var_dump($baris);
                ?>
            </select>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username">

            <label for="password">Password:</label>
            <input type="text" id="password" name="password">

            <label for="level_user">Level User:</label>
            <input type="text" id="level_user" name="level_user">

            <input type="submit" value="Simpan Data Obat">
        </form>
    </div>
</body>

</html>