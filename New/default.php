<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Laptop";

//$conn = new mysqli($servername, $username, $password, $dbname);
$conn=mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 } 
    //$mysqli=mysqli_connect($host,$user,$password,$db);
    //if($mysqli_connect_error())
    //    die('Connect Error');
?>
