<?php
session_start();
include("conn.php");


$ws_id_task_hid = $_SESSION["ws_id_task"];
$task_id_task_hid = $_SESSION["task_id"];

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

$sql = "INSERT INTO task VALUES ('$task_id_task_hid','$ws_id_task_hid','$device_td','$brand_td','$mfd_td','$ecv_td','$inv_td','$serial_td','$fault_td','$status_td','$other_td', CURRENT_TIMESTAMP)";
if (mysqli_query($link, $sql)) {
    echo "Records added successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
