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
        <div class="panel panel-default">
  <div class="panel-heading">EDIT DATA</div>
  <div class="panel-body">
         <?php
    require_once('koneksi.php');
    $id = $_GET['id_tugas'];
    $result = mysqli_query($koneksi,"SELECT * FROM pemberi_tugas WHERE id_tugas='$id'") or die(mysqli_error());
    $no=1; 
    while ($data = mysqli_fetch_array($result)) { //fetch the result from query into an array
    ?>
    <form action="bddtugasupdate.php" method="POST"> 
       <div class="form-group">
       <label for="id_tugas">ID Tugas : </label>
       <input type="text" class="form-control" id="id_tugas" name="id_tugas" required="required" readonly="" value="<?php echo $data['id_tugas'] ?>">  
        </div>        


        <div class="form-group">
       <label for="nama_bank">Nama Bank: </label>
       <input type="text" class="form-control" id="nama_bank" name="nama_bank" required="required" value="<?php echo $data['nama_bank'] ?>">  
        </div>  

       
        <div class="form-group">
       <label for="cabang">Cabang Bank : </label>
       <input type="text" class="form-control" id="cabang" name="cabang" required="required" value="<?php echo $data['cabang'] ?>">  
        </div>   

        <div class="form-group">
        <label for="alamat_bank">Alamat Bank : </label>
        <textarea class="form-control" id="alamat_bank" name="alamat_bank" required="required" rows="3" style="resize: none;"><?php echo $data['alamat_bank'] ?></textarea>
        </div>   

                <div class="form-group">
       <label for="npwp">NPWP : </label>
       <input type="text" class="form-control" id="npwp" name="npwp" required="required" value="<?php echo $data['npwp'] ?>">  
        </div> 

                <div class="form-group">
       <label for="tipe_bank">Tipe Bank : </label>
       <input type="text" class="form-control" id="tipe_bank" name="tipe_bank" required="required" value="<?php echo $data['tipe_bank'] ?>">  
        </div> 

                <div class="form-group">
       <label for="badan_usaha">Badan Usaha : </label>
       <input type="text" class="form-control" id="badan_usaha" name="badan_usaha" required="required" value="<?php echo $data['badan_usaha'] ?>">  
        </div> 

                <div class="form-group">
       <label for="jenis_pekerjaan">Jenis Pekerjaan : </label>
       <input type="text" class="form-control" id="jenis_pekerjaan" name="jenis_pekerjaan" required="required" value="<?php echo $data['jenis_pekerjaan'] ?>">  
        </div> 

                <div class="form-group">
       <label for="org_bank">Pekerja Bank : </label>
       <input type="text" class="form-control" id="org_bank" name="org_bank" required="required" value="<?php echo $data['org_bank'] ?>">  
        </div> 

                <div class="form-group">
       <label for="email">Email : </label>
       <input type="email" class="form-control" id="email" name="email" required="required" value="<?php echo $data['email'] ?>">  
        </div> 

          <div class="form-group">
        <label for="tujuan_penilaian">Tujuan Penilaian : </label>
        <textarea class="form-control" id="tujuan_penilaian" name="tujuan_penilaian" required="required" rows="3" style="resize: none;"><?php echo $data['tujuan_penilaian'] ?></textarea>
        </div>   

                <div class="form-group">
       <label for="tgl_spki">Jenis Laporan : </label>
       <input type="text" class="form-control" id="jenis_laporan" name="jenis_laporan" required="required" value="<?php echo $data['jenis_laporan'] ?>">  
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
      
       <form action="bddtugasinput.php" method="POST"> 
        <div class="form-group">
       <label for="id_tugas">ID Tugas : </label>
       <input type="text" class="form-control" id="id_tugas" name="id_tugas" required="required">  
        </div>        


        <div class="form-group">
       <label for="nama_bank">Nama Bank: </label>
       <input type="text" class="form-control" id="nama_bank" name="nama_bank" required="required">  
        </div>  

       
        <div class="form-group">
       <label for="cabang">Cabang Bank : </label>
       <input type="text" class="form-control" id="cabang" name="cabang" required="required">  
        </div>   

        <div class="form-group">
        <label for="alamat_bank">Alamat Bank : </label>
        <textarea class="form-control" id="alamat_bank" name="alamat_bank" required="required" rows="3" style="resize: none;"></textarea>
        </div>   

                <div class="form-group">
       <label for="npwp">NPWP : </label>
       <input type="text" class="form-control" id="npwp" name="npwp" required="required">  
        </div> 

                <div class="form-group">
       <label for="tipe_bank">Tipe Bank : </label>
       <input type="text" class="form-control" id="tipe_bank" name="tipe_bank" required="required">  
        </div> 

                <div class="form-group">
       <label for="badan_usaha">Badan Usaha : </label>
       <input type="text" class="form-control" id="badan_usaha" name="badan_usaha" required="required">  
        </div> 

                <div class="form-group">
       <label for="jenis_pekerjaan">Jenis Pekerjaan : </label>
       <input type="text" class="form-control" id="jenis_pekerjaan" name="jenis_pekerjaan" required="required">  
        </div> 

                <div class="form-group">
       <label for="org_bank">Pekerja Bank : </label>
       <input type="text" class="form-control" id="org_bank" name="org_bank" required="required">  
        </div> 

                <div class="form-group">
       <label for="email">Email : </label>
       <input type="email" class="form-control" id="email" name="email" required="required">  
        </div> 

          <div class="form-group">
        <label for="tujuan_penilaian">Tujuan Penilaian : </label>
        <textarea class="form-control" id="tujuan_penilaian" name="tujuan_penilaian" required="required" rows="3" style="resize: none;"></textarea>
        </div>   

                <div class="form-group">
       <label for="tgl_spki">Jenis Laporan : </label>
       <input type="text" class="form-control" id="jenis_laporan" name="jenis_laporan" required="required">  
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
          <th>ID Tugas</th>
          <th>Nama Bank</th>
          <th>Cabang</th>
          <th>Alamat Bank</th>
          <th>NPWP</th>
          <th>Tipe Bank</th>
          <th>Badan Usaha</th>
          <th>Jenis Pekerjaan</th>
          <th>Pekerja Bank</th>
          <th>Email</th>
          <th>Tujuan Penilaian</th>         
          <th>Jenis Laporan</th> 
          <th>Action</th>
        </tr>

      </thead>
      <tbody>
<?php
    require_once('koneksi.php');
    
    $result = mysqli_query($koneksi,"SELECT * FROM pemberi_tugas order by id_tugas") or die(mysqli_error());
    $no=1; 
    while ($data = mysqli_fetch_array($result)) { //fetch the result from query into an array
    ?>
      <tr>
        <td><?php echo $no++; ?></td>         <!--menampilkan nomor dari variabel no-->
        <td><?php echo $data['id_tugas'] ?></td>    <!--menampilkan data id_karyawan dari tabel karyawan-->
        <td><?php echo $data['nama_bank']?></td>
        <td><?php echo $data['cabang'] ?></td>        
        <td><?php echo $data['alamat_bank'] ?></td>        
        <td><?php echo $data['npwp'] ?></td>        
        <td><?php echo $data['tipe_bank'] ?></td>        
        <td><?php echo $data['badan_usaha'] ?></td>        
        <td><?php echo $data['jenis_pekerjaan'] ?></td>        
        <td><?php echo $data['org_bank'] ?></td>        
        <td><?php echo $data['email'] ?></td>        
        <td><?php echo $data['tujuan_penilaian'] ?></td>        
        <td><?php echo $data['jenis_laporan'] ?></td>        
        <td>
                        <a href="bddspkiedit.php?id_tugas=<?php echo $data['id_tugas']; ?>"> Edit</a> |
                        <a href="bddtugasdel.php?id_tugas=<?php echo $data['id_tugas']; ?>" onClick="javascript: return confirm('Anda yakin akan menghapus Tugas ini ?')" > Delete </a>   
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
