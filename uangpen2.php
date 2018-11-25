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
      
      <form action="uangpen2input.php" method="POST"> 
        <div class="form-group">
       <label for="id_pen2">ID Penagihan 2 : </label>
       <input type="text" class="form-control" id="id_pen2" name="id_pen2" required="required">  
        </div>        


        <div class="form-group">
       <label for="no_invoice">Nomor Invoice : </label>
       <input type="text" class="form-control" id="no_invoice" name="no_invoice" required="required">  
        </div>  

       
 <div class="form-group">
       <label for="tgl_pen2">Tanggal Penagihan 2 : </label>
       <input type="text" class="form-control" id="tgl_pen2" name="tgl_pen2" required="required">  
        </div>   

      <div class="form-group">
       <label for="no_faktur">Nomor Faktur : </label>
       <input type="text" class="form-control" id="no_faktur" name="no_faktur" required="required">  
        </div>  

         <div class="form-group">
       <label for="tgl_faktur">Tanggal Faktur : </label>
       <input type="text" class="form-control" id="tgl_faktur" name="tgl_faktur" required="required">  
        </div>   

        <div class="form-group">
        <button type="submit" value="simpan" class="btn btn-primary">Input</button>
        <button type="Reset" class="btn btn-warning">Reset</button>
        </div>     

  </form>

   <script>
$(document).ready(function() {
 
   $('#tgl_pen2').datetimepicker();
   $('#tgl_faktur').datetimepicker();
 
 });
 </script>  
  
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
          <th>ID Penagihan 2</th>
          <th>Nomor Invoice</th>
          <th>Tanggal Penagihan</th>
          <th>Nomor Faktur</th>
          <th>Tanggal Faktur</th>

          <th>Action</th>
        </tr>

      </thead>
      <tbody>
<?php
    require_once('koneksi.php');
    
    $result = mysqli_query($koneksi,"SELECT * FROM penagihan2 order by id_pen2") or die(mysql_error());
    $no=1; 
    while ($data = mysqli_fetch_array($result)) { //fetch the result from query into an array
    ?>
      <tr>
        <td><?php echo $no++; ?></td>         <!--menampilkan nomor dari variabel no-->
        <td><?php echo $data['id_pen2'] ?></td>    <!--menampilkan data id_karyawan dari tabel karyawan-->
        <td><?php echo $data['no_invoice'] ?></td>
        <td><?php echo $data['tgl_pen2'] ?></td>
        <td><?php echo $data['no_faktur'] ?></td>
        <td><?php echo $data['tgl_faktur'] ?></td>
    
        <td>
                        <a href="uangpen2edit.php?id_pen2=<?php echo $data['id_pen2']; ?>"> Edit </a> |
                        <a href="uangpen2del.php?id_pen2=<?php echo $data['id_pen2']; ?>" onClick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" > Delete </a>   
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
