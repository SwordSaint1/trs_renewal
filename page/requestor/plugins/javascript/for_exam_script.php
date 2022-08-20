<script type="text/javascript">
$(document).ready(function(){
	load_for_exam();
});	

const load_for_exam =()=>{
	$('#spinner').css('display','block');
	var start = document.getElementById('start_date_for_exam').value;
	var shift = document.getElementById('shift_for_exam').value;

	$.ajax({
      url: '../../process/requestor/for_exam.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_for_exam',
                    start:start,
                    shift:shift
                },success:function(response){
                   document.getElementById('list_of_for_exam').innerHTML = response;
                   $('#spinner').fadeOut(function(){                       
                    });
                }
   });
}	


const get_for_exam_details =(param)=>{
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

document.getElementById('id_view_for_exam').value = id;
document.getElementById('id_training_code_for_exam').value = training_code;
document.getElementById('shift_view_for_exam').value = shift;
document.getElementById('start_date_view_for_exam').value = start_date;
document.getElementById('end_date_view_for_exam').value = end_date;
document.getElementById('start_time_view_for_exam').value = start_time;
document.getElementById('end_time_view_for_exam').value = end_time;
document.getElementById('location_view_for_exam').value = location;
document.getElementById('trainer_view_for_exam').value = trainer;
document.getElementById('slot_view_for_exam').value = slot;

prev_exam();

}

const prev_exam =()=>{
	var tr_code = document.getElementById('id_training_code_for_exam').value;
	$.ajax({
      url: '../../process/requestor/for_exam.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'prev_exam',
                    tr_code:tr_code
                },success:function(response){
                   document.getElementById('list_of_req_for_exam').innerHTML = response;
                   $('#spinner').fadeOut(function(){                       
                    });
                }
   });
}
	
</script>