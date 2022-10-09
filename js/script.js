initMultiStepForm();

function initMultiStepForm() {
    const progressNumber = document.querySelectorAll(".step").length;
    const slidePage = document.querySelector(".slide-page");
    const submitBtn = document.querySelector(".submit_b");
    const progressText = document.querySelectorAll(".step p");
    const progressCheck = document.querySelectorAll(".step .check");
    const bullet = document.querySelectorAll(".step .bullet");
    const pages = document.querySelectorAll(".page");
    const nextButtons = document.querySelectorAll(".next");
    const prevButtons = document.querySelectorAll(".prev");
    const stepsNumber = pages.length;

    if (progressNumber !== stepsNumber) {
        console.warn(
            "Error, number of steps in progress bar do not match number of pages"
        );
    }

    document.documentElement.style.setProperty("--stepNumber", stepsNumber);

    let current = 1;

    for (let i = 0; i < nextButtons.length; i++) {
        nextButtons[i].addEventListener("click", function (event) {
            event.preventDefault();

            inputsValid = validateInputs(this);
            // inputsValid = true;

            if (inputsValid) {
                slidePage.style.marginLeft = `-${(100 / stepsNumber) * current
                    }%`;
                bullet[current - 1].classList.add("active");
                progressCheck[current - 1].classList.add("active");
                progressText[current - 1].classList.add("active");
                current += 1;
            }
        });
    }

    for (let i = 0; i < prevButtons.length; i++) {
        prevButtons[i].addEventListener("click", function (event) {
            event.preventDefault();
            slidePage.style.marginLeft = `-${(100 / stepsNumber) * (current - 2)
                }%`;
            bullet[current - 2].classList.remove("active");
            progressCheck[current - 2].classList.remove("active");
            progressText[current - 2].classList.remove("active");
            current -= 1;
        });
    }
    // submitBtn.addEventListener("click", function () {
    //     location.replace("workshopInfo.php");


    // });



    function validateInputs(ths) {
        let inputsValid = true;

        const inputs =
            ths.parentElement.parentElement.querySelectorAll("input");
        for (let i = 0; i < inputs.length; i++) {
            const valid = inputs[i].checkValidity();
            if (!valid) {
                inputsValid = false;
                inputs[i].classList.add("invalid-input");
            } else {
                inputs[i].classList.remove("invalid-input");
            }
        }
        return inputsValid;
    }
    function validateSelects(ths) {
        let inputsValid = true;

        const inputs =
            ths.parentElement.parentElement.querySelectorAll("select");
        for (let i = 0; i < inputs.length; i++) {
            const valid = inputs[i].checkValidity();
            if (!valid) {
                inputsValid = false;
                inputs[i].classList.add("invalid-input");
            } else {
                inputs[i].classList.remove("invalid-input");
            }
        }
        return inputsValid;
    }

}
function loadZone() {
    var select = document.getElementById("district");
    var district = select.options[select.selectedIndex].text;

    $.ajax({
        url: "func.php",
        type: "POST",
        data: {
            district: district
        },
        cache: false,
        success: function (result) {
            $("#zone").html(result);
            // alert(result);
        }
    });
}
function loadSch() {
    var select = document.getElementById("nc_ws_id");
    var selected_id = select.options[select.selectedIndex].value;

    $.ajax({
        url: "loadSch.php",
        type: "POST",
        data: {
            selected_id: selected_id
        },
        cache: false,
        success: function (result) {
            $("#task_school").html(result);
            // alert(result);
        }
    });
}

// function addSession() {

//     var selectScl = document.getElementById("school");
//     var sch = selectScl.options[selectScl.selectedIndex].text;

//     var dateArr=$('#ws_date').val().split('/');
//     var date=dateArr[0];

//     var select = document.getElementById("ws_level");
//     var ws_level = select.options[select.selectedIndex].text;

//     var select_exp= document.getElementById("expend_source");
//     var exp = select_exp.options[select_exp.selectedIndex].text;

//     // var exp_value=document.getElementById("allocated_amount").text;
//     var exp_val=$('#allocated_amount').val();
//     alert(exp_val);
//             $.ajax({
//                 url: "addSession.php",
//                 type: "POST",
//                 data: {
//                     sch:sch,
//                     ws_level: ws_level,
//                     exp: exp,
//                     date:date,
//                     exp_val:exp_val
//                 }
//             });    

// }

