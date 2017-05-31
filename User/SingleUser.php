<?php
	session_start();
	$emailedit = $_SESSION['EmailEdit'];
	if($emailedit == "admin")
		$emailedit = $_GET['emailedit'];

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "user";

	$con = mysqli_connect($servername,$username,$password,$dbname);

	if($con->connect_error)
		die("Connection error".$con->connect_error);
?>

<?php
	$err="";
	$imgval = "none";
	if( isset($_SESSION['Email'])) 
	{ 
		$email1 = $_SESSION['Email'];
		$sql = "Select * from details where Email = '$emailedit'";
		$result = mysqli_query($con,$sql);
		
		while($row = $result->fetch_assoc())
		{	
			$name = $row['Name'];
			$email = $row['Email'];
			$add = $row['Address'];
			$pwd = $row['Password'];
			$mob = $row['Mobile'];
			$img = $row['Image'];
		}

		if($img=="")
			$imgval = "none";
		else
			$imgval = "";

		$sql1 = "Select * from details where Email = '$email1'";
		$result1 = mysqli_query($con,$sql1);

		while($row1 = $result1->fetch_assoc())
		{			
			$name1 = $row1['Name'];
			echo "Welcome ".$name1;
		}

	}
	else
		header("location:Login.php");
?>

<?php	
	if(isset($_POST['Update']))
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$add = $_POST['add'];
		$pwd = $_POST['pwd'];
		$mob = $_POST['mob'];
		$fileToUpload = $_FILES["fileToUpload"]["name"];
		if($fileToUpload=="")
		{
			echo "NO";
			die();
		}
		else
		{
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$fileToUpload = $target_file;
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}
			$img=$target_file;			
		}
		

		if($mob==''||$mob==""||$mob==null)
			$err = "Enter mobile number";
		else
		{
			$sql1 = "Update details set Name='$name',Address='$add',Password='$pwd',Mobile=$mob,Image='$target_file' where Email='$email'";
			$result1 = mysqli_query($con,$sql1);
			$imgval="";

		}
		//$img = $_POST['img'];

	}
?>

<?php	
	if(isset($_POST['Logout']))
	{
		session_unset(); 
		session_destroy();
		header("location:Login.php"); 
	}
?>



<?php

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
		<title><?php echo $name; ?></title>
	</head>
	<body>
		<div class="container">
			<div class="row main">
				 
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">

						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>"  placeholder="Enter your Name"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="address" class="cols-sm-2 control-label">Address</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-address-card" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="add" id="add" value="<?php echo $add; ?>"   placeholder="Enter your address"/>
								</div>
							</div>
						</div>	

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" readonly="readonly" name="email" id="email" value="<?php echo $email; ?>"   placeholder="Enter your Email"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="pwd" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="pwd" id="pwd" value="<?php echo $pwd; ?>"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="mob" class="cols-sm-2 control-label">Mobile</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-mobile fa-lg" aria-hidden="true"></i></span>
									<input type="mobile" class="form-control" name="mob" id="mob" value="<?php echo $mob; ?>"  placeholder="Enter your mobile number"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="mob" class="cols-sm-2 control-label">Image</label>
							<div class="cols-sm-10">
								<img src="<?php echo $img; ?>" alt="<?php echo $name."'s Photo"; ?>" style="display:<?php echo $imgval; ?>;width:275px;height:250px;">
								<input type="file" name="fileToUpload" id="fileToUpload">						
							</div>
						</div>


						<div class="form-group ">
							<input name="Update" value="Update" type="submit" class="btn btn-primary btn-lg btn-block login-button"/>
						</div>
						<div class="form-group ">
							<input name="Logout" value="Logout" type="submit" class="btn btn-primary btn-lg btn-block login-button"/>
						</div>
						<div>
				        	<a href=AllUser.php>View All Users</a>
				        </div>
				        <div>
				        	<label><?php echo $err;?><label/>
				        </div>
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="js/bootstrap.js"></script>
	</body>
</html>

<?php } 
else
	header("location:Login.php");
?>

