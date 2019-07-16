<?php

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"students");
session_start();


?>
<html>
<head>
<link rel="stylesheet" href="ram.css">
<title>
Home page
</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body style="background-color:grey">
<div class="container-fluid">
<div class="row">
<div id="box1" class="col-sm-3">
<center><h2>Welcome  <?php echo $_SESSION['username'] ?></h2>
<?php echo '<img src="'.$_SESSION['imagename'].'" width=150px height=150px>' ?>
<form action="home.php" method="post">

<input name='lodout'type="submit" value="logout" class ="b1" />
<input value="view current members" type="button" onchange="fub()" /> 
</form>

<?php

if(isset($_POST['lodout'])){

session_destroy();
header('location:index.php');

}


?>
<br><br>
</div>
<div id="bo" class="col-sm-3 bell" >




</div>
<div id="box1" class="col-sm-3">
<form action="home.php" method="post" enctype="multipart/form-data">
<center> <br>
<textarea name="text" placeholder="enter your text here....">
</textarea><br>
<input type="file" accept=".pdf" name="im"  />
<input type="entry" name="en" placeholder="To:" required />
<input type="submit" name="final" value="send" class="fa fa-home"  /></center>


</form>
<br><br>
</div>
<br><br>
</div>
<footer> <center><small> Tributted by <a href="mailto:ishugambhir2001@gmail.com">Ishan Gambhir</a> </small></center> </footer>
</div>
<?php

if(isset($_POST['final'])){
	$message=$_POST['text'];
	$table=$_POST['en'];
	$from=$_SESSION['username'];
	if(strlen($_POST['text'])){
	
	$query="Insert into `".$table."` values ('','$message','$from')";
	$res=mysqli_query($con,$query);
	}
	if($_FILES['im']['error']==0){	
	$name=$_FILES['im']['name'];
	$tempname=$_FILES['im']['tmp_name'];
	$directory='uploads/';
	$address=$directory.$name;
	move_uploaded_file($tempname,$address);
	$name=$name.'@';
	$query="Insert into `".$table."` values ('','$name','$from')";
	mysqli_query($con,$query);
	}
	
}

?>
<script>

$(document).ready(function(){
	
     $('#bo').load('intc.php');	 
	setInterval(function(){$('#bo').load('intc.php');},1000);
	
	
	
});

</script>
</body>
</html>