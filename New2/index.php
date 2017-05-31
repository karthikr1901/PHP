<?php
	$servername = "localhost";
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
		$name = $_POST['Name'];
		$email = $_POST['Email'];
		$pwd = $_POST['Pwd'];

		$sql = "Insert into login values ('$name','$email','$pwd')";
		$result = mysqli_query($con,$sql);
	}
?>

<html>
	<head></head>
	<body>
		<a href = "user.php">Existing User</a>
		<form method = "post" action = "">
			<table>
				<tr>
					<td>
						<table>
							<tr>
								<td>Name</td>
								<td>
									<input type = "text" name = "Name" value ="">
								</td>
							</tr>
							<tr>
								<td>Email id</td>
								<td>
									<input type = "text" name = "Email" value ="">
								</td>
							</tr>
							<tr>
								<td>Password</td>
								<td>
									<input type = "text" name = "Pwd" value ="">
								</td>
							</tr>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<input type = "submit" name = "Submit">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>