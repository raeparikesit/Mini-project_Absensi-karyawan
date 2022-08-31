<?php
    session_start();
    if(empty($_SESSION['username']))
    {
    header("location:login.php?pesan=belum_login");
    }

    include "koneksi_absensi.php";
    $query=mysqli_query($koneksi,"DELETE FROM data_absensi");

    if(!$query)
    {
        echo '<script>'; 
        echo 'alert("Reset data absensi gagal!");'; 
        echo 'window.location.href = "absensi_admin.php";';
        echo '</script>';
    }
    else
    {
        echo '<script>'; 
        echo 'alert("Reset data absensi berhasil!");'; 
        echo 'window.location.href = "absensi_admin.php";';
        echo '</script>';
    }
?>