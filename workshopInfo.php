<?php
session_start();
include("conn.php");
require_once("allFun.php");


$scl = $_SESSION['sch'];
$ws_id = $_SESSION['nc_ws_id'];
$task_id = $_SESSION["task_id"];



// $sql_task = "SELECT max(id) FROM task WHERE ws_id='$ws_id'";
// $temp_task_result = taskCount($sql_task);
// $temp_task_id = $temp_task_result[0];
// $task_id = $temp_task_id["max(id)"] + 1;


// $_SESSION['ws_id_task'] = $ws_id;
// $_SESSION['task_id'] = $task_id;


if (!isset($_SESSION['username'])) {
    $newURL = "index.php";
    header('Location: ' . $newURL);
}

function loadJobID($c, $sql)
{

    $result = $c->query($sql);
    if ($result) {
        if ($result->num_rows > 0) {
            $temp_v = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $val = $temp_v[0]["max(job_id)"] + 1;
            // $val=$v['max'];
        } else {
            $val = 1;
        }
        // echo $val;
    } else {
        $val = 1;
    }
    return $val;
}
function loadOptions($c, $sql, $item)
{
    $result = $c->query($sql);
    if ($result->num_rows > 0) {
        $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // echo $options;
    }
    foreach ($options as $option_device) {
        $device = $option_device[$item];
        $opt = "<option id=$device name=$device>$device</option>";
        echo $opt;
    }

    return $options;
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="./js/script.js"> </script>

    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <title>Hardware team</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">

    <style>
        .container {
            width: 900px;
            background: #fff;
            text-align: center;
            border-radius: 5px;
            padding: 50px 35px 10px 35px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#parts_div").hide(0);
            $("#ws_id_task_hid").hide(0);
            $("#task_id_task_hid").hide(0);
        });
    </script>
</head>