function addTemp() {

    var select_district = document.getElementById("district");
    district = select_district.options[select_district.selectedIndex].text;

    var select_zone = document.getElementById("zone");
    zone = select_zone.options[select_zone.selectedIndex].text;

    // var ws_dis = district.substring(0, 2);
    // var ws_zone = zone.substring(0, 2);

    // selectScl = document.getElementById("school");
    // sch = selectScl.options[selectScl.selectedIndex].text;

    var dateArr = $('#ws_date').val().split('/');
    date = dateArr[0];


    var select = document.getElementById("ws_level");
    ws_level = select.options[select.selectedIndex].text;

    var select_exp = document.getElementById("expend_source");
    exp = select_exp.options[select_exp.selectedIndex].text;

    // var exp_value=document.getElementById("allocated_amount").text;
    exp_val = $('#allocated_amount').val();
    var ws_count = $('#ws_coun').text();
    var id_dis = district.substring(0, 3);
    var id_zone = zone.substring(0, 3)
    var year = date.split("-");
    ws_id = year[0] + "/" + id_dis + "/" + id_zone + "/" + ws_count;

    var lab_type = document.getElementById("lab_type");
    ws_lab_type = lab_type.options[lab_type.selectedIndex].text;

    // school = sch;
    ws_level = ws_level;
    exp_type = exp;
    date = date;
    expVal = exp_val;

    // document.getElementById("last_lable").innerHTML(school);

    $("#ws_id_div").text("Work shop Id : " + ws_id);
    $("#user_div").text("ws level : " + ws_level);

    $("#dis_div").text("District : : " + district);
    $("#zone_div").text("Zone : " + zone);
    // $("#sch_div").text("school : " + sch);
    $("#ws_level_div").text("Level : " + ws_level);
    $("#exp_div_div").text("Expenditure : " + exp_type);
    $("#allocated_div").text("Allocated amt : " + exp_val);
    $("#date_div").text("Date : " + date);
    $("#lab_type_div").text("Lab Type : " + ws_lab_type);



}

function addTempToVar() {
    addTemp();
    $.ajax({
        url: "addSession.php",
        type: "POST",
        data: {
            ws_id: ws_id,
            district: district,
            zone: zone,
            // sch: sch,
            ws_level: ws_level,

            exp: exp,
            date: date,
            exp_val: exp_val
        }

    });
}
function addTempToDb() {
    addTemp();
    $.ajax({
        url: "add_ws_db.php",
        type: "POST",
        data: {
            ws_id: ws_id,
            district: district,
            zone: zone,
            // sch: sch,
            ws_level: ws_level,
            exp_type: exp_type,
            date: date,
            exp_val: exp_val
        },
        success: function (response) {
            window.location.href = "home.php";
        }


    });
}

function addTask() {

    $ws_id = document.getElementById("new_task");
    addTemp();
    $.ajax({
        url: "new_task.php",
        type: "POST",
        data: {
            ws_id: ws_id,
            district: district,
            zone: zone,
            // sch: sch,
            ws_level: ws_level,
            exp: exp,
            date: date,
            exp_val: exp_val
        },
        success: function (response) {
            window.location.href = "home.php";
        }


    });
}

//added from st.js
// const arr_work_done = [];
// const arr_part_repd = [];
// const part_table = [];


// function readTableParts() {

//     $('#tbl_parts #tbody_parts tr').each(function () {
//         var dev_serial = $(this).find("td").eq(0).html();
//         var part_id = $(this).find("td").eq(1).html();
//         var part = $(this).find("td").eq(2).html();
//         var qty = $(this).find("td").eq(3).html();
//         var estimated = $(this).find("td").eq(4).html();
//         var status = $(this).find("td").eq(5).html();
//         alert(status);
//         $.ajax({
//             url: "addTaskPart.php",
//             type: "POST",
//             data: {
//                 // ws_id_task_hid: ws_id_task_hid,
//                 // task_id_task_hid: task_id_task_hid,
//                 dev_serial:dev_serial,
//                 part_id: part_id,
//                 part: part,
//                 qty: qty,
//                 estimated: estimated,
//                 status: status,

//             },
//             success: function (response) {
//                 // window.location.href = "home.php";
//             }


//         });
//     });

// }

function readTableFault(state_complete) {
    readTableParts();
    $('#tbl_fault #tbody_fault tr').each(function () {

        var device_td = $(this).find("td").eq(1).html();
        var brand_td = $(this).find("td").eq(2).html();
        var mfd_td = $(this).find("td").eq(3).html();
        var ecv_td = $(this).find("td").eq(4).html();
        var inv_td = $(this).find("td").eq(5).html();
        var serial_td = $(this).find("td").eq(6).html();
        var fault_td = $(this).find("td").eq(7).html();
        var status_td = $(this).find("td").eq(8).html();


        $.ajax({
            url: "addTask.php",
            type: "POST",
            data: {
                // ws_id_task_hid: ws_id_task_hid,
                // task_id_task_hid: task_id_task_hid,
                device_td: device_td,
                brand_td: brand_td,
                mfd_td: mfd_td,
                ecv_td: ecv_td,
                inv_td: inv_td,
                serial_td: serial_td,
                fault_td: fault_td,
                status_td: status_td,

            },
            success: function (response) {
                if(state_complete==1){
                    window.location.href = "home.php";
                }
                
            }


        });
    });





}

