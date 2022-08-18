<?php
include("conn.php");
$district = $_POST["district"];

session_start();
// session_destroy();

$_SESSION['district'] = $district; 
print_r($_SESSION);

// $result = mysqli_query($conn,"SELECT * FROM school_id where district = $category_id");
$q="SELECT distinct zone FROM school_id where district='$district'";
$result = $conn->query($q);

?>
<option value="">Select Zone</option>
<?php
?>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["zone"];?>"><?php echo $row["zone"];?></option>
<?php
}
?>