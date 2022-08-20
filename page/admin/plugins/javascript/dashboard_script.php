<script type="text/javascript">
$(document).ready(function(){
    search_announcement();
})
const search_announcement =()=>{
	var datefrom  = document.getElementById('attendance_from').value;
	var dateto = document.getElementById('attendance_to').value;

	$.ajax({
      url: '../../process/admin/announcement.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_announcement',
                    datefrom:datefrom,
					dateto:dateto
                },success:function(response){
                   document.getElementById('list_of_announcement').innerHTML = response;
                     
                }
   });
}

const get_announcement_details =(param)=>{
    console.log(param);
    var string = param.split('~!~');
    var id = string[0];
    var file_name = string[1];
    var announcement_description = string[2];
    var date_announce = string[3];
    var image = '../../process/admin/' + string[4];


document.getElementById('id_announcement_update').value = id;


$('#preview_announce_img').attr('src',image)

document.getElementById('description_announcement_update').value = announcement_description;
document.getElementById('date_announce_update').value = date_announce;
}

const delete_announcement =()=>{
    var id = document.getElementById('id_announcement_update').value;
    $.ajax({
        url: '../../process/admin/announcement.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'delete_announcement',
                    id:id
                },success:function(response){
                   if (response == 'success') {
                    swal('Information','Successfully Deleted!','info');
                    search_announcement();
                   }else{
                    swal('Error','Error','error');
                   }
                }
    });
}

</script>