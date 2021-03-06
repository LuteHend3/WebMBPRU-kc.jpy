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

   <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
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
    <li><a href="#"><i class="fa fa-calendar"></i><span>Calendar</span></a></li>
    <li><a href="#"><i class="fas fa-envelope"></i><span>Messages</span></a></li>
    <li><a href="#"><i class="fa fa-table"></i><span>Data Table</span></a></li>
    <li><a href="logout.php"><i class="fa fa-power-off" style="color:red"></i><span>Logout</span></a></li>

</div>

<!-- Content -->
<div class="main">
  <div class="hipsum">


        <div class="panel panel-default">
  <div class="panel-heading">EDIT DATA</div>
  <div class="panel-body">
         <?php
    require_once('koneksi.php');
    $id = $_GET['id_pen1'];
    $result = mysqli_query($koneksi,"SELECT * FROM penagihan1 WHERE id_pen1='$id'") or die(mysqli_error());
    $no=1; 
    while ($data = mysqli_fetch_array($result)) { //fetch the result from query into an array
    ?>
    <form action="uangpen1update.php" method="POST"> 
        <div class="form-group">
       <label for="id_pen1">ID Penagihan 1 : </label>
       <input type="text" class="form-control" id="id_pen1" name="id_pen1" readonly="" value="<?php echo $data['id_pen1'] ?>">  
        </div>        

 <div class="form-group">
       <label for="no_kwitansi">Nomor Kwitansi : </label>
       <input type="text" class="form-control" id="no_kwitansi" name="no_kwitansi" required="required" value="<?php echo $data['no_kwitansi'] ?>">  
        </div>  

       
 <div class="form-group">
       <label for="tgl_pen1">Tanggal Penagihan 1 : </label>
       <input type="text" class="form-control" id="tgl_pen1" name="tgl_pen1" required="required" value="<?php echo $data['tgl_pen1'] ?>">  
        </div>   

        <div class="form-group">
        <button type="submit" value="update" class="btn btn-primary">Update</button>
        </div>     

  </form>

</div>
</div>
       <?php 
    }
      ?>

     
  <div class="panel-group">
  <div class="panel panel-default" >
    <div class="panel-heading" style="background-color: rgb(51, 122, 183);">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse1" style="color: white;">+ INPUT DATA</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse" style="margin-left: 10px; margin-right: 10px; padding-bottom: 5px; ">
      
    <form action="uangpen1input.php" method="POST"> 
        <div class="form-group">
       <label for="id_pen1">ID Penagihan 1 : </label>
       <input type="text" class="form-control" id="id_pen1" name="id_pen1" required="required">  
        </div>        


        <div class="form-group">
       <label for="no_kwitansi">Nomor Kwitansi : </label>
       <input type="text" class="form-control" id="no_kwitansi" name="no_kwitansi" required="required">  
        </div>  

       
 <div class="form-group">
       <label for="tgl_pen1">Tanggal Penagihan 1 : </label>
       <input type="text" class="form-control" id="tgl_pen1" name="tgl_pen1" required="required">  
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
          <th>ID Penagihan 1</th>
          <th>Nomor Kwitansi</th>
          <th>Tanggal Penagihan</th>

          <th>Action</th>
        </tr>

      </thead>
      <tbody>
<?php
    require_once('koneksi.php');
    
    $result = mysqli_query($koneksi,"SELECT * FROM penagihan1 order by id_pen1") or die(mysql_error());
    $no=1; 
    while ($data = mysqli_fetch_array($result)) { //fetch the result from query into an array
    ?>
      <tr>
        <td><?php echo $no++; ?></td>         <!--menampilkan nomor dari variabel no-->
        <td><?php echo $data['id_pen1'] ?></td>    <!--menampilkan data id_karyawan dari tabel karyawan-->
        <td><?php echo $data['no_kwitansi'] ?></td>
        <td><?php echo $data['tgl_pen1'] ?></td>
    
        <td>
                        <a href="uangpen1edit.php?id_pen1=<?php echo $data['id_pen1']; ?>"> Edit </a> |
                        <a href="uangpen1del.php?id_pen1=<?php echo $data['id_pen1']; ?>" onClick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" > Delete </a>   
                    </td>
    
      </tr>
      <?php 
    }
      ?>
      </tbody>
    </table>
    </div>
  </div>

<script>
$(document).ready(function() {
 
   $('#tgl_pen1').datetimepicker();
 
 });
 </script>   

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


</body>
</html>
