<?php
    include "koneksi.php";
    
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE username = '$user' AND password = '$pass'");
    $baris_level = mysqli_fetch_assoc($query);

    echo $cek = mysqli_num_rows($query);

    if($cek > 0){
        // $_SESSION['username'] = $user;
        setcookie('username', $user, time() + (60 * 60 * 24 * 7), '/');
        // $_SESSION['level'] = $baris_level['level_user'];
        echo "<script>alert('Berhasil Login');window.location.href='tb_pelanggan/select/view_pelanggan.php'</script>";
    }else{ 
        echo "<script>alert('Gagal Login');window.location.href='login.php'</script>";
    }
?>