<body>
    <script src="./js/script.js"></script>
    <script src="./js/scriptWorkshopInfo.js"></script>
    <div class="container-fluid">
        </script>

        </script>
        <div class="container">
            <form>
                <div class="form-row">

                    <div class="form-group col-md-12">
                        <h4>Workshop ID : <?php echo $ws_id ?> Task ID : <?php echo $task_id ?></h4>
                        <h4>School ID : <?php echo $scl ?></h4>


                        <?php

                        $sql_task = "SELECT max(job_id) FROM task WHERE ws_id='$ws_id' AND task_id='$task_id'";
                        // loadJobID($conn, $sql_task)
                        ?>
                        <h4> JOB ID :
                            <div id="div_job_id" name="div_job_id"><?php echo loadJobID($conn, $sql_task) ?></div>
                        </h4>
                        <div id="ws_id_task_hid"><?php echo $ws_id ?></div>
                        <div id="task_id_task_hid"><?php echo $task_id ?></div>
                        <hr>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="selectedDevice">Device</label>
                        <select class="form-control" id="selectedDevice" name="selectedDevice">
                            <?php
                            $q_model = "SELECT device FROM device";
                            loadOptions($conn, $q_model, "device");
                            ?>
                        </select>
                        <br />
                    </div>
                    <div class="form-group col-md-3">
                        <label for="device_model">Brand</label>
                        <select class="form-control" id="device_model" name="device_model">
                            <?php
                            $q_model = "SELECT model FROM models";
                            loadOptions($conn, $q_model, "model");
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="mfd">MFD</label>
                        <input type="date" class="form-control" id="mfd">

                    </div>
                    <div class="form-group col-md-3">
                        <label for="ecv">ECV</label>
                        <input type="text" class="form-control" id="ecv" placeholder="Estimated Value">

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inventory">Inventory no</label>
                        <input type="text" class="form-control" id="inventory" name="inventory">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="device_serial">Serial No</label>
                        <input type="text" class="form-control" id="device_serial" required>
                    </div>




                    <div class="form-group col-md-3">
                        <label for="device_fault">Fault or error</label>
                        <select class="form-control" id="device_fault" name="device_fault">
                            <?php
                            $q_model = "SELECT fault FROM fault";
                            loadOptions($conn, $q_model, "fault");
                            ?>
                        </select>

                    </div>
                    <div class="form-group col-md-3">
                        <label for="device_fault">Status</label>
                        <select class="form-control" id="rep_state" name="rep_state" onchange="unhide_div(this)">
                            <option value="repaired" selected>Repaired</option>
                            <option value="replaced">Repaired(with-part)</option>
                            <option value="guided">Instructed(to-buy-part)</option>
                            <option value="discard">Discard</option>
                            <option value="replaced">Replaced(New-Item)</option>
                        </select>

                    </div>
                </div>
                <?php
                $sql = "SELECT * from r_parts";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $op = mysqli_fetch_all($result, MYSQLI_ASSOC);
                }
                ?>
                <hr>
                <div class="form-row " id="parts_div">
                    <div class="form-group col-md-12 border border-secondary p-3">
                        <div class="form-row">
                            <div class="col">
                                <label for="dev_serial">Device Serial</label>
                                <input type="text" class="form-control" id="dev_serial" placeholder="dev_serial" readonly>
                            </div>
                            <div class="col">
                                <label for="r_parts">Replaced part</label>
                                <select class="form-control" id="r_parts" name="r_parts" onchange='loadPartID()'>
                                    <?php
                                    foreach ($op as $opx) {
                                        $part_id = $opx['id'];
                                        $part = $opx['part'];
                                        $spec = $opx['spec'];
                                        $full_devSpec = $part . "-" . $spec;
                                        // $device = $opx['part'];
                                        $optStr = "<option id=$part_id name=$part_id>$full_devSpec</option>";
                                        echo $optStr; //Adding Options 
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="part_id">Part ID</label>
                                <input type="text" class="form-control" id="part_id" placeholder="part_id" readonly value=1>
                            </div>
                        </div>

                        <div class="form-row pt-3">
                            <div class="col">
                                <label for="quantity">Quantity</label>
                                <input type="text" class="form-control" id="quantity" placeholder="Quantity">


                            </div>
                            <div class="col">
                                <label for="esti_price">Estimated</label>
                                <input type="text" class="form-control" id="esti_price" placeholder="Price">


                            </div>
                        </div>

                        <div class="form-row pt-2">
                            <Button type="button" class="btn btn-secondary btn-lg btn-block" id="btn_add_r_parts" onclick="addPartsToTblRparts()"> Add to Table >></button>
                        </div>

                    </div>

                    <div class="form-group col-md-12 p-3">

                        <div class="form-group">
                            <label for="tbl_parts">Parts replaced</label>
                            <table class="table table-striped" id="tbl_parts" name="tbl_parts">
                                <tr id="0">
                                    <th>Dev Serial</th>
                                    <th>id</th>
                                    <th>Part</th>
                                    <th>Qty</th>
                                    <th>Estimated price</th>
                                    <th>Status</th>
                                </tr>
                                <tbody id="tbody_parts">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Special Notes</label>
                    <input type="text" class="form-control" id="sp_notes" placeholder="Add special notes">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="align-bottom">
                        </div>
                        <!-- <Button type="button" class="btn btn-info btn-lg btn-block" id="btn_add_fault_raw" onclick="addRow('tbl_fault')"> Add Device to Repaired Table</button> -->

                        <!-- saveDeviceToDB -> scriptWorkshopInfo.js  -->
                        <Button type="button" class="btn btn-info btn-lg btn-block" id="btn_addExit_fault_raw" onclick="saveDeviceToDB(1)">Save And Finish</button>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="align-bottom">
                        </div>
                        <!-- <Button type="button" class="btn btn-info btn-lg btn-block" id="btn_add_fault_raw" onclick="addRow('tbl_fault')"> Add Device to Repaired Table</button> -->

                        <!-- saveDeviceToDB -> scriptWorkshopInfo.js  -->
                        <Button type="button" class="btn btn-info btn-lg btn-block" id="btn_add_fault_raw" onclick="saveDeviceToDB(0)">Save and ADD another</button>
                    </div>
                </div>

                <div class="form-row">

                </div>
                <div class="form-group">
                    <label for="tbl_fault">Faults and Errors</label>
                    <table class="table table-striped " id="tbl_fault" name="tbl_fault">
                        <tr id="0">
                            <th>#</th>
                            <th>Device</th>

                            <th>Brand</th>
                            <th>MFD</th>
                            <th>ECV</th>

                            <th>Inventory</th>
                            <th>Serial</th>
                            <th>Fault</th>
                            <th>Status</th>
                        </tr>
                        <tbody id="tbody_fault">







                            <?php
                            // session_start();
                            include("conn.php");


                            $ws_id_task_hid = $_SESSION["nc_ws_id"];
                            $task_id_task_hid = $_SESSION["task_id"];

                            // $job_id=$_POST['job_id'];

                            $sql = "SELECT device,brand,mfd,ecv,inventory,serial,fault,status,other FROM task WHERE ws_id=$ws_id_task_hid AND task_id=$task_id_task_hid";
                            $result = $conn->query($sql);
                            $count = 1;
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $count; ?> </td>
                                    <td><?php echo $row["device"]; ?> </td>
                                    <td><?php echo $row["brand"]; ?> </td>
                                    <td><?php echo $row["mfd"]; ?> </td>
                                    <td><?php echo $row["ecv"]; ?> </td>
                                    <td><?php echo $row["inventory"]; ?> </td>
                                    <td><?php echo $row["serial"]; ?> </td>
                                    <td><?php echo $row["status"]; ?> </td>
                                    <td><?php echo $row["other"]; ?> </td>


                                </tr>
                            <?php
                                $count = $count + 1;
                            }
                            // mysqli_close($link);

                            ?>


                        </tbody>
                    </table>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="align-bottom">
                            <!-- <button type="button" class="btn btn-danger btn-lg btn-block" id="btn_save" name="btn_save" onclick="readTableFault()">Save</button> -->
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <div class="align-bottom">
                            <!-- <button type="button" class="btn btn-danger btn-lg btn-block" id="btn_finish" name="btn_finish" onclick="readTableFault(1)">Save and Finish</button> -->

                        </div>

                    </div>
                </div>


            </form>
        </div>



</body>

</html>