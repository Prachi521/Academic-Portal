<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../index.php');
    exit;
}
?>
<?php include_once('head.php'); ?>
<?php include_once('header_teacher.php'); ?>
<?php include_once('sidebar2.php'); ?>
<?php include_once('alert.php'); ?>

<style>

body { 
	overflow-y:scroll;
}
.modal-content1 {
   position: absolute;
   left: 125px; 
}
@media only screen and (max-width: 500px) {

	.modal-content1 {
   		
		position:static;
   
	}
}

.form-control-feedback {
  
   pointer-events: auto;
  
}

.set-width-tooltip + .tooltip > .tooltip-inner { 
  
     min-width:180px;
}
.set-color-tooltip + .tooltip > .tooltip-inner { 
  
     min-width:180px;
	 background-color:red;
}

.msk-fade{  
      
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s

}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
        	Subject
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Subject</a></li>
            <li><a href="#">My Subject</a></li>
        </ol>
	</section>
    

	<!-- table for view all records -->
	<section class="content" > <!-- Start of table section -->
    	<div class="row" id="table1"><!--MSK-000132-1-->
        	<div class="col-md-7">
            	<div class="box">
                	<div class="box-header">
                 		
                  		<h3 class="box-title">My Subject</h3>
                	</div><!-- /.box-header -->
                	<div class="box-body table-responsive">
                    	<!-- MSK-00093-->
                		<table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <th class="col-md-1">ID</th>
                                <th class="col-md-1">Grade</th>
                                <th class="col-md-1">Subject</th>
                                <!-- <th class="col-md-1">Fee($)</th> -->
                            </thead>
                        	<tbody>
<?php
include_once('../controller/config.php');

$index=$_SESSION["index_number"];

$sql1="SELECT * FROM teacher WHERE index_number='$index'";
$result1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($result1);
$id=$row1['id'];

$sql="select grade.name as g_name,subject.name as s_name,subject_routing.id as sr_id,subject_routing.fee as s_fee
	  from subject_routing
	  inner join grade
      on subject_routing.grade_id=grade.id 
      inner join subject
      on subject_routing.subject_id=subject.id 
	  where subject_routing.teacher_id='$id'";
$result=mysqli_query($conn,$sql);
$count = 0;
$op='';
if(mysqli_num_rows($result) > 0) {
	while($row=mysqli_fetch_assoc($result)){
		$count++;
        $op=$row['sr_id'];
?>   
                                <tr>
                                    <td><?php echo $count; ?></td>
               						<td><?php echo $row['g_name']; ?></td>
               						<td><?php echo $row['s_name']; ?></td>
               					
                                       <td>	<a href="#" id='did' onClick="showModal('<?php echo $op?>')" class="btn btn-info btn-xs" data-id="<?php echo $op?>"data-toggle="modal">Add notes</a></td>
                            	</tr>
<?php } } ?>
                        	</tbody>
                    	</table>
                	</div><!-- ./box-body -->
            	</div><!-- ./box -->
        	</div> 
    	</div><!-- ./row -->
	</section> <!-- End of table section --> 
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
                                 <input type="hidden" name='sid'  id='sid' value=''>
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
  
<!--redirect your own url when clicking browser back button -->
<script>
function showModal(id){
    $('#form2')[0].reset();
var Id =id; 


var mymode=$('#modalInsert');
        mymode.modal('show');
        $('input[name="sid"]').val(Id);
}





(function(window, location) {
history.replaceState(null, document.title, location.pathname+"#!/history");
history.pushState(null, document.title, location.pathname);

window.addEventListener("popstate", function() {
  if(location.hash === "#!/history") {
    history.replaceState(null, document.title, location.pathname);
    setTimeout(function(){
      location.replace("../index.php");//path to when click back button
    },0);
  }
}, false);
}(window, location));

$('#range1').attr('required', 'required');


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
                    if(data==1){
						var mymode=$('#modalInsert');
			           mymode.modal('hide');
		            var myModal = $('#notes_Duplicated  ');
		         	myModal.modal('show');
    		     myModal.data('hideInterval', setTimeout(function(){
    		       	myModal.modal('hide');
				
    	    	}, 3000));
				}

	           else if(data==2){
				var mymode=$('#modalInsert');
			mymode.modal('hide');
			
			var myModal = $('#insert_Success');
		
			myModal.modal('show');

			clearTimeout(myModal.data('hideInterval'));
    		myModal.data('hideInterval', setTimeout(function(){
    			myModal.modal('hide');
    		}, 3000));
			
			
	
	}

	else if(data==3){
		
		var mymode=$('#modalInsert');
			mymode.modal('hide');
			var myModal = $('#connection_Problem');
			myModal.modal('show');
			
			clearTimeout(myModal.data('hideInterval'));
    		myModal.data('hideInterval', setTimeout(function(){
    			myModal.modal('hide');
    		}, 3000));
            dataTable.ajax.reload();

					
					}
				}



        
       });
});

</script>
  	 	
</div><!-- /.content-wrapper -->  
                         
<?php include_once('footer.php');?>