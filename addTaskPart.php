<?php
session_start();
include("conn.php");


$ws_id_task_hid = $_SESSION["ws_id_task"];
$task_id_task_hid = $_SESSION["task_id"];



$part_td = $_POST["part_id"];
$qty_td = $_POST["qty"];
$estimated = $_POST["estimated"];
$status = $_POST["status"];

$other_td = 'other';

$sql = "INSERT INTO order_part VALUES ('','$ws_id_task_hid','$task_id_task_hid','$part_td','$qty_td','$estimated','$status')";
if (mysqli_query($link, $sql)) {
    echo "Records added successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
