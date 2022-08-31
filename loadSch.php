<?php
include("conn.php");
$dev_model = $_POST["dev_model"];

session_start();
$_SESSION['dev_model'] = $dev_model; 
print_r($_SESSION);

// $result = mysqli_query($conn,"SELECT * FROM school_id where district = $category_id");
$q="SELECT distinct census FROM school_id where zone='$dev_model'";
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