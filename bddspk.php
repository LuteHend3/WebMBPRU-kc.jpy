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
    <li><a href="#"><i class="fa fa-calendar"></i><span>Tugas</span></a></li>
    <li><a href="#"><i class="fas fa-envelope"></i><span>Messages</span></a></li>
    <li><a href="#"><i class="fa fa-table"></i><span>Data Table</span></a></li>
    <li><a href="logout.php"><i class="fa fa-power-off" style="color:red"></i><span>Logout</span></a></li>
</div>

<!-- Content -->
<div class="main">
  <div class="hipsum">
    <div class="jumbotron">
      <h1 id="hello,-world!">Hello, world!<a class="anchorjs-link" href="#hello,-world!"><span class="anchorjs-icon"></span></a></h1>
      <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
      <p><a class="btn btn-primary" href="#" role="button">Learn more</a></p>
    </div>
    <p>Keffiyeh banjo keytar selfies. Actually plaid PBR&amp;B, High Life dreamcatcher kale chips master cleanse craft beer messenger bag locavore Brooklyn Blue Bottle. Freegan literally brunch kale chips small batch. Etsy iPhone gentrify photo booth. Lomo
      keffiyeh vinyl, distillery pop-up messenger bag kale chips post-ironic DIY 90's keytar. Intelligentsia next level Pitchfork forage vinyl Marfa, normcore heirloom. Drinking vinegar asymmetrical roof party, yr artisan Carles mixtape jean shorts.</p>

     
  <div class="panel-group">
  <div class="panel panel-default" >
    <div class="panel-heading" style="background-color: rgb(51, 122, 183);">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse1" style="color: white;">+ INPUT DATA</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse" style="margin-left: 10px; margin-right: 10px; padding-bottom: 5px; ">
      
      <form action="bddspkinput.php" method="POST"> 
        <div class="form-group">
       <label for="id_spk">ID SPK : </label>
       <input type="text" class="form-control" id="id_spk" name="id_spk" required="required">  
        </div>        


        <div class="form-group">
       <label for="no_spk">Nomor SPK : </label>
       <input type="text" class="form-control" id="no_spk" name="no_spk" required="required">  
        </div>  

       
 <div class="form-group">
       <label for="tgl_spk">Tanggal SPK : </label>
       <input type="text" class="form-control" id="tgl_spk" name="tgl_spk" required="required">  
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
          <th>ID SPK</th>
          <th>Nomor SPK</th>
          <th>Tanggal SPK</th>

          <th>Action</th>
        </tr>

      </thead>
      <tbody>
<?php
    require_once('koneksi.php');
    
    $result = mysql_query("SELECT * FROM spk order by id_spk") or die(mysql_error());
    $no=1; 
    while ($data = mysql_fetch_array($result)) { //fetch the result from query into an array
    ?>
      <tr>
        <td><?php echo $no++; ?></td>         <!--menampilkan nomor dari variabel no-->
        <td><?php echo $data['id_spk'] ?></td>    <!--menampilkan data id_karyawan dari tabel karyawan-->
        <td><?php echo $data['no_spk']?></td>
        <td><?php echo $data['tgl_spk'] ?></td>        
        <td>
                        <a href="bddspkedit.php?id_spk=<?php echo $data['id_spk']; ?>"> Edit</a> |
                        <a href="bddspkdel.php?id_spk=<?php echo $data['id_spk']; ?>" onClick="javascript: return confirm('Anda yakin akan menghapus SPK ini ?')" > Delete </a>   
                    </td>
    
      </tr>
      <?php 
    }
      ?>
      </tbody>
    </table>

    <p>Slow-carb fanny pack yr Brooklyn gentrify. Fanny pack keffiyeh taxidermy, ugh viral polaroid craft beer. +1 distillery Truffaut typewriter tousled crucifix, lo-fi butcher normcore skateboard. Drinking vinegar ugh whatever sriracha. Synth tofu viral
      butcher flexitarian. 3 wolf moon Schlitz plaid small batch kale chips blog. Fingerstache selfies freegan, Helvetica Neutra Brooklyn semiotics cred narwhal beard tousled leggings.</p>
    <div class="row">
      <div class="col-sm-6">
        <p>Slow-carb fanny pack yr Brooklyn gentrify. Fanny pack keffiyeh taxidermy, ugh viral polaroid craft beer. +1 distillery Truffaut typewriter tousled crucifix, lo-fi butcher normcore skateboard. Drinking vinegar ugh whatever sriracha. Synth tofu
          viral butcher flexitarian. 3 wolf moon Schlitz plaid small batch kale chips blog. Fingerstache selfies freegan, Helvetica Neutra Brooklyn semiotics cred narwhal beard tousled leggings.</p>
      </div>
      <div class="col-sm-6">
        <p>Slow-carb fanny pack yr Brooklyn gentrify. Fanny pack keffiyeh taxidermy, ugh viral polaroid craft beer. +1 distillery Truffaut typewriter tousled crucifix, lo-fi butcher normcore skateboard. Drinking vinegar ugh whatever sriracha. Synth tofu
          viral butcher flexitarian. 3 wolf moon Schlitz plaid small batch kale chips blog. Fingerstache selfies freegan, Helvetica Neutra Brooklyn semiotics cred narwhal beard tousled leggings.</p>
      </div>
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
