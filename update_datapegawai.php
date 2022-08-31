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
      <div class="col-lg-6 col-xl-5 m-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-dark fs-3">UPDATE DATA PEGAWAI</h5>
            <hr>

            <?php
                include "koneksi_absensi.php";
                $nip = $_GET['nip'];
                $query=mysqli_query($koneksi,"SELECT * from data WHERE nip=$nip");
                $data =mysqli_fetch_array($query);
            ?>

            <form method = "POST" action ="proses-update_datapegawai.php">

              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="nip" name="nip" value="<?php echo $data['nip']; ?>" readonly="readonly">
                <label for="nip">NIP</label>
              </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nama" name="nama" required autofocus>
                    <label for="nama">Nama Lengkap</label>
                </div>

                <div class="form-floating mb-3">
                    <select name="jk" class="form-select">
                      <option value="Laki-Laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                    <label for="Select" class="form-label">Jenis Kelamin</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="jabatan" name="jabatan" required autofocus>
                    <label for="jabatan">Jabatan</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="nohp" name="nohp" required autofocus>
                    <label for="nohp">No HP</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="username" name="username" required autofocus>
                    <label for="username">Username</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password">
                    <label for="password">Password</label>
                </div>

                <input type="hidden" id="level" name="level" value="pegawai">

                <div class="d-grid mb-2">
                    <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Update Data</button>
                </div>

              <hr class="my-4">
            </form>

            <div>
                <a href="halaman_admin.php"> 
                  <button class="btn btn-primary btn-sm" aria-pressed="true">Kembali</button>
                </a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>