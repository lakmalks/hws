
<?php
include("conn.php");
session_start();

$ws_id= $_POST["ws_id"];
$district= $_POST["district"];
$zone= $_POST["zone"];
// $sch= $_POST["sch"];
$ws_level= $_POST["ws_level"];
$user= $_SESSION["username"];
$exp= $_POST["expType"];
$date= $_POST["date"];
$exp_val= $_POST["exp_val"];



$sql = "INSERT INTO workshop  VALUES ('','$ws_id','$district','$zone','$ws_level','$user','$exp_val','$exp','$date',0)";
if (mysqli_query($link, $sql)) {
    echo "Records added successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>