// Device table
function addRow(tbl) {
    var tblid1 = "#" + tbl + " tr:last";
    var tid1 = $(tblid1).attr('id');
    var lineNo1 = parseInt(tid1) + 1;
    var val1 = document.getElementById("selectedDevice").value;

    var val_brand = document.getElementById("device_model").value;
    var val_mfd = document.getElementById("mfd").value;
    var val_ecv = document.getElementById("ecv").value;

    var val2 = document.getElementById("inventory").value;
    var val3 = document.getElementById("device_serial").value;
    var val_dev_fault = document.getElementById("device_fault").value;
    var val_rep_state = document.getElementById("rep_state").value;

    // val_rep_state = rep_state[rep_state.selectedIndex].id;
    // $("#r_parts").val(val_rep_state);

    if (val_ecv == 0) {

        val_ecv = 0;
    }

    //inventory
    if (val2 == 0) {

        val2 = 0;
    }
    if (val_mfd == 0) {

        val_mfd = "0000-00-00";
    }

    if (val3 != 0) {

        var markup1 = "<tr contenteditable='true' id="
            + lineNo1 + "><td>"
            + lineNo1 + "</td><td>"
            + val1 + "</td><td>"

            + val_brand + "</td><td>"
            + val_mfd + "</td><td>"
            + val_ecv + "</td><td>"

            + val2 + "</td><td>"
            + val3 + "</td><td>"
            + val_dev_fault + "</td><td>"
            + val_rep_state + "</td></tr>";

        var tbody_fault = "#tbody_fault";
        var tableBody = $(tbody_fault);
        tableBody.append(markup1);
        $("#device_serial").addClass("form-control");


    } else {
        // is the serial no is null 
        alert("Else");
        $("#device_serial").addClass("form-control is-invalid");
    }
}




function unhide_div(item, op1, op2, divID) {
    it_val = item.value;
    dev_serial=document.getElementById("device_serial").value;
    $("#dev_serial").val(dev_serial);
    if (it_val == "guided" || it_val == "replaced") {
        $("#parts_div").show()
        // alert("hh")
    } else {
        $("#parts_div").hide(0)
    }



    // }
    // function save_to_arr() {
    //     device = document.getElementById("selectedDevice").value
    //     brand = document.getElementById("device_model").value
    //     mfd = document.getElementById("mfd").value
    //     ecv = document.getElementById("ecv").value
    //     inventory = document.getElementById("inventory").value
    //     serial = document.getElementById("device_serial").value
    //     faults = document.getElementById("device_fault").value
    //     stat = document.getElementById("rep_state").value
    //     other = document.getElementById("sp_notes").value

    //     arr_work_done["device"] = device;
    //     arr_work_done["brand"] = brand;
    //     arr_work_done["mfd"] = mfd;
    //     arr_work_done["ecv"] = ecv;
    //     arr_work_done["inventory"] = inventory;
    //     arr_work_done["serial"] = serial;
    //     arr_work_done["faults"] = faults;
    //     arr_work_done["stat"] = stat;
    //     arr_work_done["other"] = other;


    //     $.ajax({
    //         url: "add_todb.php",
    //         type: "POST",
    //         data: {
    //             device: device,
    //             brand: brand,
    //             mfd: mfd,
    //             ecv: ecv,
    //             inventory: inventory,
    //             serial: serial,
    //             faults: faults,
    //             stat: stat,
    //             other: other,
    //         }
    //     });

    // p = 0
    // while (p < len) {
    //     x = part_table[p];

    //     for (var i in x) {
    //         // console.log("key " + i + " has value " + x[i]);

    //     } p = p + 1;

    // }
    // console.log("__________________________ ");


}

//get part ID from part select onchange 
function loadPartID() {
    part_id = r_parts[r_parts.selectedIndex].id;
    $("#part_id").val(part_id);
}
function loadTask() {

    select = document.getElementById("nc_ws_id");
    selected_id = select.options[select.selectedIndex].value;

    $.ajax({
        url: "loadSch.php",
        type: "POST",
        data: {
            selected_id: selected_id
        },
        cache: false,
        success: function (result) {
            $("#task_school").html(result);
            // alert(result);
        }
    });
}





// make report-------------------------------------------------------------------------------------------------------------
function loadTaskForReport() {

    var select = document.getElementById("rep_ws_id");
    var selected_id = select.options[select.selectedIndex].value;

    $.ajax({
        url: "loadSch.php",
        type: "POST",
        data: {
            selected_id: selected_id
        },
        cache: false,
        success: function (result) {
            $("#rep_task").html(result);
            // alert(result);
        }
    });
}