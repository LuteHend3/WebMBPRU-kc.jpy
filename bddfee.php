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
    <li><a href="bddobjek.php"><i class="fas fa-archway"></i><span>Objek Penilaian</span></a></li>
    <li><a href="bddfee.php"><i class="fas fa-dollar-sign"></i><span>Fee</span></a></li>
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
      
      <form action="bddfeeinput.php" method="POST"> 
        <div class="form-group">
       <label for="id_fee">ID Fee: </label>
       <input type="text" class="form-control" id="id_fee" name="id_fee" required="required">  
        </div>        


        <div class="form-group">
       <label for="pro_fee">Pro Fee: </label>
       <input type="text" class="form-control" id="pro_fee" name="pro_fee" onkeyup="sum();" required="required">  
        </div>   

       
        <div class="form-group">
       <label for="transport">Transport : </label>
       <input type="text" class="form-control" id="transport" name="transport" onkeyup="sum();" required="required">  
        </div>    

         <div class="form-group">
       <label for="fee_bank">Fee bank : </label>
       <input type="text" class="form-control" id="fee_bank" name="fee_bank" onkeyup="sum();" required="required">  
        </div>  

         <div class="form-group">
       <label for="ppn">PPN : </label>
       <input type="text" class="form-control" id="ppn" name="ppn" onkeyup="sum();" required="required">  
        </div>   

        <div class="form-group">
       <label for="fee_luar">Fee Luar : </label>
       <input type="text" class="form-control" id="fee_luar" name="fee_luar" onkeyup="sum();" required="required">  
        </div>   

        <div class="form-group">
       <label for="total">Total : </label>
       <input type="text" class="form-control" id="total" name="total" required="required">  
        </div>      

        <div class="form-group">
        <button type="submit" value="simpan" class="btn btn-primary">Input</button>
        <button type="Reset" class="btn btn-warning">Reset</button>
        </div>     

  </form>

   <script>
$(document).ready(function() {
 
   $('#tgl_spk').datetimepicker();
 
 });
 </script>    


 <script>
function sum() {
      var txtFirstNumberValue = document.getElementById('pro_fee').value;
      var txtSecondNumberValue = document.getElementById('transport').value;
      var txtThirdNumberValue = document.getElementById('fee_bank').value;
      var txtFourthNumberValue = document.getElementById('ppn').value;
      var txtFifthNumberValue = document.getElementById('fee_luar').value;
      var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue) + parseInt(txtThirdNumberValue)  + parseInt(txtFourthNumberValue)  + parseInt(txtFifthNumberValue);
      if (!isNaN(result)) {
         document.getElementById('total').value = result;
      }
}
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
          <th>ID Fee</th>
          <th>Pro Fee</th>
          <th>Transport</th>
          <th>Fee Bank</th>
          <th>PPN</th>
          <th>Fee Luar</th>
          <th>Total</th>

          <th>Action</th>
        </tr>

      </thead>
      <tbody>
<?php
    require_once('koneksi.php');
    
    $result = mysqli_query($koneksi,"SELECT * FROM fee order by id_fee") or die(mysqli_error());
    $no=1; 
    while ($data = mysqli_fetch_array($result)) { //fetch the result from query into an array
    ?>
      <tr>
        <td><?php echo $no++; ?></td>         <!--menampilkan nomor dari variabel no-->
        <td><?php echo $data['id_fee'] ?></td>    <!--menampilkan data id_karyawan dari tabel karyawan-->
        <td><?php echo $data['pro_fee']?></td>
        <td><?php echo $data['transport'] ?></td>        
        <td><?php echo $data['fee_bank'] ?></td>        
        <td><?php echo $data['ppn'] ?></td>        
        <td><?php echo $data['fee_luar'] ?></td>        
        <td><?php echo $data['total'] ?></td>        
        <td>
                        <a href="bddfeeedit.php?id_fee=<?php echo $data['id_fee']; ?>"> Edit</a> |
                        <a href="bddfeedel.php?id_fee=<?php echo $data['id_fee']; ?>" onClick="javascript: return confirm('Anda yakin akan menghapus Fee ini ?')" > Delete </a>   
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
