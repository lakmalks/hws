<?php
session_start();
include("conn.php");


$ws_id_task_hid = $_SESSION["nc_ws_id"];
$task_id_task_hid = $_SESSION["task_id"];


$dev_serial=$_POST["dev_serial"];
$part_td = $_POST["part_id"];
$qty_td = $_POST["qty"];
$estimated = $_POST["estimated"];
$status = $_POST["status"];

$other_td = 'other';
$job_id=$_POST['job_id'];

$sql = "INSERT INTO order_part VALUES ('','$dev_serial','$ws_id_task_hid','$task_id_task_hid','$job_id','$part_td','$qty_td','$estimated','$status')";
if (mysqli_query($link, $sql)) {
    echo "Records added successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
