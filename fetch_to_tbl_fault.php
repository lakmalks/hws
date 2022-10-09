<?php
session_start();
include("conn.php");


$ws_id_task_hid = $_SESSION["nc_ws_id"];
$task_id_task_hid = $_SESSION["task_id"];

// $job_id=$_POST['job_id'];

$sql = "SELECT device,brand,mfd,ecv,inventory,serial,fault,status,other FROM task WHERE ws_id=$ws_id_task_hid AND task_id=$task_id_task_hid";
$result = $conn->query($sql);
$count=1;
while ($row = mysqli_fetch_array($result)) {
   
}
?>