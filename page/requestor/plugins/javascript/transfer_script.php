<script type="text/javascript">
    
$(document).ready(function(){
    load_transfer_req();
});
    
const load_transfer_req =()=>{
    $('#spinner').css('display','block');
    var start = document.getElementById('start_date_transfer_req').value;
    var shift = document.getElementById('shift_transfer_req').value;
    var requested_by = document.getElementById('transfer_requested_by').value;
    $.ajax({
      url: '../../process/requestor/transfer.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_sched_transfer_req',
                    start:start,
                    shift:shift,
                    requested_by:requested_by
                },success:function(response){
                   document.getElementById('list_of_sched_transfer_req').innerHTML = response;
                   $('#spinner').fadeOut(function(){                       
                    });
                }
   });
}

const get_transfer_req_details =(param)=>{
    var string = param.split('~!~');
    var id = string[0];
    var training_code = string[1];
    var shift = string[2];
    var start_date = string[3];
    var end_date = string[4];
    var start_time = string[5];
    var end_time = string[6];
    var location = string[7];
    var trainer = string[8];
    var slot = string[9];


document.getElementById('id_transfer_req').value = id;
document.getElementById('id_training_code_transfer_req').value = training_code;
document.getElementById('shift_transfer_reqs').value = shift;
document.getElementById('start_date_transfer_reqs').value = start_date;
document.getElementById('end_date_transfer_req').value = end_date;
document.getElementById('start_time_transfer_req').value = start_time;
document.getElementById('end_time_transfer_req').value = end_time;
document.getElementById('location_transfer_req').value = location;
document.getElementById('trainer_transfer_req').value = trainer;
document.getElementById('slot_transfer_req').value = slot;
prev_req();
}

const prev_req =()=>{
    var tr_code = document.getElementById('id_training_code_transfer_req').value;
    var requested_by = document.getElementById('transfer_requested_by_prev').value;
    $.ajax({
      url: '../../process/requestor/transfer.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_prev_transfer_req',
                    tr_code:tr_code,
                    requested_by:requested_by
                },success:function(response){
                   document.getElementById('list_of_transfer_req').innerHTML = response;
            
                }
   });
}

function export_transfer_req(table_id, separator = ',') {
    // Select rows from table_id
    var rows = document.querySelectorAll('table#' + table_id + ' tr');
    // Construct csv
    var csv = [];
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll('td, th');
        for (var j = 0; j < cols.length; j++) {
            var data = cols[j].innerText.replace(/(\r\n|\n|\r)/gm, '').replace(/(\s\s)/gm, ' ')
            data = data.replace(/"/g, '""');
            // Push escaped string
            row.push('"' + data + '"');
        }
        csv.push(row.join(separator));
    }
    var csv_string = csv.join('\n');
    // Download it
    var filename = 'List_of_Transfer_to_Other_Process'+ '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
</script>