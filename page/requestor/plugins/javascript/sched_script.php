<script type="text/javascript">
$(document).ready(function(){
	load_sched_requestor();
});	

const load_sched_requestor =()=>{
	$('#spinner').css('display','block');
	var start = document.getElementById('start_date_view_sched_requestor').value;
	var shift = document.getElementById('shift_requestor').value;

	$.ajax({
      url: '../../process/requestor/schedule.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_sched',
                    start:start,
                    shift:shift
                },success:function(response){
                   document.getElementById('list_of_sched_requestor').innerHTML = response;
                   $('#spinner').fadeOut(function(){                       
                    });
                }
   });
}


const get_sched_details =(param)=>{
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

document.getElementById('id_view_req').value = id;
document.getElementById('id_training_code_update').value = training_code;
document.getElementById('shift_view_req').value = shift;
document.getElementById('start_date_view_req').value = start_date;
document.getElementById('end_date_view_req').value = end_date;
document.getElementById('start_time_view_req').value = start_time;
document.getElementById('end_time_view_req').value = end_time;
document.getElementById('location_view_req').value = location;
document.getElementById('trainer_view_req').value = trainer;
document.getElementById('slot_view_req').value = slot;

}

var fnames = document.getElementById("fname_for_sched");
fnames.addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    search_for_sched();
  }
});

var processs = document.getElementById("process_for_sched");
processs.addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    search_for_sched();
  }
});


const search_for_sched =()=>{
	var fname = document.getElementById('fname_for_sched').value;
	var process = document.getElementById('process_for_sched').value;
	var slot = document.getElementById('slot_view_req').value;

	$.ajax({
      url: '../../process/requestor/schedule.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_for_sched_req',
                    fname:fname,
                    process:process,
                    slot:slot
                },success:function(response){
                   document.getElementById('list_of_req_for_sched').innerHTML = response;
                }
   });

}

const uncheck_all =()=>{
    var select_all = document.getElementById('check_all_req_for_sched');
    select_all.checked = false;
    $('.singleCheck').each(function(){
        this.checked=false;
    });
}

const select_all_func =()=>{
    var select_all = document.getElementById('check_all_req_for_sched');
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

const sched =()=>{

 var arr = [];
    $('input.singleCheck:checkbox:checked').each(function () {
        arr.push($(this).val());
    });

  var training_code =  document.getElementById('id_training_code_update').value;
  var shift =	document.getElementById('shift_view_req').value;
  var start_date = document.getElementById('start_date_view_req').value;
  var end_date = document.getElementById('end_date_view_req').value;
  var start_time = document.getElementById('start_time_view_req').value;
  var end_time = document.getElementById('end_time_view_req').value;
  var location = document.getElementById('location_view_req').value;
  var trainer = document.getElementById('trainer_view_req').value;
  var slot = document.getElementById('slot_view_req').value;
  var requested_by = document.getElementById('sched_by').value;

    var numberOfChecked = arr.length;
    if(numberOfChecked > 0){
 
    $.ajax({
        url: '../../process/requestor/schedule.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'commit_sched',
            id:arr,
            training_code:training_code,
			shift:shift,
			start_date:start_date,
			end_date:end_date,
			start_time:start_time,
			end_time:end_time,
			location:location,
			trainer:trainer,
			slot:slot,
            requested_by:requested_by
        },success:function(response) {
            console.log(response);
            
            if (response == 'error'){
                swal('FAILED', 'FAILED', 'error');   
            }else{
                search_for_sched();
             uncheck_all();
             setTimeout(close, 1000);

                swal('SUCCESS!', 'Success', 'success');
            }
        }
    });
   }

}

const close =()=>{
	window.location.reload();

}
</script>