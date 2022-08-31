<?php
    $nip = $_GET['nip'];
    include "koneksi_absensi.php";
    $cek_absensi=mysqli_query($koneksi,"SELECT * from data_absensi WHERE nip=$nip") or die (mysqli_error($koneksi));
    if(mysqli_num_rows($cek_absensi) > 0) 
    {
        echo "<script>";
        echo "alert('Anda telah melakukan absensi hari ini!')";
        echo "</script>";

        $url = "informasi_pegawai.php?nip=$nip;";
        echo "<script> window.location.href = '$url' </script>";
    }
    else
    {
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $jabatan = $_POST['jabatan'];
        $nohp = $_POST['nohp'];
        $absensi = $_POST['absensi'];
    
        $query = mysqli_query($koneksi, "INSERT INTO data_absensi VALUES ('$nip','$nama','$jk','$jabatan','$nohp','$absensi')")
        or die(mysqli_error($koneksi));

        if(!$query)
        {
            echo '<script> alert("Absensi gagal!") </script>';
            header("location:halaman_pegawai.php?nip=$nip");
        }
        else
        {
            echo "<script>";
            echo "alert('Absensi telah direkap!')";
            echo "</script>";
    
            $url = "informasi_pegawai.php?nip=$nip;";
            echo "<script> window.location.href = '$url' </script>";
        }
    }
       
?>