<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "user";

	$con = mysqli_connect($servername,$username,$password,$dbname);

	if($con->connect_error)
		die("Connection error".$con->connect_error);
?>

<?php	
	$err = "";
	if(isset($_POST['Login']))
	{
		$email = $_POST['email'];
		$pwd = $_POST['password'];

		$sql = "Select * from details where Email = '$email' and Password = '$pwd'";
		$result = mysqli_query($con,$sql);

		if($result->num_rows > 0)		
		{	
			$_SESSION['Email'] = $email;
			if($email == "admin")
			{
				$_SESSION['EmailEdit'] = "admin";
				header("location:AllUser.php");
			}
			else
			{
				$_SESSION['EmailEdit'] = $email;
				header("location:SingleUser.php");
			}
		}
		else
			$err = "Wrong username or password!!!";	
	}
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
		<title>Login</title>
	</head>
	<body>
		
		<div class="container">
			<div class="row main">
				 
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="">

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>	

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<input name="Login" value="Login" type="submit" class="btn btn-primary btn-lg btn-block login-button"/>
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