<?php
	//$model = "HP123";
	$model = $_GET['modelno'];
	//echo $id;
	//die();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "laptop";

	$con = mysqli_connect($servername,$username,$password,$dbname);
	if($con->connect_error)
		die("Connection error".$con->connect_error);

	$sql1 = "Select * from hp where Model='$model'";
	$result1 = mysqli_query($con,$sql1);

	if($result1->num_rows>0)
	{
		while($row = $result1->fetch_assoc()){
			$mdl1 = $row["Model"];
			$mmy1 = $row["Memory"];
			$ram1 = $row["RAM"];
			$pcr1 = $row["Processor"];
			$gpc1 = $row["GraphicsCard"];
		}
	}
	else
		echo "0 Rows";

?>

<?php 
	if(isset($_POST['Update'])) 
	{
		$mdl1 = $_POST['Model'];
		$mmy1 = $_POST['Memory'];
		$ram1 = $_POST['RAM'];
		$pcr1 = $_POST['Processor'];
		$gpc1 = $_POST['Graphics'];

		$sql = "Update hp set  Memory='$mmy1', RAM='$ram1', Processor='$pcr1', GraphicsCard='$gpc1' where Model='$mdl1'";
		$result = mysqli_query($con,$sql);
		header("location:display.php");
	}
?>

<?php 
	if(isset($_POST['Delete'])) 
	{
		$mdl1 = $_POST['Model'];
		$mmy1 = $_POST['Memory'];
		$ram1 = $_POST['RAM'];
		$pcr1 = $_POST['Processor'];
		$gpc1 = $_POST['Graphics'];

		$sql = "Delete from hp where Model='$mdl1'";
		$result = mysqli_query($con,$sql);
		header("location:display.php");
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
								<td>Model</td>
								<td>
									<input type = "text" name = "Model" value ="<?php echo $mdl1;?>">
								</td>
							</tr>
							<tr>
								<td>Memory</td>
								<td>
									<input type = "text" name = "Memory" value ="<?php echo $mmy1;?>">
								</td>
							</tr>
							<tr>
								<td>RAM</td>
								<td>
									<input type = "text" name = "RAM" value ="<?php echo $ram1;?>">
								</td>
							</tr>
							<tr>
								<td>Processor</td>
								<td>
									<input type = "text" name = "Processor" value ="<?php echo $pcr1;?>">
								</td>
							</tr>
							<tr>
								<td>Graphics Card</td>
								<td>
									<input type = "text" name = "Graphics" value ="<?php echo $gpc1;?>">
								</td>
							</tr>
							<tr>
								<td>
									<input type = "submit" name = "Update" value="Update">
								</td>
								<td>
									<input type = "submit" name = "Delete" value="Delete">
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>