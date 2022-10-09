<?php
session_start();
include("conn.php");


$ws_id_task = $_SESSION["nc_ws_id"];
$task_id = $_SESSION["task_id"];

$job_id = $_POST["job_id"];
$device_td = $_POST["device_td"];
$brand_td = $_POST["brand_td"];
$mfd_td = $_POST["mfd_td"];
$ecv_td = $_POST["ecv_td"];
$inv_td = $_POST['inv_td'];
$serial_td = $_POST["serial_td"];
$fault_td = $_POST["fault_td"];
$status_td = $_POST["status_td"];
// $other_td = $_POST['other_td'];
$other_td = 'other';
$finish=$_POST["finish"];


$sql = "INSERT INTO task VALUES ('','$task_id','$ws_id_task','$job_id','$device_td','$brand_td','$mfd_td','$ecv_td','$inv_td','$serial_td','$fault_td','$status_td','$other_td', CURRENT_TIMESTAMP)";
if (mysqli_query($link, $sql)) {
    // echo "Records added successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


//Updating task_school table in the database 
// Finish the taskCount

if($finish==1){
    $sql = "UPDATE task_school SET st = 1 WHERE ws_id=$ws_id_task AND task_id=$task_id; ";
    if (mysqli_query($link, $sql)) {
        // echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    
}
// Close connection
mysqli_close($link);
?>