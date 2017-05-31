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
		$mdl = $_POST['Model'];
		$mmy = $_POST['Memory'];
		$ram = $_POST['RAM'];
		$pcr = $_POST['Processor'];
		$gpc = $_POST['Graphics'];

		$sql = "Insert into hp values ('$mdl','$mmy','$ram','$pcr','$gpc')";
		$result = mysqli_query($con,$sql);
	}
?>

<html>
	<head></head>
	<body>
		<a href = "display.php">Display</a>
		<form method = "post" action = "">
			<table>
				<tr>
					<td>
						<table>
							<tr>
								<td>Model</td>
								<td>
									<input type = "text" name = "Model" value ="">
								</td>
							</tr>
							<tr>
								<td>Memory</td>
								<td>
									<input type = "text" name = "Memory" value ="">
								</td>
							</tr>
							<tr>
								<td>RAM</td>
								<td>
									<input type = "text" name = "RAM" value ="">
								</td>
							</tr>
							<tr>
								<td>Processor</td>
								<td>
									<input type = "text" name = "Processor" value ="">
								</td>
							</tr>
							<tr>
								<td>Graphics Card</td>
								<td>
									<input type = "text" name = "Graphics" value ="">
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