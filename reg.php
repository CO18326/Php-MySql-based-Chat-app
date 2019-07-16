<?php

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"students");



?>
<html>
<head>
<link rel="stylesheet" href="ram.css">
<title>
Registration Page
</title>



<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>










</head>
<body style="background-color:grey">
<div class="container-fluid">
<div class="row">
<div id="box1" class= "col-sm-3">
<center><h2>Registration</h2>
<form action="reg.php" method="post" enctype="multipart/form-data">

<img src="ccetLogoWhite.png" name="img" height="150px" width="150px"/>
<br/>
<input type="file" accept=".jpeg,.png,.jpg" name="image" value="upload latest photograph" onchange="imageloader" class="btn btn-success btn-primary btn-block" required />
<br/>

<label><b><i>user name</i></b></label><br>
<input name="username" type="text" placeholder="user name" class="in1 btn btn-outline-info"  required /><br>
<label><b><i>email</i></b></label><br>
<input name="email" type="email" placeholder="email" class="in1 btn btn-outline-info" required /><br>
<label><b><i>password</i></b></label><br>
<input name="password" type="password" placeholder="password" class="in1 btn btn-outline-info" required /><br>

<input name="er" type="submit" value="register" class ="b1 btn btn-danger" />
<a href="index.php"><input type="button" value="back to sign in" class="b1 btn btn-danger" /></a>
</center>
</form>
<br><br>
</div>

</div>
<footer> <center><small> Tributted by <a href="https://ishugambhir2001@gmail.com">Ishan Gambhir</a> </small></center> </footer>
</div>
<?php
if(isset($_POST['er'])){

$username=$_POST['username'];

$mn="create table `".$username."` (id int(2) AUTO_INCREMENT,messages varchar(30),froma varchar(30), PRIMARY KEY (id))";
$password=$_POST['password'];
$filename=$_FILES['image']['name'];
$tempname=$_FILES['image']['tmp_name'];
$filesize=$_FILES['image']['size'];
$directory='uploads/';
$target_file=$directory.$filename;
$ER=mysqli_query($con,$mn);
move_uploaded_file($tempname,$target_file);

/*$querry=" select * from  userwp where User=='$username'";
$query_run=mysqli_query($con,$querry);
$ew=mysqli_use_result($con);*/

//if(mysqli_num_rows($ew)>0)
$querry="insert into userwp values ('$username','$password','$target_file')";
$query_run=mysqli_query($con,$querry);
$to=$_POST['email'];
$message="<h1> Hello! '$username' </h1>";
$subject="welcome";
$header="Content-type: text/html\r\n";
mail($to,$subject,$message,$header);

}

?>
</body>
</html>