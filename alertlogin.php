<!DOCTYPE html>
<html>
<link rel='stylesheet' href='css/bootstrap.min.css'>
  <link rel="stylesheet" href="css/style.css">
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<body>

<div class="container" style="margin-top: 20%; margin-bottom: 10%;">
	<div class="alert alert-danger">
   <font size="5px;"> <strong>ALERT!!!</strong> You should <a class="alert-link" style="text-decoration: none;">Login</a> For an access to this page as your authority <strong>OR</strong> You don't have authority for this page. <strong style="cursor: pointer;" onclick="goBack()">Go Back!</strong></font>
  </div>
</div>
</body>
<script>
function goBack() {
    window.history.back();
}
</script>

</html>