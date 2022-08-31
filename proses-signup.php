<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pegwawai</title>
    <link rel="stylesheet" href="css_datamahasiswa.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<?php
    include "koneksi_absensi.php";
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $jabatan = $_POST['jabatan'];
    $nohp = $_POST['nohp'];
    $username= $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $query = mysqli_query($koneksi, "INSERT INTO data VALUES ('$nip','$nama','$jk','$jabatan','$nohp','$username','$password','$level')")
    or die(mysqli_error($koneksi));

    if(!$query)
    {
        echo '<script> alert("Registrasi gagal!") </script>';
        header("location:signup.php");
    }
    else
    {
        echo '<script> alert("Registrasi berhasil!") 
        window.location.href = "login.php";
        </script>';
    }
       
?>

</body>
</html>