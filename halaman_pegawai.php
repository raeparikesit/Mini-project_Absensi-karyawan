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
         <a class="nav-link active" aria-current="page">Absensi</a>
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
            <h5 class="card-title text-center mb-5 fw-dark fs-2">Absensi</h5>
            <hr>
            <table>
              <tbody>
                <tr>
                    <td>NIP</td>
                    <td width=100px align=right>:</td>
                    <td width=20>
                    <td><?php echo $data['nip']; ?></td> 
                </tr>

                <tr>
                  <td>Nama</td>
                  <td width=100px align=right>:</td>
                  <td width=20>
                  <td><?php echo $data['nama']; ?></td> 
                </tr>

                <tr>
                  <td>Jenis Kelamin</td>
                  <td width=100px align=right>:</td>
                  <td width=20>
                  <td><?php echo $data['jk']; ?></td> 
                </tr>

                <tr>
                  <td>Jabatan</td>
                  <td width=100px align=right>:</td>
                  <td width=20>
                  <td><?php echo $data['jabatan']; ?></td> 
                </tr>

                <tr>
                  <td>No HP</td>
                  <td width=100px align=right>:</td>
                  <td width=20>
                  <td><?php echo $data['nohp']; ?></td> 
                </tr>

                <tr>
                  <td>Absensi</td>
                  <td width=100px align=right>:</td>
                  <td width=20>
                  <td>
                      <form method = "POST" action ="proses-absensi_pegawai.php?nip=<?php echo $data['nip']; ?>">
                        <input type="hidden" id="nip" name="nip" value="<?php echo $data['nip']; ?>">
                        <input type="hidden" id="nama" name="nama" value="<?php echo $data['nama']; ?>">
                        <input type="hidden" id="jk" name="jk" value="<?php echo $data['jk']; ?>">
                        <input type="hidden" id="jabatan" name="jabatan" value="<?php echo $data['jabatan']; ?>">
                        <input type="hidden" id="nohp" name="nohp" value="<?php echo $data['nohp']; ?>">

                        <input type="radio" id="hadir" name="absensi" value="Hadir">
                        <label for="hadir">Hadir</label> &nbsp;

                        <input type="radio" id="izin" name="absensi" value="Izin">
                        <label for="izin">Izin</label> &nbsp;

                        <input type="radio" id="terlambat" name="absensi" value="Terlambat">
                        <label for="terlambat">Terlambat</label> &nbsp;

                        <input type="radio" id="cuti" name="absensi" value="Cuti">
                        <label for="cuti">Cuti</label>
                  </td>   
                </tr>
                                
                <tr>
                  <td>    
                    <div>
                    <br>
                        <input type="submit" name="submit" id="submit" value="Simpan">
                     </div>
                  </td>
                      </form>
                </tr>
              </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
