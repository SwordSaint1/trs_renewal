<script type="text/javascript">

const load_not_qualif =()=>{

     $('#spinner').css('display','block');
     
     var name = document.getElementById('name_not_qualif_requestor').value;
     var process = document.getElementById('process_not_qualif_requestor').value;
     console.log(name);
     console.log(process);
     
           $.ajax({
                url: '../../process/requestor/qualified.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_not_qualified',
                    name:name,
					process:process,
                  
                },success:function(response){
                    document.getElementById('list_of_not_qualif').innerHTML = response;
                    $('#spinner').fadeOut(function(){                       
                    });
                }
            }); 
}			
</script>