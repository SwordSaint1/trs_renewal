<script type="text/javascript">
$(document).ready(function(){
    load_expired();
});
const load_expired =()=>{

     $('#spinner').css('display','block');
     
     var name = document.getElementById('name_expired_requestor').value;
     var process = document.getElementById('process_expired_requestor').value;
     
           $.ajax({
                url: '../../process/requestor/expired.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_expired',
                    name:name,
					process:process,
                  
                },success:function(response){
                    document.getElementById('list_of_expired').innerHTML = response;
                    $('#spinner').fadeOut(function(){                       
                    });
                }
            }); 
}			
</script>