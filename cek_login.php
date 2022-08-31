<?php
    session_start();

    $query=new mysqli('localhost', 'root', '', 'absensi');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = mysqli_query($query,"select * from data where username='$username' and password='$password'")
    or die (mysqli_error($query));
    $cek = mysqli_num_rows($data);

    if($cek > 0)
    {
        $login = mysqli_fetch_assoc($data);
 
        if($login['level']=="admin")
        {
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "admin";
            header("location:halaman_admin.php");
        }
        else if($login['level']=="pegawai")
        {

            $_SESSION['username'] = $username;
            $_SESSION['level'] = "pegawai";
            header("location:halaman_pegawai.php?nip=$login[nip];");
            
        }
    }
    else
    {
        header("location:login.php?pesan=gagal");
    } 
?>