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
    <li><a href="#"><i class="fa fa-desktop"></i><span>Desktop</span></a></li>
    <li><a href="#"><i class="fa fa-server"></i><span>Server</span></a></li>
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
    $id = $_GET['id_karyawan'];
    $result = mysql_query("SELECT * FROM karyawan WHERE id_karyawan='$id'") or die(mysql_error());
    $no=1; 
    while ($data = mysql_fetch_array($result)) { //fetch the result from query into an array
    ?>
    <form action="adminupdate.php" method="POST"> 
        <div class="form-group">
       <label for="id_karyawan">ID Karyawan : </label>
       <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" readonly="" value="<?php echo $data['id_karyawan'] ?>">  
        </div>        


        <div class="form-group">
       <label for="id_divisi">ID Divisi : </label>
       <?php $id_divisi = $data['id_divisi']; ?>
       <select class="form-control" id="id_divisi" name="id_divisi" required="required">
        <option>- PILIH DIVISI -</option>
        <option value="1" <?php echo ($id_divisi == '1') ? "selected": "" ?>>Divisi BDD</option>
        <option value="2" <?php echo ($id_divisi == '2') ? "selected": "" ?>>Divisi Keuangan</option>
        <option value="3" <?php echo ($id_divisi == '3') ? "selected": "" ?>>Divisi Administrasi</option>
        <option value="4" <?php echo ($id_divisi == '4') ? "selected": "" ?>>Divisi Teknik</option>
        <option value="5" <?php echo ($id_divisi == '5') ? "selected": "" ?>>Admin</option>
       </select> 
        </div>        

        <div class="form-group">
       <label for="nama">Nama : </label>
       <input type="text" class="form-control" id="nama" name="nama" required="required" value="<?php echo $data['nama'] ?>">  
        </div>       

        <div class="form-group">
       <label>Jenis Kelamin : </label>
       <?php $jk = $data['Jenis_kelamin']; ?>
       <label class="radio-inline"><input type="radio" name="Jenis_kelamin" value="L" checked="" <?php echo ($jk == 'L') ? "checked": "" ?>>Laki-Laki</label>
       <label class="radio-inline"><input type="radio" name="Jenis_kelamin" value="P" <?php echo ($jk == 'P') ? "checked": "" ?>>Perempuan</label>  
        </div>      

        <div class="form-group">
       <label for="email">Email : </label>
       <input type="email" class="form-control" id="email" name="email" required="required" value="<?php echo $data['email'] ?>">  
        </div>      

        <div class="form-group">
        <label for="alamat">Alamat : </label>
        <textarea class="form-control" id="alamat" name="alamat" required="required" rows="3" style="resize: none;"><?php echo $data['alamat'] ?></textarea>

        </div>      

        <div class="form-group">
        <label for="no_telp">No. Telpon : </label>
        <input type="text" class="form-control" id="no_telp" name="no_telp" required="required" value="<?php echo $data['no_telp'] ?>">
        </div> 

        <div class="form-group">
       <label for="password">Password : </label>
       <input type="password" class="form-control" id="password" name="password" required="required" placeholder="Re-Enter Your Password" >  
        </div>   

        <div class="form-group">
        <button type="submit" value="update" class="btn btn-primary">Update</button>
        </div>     

  </form>

</div>
</div>
    </div>
  </div>
</div>
  <script src='js/jquery.min.js'></script>
  <script src="js/index.js"></script>
</body>
</html>
