<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("location: alertlogin.php");
}
if ($_SESSION['id_divisi']!="5") {
  header("location: alertlogin.php");
}
?>
<html lang="en">
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
  <title>Admin Menu</title>
  <link rel='stylesheet' href='css/bootstrap.min.css'>
  <link rel="stylesheet" href="css/style.css">
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

</head>
<body>
  <div class="header">
  <div class="logo">
    Ini Dashboard Admin
  </div>
</div>


<div class="sidebar">
  <ul>
    <li><a href="page-admin.php"><i class="fa fa-home"></i><span>Home</span></a></li>
    <li><a href="#"><i class="fa fa-server"></i><span>Server</span></a></li>
    <li><a href="#"><i class="fa fa-calendar"></i><span>Calendar</span></a></li>
    <li><a href="#"><i class="fas fa-envelope"></i><span>Messages</span></a></li>
    <li><a href="#"><i class="fa fa-table"></i><span>Data Table</span></a></li>
    <li><a href="logout.php"><i class="fa fa-power-off" style="color:red"></i><span>Logout</span></a></li>
</div>

<!-- Content -->
<div class="main">
  <div class="hipsum">
  <div class="panel-group">
  <div class="panel panel-default" >
    <div class="panel-heading" style="background-color: rgb(51, 122, 183);">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse1" style="color: white;">+ INPUT DATA</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse" style="margin-left: 10px; margin-right: 10px; padding-bottom: 5px; ">
      
      <form action="admininput.php" method="POST"> 
        <div class="form-group">
       <label for="id_karyawan">ID Karyawan : </label>
       <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" required="required">  
        </div>        


        <div class="form-group">
       <label for="id_divisi">ID Divisi : </label>
       <select class="form-control" id="id_divisi" name="id_divisi" required="required">
        <option selected="">- PILIH DIVISI -</option>
        <option value="1">Divisi BDD</option>
        <option value="2">Divisi Keuangan</option>
        <option value="3">Divisi Administrasi</option>
        <option value="4">Divisi Teknik</option>
        <option value="5">Admin</option>
       </select>
       </div>        

        <div class="form-group">
       <label for="nama">Nama : </label>
       <input type="text" class="form-control" id="nama" name="nama" required="required">  
        </div>       

        <div class="form-group">
       <label>Jenis Kelamin : </label>
       <label class="radio-inline"><input type="radio" name="Jenis_kelamin" value="L" checked>Laki-Laki</label>
       <label class="radio-inline"><input type="radio" name="Jenis_kelamin" value="P">Perempuan</label>  
        </div>      

        <div class="form-group">
       <label for="email">Email : </label>
       <input type="email" class="form-control" id="email" name="email" required="required">  
        </div>      

        <div class="form-group">
       <label for="password">Password : </label>
       <input type="password" class="form-control" id="password" name="password" required="required">  
        </div>      

        <div class="form-group">
        <label for="alamat">Alamat : </label>
        <textarea class="form-control" id="alamat" name="alamat" required="required" rows="3" style="resize: none;"></textarea>
        </div>      

        <div class="form-group">
        <label for="no_telp">No. Telpon : </label>
        <input type="text" class="form-control" id="no_telp" name="no_telp" required="required">
        </div> 

        <div class="form-group">
        <button type="submit" value="simpan" class="btn btn-primary">Input</button>
        <button type="Reset" class="btn btn-warning">Reset</button>
        </div>     

  </form>
  
    </div>
  </div>
</div> 
  <?php 
if(isset($_GET['pesan'])){
  $pesan = $_GET['pesan'];
  if($pesan == "input"){ ?>
  <div class="alert alert-success alert-dismissible fade in" align="center">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Data Telah di Input
  </div>
  <?php
  }else if($pesan == "update"){?>
  <div class="alert alert-success alert-dismissible fade in" align="center">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Data Telah di Update
  </div>
  <?php
   }else if($pesan == "hapus"){ ?>
  <div class="alert alert-success alert-dismissible fade in" align="center">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Data Telah di Hapus
  </div>
  <?php
  }
}
?>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>ID Karyawan</th>
          <th>Nama</th>
          <th>JK</th>
          <th>Email</th>
          <th>Divisi</th>
          <th>Alamat</th>
          <th>No. Telpon</th>
          <th>Action</th>
        </tr>

      </thead>
      <tbody>
<?php
    require_once('koneksi.php');
    
    $result = mysql_query("SELECT * FROM karyawan JOIN divisi ON karyawan.id_divisi = divisi.id_divisi order by id_karyawan") or die(mysql_error());
    $no=1; 
    while ($data = mysql_fetch_array($result)) { //fetch the result from query into an array
    ?>
      <tr>
        <td><?php echo $no++; ?></td>         <!--menampilkan nomor dari variabel no-->
        <td><?php echo $data['id_karyawan'] ?></td>    <!--menampilkan data id_karyawan dari tabel karyawan-->
        <td><?php echo $data['nama']?></td>
        <td><?php echo $data['Jenis_kelamin'] ?></td>     
        <td><?php echo $data['email'] ?></td>     
        <td><?php echo $data['nama_divisi'] ?></td>    
        <td><?php echo $data['alamat'] ?></td>     
        <td><?php echo $data['no_telp'] ?></td>     
        <td>
                        <a href="adminedit.php?id_karyawan=<?php echo $data['id_karyawan']; ?>"> Edit </a> |
                        <a href="admindel.php?id_karyawan=<?php echo $data['id_karyawan']; ?>" onClick="javascript: return confirm('Anda yakin akan menghapus user ini ?')" > Delete </a>   
                    </td>
    
      </tr>
      <?php 
    }
      ?>
      </tbody>
    </table>
  </div>


<div class="footer">
    <table width="100%" border="1" style="border-style: groove;">
     <tr>
       <td width="30%">
        <div align="center">
          <?php
$array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
$hari = $array_hari[date('N')];

$array_bulan = array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
$bulan = $array_bulan[date('n')];

$tgl = date('j');
$thn = date('Y'); 

echo $hari.", ".$tgl." ".$bulan." ".$thn ;

?> 

       </div>
     </td>
       <td width="40%">
        <div align="center">
          <font color="#000000">
Selamat Datang : <strong><?php echo $_SESSION['nama']?></strong></font>
</div>
</td>
       <td width="30%">
        <div align="center">
       Divisi : <strong><?php echo $_SESSION['nama_divisi'] ?></strong>
       </div>
       </td>
     </tr>
   </table>

</div>

</div>
  <script src='js/jquery.min.js'></script>
  <script src="js/index.js"></script>
</body>
</html>
