<?php
include("conn.php");
$selected_id = $_POST["ws_id"];

session_start();

$q="SELECT DISTINCT task_id FROM task_school  where ws_id=$selected_id AND st=0";

$result = $conn->query($q);
?>

    <?php
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <option value="<?php echo $row["task_id"]; ?>"><?php echo $row["task_id"]; ?></option>
    <?php
    }
    ?>