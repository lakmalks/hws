<?php
session_start();
include("conn.php");
include("allFun.php");

$zone = $_SESSION['zone'];
if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
} else {
    $newURL = "index.php";
    header('Location: ' . $newURL);
    // $user = "Login";
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>New Task - Hardware System </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .divback {
            align-items: left;
            text-align: left;
            font-size: 25px;
            font-weight: 500;
        }

        .back-color {
            background-color: blueviolet;
            width: 400px;
        }

        .user_lbl {
            font-size: 25px;
            font-weight: 500;
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div id="nav-placeholder"> </div>

        <script>
            $(function() {
                $("#nav-placeholder").load("nav.php");
            });
        </script>


        <br>
        <div class="container">

            <form>
                <div class="row">
                    <div class="form-group col-md-3">
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="ws_id" id="ws_id" required>
                            <option selected id="new_task">Select your Workshop</option>
                            <?php
                            $q = "SELECT distinct id,ws_id FROM workshop where state=0";
                            $result = $conn->query($q);
                            ?>
                            <?php
                            ?>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <option value="<?php echo $row["id"]; ?>"><?php echo $row["ws_id"]; ?></option>
                            <?php
                            }
                            ?>
                        </select>


                    </div>

                    <div class="form-group col-md-3">

                        <?php
                        $q = "SELECT distinct census,schName FROM school_id where zone='$zone'";
                        $result = $conn->query($q);
                        ?>
                        <!-- <div class="label">School</div> -->
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="school" id="school" required>
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
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" type="button" onclick=addTask()>Add New task to this Workshop</button>
            </form>


        </div>



    </div>



</body>

</html>