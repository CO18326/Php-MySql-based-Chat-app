<?php
session_start();
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"students");




?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="ram.css">
<title>
Student Login
</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>








</head>
<body   style="background-color:grey">
<div class ="container-fluid">
<div class="col-sm-3" id="box1">
<center><h2>LOGIN FORM</h2>

<form action="index.php" method="post">
<label><b><i>user name</i></b></label><br>
<input name="user" type="text" placeholder="user name"  class="in1 btn btn-outline-info" required  /><br>
<label><b><i>password</i></b></label><br>
<input name="pass" type="password" placeholder="password" class="in1 btn btn-outline-info"  required /><br><br>

<input name="log" type="submit" value="login" id="cd" class="btn btn-danger" /><br><br>
<a href="reg.php"> <input type="button" value="register" id="cd"  class="btn btn-danger" /></a>

</center>

</form>


<?php
if(isset($_POST['log']))
{
	$username=$_POST['user'];
	$password=$_POST['pass'];
	$quer="select * from userwp where User='$username' and Password='$password'";
	$qw_run=mysqli_query($con,$quer);
	if(mysqli_num_rows($qw_run)>0){
		$res=mysqli_fetch_assoc($qw_run);
		$_SESSION['username']=$username;
		$_SESSION['imagename']=$res['imagename'];
		header('location:home.php');
	}
}



?>
<br><br>
</div>

<footer> <center><small> Tributted by <a href="https://ishugambhir2001@gmail.com">Ishan Gambhir</a> </small></center> </footer>
</div>
</body>
</html>