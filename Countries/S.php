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
$citycode = $_GET['citycode'];

$con = mysqli_connect('localhost','root','' ,'user');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"Country");
$sql="SELECT * FROM cityname WHERE StateCode = '".$citycode."'";
$result = mysqli_query($con,$sql);

echo "<form>
<select name=\"cities\" onchange=\"show(this.value)\">";
while($row = mysqli_fetch_array($result)) {
    echo "<option value=\"".$row['Code']."\">" . $row['Name'] . "</option>";
}
echo "</select>
</form>";
mysqli_close($con);
?>
</body>
</html>
