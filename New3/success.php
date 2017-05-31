<?php
	session_start();
	/*$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "laptop";

	$con = mysqli_connect($servername,$username,$password,$dbname);
	if($con->connect_error)
		die("Connection error".$con->connect_error);
?>

<?php 
	if(isset($_POST['Submit'])) 
	{
		$mdl = $_POST['Model'];
		$mmy = $_POST['Memory'];
		$ram = $_POST['RAM'];
		$pcr = $_POST['Processor'];
		$gpc = $_POST['Graphics'];

		$sql = "Insert into hp values ('$mdl','$mmy','$ram','$pcr','$gpc')";
		$result = mysqli_query($con,$sql);
	}*/
?>
<html>
<body>
<h1>Hi</h1>
<?php
	echo "<h1>".$_SESSION['Name']."</h1>";
?>
</body>
</html>
