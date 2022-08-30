<?php
session_start();
include("conn.php");
$zone=$_SESSION['zone'];
// print_r($_SESSION);

if (isset($_SESSION['username'])) {
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
    <script src="./js/st.js"> </script>

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




</head>

<body>


<div class="container-fluid">
    
  <div id="nav-placeholder">        </div>

<script>
    $(function() {
        $("#nav-placeholder").load("nav.php");
    });
</script>
    <script>
        $(document).ready(function() {

            x = $("#parts_div").hide(0)
            // alert(data_list);


        });

        // function loadSchool(zone) {

        //     var zone = select.options[select.selectedIndex].text;

        //     $.ajax({
        //         url: "loadSch.php",
        //         type: "POST",
        //         data: {
        //             zone: zone
        //         },
        //         cache: false,
        //         success: function(result) {
        //             $("#school").html(result);
        //             // alert(result);
        //         }
        //     });
        // }
    </script>
    <div class="container">

        <form>
            <div class="form-row">
                
                <div class="form-group col-md-3">
                    <?php
                    $q = "SELECT distinct census,schName FROM school_id where zone='$zone'";
                    $result = $conn->query($q);
                    ?>
                    <div class="label">School</div>
                    <select name="school" id="school" required>
                        <option value="">Select School</option>
                        <?php
                        ?>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?php echo $row["census"]; ?>"><?php echo $row["census"];echo " - ";echo $row["schName"]; ?></option>
                        <?php
                        }
                        ?>
                    </select>
              
                </div>
                <div class="form-group col-md-3">

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
                    <input type="text" class="form-control" id="device_serial">
                </div>
                <div class="form-group col-md-3">
                    <label for="device_fault">Fault or error</label>
                    <select class="form-control" id="device_fault" name="device_fault">
                        <option value="abc">abc</option>
                        <option value="def">def</option>
                    </select>

                </div>
                <div class="form-group col-md-3">
                    <label for="device_fault">Status</label>
                    <select class="form-control" id="rep_state" name="rep_state" onchange="unhide_div(this)">
                        <option value="repaired" selected>Repaired</option>
                        <option value="replaced">Part replaced</option>
                        <option value="guided">Instructed</option>
                        <option value="discard">Discard</option>
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

            <div class="form-row " id="parts_div">
                <div class="form-group col-md-6 border border-secondary p-3">
                    <div class="form-row">
                        <label for="r_parts">Parts replaced</label>
                        <select class="form-control" id="r_parts" name="r_parts">
                            <?php
                            foreach ($op as $opx) {
                                $part = $opx['part'];
                                $spec = $opx['spec'];
                                $full_devSpec = $part . "-" . $spec;
                                // $device = $opx['part'];
                                $optStr = "<option id=$part name=$part>$full_devSpec</option>";
                                echo $optStr; //Adding Options 
                            }
                            ?>
                        </select>
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
                        <Button type="button" class="btn btn-secondary btn-lg btn-block" id="btn_add_r_parts" onclick="addRow2('tbl_parts')"> Add to Table >></button>
                    </div>

                </div>

                <div class="form-group col-md-6 p-3">

                    <div class="form-group">
                        <label for="r_parts">Parts replaced</label>
                        <table class="table table-striped" id="tbl_parts" name="tbl_parts">
                            <tr id="0">
                                <th>#</th>
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
            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="align-bottom">
                    </div>
                    <Button type="button" class="btn btn-info btn-lg btn-block" id="btn_add_fault_raw" onclick="addRow('tbl_fault')"> Add task to Table</button>
                </div>
            </div>

            <div class="form-row">

            </div>
            <div class="form-group">
                <label for="device_table">Faults and Errors</label>
                <table class="table table-striped" id="tbl_fault" name="tbl_fault">
                    <tr id="0">
                        <th>#</th>
                        <th>Device</th>
                        <th>Inventory</th>
                        <th>Serial</th>
                        <th>Fault</th>
                        <th>Status</th>
                    </tr>
                    <tbody id="tbody_fault">
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <label for="inputAddress2">Special Notes</label>
                <input type="text" class="form-control" id="sp_notes" placeholder="Add special notes">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="align-bottom">
                        <button type="button" class="btn btn-danger btn-lg btn-block" id="btn_save" name="btn_save" onclick="save_to_arr()">Save</button>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="align-bottom">
                        <button type="submit" class="btn btn-danger btn-lg btn-block" id="btn_finish" name="btn_finish" onclick="save_to_arr()">Save and Finish</button>

                    </div>

                </div>
            </div>
    </div>
    </form>
    </div>
</body>

</html>