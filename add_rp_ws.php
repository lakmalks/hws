<?php
session_start();
include("conn.php");
$nc_ws_id = $_POST["nc_ws_id"];
$rp_id = $_POST["rp_id"];
$nc_sch_id=$_POST['nc_sch_id'];

$task_id_rp= $_SESSION["task_id"];
$user=$_SESSION["username"];

$_SESSION['sch']=$nc_sch_id;
$_SESSION['nc_ws_id']=$nc_ws_id;

$date = date('Y-m-d H:i:s');
print_r($_SESSION);

$sql = "INSERT INTO ws_rp VALUES ('$nc_ws_id','$task_id_rp', '$rp_id','$date','$user')";
if (mysqli_query($link, $sql)) {
    echo "Records added successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
