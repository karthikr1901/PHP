<?php 
	$sname = "localhost";
	$uname = "root";
	$pwd = "";
	$db = "laptop";

	$con = mysqli_connect($sname,$uname,$pwd,$db);
	if($con->connect_error)
		die("Connection error".$con->connect_error);

	$sql = "Select * from hp";

	$result = mysqli_query($con,$sql);

	if($result->num_rows > 0)
	{
		echo "<table><tr><td>Model</td><td>Memory</td><td>RAM</td><td>Processor</td><td>Graphics Card</td></tr>";
		while($row = $result->fetch_assoc())
			echo "<tr><td>".$row['Model']."</td><td>".$row['Memory']."</td><td>".$row['RAM']."</td><td>".$row['Processor']."</td><td>".$row['GraphicsCard']."</td><td><a href=edit.php?modelno=".$row['Model'].">Edit</a> </td></tr>";
		echo "</table>";
	}
	else
		echo "0 Rows";


	////onClick=".header("location:edit.php?model=".$b.")"."\"
?>



