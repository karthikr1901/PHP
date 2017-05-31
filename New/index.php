
<html>
<body>
<h1> Hello </h1>

<!--
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Laptop";*/

// Create connection
/*$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 } */

/*$sql = "SELECT * FROM HP";
require 'default.php';
    $result=mysqli_query($conn,$sql);
//$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Model: " . $row["Model"]. " <br>Memory: " . $row["Memory"]. " GB<br>RAM: " . $row["RAM"]. " GB <br><br><br>";
    }
} else {
    echo "0 results";
}
 $conn->close();*/-->
 

 <form method="post" action="store.php">
 <table>
 <tr>
 <td>
 	<table>
 		<tr>
 			<td>Model</td>
 			<td><input type="text" name="Model" value=""></td>
 		<tr>
 		<tr>
 			<td>Memory</td>
 			<td><input type="text" name="Memory" value="">GB</td>
 		<tr>
 		<tr>
 			<td>RAM</td>
 			<td><input type="text" name="Ram" value="">GB</td>
 		<tr>
 		<tr>
 			<td>Processor</td>
 			<td><input type="text" name="Processor" value=""></td>
 		<tr>
 		<tr>
 			<td>Graphics Card</td>
 			<td><input type="text" name="Graphics" value="">GB</td>
 		<tr>
    </table>
 </td>
 </tr>
 <tr>
 <td>
    <input type="submit">
 </td>
 </tr>
</table>
</form>


</body>
</html>