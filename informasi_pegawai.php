<?php
    session_start();
    if(empty($_SESSION['username']))
    {
    header("location:login.php?pesan=belum_login");
    }

    include "koneksi_absensi.php";
    $nip = $_GET['nip'];
    $query=mysqli_query($koneksi,"SELECT * from data WHERE nip=$nip");
    $data =mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEGAWAI PAGE</title>
   
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
         <a class="nav-link active" aria-current="page" href="halaman_pegawai.php?nip=<?php echo $data['nip']; ?>">Absensi</a>
        </li>        
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="informasi_pegawai.php?nip=<?php echo $data['nip']; ?>">Informasi</a>
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
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
          <div class="card-body p-4 p-sm-5">
            <h3 class="card-title text-center mb-5 fw-dark fs-2">Informasi</h3>
            <hr> 
                <p> <?php $date = date('l, d/m/Y', time());
                echo " $date";
                ?>                    
            </p><br>
            <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
      <img src="aset/images/info1.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><center>POJOK</center></h5>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio saepe suscipit aut totam aperiam, non, aliquam optio explicabo ipsa tenetur vitae ducimus illum quaerat nobis perferendis. Natus porro quibusdam temporibus!</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 2 days ago</small>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="aset/images/info2.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><center>POJOK</center></h5>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio saepe suscipit aut totam aperiam, non, aliquam optio explicabo ipsa tenetur vitae ducimus illum quaerat nobis perferendis. Natus porro quibusdam temporibus!</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 5 days ago</small>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="aset/images/info3.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><center>POJOK</center></h5>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio saepe suscipit aut totam aperiam, non, aliquam optio explicabo ipsa tenetur vitae ducimus illum quaerat nobis perferendis. Natus porro quibusdam temporibus!</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 5 days ago</small>
      </div>
    </div>
  </div>
</div><br><br>
<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
      <img src="aset/images/info4.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><center>POJOK</center></h5>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio saepe suscipit aut totam aperiam, non, aliquam optio explicabo ipsa tenetur vitae ducimus illum quaerat nobis perferendis. Natus porro quibusdam temporibus!</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 1 weeks ago</small>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="aset/images/info5.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><center>POJOK</center></h5>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio saepe suscipit aut totam aperiam, non, aliquam optio explicabo ipsa tenetur vitae ducimus illum quaerat nobis perferendis. Natus porro quibusdam temporibus!</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 1 weeks ago</small>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="aset/images/info6.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><center>POJOK</center></h5>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio saepe suscipit aut totam aperiam, non, aliquam optio explicabo ipsa tenetur vitae ducimus illum quaerat nobis perferendis. Natus porro quibusdam temporibus!</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 2 weeks ago</small>
      </div>
    </div>
  </div>
</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  

</body>
</html>