<?php 
    setcookie('username', '', 0, '/');
    setcookie('level', '', 0, '/');

    echo "<script>alert('berhasil logout');window.location.href='login.php';</script>";
?>