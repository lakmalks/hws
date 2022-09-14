<?php
session_start();
include("conn.php");


$ws_id_rp = $_SESSION["ws_id_task"];
$task_id_rp= $_SESSION["task_id"];

$rp_id = $_POST["rp_id"];


$sql = "INSERT INTO ws_rp VALUES ('$ws_id_rp','$task_id_rp', '$rp_id')";
if (mysqli_query($link, $sql)) {
    echo "Records added successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
