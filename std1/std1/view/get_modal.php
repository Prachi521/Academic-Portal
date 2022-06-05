<?php
include_once('../controller/config.php');

$id=$_GET["id"];



?>

<div class="modal msk-fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="modalInsertform" aria-hidden="true">  
  		<div class="modal-dialog ">
            <div class="container modal-content1 "><!--modal-content --> 
                <div class="row ">	
                    <div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">               
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                <h3 class="panel-title">upload notes</h3>
                            </div>
                             <form role="form"  method="post" id="form2" enctype="multipart/form-data">
                                <div class="panel-body"> <!-- Start of modal body--> 
                                    <div class="form-group" id="divRange1">
                                        <label for="" >Add notes</label>
                                         <input type="file" class="upload form-control" id="range1" name="fil" />

                                    </div>        
                                </div><!--/.modal body-->
                                <div class="panel-footer bg-blue-active">
                                    <input type="hidden" name="action" value="add" id="add"  />
                                 <input type="hidden" name='id' value="<?php echo $op?>">
                                    <input type="hidden" name="do" value="add_notes"  />
                                    <button type="submit"  class="btn btn-info btnS" id="btnSub" style="width:100%;">Submit</button>
                                </div>
                            </form>       
                        </div><!--/.panel-->
                    </div><!--/.col-md-3 --> 
                </div><!--/.row-->      
            </div><!-- /.modal-content -->  		 
        </div><!-- /.modal-dialog -->   
    </div>
    <script>
    $(document).ready(function(){
	
    $('#range1').attr('required', 'required');

   // $('#notes_uploaded').html('');
$('#range1').change(function(){
   var extension = $('#range1').val().split('.').pop().toLowerCase();
   if(extension != '')
   {
       if(jQuery.inArray(extension, ['docx','doc','pdf','txt','pptx']) == -1)
       {
           alert("Invalid File");
           $('#range1').val('');
           return false;
       }
   }
});

$('#form2').on('submit', function(event){
   event.preventDefault();
   
       $.ajax({
           url:"upload_action.php",
           method:"POST",
           async:'false',
           data:new FormData(this),
           dataType:'json',
           contentType:false,
           processData:false,
           beforeSend:function()
           {
               $('#btn_sub').attr('disabled', 'disabled');
               $('#btn_sub').val('wait...');
           },
           success:function(data)
           {
               $('#btn_sub').attr('disabled', false);
//                if(data==1){
//                    var mymode=$('#modalInsert');
//                   mymode.modal('hide');
//                var myModal = $('#subject_Duplicated  ');
//                 myModal.modal('show');
//             myModal.data('hideInterval', setTimeout(function(){
//                   myModal.modal('hide');
           
//            }, 3000));
//            }

//           else if(data==2){
//            var mymode=$('#modalInsert');
//        mymode.modal('hide');
       
//        var myModal = $('#insert_Success');
   
//        myModal.modal('show');

//        clearTimeout(myModal.data('hideInterval'));
//        myModal.data('hideInterval', setTimeout(function(){
//            myModal.modal('hide');
//        }, 3000));
       
       

// }

// else if(data==3){
   
//    var mymode=$('#modalInsert');
//        mymode.modal('hide');
//        var myModal = $('#connection_Problem');
//        myModal.modal('show');
       
//        clearTimeout(myModal.data('hideInterval'));
//        myModal.data('hideInterval', setTimeout(function(){
//            myModal.modal('hide');
//        }, 3000));
//        dataTable.ajax.reload();

               
//                }
//            }
//            })
//        });




           }
       });
});



})




</script>
