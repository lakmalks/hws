// page NewTask.php -------------------------------------------------------------------------------------------------------------


function addToRTable() {
    // add resource person to tbl_resource_p table 
    nc_ws = document.getElementById("nc_ws_id");
    nc_ws_id = nc_ws.options[nc_ws.selectedIndex].value;


    tblid_res = "#tbl_resource_p tr:last";
    // tbl_res = $(tblid_res).attr('id');
    // count_res = parseInt(tbl_res) + 1;
    select_res = document.getElementById("task_resource_per").value;
    val_res = select_res.split("-");
    // alert(select_res);
    var rp_id_chk;
    markup_res = 
    "<tr contenteditable='true' id="
    // <input type=text name="+ val_res[0] +" id="+ val_res[0]+ " value="+ val_res[0]+" style="+'width:40px;'+" disabled>"
        + val_res[0] + "><td>"
        + val_res[0] +"</td><td>"
        + val_res[1] + "</td><td>"
        + val_res[2] + "</td><td>"
        + val_res[3] + "</td><td>"
        + val_res[4] + "</td></tr>";

    $('#tbl_resource_p #tbody_resource_p tr').each(function () {
        rp_id_chk = $(this).find("td").eq(0).html();
    });

    if (rp_id_chk != val_res[0]) {
        tbody_resource_p = "#tbody_resource_p";
        tableBody_parts = $(tbody_resource_p);
        tableBody_parts.append(markup_res);
    } else {
        alert("Already Added");
    }

}
function readTableRePerson() {
    // reading table value for db
    // and this will use inside tha saveTask function when click the save button 
   
    nc_sch = document.getElementById("task_school");
    nc_sch_id = nc_sch.options[nc_sch.selectedIndex].value;

    $('#tbl_resource_p #tbody_resource_p tr').each(function () {
        
        var rp_id = $(this).find("td").eq(0).html();
        // alert(rp_id);
        $.ajax({
            url: "add_rp_ws.php",
            type: "POST",
            data: {
                nc_ws_id: nc_ws_id,
                // nc_task_id: nc_task_id,
                rp_id: rp_id,
                nc_sch_id:nc_sch_id,

            },
            success: function (response) {
                
                window.location.href = "workshopInfo.php";
            }


        });
    });

}




// save task details 
function genTaskId() {
    var nc_ws = document.getElementById("nc_ws_id");
    var nc_ws_id = nc_ws.options[nc_ws.selectedIndex].value;
        $.ajax({
            url: "genTaskId.php",
            type: "POST",
            data: {
                nc_ws_id: nc_ws_id,
               

            },
            success: function (response) {
                $("#gen_task_id").html(response);
                // window.location.href = "workshopInfo.php";
                // alert(response);
            }


        });
}

