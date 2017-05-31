<?php
	session_start();
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
		$email = $_POST['Email'];
		$pwd = $_POST['Pwd'];

		$sql = "Select * from login where Email='".$email."' and Password = '".$pwd."'";
		$result = mysqli_query($con,$sql);
		$result->num_rows;


		if($result->num_rows > 0)
		{
			$_SESSION['Name'] = $result->fetch_assoc()['Name'];
			header("location:success.php");
		}
		else
			echo "No records found!!!";
	}
?>

<html>
	<head></head>
	<body>
		<form method = "post" action = "">
			<table>
				<tr>
					<td>
						<table>
							<tr>
								<td>Email id</td>
								<td>
									<input type = "text" name = "Email" value ="">
								</td>
							</tr>
							<tr>
								<td>Password</td>
								<td>
									<input type = "password" name = "Pwd" value ="">
								</td>
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