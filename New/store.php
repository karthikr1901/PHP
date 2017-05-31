<html>
<body>
<h1> Hi </h1>
<?php
	//$regValue = $_POST['regName'];
	//echo $regValue;
	$model = $_POST['Model'];
	$mem = $_POST['Memory'];
	$ram = $_POST['Ram'];
	$pro = $_POST['Processor'];
	$graph = $_POST['Graphics'];

	$sql = "INSERT INTO Laptop.hp (`Model, Memory, RAM, Processor,
        GraphicsCard) VALUES ('$model',
        $mem, '$ram', '$pro','$graph');";

	//$sql1 = "SELECT * FROM HP";
	require 'default.php';
    	$result=mysqli_query($conn,$sql);

    	echo "Successful!!!"

?> 

</body>
</html>