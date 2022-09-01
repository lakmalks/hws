<?php
include("conn.php");
$selected_id = $_POST["selected_id"];

session_start();
// $_SESSION['selected_id'] = $selected_id;


// $result = mysqli_query($conn,"SELECT * FROM school_id where district = $category_id");

// $q = "SELECT census,schName FROM school_id  where zone=(SELECT zone FROM workshop where id='$selected_id'))";
$q="SELECT census,schName FROM school_id  where zone=(SELECT zone FROM workshop where id='$selected_id')";

$result = $conn->query($q);
?>
<!-- <div class="label">School</div> -->
    <option value="">Select School</option>

    <?php
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <option value="<?php echo $row["census"]; ?>"><?php echo $row["census"];
                                                        echo " - ";
                                                        echo $row["schName"]; ?></option>
    <?php
    }










    ?>