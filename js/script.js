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

    select_district = document.getElementById("district");
    district = select_district.options[select_district.selectedIndex].text;

    select_zone = document.getElementById("zone");
    zone = select_zone.options[select_zone.selectedIndex].text;

    ws_dis = district.substring(0, 2);
    ws_zone = zone.substring(0, 2);

    // selectScl = document.getElementById("school");
    // sch = selectScl.options[selectScl.selectedIndex].text;

    dateArr = $('#ws_date').val().split('/');
    date = dateArr[0];


    select = document.getElementById("ws_level");
    ws_level = select.options[select.selectedIndex].text;

    select_exp = document.getElementById("expend_source");
    exp = select_exp.options[select_exp.selectedIndex].text;

    // var exp_value=document.getElementById("allocated_amount").text;
    exp_val = $('#allocated_amount').val();
    ws_count = $('#ws_coun').text();
    id_dis = district.substring(0, 3);
    id_zone = zone.substring(0, 3)
    year = date.split("-");
    ws_id = year[0] + "/" + id_dis + "/" + id_zone + "/" + ws_count;


    // school = sch;
    ws_level = ws_level;
    expType = exp;
    date = date;
    expVal = exp_val;

    // document.getElementById("last_lable").innerHTML(school);

    $("#ws_id_div").text("Work shop Id : " + ws_id);
    $("#user_div").text("ws level : " + ws_level);

    $("#dis_div").text("District : : " + ws_level);
    $("#zone_div").text("Zone : " + ws_level);
    // $("#sch_div").text("school : " + sch);
    $("#ws_level_div").text("Level : " + ws_level);
    $("#exp_div_div").text("Expenditure : " + expVal);
    $("#allocated_div").text("Allocated amt : " + ws_level);
    $("#date_div").text("Date : " + date);
    $("#lab_type_div").text("Lab Type : " + ws_level);



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
            exp: exp,
            date: date,
            exp_val: exp_val
        },
        success: function(response){
            window.location.href = "home.php";
        }


    });
}  

function addTask() {

   $ws_id= document.getElementById("new_task");
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
        success: function(response){
            window.location.href = "home.php";
        }


    });
}  







//added from st.js
// const arr_work_done = [];
// const arr_part_repd = [];
// const part_table = [];



function readTable(){
    const Orders = $("#tbl_fault tbody tr").filter(function() {
        const cells = $(this).find("td");
        return cells.eq(1).text().trim() != ""
      }).map(function() {
        const cells = $(this).find("td");
        return {
          [cells.eq(0).text().trim()]: +cells.eq(8).text()
        }
      }).get()
      
      console.log(Orders)
}

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

    // temp_row = {};
    // temp_row["r_parts"] = val4;
    // temp_row["quantity"] = val5;
    // temp_row["esti_price"] = val6;

    // part_table.push(temp_row);
    // len = part_table.length;
   
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