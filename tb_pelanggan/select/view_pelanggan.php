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

    <script src="../js/pelanggan.js" defer></script>

    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f6f7f0;
        margin: 0;
        padding: 0;
        background: #EEE;
        overflow-x: hidden;
        position: relative;
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

    .container {
        position: relative;
        margin: 0px auto;
        z-index: 999;
    }

    .container-two {
        position: relative;
        margin: 15px;
        /* display: flex;
        justify-content: center;
        align-items: center; */
    }

    .profile {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: blue;
        margin: 8px 0px;
        margin-left: 15px;
        position: relative;
        z-index: 40;
    }

    .profile img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: blue;
        background-color: black;
    }

    .navbar {
        opacity: 0;
        transform: translateX(-50vw);
        transition: .3s ease;
        position: fixed;
        height: 100%;
        top: 0;
        padding-top: 50px;
    }

    .navbar.active {
        transform: translateX(0);
        opacity: 0.95;
        height: 100%;
        background-color: white;
    }

    .nav-menu {
        background-color: black;
        list-style: none;
        padding: 0;
        margin: 0;
        background: #FFF;
        border-radius: 2px;
        width: 250px;
    }

    .nav-menu li {
        position: relative;
    }

    .nav-menu li a {
        display: block;
        text-decoration: none;
        padding: 12px 20px;
        color: #777;
        text-align: left;
        height: 36px;
        position: relative;
        border-bottom: 1px solid #EEE;
    }

    .nav-menu li a i {
        float: left;
        font-size: 20px;
        margin: 0 10px 0 0;
    }

    .nav-menu li a p {
        float: left;
        margin: 0;
    }

    .nav-menu li a strong {
        display: block;
        text-transform: uppercase;
    }

    .nav-menu li a small {
        display: block;
        font-size: 10px;
    }

    .nav-menu li a i,
    .nav-menu li a strong,
    .nav-menu li a small {
        position: relative;
        transition: all 300ms linear;
    }

    .nav-menu li:hover>a i {
        opacity: 1;
        animation: moveFromTop 300ms ease-in-out;
    }

    .nav-menu li:hover a strong {
        opacity: 1;
        animation: moveFromLeft 300ms ease-in-out;
    }

    .nav-menu li:hover a small {
        opacity: 1;
        animation: moveFromRight 300ms ease-in-out;
    }

    .nav-menu li:hover>a {
        color: #e67e22;
    }

    .nav-menu li a.active {
        position: relative;
        color: #e67e22;
        border: 0;
        box-shadow: 0 0 5px #DDD;

        border-left: 4px solid #e67e22;
        border-right: 4px solid #e67e22;
        margin: 0 -4px;
    }

    .nav-menu li a.active:before {
        content: "";
        position: absolute;

        top: 42%;
        left: 0;
        border-left: 5px solid #e67e22;
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent;
    }

    .nav-menu li a.active:after {
        content: "";
        position: absolute;
        top: 42%;
        right: 0;
        border-right: 5px solid #e67e22;
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent;
    }

    /* == */

    @-webkit-keyframes moveFromTop {
        from {
            opacity: 0;
            transform: translateY(200%);
        }

        to {
            opacity: 1;
            transform: translateY(0%);
        }
    }

    @-webkit-keyframes moveFromLeft {
        from {
            opacity: 0;
            transform: translateX(200%);
        }

        to {
            opacity: 1;
            transform: translateX(0%);
        }
    }

    @-webkit-keyframes moveFromRight {
        from {
            opacity: 0;
            transform: translateX(-200%);
        }

        to {
            opacity: 1;
            transform: translateX(0%);
        }
    }

    .nav-menu li ul,
    .nav-menu li ul li ul {
        position: absolute;
        height: auto;
        min-width: 200px;
        padding: 0;
        margin: 0;
        background: #FFF;
        opacity: 0;
        visibility: hidden;
        transition: all 300ms linear;
        z-index: 1000;

        left: 280px;
        top: 0px;
        border-left: 4px solid #e67e22;
    }

    .nav-menu li ul:before {
        content: "";
        position: absolute;
        top: 25px;
        left: -9px;
        border-right: 5px solid #e67e22;
        border-bottom: 5px solid transparent;
        border-top: 5px solid transparent;
    }

    .nav-menu li:hover>ul,
    .nav-menu li ul li:hover>ul {
        display: block;
        opacity: 1;
        visibility: visible;
        left: 250px;
    }

    .nav-menu li ul li a {
        padding: 10px;
        text-align: left;
        border: 0;
        border-bottom: 1px solid #EEE;
        height: auto;
    }

    .nav-menu li ul li a i {
        font-size: 16px;
        display: inline-block;
        margin: 0 10px 0 0;
    }

    .nav-menu li ul li ul {
        left: 230px;
        top: 0;
        border: 0;
        border-left: 4px solid #e67e22;
    }

    .nav-menu li ul li ul:before {
        content: "";
        position: absolute;
        top: 15px;
        left: -9px;
        border-right: 5px solid #e67e22;
        border-bottom: 5px solid transparent;
        border-top: 5px solid transparent;
    }

    .nav-menu li ul li:hover>ul {
        top: 0px;
        left: 200px;
    }

    .nav-menu li a.search {
        padding: 10px 10px 15px 10px;
        clear: both;
    }

    .nav-menu li a.search i {
        margin: 0;
        display: inline-block;
        font-size: 18px;
    }

    .nav-menu li a.search input {
        border: 1px solid #EEE;
        padding: 10px;
        background: #FFF;
        outline: none;
        color: #777;

        width: 170px;
        float: left;
    }

    .nav-menu li a.search button {
        border: 1px solid #e67e22;
        background: #e67e22;
        outline: none;
        color: #FFF;
        margin-left: -4px;

        float: left;
        padding: 10px 10px 11px 10px;
    }

    .nav-menu li a.search input:focus {
        border: 1px solid #e67e22;
    }

    @media only screen and (min-width: 768px) and (max-width: 959px) {
        .nav-menu {
            width: 200px;
        }

        .nav-menu li a {
            height: 30px;
        }

        .nav-menu li a i {
            font-size: 22px;
        }

        .nav-menu li a strong {
            font-size: 12px;
        }

        .nav-menu li a small {
            font-size: 10px;
        }

        .nav-menu li a.search input {
            width: 120px;
            font-size: 12px;
        }

        .nav-menu li a.search buton {
            padding: 8px 10px 9px 10px;
        }

        .nav-menu li>ul {
            min-width: 180px;
        }

        .nav-menu li:hover>ul {
            min-width: 180px;
            left: 200px;
        }

        .nav-menu li ul li>ul,
        .nav-menu li ul li ul li>ul {
            min-width: 150px;
        }

        .nav-menu li ul li:hover>ul {
            left: 180px;
            min-width: 150px;
        }

        .nav-menu li ul li ul li:hover>ul {
            left: 150px;
            min-width: 150px;
        }

        .nav-menu li ul a {
            font-size: 12px;
        }

        .nav-menu li ul a i {
            font-size: 14px;
        }
    }

    @media only screen and (min-width: 480px) and (max-width: 767px) {

        .nav-menu {
            width: 50px;
        }

        .nav-menu li a {
            position: relative;
            padding: 12px 16px;
            height: 20px;
        }

        .nav-menu li a small {
            display: none;
        }

        .nav-menu li a strong {
            display: none;
        }

        .nav-menu li a:hover strong,
        .nav-menu li a.active strong {
            display: block;
            font-size: 10px;
            padding: 3px 0;
            position: absolute;
            bottom: 0px;
            left: 0;
            background: #e67e22;
            color: #FFF;
            min-width: 100%;
            text-transform: lowercase;
            font-weight: normal;
            text-align: center;
        }

        .nav-menu li .search {
            display: none;
        }

        .nav-menu li>ul {
            min-width: 180px;
            left: 70px;
        }

        .nav-menu li:hover>ul {
            min-width: 180px;
            left: 50px;
        }

        .nav-menu li ul li>ul,
        .nav-menu li ul li ul li>ul {
            min-width: 150px;
        }

        .nav-menu li ul li:hover>ul {
            left: 180px;
            min-width: 150px;
        }

        .nav-menu li ul li ul li>ul {
            left: 35px;
            top: 45px;
            border: 0;
            border-top: 4px solid #e67e22;
        }

        .nav-menu li ul li ul li>ul:before {
            left: 30px;
            top: -9px;
            border: 0;
            border-bottom: 5px solid #e67e22;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
        }

        .nav-menu li ul li ul li:hover>ul {
            left: 30px;
            min-width: 150px;
            top: 35px;
        }

        .nav-menu li ul a {
            font-size: 12px;
        }

        .nav-menu li ul a i {
            font-size: 14px;
        }

    }

    @media only screen and (max-width: 479px) {
        .nav-menu {
            width: 50px;
        }

        .nav-menu li a {
            position: relative;
            padding: 12px 16px;
            height: 20px;
        }

        .nav-menu li a small {
            display: none;
        }

        .nav-menu li a strong {
            display: none;
        }

        .nav-menu li a:hover strong,
        .nav-menu li a.active strong {
            display: block;
            font-size: 10px;
            padding: 3px 0;
            position: absolute;
            bottom: 0px;
            left: 0;
            background: #e67e22;
            color: #FFF;
            min-width: 100%;
            text-transform: lowercase;
            font-weight: normal;
            text-align: center;
        }

        .nav-menu li .search {
            display: none;
        }

        .nav-menu li>ul {
            min-width: 180px;
            left: 70px;
        }

        .nav-menu li:hover>ul {
            min-width: 180px;
            left: 50px;
        }

        .nav-menu li ul li>ul,
        .nav-menu li ul li ul li>ul {
            min-width: 150px;
        }

        .nav-menu li ul li:hover>ul {
            left: 180px;
            min-width: 150px;
        }

        .nav-menu li ul li ul li>ul {
            left: 35px;
            top: 45px;
            border: 0;
            border-top: 4px solid #e67e22;
        }

        .nav-menu li ul li ul li>ul:before {
            left: 30px;
            top: -9px;
            border: 0;
            border-bottom: 5px solid #e67e22;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
        }

        .nav-menu li ul li ul li:hover>ul {
            left: 30px;
            min-width: 150px;
            top: 35px;
        }

        .nav-menu li ul a {
            font-size: 12px;
        }

        .nav-menu li ul a i {
            font-size: 14px;
        }
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="profile" id="profile">
            <img src="../../images/bear.jpg" alt="">
        </div>
        <nav class="navbar" id="navbar">
            <ul class="nav-menu">
                <li>
                    <a href="">
                        <i class="fa fa-comments-o"></i>
                        <strong>Obat</strong>
                        <small>setting obat</small>
                    </a>
                    <ul>
                        <li><a href="../../tb_obat/select/view_obat.php"><i class="fa fa-globe"></i>View Obat</a>
                        </li>
                        <li><a href="../../tb_obat/insert/add_obat.php"><i class="fa fa-trophy"></i>Add Obat</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav-menu">
                <li>
                    <a href="">
                        <i class="fa fa-comments-o"></i>
                        <strong>Pelanggan</strong>
                        <small>setting pelanggan</small>
                    </a>
                    <ul>
                        <li><a href="#"><i class="fa fa-globe"></i>View
                                Pelanggan</a></li>
                        <li><a href="../insert/add_pelanggan.php"><i class="fa fa-trophy"></i>Add
                                Pelanggan</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <div class="container-two">
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
                    <td><a href="../delete/delete_pelanggan.php?idpelanggan=<?= $baris['id_pelanggan'];?>">Delete</a>
                    </td>
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
    </div>
</body>

</html>