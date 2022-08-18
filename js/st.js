const arr_work_done = [];
const arr_part_repd = [];
const part_table = [];

// Device table
function addRow(tbl) {
    tblid1 = "#" + tbl + " tr:last";
    tid1 = $(tblid1).attr('id');
    lineNo1 = parseInt(tid1) + 1;
    val1 = document.getElementById("device_model").value;
    val2 = document.getElementById("inventory").value;
    val3 = document.getElementById("device_serial").value;
    val_dev_fault = document.getElementById("device_fault").value;
    val_rep_state = document.getElementById("rep_state").value;
    markup1 = "<tr contenteditable='true' id="
        + lineNo1 + "><td>"
        + lineNo1 + "</td><td>"
        + val1 + "</td><td>"
        + val2 + "</td><td>"
        + val3 + "</td><td>"
        + val_dev_fault + "</td><td>"
        + val_rep_state + "</td><td>"
        + "</td></tr>";

    tbody_fault = "#tbody_fault";
    tableBody = $(tbody_fault);
    tableBody.append(markup1);
}

function addRow2(tbl2) {
    tblid2 = "#" + tbl2 + " tr:last";
    tid2 = $(tblid2).attr('id');
    lineNo2 = parseInt(tid2) + 1;
    val4 = document.getElementById("r_parts").value;
    val5 = document.getElementById("quantity").value;
    val6 = document.getElementById("esti_price").value;
    val7 = document.getElementById("rep_state").value;
    markup2 = "<tr contenteditable='true' id="
        + lineNo2 + "><td>"
        + lineNo2 + "</td><td>"
        + val4 + "</td><td>"
        + val5 + "</td><td>"
        + val6 + "</td><td>"
        + val7 + "</td></tr>";

    tbody_parts = "#tbody_parts";
    tableBody_parts = $(tbody_parts);
    tableBody_parts.append(markup2);

    temp_row = {};
    temp_row["r_parts"] = val4;
    temp_row["quantity"] = val5;
    temp_row["esti_price"] = val6;

    part_table.push(temp_row);
    len = part_table.length;
   
    // p = 0
    // while (p < len) {
    //     x = part_table[p];

    //     for (var i in x) {
    //         console.log("key " + i + " has value " + x[i]);

    //     } p = p + 1;

    // }
    // console.log("__________________________ ");
}
function unhide_div(item) {
    it_val = item.value;

    if (it_val == "guided" || it_val == "replaced") {
        $("#parts_div").show()
        alert("hh")
    } else {
        $("#parts_div").hide(0)
    }
}
function save_to_arr() {
    device = document.getElementById("selectedDevice").value
    brand = document.getElementById("device_model").value
    mfd = document.getElementById("mfd").value
    ecv = document.getElementById("ecv").value
    inventory = document.getElementById("inventory").value
    serial = document.getElementById("device_serial").value
    faults = document.getElementById("device_fault").value
    stat = document.getElementById("rep_state").value
    other = document.getElementById("sp_notes").value

    arr_work_done["device"] = device;
    arr_work_done["brand"] = brand;
    arr_work_done["mfd"] = mfd;
    arr_work_done["ecv"] = ecv;
    arr_work_done["inventory"] = inventory;
    arr_work_done["serial"] = serial;
    arr_work_done["faults"] = faults;
    arr_work_done["stat"] = stat;
    arr_work_done["other"] = other;


    $.ajax({
        url: "add_todb.php",
        type: "POST",
        data: {
            device: device,
            brand: brand,
            mfd: mfd,
            ecv: ecv,
            inventory: inventory,
            serial: serial,
            faults: faults,
            stat: stat,
            other: other,
        }
    });

    // p = 0
    // while (p < len) {
    //     x = part_table[p];

    //     for (var i in x) {
    //         // console.log("key " + i + " has value " + x[i]);

    //     } p = p + 1;

    // }
    // console.log("__________________________ ");
}