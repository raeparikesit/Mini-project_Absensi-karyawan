<?php
    session_start();
    if(empty($_SESSION['username']))
    {
    header("location:login.php?pesan=belum_login");
    }

    include "koneksi_absensi.php";
    $nip = $_GET['nip'];
    $query=mysqli_query($koneksi,"DELETE FROM data WHERE nip = $nip");

    if(!$query)
    {
        echo '<script>'; 
        echo 'alert("Hapus data pegawai gagal!");'; 
        echo 'window.location.href = "halaman_admin.php";';
        echo '</script>';
    }
    else
    {
        echo '<script>'; 
        echo 'alert("Hapus data pegawai berhasil!");'; 
        echo 'window.location.href = "halaman_admin.php";';
        echo '</script>';
    }
?>