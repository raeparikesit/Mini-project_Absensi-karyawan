<?php
    session_start();
    if(empty($_SESSION['username']))
    {
    header("location:login.php?pesan=belum_login");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PAGE</title>
   
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" /> 
<link rel="stylesheet" href="aset/style/pages.css">
<link rel="icon" href="aset/images/logo_absensi.png" type="image/png">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light shadow-5-strong">
 
  <div class="container">
   
    <a class="navbar-brand me-2">
      <img
        src="aset/images/pancasila.png"
        height="60"
        alt=""
        loading="lazy"
        style="margin-top: -1px;"
      />
      ABSENSI PEGAWAI
    </a>

    <div class="collapse navbar-collapse" id="navbarButtonsExample">
    
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item text-white">
          <a class="nav-link active " aria-current="page">
          <?php
              $date = date('l, d/m/Y', time());
              echo " $date";
          ?>
          </a>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
         <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="halaman_admin.php">Data</a>
        </li>        
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="absensi_admin.php">Absensi</a>
        </li>
      </ul>
      
      <div class="d-flex align-items-center p-3">
        <a type="button" class="btn btn-primary me-3"href="logout.php"> Logout</a>
      </div>
    </div>
  </div>
</nav>
<div class="container">
    <div class="row">
      <div class="col-lg-15 col-xl-14 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-dark fs-3">DATA PEGAWAI</h5>
            <hr>
            <table class="table caption-top">                  
            <caption>
            <?php
              include "koneksi_absensi.php";
              $jumlah = mysqli_query($koneksi, "SELECT COUNT(nip) as jumlahData FROM data WHERE level = 'pegawai'");
              while($jmlData = mysqli_fetch_array($jumlah))
              {
                echo "Data yang telah masuk = ";
                echo $jmlData['jumlahData'];
              }
            ?>
            </caption>
            <thead>
              <tr>
                <th scope="col" class="text-center">NIP</th>
                <th scope="col" class="text-center">Nama</th>
                <th scope="col" class="text-center">Jenis Kelamin</th>
                <th scope="col" class="text-center">Jabatan</th>
                <th scope="col" class="text-center">No HP</th>
                <th scope="col" class="text-center">Username</th>
                <th scope="col" class="text-center">Password</th>
             </tr>
            </thead>
            <tbody>
              <?php
                $query = mysqli_query($koneksi, "SELECT * from data WHERE level = 'pegawai'");
                while($data = mysqli_fetch_array($query))
                {
              ?>
              <tr>
                <td class="text-center"><?php echo $data['nip']; ?> </td>
                <td><?php echo $data['nama']; ?> </td>
                <td class="text-center"><?php echo $data['jk']; ?> </td>
                <td class="text-center"><?php echo $data['jabatan']; ?> </td>
                <td class="text-center"><?php echo $data['nohp']; ?> </td>
                <td class="text-center"><?php echo $data['username']; ?> </td>
                <td class="text-center"><?php echo $data['password']; ?> </td>
                <td class="text-center"><a href="update_datapegawai.php?nip=<?php echo $data['nip']; ?>" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Update</a>
                                        <a href="delete_datapegawai.php?nip=<?php echo $data['nip']; ?>" class="btn btn-primary btn-sm" role="button" aria-pressed="true" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a></td>                          
              </tr>
              <?php 
                  }
              ?>
              </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>