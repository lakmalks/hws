<?php
session_start();
include("conn.php");
include("allFun.php");

// $zone = $_SESSION['zone'];
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
    <script src="./js/script.js"> </script>
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
            <form action="workshopInfo.php"> <br>
                <div class="row">
                    <div class='col-md-6'>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <!-- nc - not completed -->
                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="nc_ws_id" id="nc_ws_id" onChange="loadSch()" required>
                                    <option selected value="na">Select Workshop</option>

                                    // Load Not-completed workshop list
                                    <?php
                                    $q = "SELECT distinct id,ws_id FROM workshop where coordinator='$user' and state=0";
                                    $result = $conn->query($q);
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
                            <div class="form-group col-md-6">

                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="task_school" id="task_school" required>
                                    <option value="">Select School</option>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-10">

                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="task_resource_per" id="task_resource_per" required>
                                    <option value="">Select Resource person</option>


                                    // Load resource persons for workshop from list
                                    <?php
                                    $q = "SELECT distinct name,nic,mobile,workplace FROM user";
                                    $r_resource_p = $conn->query($q);
                                    ?>

                                    <?php
                                    while ($row = mysqli_fetch_array($r_resource_p)) {
                                        $str='['.$row["name"].']'.'-'.'['.$row["workplace"].']'. '-'.'['.$row["mobile"].']';
                                    ?>
                                        <option value="<?php echo $str ?>"><?php echo $str; ?></option>
                                    <?php
                                    }
                                    
                                    ?>
                                </select>

                                </select>
                            </div>
                            <div class="form-group col-md-2 p-1">
                                <button class="btn btn-primary" type="button" onclick="addToRTable()">Add>></button>

                            </div>

                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <h5 class="text-center">Resource person</h5>

                        <table class="table table-striped" id="tbl_resource_p" name="tbl_resource_p">
                            <tr id="0">
                                <th>#</th>
                                <th>Name</th>
                                <th>NIC</th>
                                <th>Work place</th>
                            </tr>
                            <tbody id="tbody_resource_p">


                            </tbody>
                        </table>

                    </div>
                </div>
                <div class='row'>
                <div class="d-grid gap-1">
                    <!-- <div class="form-group col-md-12"> -->
                        <button class="btn btn-danger" type="submit">Add New task to this Workshop</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>