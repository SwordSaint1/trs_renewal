<script type="text/javascript">
	
$(document).ready(function(){
    load_failed();
});
	
const load_failed =()=>{
	$('#spinner').css('display','block');
	var start = document.getElementById('start_date_failed').value;
	var shift = document.getElementById('shift_failed').value;

	$.ajax({
      url: '../../process/admin/failed.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_sched_failed',
                    start:start,
                    shift:shift
                },success:function(response){
                   document.getElementById('list_of_sched_failed').innerHTML = response;
                   $('#spinner').fadeOut(function(){                       
                    });
                }
   });
}


const get_failed_details =(param)=>{
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


document.getElementById('id_failed').value = id;
document.getElementById('id_training_code_failed').value = training_code;
document.getElementById('shift_faileds').value = shift;
document.getElementById('start_date_faileds').value = start_date;
document.getElementById('end_date_failed').value = end_date;
document.getElementById('start_time_failed').value = start_time;
document.getElementById('end_time_failed').value = end_time;
document.getElementById('location_failed').value = location;
document.getElementById('trainer_failed').value = trainer;
document.getElementById('slot_failed').value = slot;
prev();
}
	
const prev =()=>{
    var tr_code = document.getElementById('id_training_code_failed').value;

    $.ajax({
      url: '../../process/admin/failed.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_prev_failed',
                    tr_code:tr_code
                },success:function(response){
                   document.getElementById('list_of_failed').innerHTML = response;
                   count_row();
                }
   });
}	

function export_failed(table_id, separator = ',') {
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
    var filename = 'List_of_Failed'+ '_' + new Date().toLocaleDateString() + '.csv';
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