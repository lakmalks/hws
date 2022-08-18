<?php
include("conn.php");
$zone = $_POST["zone"];

session_start();
$_SESSION['zone'] = $zone; 
print_r($_SESSION);

// $result = mysqli_query($conn,"SELECT * FROM school_id where district = $category_id");
$q="SELECT distinct census FROM school_id where zone='$zone'";
$result = $conn->query($q);

?>
<option value="">Select School</option>
<?php
?>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["census"];?>"><?php echo $row["census"];?></option>
<?php
}
?>