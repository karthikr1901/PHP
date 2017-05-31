<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$ccode = $_GET['q'];

$con = mysqli_connect('localhost','root','' ,'user');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"Country");
$sql="SELECT * FROM statename WHERE CountryCode = '".$ccode."'";
$result = mysqli_query($con,$sql);

echo "<form>
<select name=\"states\" onchange=\"showCity(this.value)\">
  <option value=\"\">Select a State:</option>";
while($row = mysqli_fetch_array($result)) {
    echo "<option value=\"".$row['Code']."\">" . $row['Name'] . "</option>";
}
echo "</select>
</form>";
mysqli_close($con);
?>
</body>
</html>