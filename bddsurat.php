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
    <li><a href="page-BDD.php"><i class="fa fa-home"></i><strong><span>Home</span></strong></a></li>

    <li><a href="#pageSubtugas" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-tasks"></i><strong><span>Pengajuan</span></strong><i class="fas fa-caret-square-down"></i></a>
      <ul class="collapse list-unstyled" id="pageSubtugas">
    <li><a href="bddtugas.php"><i class="fa fa-calendar"></i><span>Pengajuan Tugas</span></a></li>
    <li><a href="bddobjek.php"><i class="fas fa-archway"></i><span>Objek Penilaian</span></a></li>
    </li>
    </ul>
   
     <li><a href="#pageSubsurat" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-tasks"></i><strong><span>Surat</span></strong><i class="fas fa-caret-square-down"></i></a>
      <ul class="collapse list-unstyled" id="pageSubsurat">
    <li><a href="bddsurat.php"><i class="fas fa-envelope"></i><span>Data Surat</span></a></li>
    <li><a href="bddspk.php"><i class="fas fa-envelope"></i><span>Surat Perintah Kerja</span></a></li>
    <li><a href="bddspki.php"><i class="far fa-envelope"></i><span>Surat Perintah Kerja Internal</span></a></li>
    <li><a href="bddsrttugas.php"><i class="fas fa-envelope"></i><span>Surat Tugas</span></a></li>
    <li><a href="bddopp.php"><i class="fas fa-envelope"></i><span>OPP</span></a></li>
     </li>
   </ul>

    <li><a href="bddfee.php"><i class="fas fa-dollar-sign"></i><strong><span>Fee</span></strong></a></li>   
    <li><a href="logout.php"><i class="fa fa-power-off" style="color:red"></i><strong><span>Logout</span></strong></a></li>


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
      
      <form action="bddsuratinput.php" method="POST"> 

         <div class="form-group">
       <label for="id_surat">ID Surat : </label>
       <input type="text" class="form-control" id="id_surat" name="id_surat" required="required">  
        </div>         
 

       <div class="form-group">
       <label for="id_spk">SPK : </label>
      <select class="form-control" name="id_spk" id="id_spk" required="">
    <option value="">--SPK--</option>
      <?php
      $a="SELECT * FROM spk";
      $sql=mysqli_query($koneksi, $a);
      while($data=mysqli_fetch_array($sql)){
    ?>
      <option value="<?php echo $data['id_spk']?>"><?php echo "ID SPK : "; echo $data['id_spk']; echo " -- No. SPK : "; echo $data['no_spk']?></option>
     <?php
       }
    ?>
       </select>
       </div>        

        <div class="form-group">
       <label for="id_spki">SPKI : </label>
      <select class="form-control" name="id_spki" id="id_spki" required="">
    <option value="">--SPKI--</option>
      <?php
      $a="SELECT * FROM spki";
      $sql=mysqli_query($koneksi, $a);
      while($data=mysqli_fetch_array($sql)){
    ?>
      <option value="<?php echo $data['id_spki']?>"><?php echo "ID SPKI : "; echo $data['id_spki']; echo " -- No. SPKI : "; echo $data['no_spki']?>
      </option>
     <?php
       }
    ?>
       </select>
       </div>        

       <div class="form-group">
       <label for="id_surat_tugas">Surat Tugas : </label>
      <select class="form-control" name="id_surat_tugas" id="id_surat_tugas" required="">
    <option value="">--SURAT TUGAS--</option>
      <?php
      $a="SELECT * FROM surat_tugas";
      $sql=mysqli_query($koneksi, $a);
      while($data=mysqli_fetch_array($sql)){
    ?>
      <option value="<?php echo $data['id_surat_tugas']?>"><?php echo "ID Surat Tugas : "; echo $data['id_surat_tugas']; echo " -- No. Surat : "; echo $data['no_surat']?>
        
      </option>
     <?php
       }
    ?>
       </select>
       </div>       

        <div class="form-group">
       <label for="id_opp">OPP : </label>
      <select class="form-control" name="id_opp" id="id_opp" required="">
    <option value="">--OPP--</option>
      <?php
      $a="SELECT * FROM opp";
      $sql=mysqli_query($koneksi, $a);
      while($data=mysqli_fetch_array($sql)){
    ?>
      <option value="<?php echo $data['id_opp']?>"><?php echo "ID OPP : "; echo $data['id_opp']; echo " -- No. OPP : "; echo $data['no_opp']?></option>
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

   <script>
$(document).ready(function() {
 
   $('#tgl_spki').datetimepicker();
 
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
          <th>ID Surat</th>
          <th>ID SPK</th>
          <th>ID SPKI</th>
          <th>ID Surat Tugas</th>
          <th>ID OPP</th>

          <th>Action</th>
        </tr>

      </thead>
      <tbody>
<?php
    require_once('koneksi.php');
    
    $result = mysqli_query($koneksi,"SELECT * FROM surat 
      JOIN spk ON surat.id_spk=spk.id_spk
      JOIN spki ON surat.id_spki=spki.id_spki
      JOIN surat_tugas ON surat.id_surat_tugas=surat_tugas.id_surat_tugas
      JOIN opp ON surat.id_opp=opp.id_opp
      order by id_surat") or die(mysqli_error());
    $no=1; 
    while ($data = mysqli_fetch_array($result)) { //fetch the result from query into an array
    ?>
      <tr>
        <td><?php echo $no++; ?></td>         <!--menampilkan nomor dari variabel no-->
        <td><?php echo $data['id_surat'] ?></td>    <!--menampilkan data id_karyawan dari tabel karyawan-->
        <td><?php echo "ID SPK : "; echo $data['id_spk']; echo " -- No. SPK : "; echo $data['no_spk']?></td>
        <td><?php echo "ID SPKI : "; echo $data['id_spki']; echo " -- No. SPKI : "; echo $data['no_spki']?></td>        
        <td><?php echo "ID Surat Tugas : "; echo $data['id_surat_tugas']; echo " -- No. Surat : "; echo $data['no_surat']?></td>        
        <td><?php echo "ID OPP : "; echo $data['id_opp']; echo " -- No. OPP : "; echo $data['no_opp']?></td>        
        <td>
                        <a href="bddsuratedit.php?id_surat=<?php echo $data['id_surat']; ?>"> Edit</a> |
                        <a href="bddsuratdel.php?id_surat=<?php echo $data['id_surat']; ?>" onClick="javascript: return confirm('Anda yakin akan menghapus Surat ini ?')" > Delete </a>   
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

</div>


</body>
</html>
