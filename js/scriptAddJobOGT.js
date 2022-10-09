function loadTaskSo() {

    var selected_id = document.getElementById("ws_id");
    var ws_id = selected_id.options[selected_id.selectedIndex].value;
    $.ajax({
        url: "so_loadTask_addJob.php",
        type: "POST",
        data: {

            ws_id: ws_id,

        },
        success: function (result) {
            $("#task_id").html(result);
            // alert(result);
        }


    });
    filterTable_base(ws_id, 1);
}
function filterTable() {

    var selected_id = document.getElementById("ws_id");
    var ws_id = selected_id.options[selected_id.selectedIndex].value;

    var selected_task_id = document.getElementById("task_id");
    var task_id = selected_task_id.options[selected_task_id.selectedIndex].value;

    filterTable_base(ws_id, task_id)

}
// filterTable_base access from the upper functions
function filterTable_base(ws_id, task_id) {
    alert(task_id);
    $.ajax({
        url: "filterTableAj.php",
        type: "POST",
        data: {

            task_id: task_id,
            ws_id: ws_id,

        },
        success: function (result) {
            $("#tbody_all_task_table").html(result);
            // alert(result);
        }


    });
}


function passData() {
    // btn_add_job_to_task -->
    // this opens workshopINfo.php with passing valus

    nc_ws_id = document.getElementById("ws_id");
    nc_ws_id_tem = nc_ws_id.options[nc_ws_id.selectedIndex].value;

    nc_task_id = document.getElementById("task_id");
    nc_task_id_tem = nc_task_id.options[nc_task_id.selectedIndex].value;

    $.ajax({
        url: "add_job_aj.php",
        type: "POST",
        data: {
            nc_ws_id_tem: nc_ws_id_tem,
            nc_task_id_tem: nc_task_id_tem,

        },
        success: function (response) {

            window.location.href = "workshopInfo.php";
        }


    });


}
