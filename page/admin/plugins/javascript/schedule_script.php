<script type="text/javascript">
	
const add_schedule =()=> {

    setTimeout(generateBatchID,100);

} 

const generateBatchID =()=>{
    $.ajax({
        url: '../../process/admin/schedule.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'trcode'
        },success:function(response){
            $('#trcode').html(response);
        }
    });
} 

const register_sched =()=>{
	var trainer = document.getElementById('trainer_add_sched').value;
	var location = document.getElementById('location_add_sched').value;
	// var process = document.getElementById('process_add_sched').value;
	var shift = document.getElementById('shift_add_sched').value;
	var slot = document.getElementById('slot_add_sched').value;
	var start_date = document.getElementById('start_date_add_sched').value;
	var end_date = document.getElementById('end_date_add_sched').value;
	var start_time = document.getElementById('start_time_add_sched').value;
	var end_time = document.getElementById('end_time_add_sched').value;
	var user = document.getElementById('user_add_sched').value;
	var training_code = document.querySelector('#trcode').innerHTML;
	if (trainer == '') {
		swal('Information','Please Input Trainer','info');
	}else if(location == ''){
		swal('Information','Please Input Location','info');
	}
	// else if(process == ''){
	// 	swal('Information','Please Input Process','info');
	// }
	else if(shift == ''){
		swal('Information','Please Select Shift','info');
	}else if(slot == ''){
		swal('Information','Please Input Slot','info');
	}else if(start_date == ''){
		swal('Information','Please Select Start Date','info');
	}else if(end_date == ''){
		swal('Information','Please Select End Date','info');
	}else if(start_time == ''){
		swal('Information','Please Input Start Time','info');
	}else if(end_time == ''){
		swal('Information','Please Input End Time','info');
	}else if(start_date > end_date){
		swal('Information','Invalid Start & End Date','info');
	}else if(start_time > end_time){
		swal('Information','Invalid Start & End Time','info');
	}else{


	$.ajax({
		url: '../../process/admin/schedule.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'register_schedule',
                    trainer:trainer,
					location:location,
					// process:process,
					shift:shift,
					slot:slot,
					start_date:start_date,
					end_date:end_date,
					start_time:start_time,
					end_time:end_time,
					user:user,
					training_code:training_code
                },success:function(response){

                   if (response == 'Already Exist') {
                   	swal('Information','Schedule Already Exist!','info');
                   }
                   else if (response == 'success') {
                   	swal('Success','Successfully Registered!','success');
                    load_sched();
                   }else{
                   	swal('Error','Error!','error');      
                   }
                }
	});
}
}


const load_sched =()=>{
	$('#spinner').css('display','block');
	var start = document.getElementById('start_date_view_sched').value;

	$.ajax({
      url: '../../process/admin/schedule.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_schedule',
                    start:start
                },success:function(response){
                   document.getElementById('list_of_sched').innerHTML = response;
                   $('#spinner').fadeOut(function(){                       
                    });
                }
   });
}

const get_update_schedules =(param)=>{
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

document.getElementById('id_sched_update').value = id;
document.getElementById('id_training_code_update').value = training_code;
document.getElementById('shift_update_sched').value = shift;
document.getElementById('start_date_update_sched').value = start_date;
document.getElementById('end_date_update_sched').value = end_date;
document.getElementById('start_time_update_sched').value = start_time;
document.getElementById('end_time_update_sched').value = end_time;
document.getElementById('location_update_sched').value = location;
document.getElementById('trainer_update_sched').value = trainer;
document.getElementById('slot_update_sched').value = slot;

}

const update_sched =()=>{
	var user = document.getElementById('user_update_sched').value;
	var id = document.getElementById('id_sched_update').value;
	var training_code  = document.getElementById('id_training_code_update').value;
	// var process  = document.getElementById('process_update_sched').value;
	var shift  = document.getElementById('shift_update_sched').value;
	var start_date  = document.getElementById('start_date_update_sched').value;
	var end_date = document.getElementById('end_date_update_sched').value;
	var start_time = document.getElementById('start_time_update_sched').value;
	var end_time = document.getElementById('end_time_update_sched').value;
	var location = document.getElementById('location_update_sched').value;
	var trainer = document.getElementById('trainer_update_sched').value;
	var slot = document.getElementById('slot_update_sched').value;

	if (trainer == '') {
		swal('Information','Please Input Trainer','info');
	}else if(location == ''){
		swal('Information','Please Input Location','info');
	}
	// else if(process == ''){
	// 	swal('Information','Please Input Process','info');
	// }
	else if(shift == ''){
		swal('Information','Please Select Shift','info');
	}else if(slot == ''){
		swal('Information','Please Input Slot','info');
	}else if(start_date == ''){
		swal('Information','Please Select Start Date','info');
	}else if(end_date == ''){
		swal('Information','Please Select End Date','info');
	}else if(start_time == ''){
		swal('Information','Please Input Start Time','info');
	}else if(end_time == ''){
		swal('Information','Please Input End Time','info');
	}else if(start_date > end_date){
		swal('Information','Invalid Start & End Date','info');
	}else if(start_time > end_time){
		swal('Information','Invalid Start & End Time','info');
	}else{

	$.ajax({
		url: '../../process/admin/schedule.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'update_schedule',
                    user:user,
					id:id,
					training_code:training_code,
					// process:process,
					shift:shift,
					start_date:start_date,
					end_date:end_date,
					start_time:start_time,
					end_time:end_time,
					location:location,
					trainer:trainer,
					slot:slot
                },success:function(response){
                   if (response == 'Already Exist') {
                   	swal('Information','Schedule Already Exist!','info');
                   }
                   else if (response == 'success') {
                   	swal('Success','Successfully Registered!','success');
                    load_sched();
                   }else{
                   	swal('Error','Error!','error');      
                   }
                }
	});
}

}
</script>