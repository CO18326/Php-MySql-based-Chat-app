<?php
$con=mysqli_connect('localhost','root','','students');
session_start();
?>

<?php
echo "<center> <small> Inbox </small>";
$ser="select * from `".$_SESSION['username']."`";
$res=mysqli_query($con,$ser);
echo "<div class='table-responsive-sm'>";
echo "<table class='table table-striped table-hover'>";
echo "<thead class='thead-dark'><tr><th>";
echo "sr</th>";
echo "<th>message</th>";
echo "<th>from</th></tr></thead>";
while($red=mysqli_fetch_array($res,MYSQLI_ASSOC)){
	
	echo "<tr><td>";
	echo "".$red['id']."</td>";
	
	$ner=$red['messages'];
	if(strpos($ner,"@")==(strlen($ner)-1)){
	$ner=trim($ner,"@");
	$addr="uploads/".$ner;
	echo  "<td><a href= ".$addr.">".$ner."</a></td>";}
	else{
	
	echo "<td>".$red['messages']."</td>";
	}
	echo "<td>".$red['froma']."</td></tr>";

}
echo "</table></center></div>";
?>