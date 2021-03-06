<?php
session_start();
include"koneksi.php";
if (!isset($_SESSION['email'])) {
  header("location: alertlogin.php");
}
if ($_SESSION['id_divisi']!="2") {
 // die("Anda bukan Keuangan");
    header("location: alertlogin.php");
}
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Keuangan Menu</title>
  <link rel='stylesheet' href='css/bootstrap.min.css'>
  <link rel="stylesheet" href="css/style.css">

   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- <a href="https://www.jqueryscript.net/tags.php?/Bootstrap/">Bootstrap</a> theme -->
<link rel="stylesheet" href="css/jquery.datetimepicker.css">


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/jquery.datetimepicker.full.js"></script> 


<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  <script src="js/index.js"></script>

</head>
<body>

  <div class="header">
  <div class="logo">
    Ini Dashboard Keuangan
  </div>
</div>
<div class="sidebar">
  <ul>
    <li><a href="page-keuangan.php"><i class="fa fa-home"></i><strong><span>Home</span></strong></a></li>
    <li><a href="uangpen1.php"><i class="fas fa-dollar-sign"></i><strong><span>Penagihan 1</span></strong></a></li> 
    <li><a href="uangpen2.php"><i class="fas fa-dollar-sign"></i><strong><span>Penagihan 2</span></strong></a></li> 
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
      
      <form action="keuanganinput.php" method="POST"> 
        <div class="form-group">
       <label for="id_keuangan">ID Keuangan : </label>
       <input type="text" class="form-control" id="id_keuangan" name="id_keuangan" required="required">  
        </div>        


       <div class="form-group">
       <label for="id_pen1">Penagihan 1 : </label>
      <select class="form-control" name="id_pen1" id="id_pen1" required="">
    <option value="">--PENAGIHAN 1--</option>
      <?php
      $apen1="SELECT * FROM penagihan1";
      $sqlpen1=mysqli_query($koneksi, $apen1);
      while($datapen1=mysqli_fetch_array($sqlpen1)){
    ?>
      <option value="<?php echo $datapen1['id_pen1']?>"><?php echo "ID Penagihan : "; echo $datapen1['id_pen1']; echo " -- No. Kwitansi : "; echo $datapen1['no_kwitansi']?>
        
      </option>
     <?php
       }
    ?>
       </select>
       </div>       

      <div class="form-group">
       <label for="id_pen2">Penagihan 2 : </label>
      <select class="form-control" name="id_pen2" id="id_pen2" required="">
    <option value="">--PENAGIHAN 2--</option>
      <?php
      $apen2="SELECT * FROM penagihan2";
      $sqlpen2=mysqli_query($koneksi, $apen2);
      while($datapen2=mysqli_fetch_array($sqlpen2)){
    ?>
      <option value="<?php echo $datapen2['id_pen2']?>"><?php echo "ID Penagihan : "; echo $datapen2['id_pen2']; echo " -- No. Faktur : "; echo $datapen2['no_faktur']?>
        
      </option>
     <?php
       }
    ?>
       </select>
       </div>        


        <div class="form-group">
       <label for="id_pem1">Pembayaran 1 : </label>
      <select class="form-control" name="id_pem1" id="id_pem1" required="">
    <option value="">--Pembayaran 1--</option>
      <?php
      $a="SELECT * FROM pembayaran1";
      $sql=mysqli_query($koneksi, $a);
      while($data=mysqli_fetch_array($sql)){
    ?>
      <option value="<?php echo $data['id_pem1']?>"><?php echo "ID Pembayaran : "; echo $data['id_pem1']; echo " -- Jumlah Rp."; echo $data['jumlah_bayar1']?></option>
     <?php
       }
    ?>
       </select>
       </div>        
 <div class="form-group">
       <label for="id_pem2">Pembayaran 2 : </label>
      <select class="form-control" name="id_pem2" id="id_pem2" required="">
    <option value="">--Pembayaran 2--</option>
      <?php
      $a="SELECT * FROM pembayaran2";
      $sql=mysqli_query($koneksi, $a);
      while($data=mysqli_fetch_array($sql)){
    ?>
      <option value="<?php echo $data['id_pem2']?>"><?php echo "ID Pembayaran : "; echo $data['id_pem2']; echo " -- Jumlah Rp."; echo $data['jumlah_bayar2']?></option>
     <?php
       }
    ?>
       </select>
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
          <th>ID Keuangan</th>
          <th>ID Penagihan 1</th>
          <th>ID Penagihan 2</th>
          <th>ID Pembayaran 1</th>     
          <th>ID Pembayaran 2</th>

          <th>Action</th>
        </tr>

      </thead>
      <tbody>
<?php
    require_once('koneksi.php');
    
    $result = mysqli_query($koneksi,"SELECT * FROM keuangan
      JOIN pembayaran1 ON keuangan.id_pem1=pembayaran1.id_pem1
      JOIN pembayaran2 ON keuangan.id_pen2=pembayaran2.id_pem2
      JOIN penagihan1 ON keuangan.id_pen1=penagihan1.id_pen1
      JOIN penagihan2 ON keuangan.id_pen2=penagihan2.id_pen2
      order by keuangan.id_keuangan") or die(mysql_error());
    $no=1; 
    while ($data = mysqli_fetch_array($result)) { //fetch the result from query into an array
    ?>
      <tr>
        <td><?php echo $no++; ?></td>         <!--menampilkan nomor dari variabel no-->
        <td><?php echo $data['id_keuangan'] ?></td>    <!--menampilkan data id_karyawan dari tabel karyawan-->
        <td><?php echo "ID Penagihan : "; echo $datapen1['id_pen1']; echo " -- No. Kwitansi : "; echo $datapen1['no_kwitansi']?></td> 
        <td><?php echo "ID Penagihan : "; echo $datapen2['id_pen2']; echo " -- No. Faktur : "; echo $datapen2['no_faktur']?></td>     
        <td><?php echo "ID Pembayaran : "; echo $data['id_pem1']; echo " -- Jumlah Rp."; echo $data['jumlah_bayar1']?></td>     
        <td><?php echo "ID Pembayaran : "; echo $data['id_pem2']; echo " -- Jumlah Rp."; echo $data['jumlah_bayar2']?></td>     
        <td>
                        <a href="keuanganedit.php?id_keuangan=<?php echo $data['id_keuangan']; ?>"> Edit </a> |
                        <a href="keuangandel.php?id_keuangan=<?php echo $data['id_keuangan']; ?>" onClick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" > Delete </a>   
                    </td>
    
      </tr>
      <?php 
    }
      ?>
      </tbody>
    </table>
    </div>
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

</body>
</html>
