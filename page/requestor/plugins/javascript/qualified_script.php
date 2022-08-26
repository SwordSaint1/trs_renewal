<script type="text/javascript">
$(document).ready(function(){
    load_qualif();
});
const load_qualif =()=>{

     $('#spinner').css('display','block');
     
     var name = document.getElementById('name_requestor_qualified').value;
     var process = document.getElementById('process_requestor_qualified').value;
     
           $.ajax({
                url: '../../process/requestor/qualified.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_qualified',
                    name:name,
					process:process,
                  
                },success:function(response){
                    document.getElementById('list_of_qualified').innerHTML = response;
                    $('#spinner').fadeOut(function(){                       
                    });
                }
            }); 
}			
</script>