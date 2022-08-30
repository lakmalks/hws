<?php
include("conn.php");

$device = $_POST["device"];
$brand = $_POST["brand"];
$mfd = $_POST["mfd"];
$ecv = $_POST["ecv"];
$inventory=$_POST['inventory'];
$serial = $_POST["serial"];
$faults = $_POST["faults"];
$stat = $_POST["stat"];
$other=$_POST['other'];

$sql = "INSERT INTO job  VALUES ('','202205','$device','$brand','$mfd','$ecv','$inventory','$serial','$faults','$stat','$other')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>