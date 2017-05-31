<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "user";

	$con = mysqli_connect($servername,$username,$password,$dbname);

	if($con->connect_error)
		die("Connection error".$con->connect_error);
?>


<?php
	session_start();
	if( isset($_SESSION['Email'])) 
	{ 
		echo "Welcome ".$_SESSION['Email'];
		$email = $_SESSION['Email'];
		if($email == "admin")
			$dispval = "";
		else
			$dispval = "none";
	}

?>
<?php 
if( isset($_SESSION['Email'])) { 
?>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

		<!-- Website CSS style -->
		<link rel="stylesheet" type="text/css" href="css/main.css">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
		<title>User Details</title>
	</head>
	<body>
		<div class="container">
			<div class="row main">				 
					<?php
						$sql = "Select * from details";
						$result = mysqli_query($con,$sql);

						if($result->num_rows > 0)
						{
							echo "<table class=\"table table-bordered table-striped\"><tr><td>Name</td><td>Address</td><td>Email</td><td>Password</td><td>Mobile</td><td>Image</td></tr>";
							while($row = $result->fetch_assoc())
								echo "<tr><td>".$row['Name']."</td><td>".$row['Address']."</td><td>".$row['Email']."</td><td>".$row['Password']."</td><td>".$row['Mobile']."</td><td>".$row['Image']."</td><td style=\"display:".
							$dispval.";\"><a href=SingleUser.php?emailedit=".$row['Email'].">Edit</a></td></tr>";
							echo "</table>";
						}
						else
							echo "0 Rows";
					?>
			</div>
		</div>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</body>
</html>


<?php } 
else
	header("location:Login.php");
?>