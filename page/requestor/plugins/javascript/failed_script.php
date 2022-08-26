<script type="text/javascript">
	
$(document).ready(function(){
    load_failed_req();
});
	
const load_failed_req =()=>{
	$('#spinner').css('display','block');
	var start = document.getElementById('start_date_failed_req').value;
	var shift = document.getElementById('shift_failed_req').value;

	$.ajax({
      url: '../../process/requestor/failed.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_sched_failed_req',
                    start:start,
                    shift:shift
                },success:function(response){
                   document.getElementById('list_of_sched_failed_req').innerHTML = response;
                   $('#spinner').fadeOut(function(){                       
                    });
                }
   });
}


const get_failed_req_details =(param)=>{
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


document.getElementById('id_failed_req').value = id;
document.getElementById('id_training_code_failed_req').value = training_code;
document.getElementById('shift_failed_reqs').value = shift;
document.getElementById('start_date_failed_reqs').value = start_date;
document.getElementById('end_date_failed_req').value = end_date;
document.getElementById('start_time_failed_req').value = start_time;
document.getElementById('end_time_failed_req').value = end_time;
document.getElementById('location_failed_req').value = location;
document.getElementById('trainer_failed_req').value = trainer;
document.getElementById('slot_failed_req').value = slot;
prev_req();
}
	
const prev_req =()=>{
    var tr_code = document.getElementById('id_training_code_failed_req').value;

    $.ajax({
      url: '../../process/requestor/failed.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_prev_failed_req',
                    tr_code:tr_code
                },success:function(response){
                   document.getElementById('list_of_failed_req').innerHTML = response;
            
                }
   });
}	

function export_failed_req(table_id, separator = ',') {
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

const uncheck_all =()=>{
    var select_all = document.getElementById('check_all_final_status');
    select_all.checked = false;
    $('.singleCheck').each(function(){
        this.checked=false;
    });
}

const select_all_func =()=>{
    var select_all = document.getElementById('check_all_final_status');
    if(select_all.checked == true){
        console.log('check');
        $('.singleCheck').each(function(){
            this.checked=true;
        });
    }else{
        console.log('uncheck');
        $('.singleCheck').each(function(){
            this.checked=false;
        }); 
    }
}

const submit_final_status =()=>{

 var arr = [];
    $('input.singleCheck:checkbox:checked').each(function () {
        arr.push($(this).val());
    });

  var final_status =  document.getElementById('final_status').value;
  var sc_code = document.getElementById('id_training_code_failed_req').value;

    var numberOfChecked = arr.length;
    if(numberOfChecked > 0){
 
    $.ajax({
        url: '../../process/requestor/failed.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'commit_final_status',
            id:arr,
            final_status:final_status,
            sc_code:sc_code
        },success:function(response) {
            // console.log(response);

             if (response == 'success'){
                  load_failed_req();
             uncheck_all();
             setTimeout(close, 1000);
                swal('SUCCESS!', 'Success', 'success');   
            }else{
                 swal('Information', 'Invalid', 'info');
             
                
            }
        }
    });
   }

}
const close =()=>{
    window.location.reload();

}
</script>