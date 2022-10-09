<?php
include("conn.php");

function load_val($sql)
{

    global $conn;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    return $options;
}


function loadTable($sq)
{
    
    global $conn;
    $res = $conn->query($sq);

    if (!$res->num_rows > 0) {
        echo "<h2>No record found</h2>";
    } else {
        $opt = mysqli_fetch_all($res, MYSQLI_ASSOC);
        foreach ($opt as $option) {
            $ak = array_keys($option);
            echo "<tr> ";
            foreach ($ak as $key) {
                echo   "<td>$option[$key] </td>";
            }
            echo "</tr>";
        }
    }
}
function taskCount($sql)
{

    global $conn;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $val = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    return $val;
}

// function loadOptions($c, $sql, $item)
// {
//     $result = $c->query($sql);
//     if ($result->num_rows > 0) {
//         $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
//         // echo $options;
//     }
//     foreach ($options as $option_device) {
//         $device = $option_device[$item];
//         $opt = "<option id=$device name=$device>$device</option>";
//         echo $opt;
//     }

//     return $options;
// }

function logout()
{
    session_destroy();
    //     $newURL = "index.php";
    //   header('Location: ' . $newURL);
}
function loadTaskId($sql){
    global $conn;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $val = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    return $val;
}