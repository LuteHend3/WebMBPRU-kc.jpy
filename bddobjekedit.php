<?php
session_start();
include"koneksi.php";
if (!isset($_SESSION['email'])) {
  header("location: alertlogin.php");
}
if ($_SESSION['id_divisi']!="1") {
 // die("Anda bukan Business Development Dept. (BDD)");
    header("location: alertlogin.php");
}
?>
<html lang="en">
<head>

   <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
  <title>BDD Menu</title>
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
    Ini Dashboard BDD
  </div>
</div>


<div class="sidebar">
  <ul>
   <li><a href="page-BDD.php"><i class="fa fa-home"></i><span>Home</span></a></li>
    <li><a href="#"><i class="fas fa-tasks"></i><span>Pengajuan</span></a></li>
    <li><a href="bddspki.php"><i class="far fa-envelope"></i><span>Surat Perintah Kerja Internal</span></a></li>
    <li><a href="bddspk.php"><i class="fas fa-envelope"></i><span>Surat Perintah Kerja</span></a></li>
    <li><a href="bddtugas.php"><i class="fa fa-calendar"></i><span>Pengajuan Tugas</span></a></li>
    <li><a href="bddobjek.php"><i class="fas fa-envelope"></i><span>Objek Penilaian</span></a></li>
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
    $id = $_GET['id_objek'];
    $result = mysql_query("SELECT * FROM objek_penilaian WHERE id_objek='$id'") or die(mysql_error());
    $no=1; 
    while ($data = mysql_fetch_array($result)) { //fetch the result from query into an array
    ?>
    <form action="bddobjekupdate.php" method="POST"> 
       <div class="form-group">
       <label for="id_objek">ID Objek : </label>
       <input type="text" class="form-control" id="id_objek" name="id_objek" readonly="" required="required" value="<?php echo $data['id_objek'] ?>">  
        </div>        


        <div class="form-group">
        <label for="alamat_objek">Alamat : </label>
        <textarea class="form-control" id="alamat_objek" name="alamat_objek" required="required" rows="3" style="resize: none;"><?php echo $data['alamat_objek'] ?></textarea>
        </div>  

       
         <div class="form-group">
       <label for="jumlah">Jumlah : </label>
       <input type="text" class="form-control" id="jumlah" name="jumlah" required="required" value="<?php echo $data['jumlah'] ?>">  
        </div>    

         <div class="form-group">
       <label for="tipe">Tipe : </label>
       <input type="text" class="form-control" id="tipe" name="tipe" required="required" value="<?php echo $data['tipe'] ?>">  
        </div>  

         <div class="form-group">
       <label for="lt">LT : </label>
       <input type="text" class="form-control" id="lt" name="lt" required="required" value="<?php echo $data['lt'] ?>">  
        </div>   

        <div class="form-group">
       <label for="lb">LB : </label>
       <input type="text" class="form-control" id="lb" name="lb" required="required" value="<?php echo $data['lb'] ?>">  
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
      
      <form action="bddobjekinput.php" method="POST"> 
        <div class="form-group">
       <label for="id_objek">ID Objek : </label>
       <input type="text" class="form-control" id="id_objek" name="id_objek" required="required">  
        </div>        


        <div class="form-group">
        <label for="alamat_objek">Alamat : </label>
        <textarea class="form-control" id="alamat_objek" name="alamat_objek" required="required" rows="3" style="resize: none;"></textarea>
        </div>  

       
 <div class="form-group">
       <label for="jumlah">Jumlah : </label>
       <input type="text" class="form-control" id="jumlah" name="jumlah" required="required">  
        </div>    

         <div class="form-group">
       <label for="tipe">Tipe : </label>
       <input type="text" class="form-control" id="tipe" name="tipe" required="required">  
        </div>  

         <div class="form-group">
       <label for="lt">LT : </label>
       <input type="text" class="form-control" id="lt" name="lt" required="required">  
        </div>   

        <div class="form-group">
       <label for="lb">LB : </label>
       <input type="text" class="form-control" id="lb" name="lb" required="required">  
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
          <th>ID SPKI</th>
          <th>Nomor SPKI</th>
          <th>Tanggal SPKI</th>

          <th>Action</th>
        </tr>

      </thead>
      <tbody>
<?php
    require_once('koneksi.php');
    
    $result = mysql_query("SELECT * FROM spki order by id_spki") or die(mysql_error());
    $no=1; 
    while ($data = mysql_fetch_array($result)) { //fetch the result from query into an array
    ?>
      <tr>
        <td><?php echo $no++; ?></td>         <!--menampilkan nomor dari variabel no-->
        <td><?php echo $data['id_spki'] ?></td>    <!--menampilkan data id_karyawan dari tabel karyawan-->
        <td><?php echo $data['no_spki']?></td>
        <td><?php echo $data['tgl_spki'] ?></td>        
        <td>
                        <a href="bddspkiedit.php?id_spki=<?php echo $data['id_spki']; ?>"> Edit</a> |
                        <a href="bddspkidel.php?id_spki=<?php echo $data['id_spki']; ?>" onClick="javascript: return confirm('Anda yakin akan menghapus SPK ini ?')" > Delete </a>   
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
 
   $('#tgl_spki').datetimepicker();
 
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
