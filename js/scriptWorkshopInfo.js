// page NewTask.php -------------------------------------------------------------------------------------------------------------
function saveDeviceToDB(st) {
    var device_serial = document.getElementById("device_serial").value;
    if (device_serial == "") {
        alert("Serial No is missing !");
    } else {
        if (st == 0) {
            saveDevice(0);
            loadFromDbToTable();
            readTableParts();
            window.location.href = "workshopInfo.php";
            location.reload(); ;
        } else {
            saveDevice(1);
            loadFromDbToTable();
            readTableParts();
            window.location.href = "home.php";

        }
    }

    // alert("Hello");

}
function saveDevice(finish) {
    
    job_id = $('#div_job_id').text();


    var device = document.getElementById("selectedDevice").value;
    var device_model = document.getElementById("device_model").value;
    var mfd = document.getElementById("mfd").value;
    var ecv = document.getElementById("ecv").value;
    var inventory = document.getElementById("inventory").value;
    var device_serial = document.getElementById("device_serial").value;
    var device_fault = document.getElementById("device_fault").value;
    var rep_state = document.getElementById("rep_state").value;
    alert(job_id);
    $.ajax({
        url: "addTask.php",
        type: "POST",
        data: {
            // ws_id_task_hid: ws_id_task_hid,
            // task_id_task_hid: task_id_task_hid,
            job_id: job_id,
            device_td: device,
            brand_td: device_model,
            mfd_td: mfd,
            ecv_td: ecv,
            inv_td: inventory,
            serial_td: device_serial,
            fault_td: device_fault,
            status_td: rep_state,
            finish:finish,

        },
        success: function (response) {
            // window.location.href = "workshopInfo.php";
        }
    });
}
function loadFromDbToTable() {
    $.ajax({
        url: "fetch_to_tbl_fault.php",
        type: "POST",
        data: {
            // ws_id_task_hid: ws_id_task_hid,
            // task_id_task_hid: task_id_task_hid,
            job_id: job_id,

        },
        success: function (response) {
            $("#tbody_fault").html(response);
            // window.location.href = "workshopInfo.php";
        }
    });
}

// adding value to repaired parts table in the page
function addPartsToTblRparts() {
    tblid2 = "#tbl_parts" + " tr:last";
    tid2 = $(tblid2).attr('id');
    lineNo2 = parseInt(tid2) + 1;
    part_id_tbl = document.getElementById("part_id").value;
    var dev_serial = document.getElementById("dev_serial").value;
    var val4 = document.getElementById("r_parts").value;
    var val5 = document.getElementById("quantity").value;
    var val6 = document.getElementById("esti_price").value;
    var val7 = document.getElementById("rep_state").value;
    markup2 = "<tr contenteditable='true' id="
        + part_id_tbl + "><td>"
        + dev_serial + "</td><td>"
        + part_id_tbl + "</td><td>"
        + val4 + "</td><td>"
        + val5 + "</td><td>"
        + val6 + "</td><td>"
        + val7 + "</td></tr>";

    tbody_parts = "#tbody_parts";
    tableBody_parts = $(tbody_parts);
    tableBody_parts.append(markup2);
}

// add reparired parts to db
function readTableParts() {

    $('#tbl_parts #tbody_parts tr').each(function () {
        var dev_serial = $(this).find("td").eq(0).html();
        var part_id = $(this).find("td").eq(1).html();
        var part = $(this).find("td").eq(2).html();
        var qty = $(this).find("td").eq(3).html();
        var estimated = $(this).find("td").eq(4).html();
        var status = $(this).find("td").eq(5).html();

        // var job_id=document.getElementById('div_job_id').text;

        alert(status);
        $.ajax({
            url: "addTaskPart.php",
            type: "POST",
            data: {
                // ws_id_task_hid: ws_id_task_hid,
                // task_id_task_hid: task_id_task_hid,
                dev_serial: dev_serial,
                part_id: part_id,
                part: part,
                qty: qty,
                estimated: estimated,
                status: status,
                job_id: job_id,

            },
            success: function (response) {
                // window.location.href = "home.php";
            }


        });
    });

}
