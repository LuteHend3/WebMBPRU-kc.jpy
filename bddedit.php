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
    $id = $_GET['id_bdd'];
    $result = mysqli_query($koneksi,"SELECT * FROM bdd WHERE id_bdd='$id'") or die(mysqli_error());
    $no=1; 
    while ($data = mysqli_fetch_array($result)) { //fetch the result from query into an array
    ?>
    <form action="bddupdate.php" method="POST"> 
       <div class="form-group">
       <label for="id_bdd">ID BDD : </label>
       <input type="text" class="form-control" id="id_bdd" name="id_bdd" readonly="" value="<?php echo $data['id_bdd'] ?>">  
        </div>        

         <div class="form-group">
       <label for="id_surat">Surat: </label>
      <select class="form-control" name="id_surat" id="id_surat" required="">
    <option>- SURAT -</option>
    <?php
      $asurat="SELECT * FROM surat";     
      $sqlsurat=mysqli_query($koneksi, $asurat);
      //$id_surat = $datasurat['id_surat'];
     while($datasurat=mysqli_fetch_array($sqlsurat)){
  ?>
        <option value="<?php echo $datasurat['id_surat']; ?>" <?php if ($datasurat['id_surat'] == $data['id_surat']) { echo 'selected'; } ?>><?php echo "ID Surat : "; echo $datasurat['id_surat']?></option>
<?php } ?>
       </select> 
        </div>   

    

              <div class="form-group">
       <label for="id_tugas">Pengajuan Tugas: </label>
      <select class="form-control" name="id_tugas" id="id_tugas" required="">
    <option>- PENGAJUAN TUGAS -</option>
    <?php
      $atugas="SELECT * FROM pemberi_tugas";
      $sqltugas=mysqli_query($koneksi, $atugas);
     while($datatugas=mysqli_fetch_array($sqltugas)){
  ?>
        <option value="<?php echo $datatugas['id_tugas']; ?>" <?php if ($datatugas['id_tugas'] == $data['id_tugas']) { echo 'selected'; } ?>><?php echo "ID Tugas : "; echo $datatugas['id_tugas']; echo " -- No. NPWP : "; echo $datatugas['npwp']?>
      </option>
<?php } ?>
       </select> 
        </div>        


         <div class="form-group">
       <label for="id_objek">Objek Penilaian: </label>
      <select class="form-control" name="id_objek" id="id_objek" required="">
    <option>- OBJEK PENILAIAN -</option>
     <?php
      $aobj="SELECT * FROM objek_penilaian";
      //$id_objek = $dataobj['id_objek'];
      $sqlobj=mysqli_query($koneksi, $aobj);
     while($dataobj=mysqli_fetch_array($sqlobj)){
  ?>
        <option value="<?php echo $dataobj['id_objek']; ?>" <?php if ($dataobj['id_objek'] == $data['id_objek']) { echo 'selected'; } ?>><?php echo "ID Objek : "; echo $dataobj['id_objek']; echo " -- Alamat "; echo $dataobj['alamat_objek']?> 
      </option>
<?php } ?>
       </select> 
        </div>      

         <div class="form-group">
       <label for="id_fee">Fee : </label>
       <select class="form-control" id="id_fee" name="id_fee" required="required">
                <option>- FEE -</option>
                 <?php
      $afee="SELECT * FROM fee";
      $sqlfee=mysqli_query($koneksi, $afee);
      //$id_fee = $datafee['id_fee'];
     while($datafee=mysqli_fetch_array($sqlfee)){
  ?>
        <option value="<?php echo $datafee['id_fee']; ?>" <?php if ($datafee['id_fee'] == $data['id_fee']) { echo 'selected'; } ?>><?php echo "ID Fee : "; echo $datafee['id_fee']; echo " -- Total Rp."; echo $datafee['total']?></option>
<?php } ?>
       </select> 
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
      
     <form action="bddinput.php" method="POST"> 
        <div class="form-group">
       <label for="id_bdd">ID BDD : </label>
       <input type="text" class="form-control" id="id_bdd" name="id_bdd" required="required">  
        </div>        
      

       <div class="form-group">
       <label for="id_surat">Surat : </label>
      <select class="form-control" name="id_surat" id="id_surat" required="">
    <option value="">--Surat--</option>
      <?php
      $a="SELECT * FROM surat";
      $sql=mysqli_query($koneksi, $a);
      while($data=mysqli_fetch_array($sql)){
    ?>
      <option value="<?php echo $data['id_surat']?>"><?php echo "ID Surat : "; echo $data['id_surat']?></option>
     <?php
       }
    ?>
       </select>
       </div>        

        <div class="form-group">
       <label for="id_tugas">Pemberi Tugas : </label>
      <select class="form-control" name="id_tugas" id="id_tugas" required="">
    <option value="">--Pemberi Tugas--</option>
      <?php
      $a="SELECT * FROM pemberi_tugas";
      $sql=mysqli_query($koneksi, $a);
      while($data=mysqli_fetch_array($sql)){
    ?>
      <option value="<?php echo $data['id_tugas']?>"><?php echo "ID Tugas : "; echo $data['id_tugas']; echo " -- No. NPWP : "; echo $data['npwp']?>
        
      </option>
     <?php
       }
    ?>
       </select>
       </div>        

       <div class="form-group">
       <label for="id_objek">Objek Penilaian : </label>
      <select class="form-control" name="id_objek" id="id_objek" required="">
    <option value="">--Objek Penilaian--</option>
      <?php
      $a="SELECT * FROM objek_penilaian";
      $sql=mysqli_query($koneksi, $a);
      while($data=mysqli_fetch_array($sql)){
    ?>
      <option value="<?php echo $data['id_objek']?>"><?php echo "ID Objek : "; echo $data['id_objek']; echo " -- Alamat "; echo $data['alamat_objek']?>

      </option>
     <?php
       }
    ?>
       </select>
       </div>       

       <div class="form-group">
       <label for="id_fee">Fee : </label>
      <select class="form-control" name="id_fee" id="id_fee" required="">
    <option value="">--FEE--</option>
      <?php
      $a="SELECT * FROM fee";
      $sql=mysqli_query($koneksi, $a);
      while($data=mysqli_fetch_array($sql)){
    ?>
      <option value="<?php echo $data['id_fee']?>"><?php echo "ID Fee : "; echo $data['id_fee']; echo " -- Total Rp."; echo $data['total']?>
        
      </option>
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
          <th>ID BDD</th>
          <th>ID Surat</th>
          <th>ID Pemberi Tugas</th>
          <th>ID Objek Penilaian</th>
          <th>ID Fee</th>
          <th>Action</th>
        </tr>

      </thead>
      <tbody>
<?php
    require_once('koneksi.php');
    
    $result = mysqli_query($koneksi,"SELECT * FROM bdd order by id_bdd") or die(mysql_error());
    $no=1; 
    while ($data = mysqli_fetch_array($result)) { //fetch the result from query into an array
    ?>
      <tr>
         <td><?php echo $no++; ?></td>         <!--menampilkan nomor dari variabel no-->
        <td><?php echo $data['id_bdd'] ?></td>    <!--menampilkan data id_karyawan dari tabel karyawan-->
        <td><?php echo "ID Surat : "; echo $data['id_surat']?></td>     
        <td><?php echo "ID Tugas : "; echo $data['id_tugas']; echo " -- No. NPWP : "; echo $data['npwp']?></td>     
        <td><?php echo "ID Objek : "; echo $data['id_objek']; echo " -- Alamat "; echo $data['alamat_objek']?></td> 
        <td><?php echo "ID Fee : "; echo $data['id_fee']; echo " -- Total Rp."; echo $data['total']?></td>     
        <td>
                        <a href="bddedit.php?id_bdd=<?php echo $data['id_bdd']; ?>"> Edit </a> |
                        <a href="bdddel.php?id_bdd=<?php echo $data['id_bdd']; ?>" onClick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" > Delete </a>   
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
