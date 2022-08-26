<script type="text/javascript">

$(document).ready(function(){
    load_for_auth();
}); 
	
const load_for_auth =()=>{
	$('#spinner').css('display','block');
	var start = document.getElementById('start_date_view_for_auth').value;
	var shift = document.getElementById('shift_for_auth').value;

	$.ajax({
      url: '../../process/admin/authorization.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_for_auth',
                    start:start,
                    shift:shift
                },success:function(response){
                   document.getElementById('list_of_for_auth').innerHTML = response;
                   $('#spinner').fadeOut(function(){                       
                    });
                }
   }); 
}

const get_for_authorization_details =(param)=>{
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

document.getElementById('id_for_auth').value = id;
document.getElementById('id_training_code_for_auth').value = training_code;
document.getElementById('shift_for_auths').value = shift;
document.getElementById('start_date_for_auth').value = start_date;
document.getElementById('end_date_for_auth').value = end_date;
document.getElementById('start_time_for_auth').value = start_time;
document.getElementById('end_time_for_auth').value = end_time;
document.getElementById('location_for_auth').value = location;
document.getElementById('trainer_for_auth').value = trainer;
document.getElementById('slot_for_auth').value = slot;

    prev_auth();
}

const prev_auth =()=>{
    var tr_code = document.getElementById('id_training_code_for_auth').value;

    $.ajax({
      url: '../../process/admin/authorization.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_prev_auth',
                    tr_code:tr_code
                },success:function(response){
                   document.getElementById('list_of_for_athorization').innerHTML = response;
                   count_row();
                }
   });
}

const count_row =()=>{
     var tr_code = document.getElementById('id_training_code_for_auth').value;

    $.ajax({
      url: '../../process/admin/authorization.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'count_row',
                    tr_code:tr_code
                },success:function(response){
                   document.getElementById('rowscount').innerHTML = response;
                   check();
                }
   });
}

const check =()=>{
    var rowcount = document.querySelector('#rowscount').innerHTML;
   if (rowcount >= 1) {
        $('#close_scheds').attr('disabled',true);
   }else{
        $('#close_scheds').attr('disabled',false);
   }
}

const close_sched =()=>{
    var tr_code = document.getElementById('id_training_code_for_auth').value;

    $.ajax({
      url: '../../process/admin/authorization.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'close_schedule',
                    tr_code:tr_code
                },success:function(response){
                   if (response == 'success') {
                    swal('Information','Successfully Closed','info');
                    load_for_auth();                   
                    setTimeout(refresh, 1000);
                   }else{
                    swal('Error','Error','error');
                   }
                }
   });
}   

const refresh =()=>{
     window.location.reload();
}

const uncheck_all =()=>{
    var select_all = document.getElementById('check_all_for_auth');
    select_all.checked = false;
    $('.singleCheck').each(function(){
        this.checked=false;
    });
}

const select_all_func =()=>{
    var select_all = document.getElementById('check_all_for_auth');
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


const submit =()=>{
    var arr = [];
    $('input.singleCheck:checkbox:checked').each(function () {
        arr.push($(this).val());
    });

    var attendance_status = document.getElementById('attendance_status_for_auth').value;
    var exam_status = document.getElementById('exam_status_for_auth').value;

    if (attendance_status == '') {
        swal('Information', 'Please Select Attendance Status', 'info');
    }else if(exam_status == ''){
        swal('Information', 'Please Select Exam Status', 'info');
    }else if(attendance_status == 'Did_not_Attend' && exam_status == 'Passed'){
        swal('Information', 'Invalid Status', 'info');
    }else if(attendance_status == 'Did_not_Attend' && exam_status == 'Ongoing'){
        swal('Information', 'Invalid Status', 'info');
    }else if(attendance_status == 'Did_not_Attend' && exam_status == 'Failed'){
        swal('Information', 'Invalid Status', 'info');
    }else if(attendance_status == 'Attend' && exam_status == 'Cancelled'){
        swal('Information', 'Invalid Status', 'info');
    }else{
    var numberOfChecked = arr.length;
    if(numberOfChecked > 0){
 
    $.ajax({ 
        url: '../../process/admin/authorization.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'authorization',
            id:arr,
            attendance_status:attendance_status,
            exam_status:exam_status
        },success:function(response) {
            if (response == 'success') {
                swal('Success','Successfully Authorize', 'success');
                load_for_auth();
                setTimeout(refresh, 1000);
            }else{
                swal('Error','Error','error');
            }
        }
        });
        }
}

}
</script>