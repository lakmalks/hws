<?php
include("conn.php");
session_start();

$selected_task_id = $_POST["task_id"];
$selected_ws_id = $_POST["ws_id"];
$user = $_SESSION['username'];

echo "aaa->";
print_r($selected_task_id);


$q="SELECT * FROM task_school  where ws_id=$selected_ws_id and task_id=$selected_task_id and user='$user'";

$result = $conn->query($q);
?>

    <?php
    while ($row = mysqli_fetch_array($result)) {
    ?>
        
        <tr id=<?php echo $row["id"]; ?>>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["ws_id"]; ?></td>
        <td><?php echo $row["sch_id"]; ?></td>
        <td><?php echo $row["task_id"]; ?></td>
        <td><?php echo $row["user"]; ?></td>
        <td><?php echo $row["st"]; ?></td>

    </tr>
    <?php
    }
    ?>