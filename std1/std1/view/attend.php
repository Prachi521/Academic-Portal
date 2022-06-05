
<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../index.php');
    exit;
}
?><?php include_once('head.php'); ?>
<?php include_once('header_teacher.php'); ?>
<?php include_once('sidebar2.php'); ?>
<?php include_once('alert.php'); ?>
<style>

.form-control-feedback {
  
   pointer-events: auto;
  
}

.set-width-tooltip + .tooltip > .tooltip-inner { 
     min-width:180px;
}

.cal-table{
	
	width:100%;
	padding:0;
	margin:0;	

}

#calendar_dates{
	padding:10px;
	margin-left:10px;
	width:95%;	
	
}

.tHead{
	
	height:40px;
	background-color:#8e1c82;
	color:#FFF;
	text-align:center;
	border:1px solid #FFF;
	width:70px;
}

.cal-tr{
	height:50px;
	
}

.td_no_number{
	border:1px solid white;
	width:70px;
	background-color:#979045;
	padding:0;
}



.cal-number-td{
	border:1px solid white;
	width:70px;
	background-color:#677be2;
	color:white;
	
		
}


.h5{
	color:#FFF;
	display: inline-block;
	background:#636;
	width:25px;
	height:25px;	
	font-size:14px;
	font-weight:bold;
	font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
	text-align:center;
	float:right;
	padding-top:5px;
	margin-bottom:20px;
	
}
.div-event-c{
	margin-top:65%;
	height:17px;
	
}

#cal_month{
	width:20%;
	border-radius:5%;
	
	padding:0;
}
#cal_year{
	width:15%;
	border-radius:5%;
	margin-left:5px;
	padding:0;
}





.present{
	background-color:#00FF66;
	
}

.absent{
	background-color:#FF0033;
	
}

.not_held{
	background-color:#FFCC33;
	
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <section class="content-header">
		<div class="row">
    <div class="col-md-9" >	
	<h1>
        	Attendance
        	<small>Preview</small>
        </h1>
</div>
        <div class="col-md-3" align="right">
		<a href="#" id='attendance' onClick="showModal()" class="btn btn-info btn-xs" data-toggle="modal">Add attendance</a>
		<a href="#" id='rattendance' onClick="showModal2()" class="btn btn-info btn-xs" data-toggle="modal">create report</a>
        </div>
		</div>
	</section>
    
 
    
    <!-- table for view all records -->     
	<section class="content" > <!-- Start of table section -->
    	<div class="row" id="table1"><!--MSK-000132-1-->    
            <div class="col-md-12">
            	<div class="box">
                	<div class="box-header">
                    	<h3 class="box-title">My Attendance in this Month</h3>
                	</div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                         <div class="row">
                            <div class=" col-md-7">
                                  
                                <table id="attendance_table" class="table table-bordered table-striped">
                                	<thead>
                                    	<th class="col-md-1">Student Name</th>
                                        <th class="col-md-2">Roll Number</th>
                                        <th class="col-md-1">Grade</th>
                                        <th class="col-md-1">Subject</th>
                                        <th class="col-md-1">Attendance Status</th>
                                        <th class="col-md-1">Date</th>
                                    
                                    </thead>
                                   	<tbody>

                        			</tbody>
                    			</table>
                        	</div>
                           
                       
                    	</div>
	</div>
                	</div><!-- /.box-body -->           
            	</div><!-- /.box-->
        	</div> 
		</div>
	</section>   

	<div class="modal msk-fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="modalInsertform" aria-hidden="true">  
  		<div class="modal-dialog ">
            <div class="container modal-content1 "><!--modal-content --> 
                <div class="row ">	
                    <div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">               
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                <h3 class="panel-title">Select Class</h3>
                            </div>
                             <form role="form"  method="post" id="form2" enctype="multipart/form-data">
                                <div class="panel-body"> <!-- Start of modal body--> 
                                    <div class="form-group" id="divRange1">
                                        <label for="" >class</label>
                                        <select name="atten" id="atten">
											<option value="0">Select</option>
										<?php
                                            include_once('../controller/config.php');

											$index=$_SESSION["index_number"];
											
											$sql1="SELECT * FROM teacher WHERE index_number='$index'";
											$result1=mysqli_query($conn,$sql1);
											$row1=mysqli_fetch_assoc($result1);
											$id=$row1['id'];
											
											$sql="select distinct(subject_routing.grade_id),grade.name from subject_routing INNER JOIN grade on grade.id=subject_routing.grade_id where subject_routing.teacher_id='$id'";
											$result=mysqli_query($conn,$sql);
											if(mysqli_num_rows($result) > 0) {
												while($row=mysqli_fetch_assoc($result)){
                                            ?>
											<option value="<?php echo $row["grade_id"];?>"><?php echo $row["name"];?></option>

											<?php }}?>
										</select>

                                    </div>   
									<div class="form-group" id="divRange1">
                                        <label for="" >Subject</label>
                                        <select name="attensub" id="attensub">  
											<option value="">Select</option>   
									</div>
                                </div><!--/.modal body-->
                                <div class="panel-footer bg-blue-active">
                                    <input type="hidden" name="action" value="class" id="add"  />
                                    
                                   <input type="hidden" name="do" value="add_class_atten"  />
                                   <button type="submit"  class="btn btn-info btnS" id="btnSub" style="width:100%;">Submit</button>
                                </div>
                            </form>       
                        </div><!--/.panel-->
                    </div><!--/.col-md-3 --> 
                </div><!--/.row-->      
            </div><!-- /.modal-content -->  		 
        </div><!-- /.modal-dialog -->   
    </div>
	</div>

	<div class="modal msk-fade" id="modalInsertatten" tabindex="-1" role="dialog" aria-labelledby="modalform" aria-hidden="true">  
  		<div class="modal-dialog ">
            <div class="container modal-content1 "><!--modal-content --> 
                <div class="row ">	
                    <div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">               
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                <h3 class="panel-title">Attendance</h3>
                            </div>
                             <form role="form"  method="post" id="form4">
                                <div class="panel-body"> <!-- Start of modal body--> 
							    <div class="form-group" id="divRange4">
                                      
                                </div><!--/.modal body-->
                               
                            </form>       
                        </div><!--/.panel-->
                    </div><!--/.col-md-3 --> 
                </div><!--/.row-->      
            </div><!-- /.modal-content -->  		 
        </div><!-- /.modal-dialog -->   
    </div>	
												</div>
												<div class="modal msk-fade" id="modalreport" tabindex="-1" role="dialog" aria-labelledby="modalform" aria-hidden="true">  
  		<div class="modal-dialog ">
            <div class="container modal-content1 "><!--modal-content --> 
                <div class="row ">	
                    <div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">               
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                <h3 class="panel-title"> Report</h3>
                            </div>
                             <form role="form6"  method="post" id="form6">
                                <div class="panel-body"> <!-- Start of modal body--> 
							    
                    <div class="form-group" >
                    <div class="row">
                    <label class="col-md-4 text-right">From<span class="text-danger">*</span></label>
                    <div class="col-md-8">
                      <input type="text"  class="form-control" id="from_date" placeholder="yyyy-mm-dd" name="attendance_from" autocomplete="off"  />
                      <span id="error_attendance_date" class="text-danger"></span>
                    </div>
                  </div>
                    </div>    
                    <div class="form-group" >
                    <div class="row">
                    <label class="col-md-4 text-right">To<span class="text-danger">*</span></label>
                    <div class="col-md-8">
                      <input type="text"  class="form-control" id="to_date" placeholder="yyyy-mm-dd" name="attendance_to" autocomplete="off"  />
                      <span id="error_attendance_date" class="text-danger"></span>
                    </div>
                  </div>
                   
                                </div><!--/.modal body-->
                                <div class="panel-footer bg-blue-active">
								<button type="button" name="create_report" id="create_report" class="btn btn-success btn-sm">Create Report</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                </div>
                            </form>       
                        </div><!--/.panel-->
                    </div><!--/.col-md-3 --> 
                </div><!--/.row-->      
            </div><!-- /.modal-content -->  		 
        </div><!-- /.modal-dialog -->   
    </div>	
												</div>
	







</div><!-- /.content-wrapper -->  



	<script>
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
</script>
<!--redirect your own url when clicking browser back button -->
<script>
function showModal(){
    $('#form2')[0].reset();
//var Id =id; 
var mymode=$('#modalInsert');
        mymode.modal('show');
        // $('input[name="sid"]').val(Id);
}


function showModal2(){
    $('#form6')[0].reset();
//var Id =id; 
var mymode=$('#modalreport');
        mymode.modal('show');
        // $('input[name="sid"]').val(Id);
}



$("#atten").on("change",function () {

        var grade = $(this).val();
		loadData(grade);

});
function loadData(grade){
    $('#attensub').empty();
	if(grade!=""){
	$.ajax({
      url:"attend_action.php",
      method:"POST",
      data:{action:"attenclass",ixd:grade},
    //   dataType:"json",
      success:function(data)
      {
        $('#attensub').append(data);
		
	  }
		});
	}
    }

	$('#form2').on('submit', function(event){
event.preventDefault();

    $.ajax({
        url:"atten_sub_action.php",
        method:"POST",
		data:$(this).serialize(),
		success:function(data)
      {
		var mymode=$('#modalInsert');
		mymode.modal('hide');
		var myModal = $('#modalInsertatten');
		myModal.modal('show');
	    $('#divRange4').append(data);
	  }
	})
	});



	var dataTable = $('#attendance_table').DataTable({
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
      url:"attendance_action.php",
      method:"POST",
      data:{action:"fetch"}
    }
  });

	$('#form4').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"attendance_action.php",
      method:"POST",
      data:$(this).serialize(),
      dataType:"json",
      beforeSend:function(){
        $('#button_action').val('Validate...');
        $('#button_action').attr('disabled', 'disabled');
      },
      success:function(data)
      {
        $('#button_action').attr('disabled', false);
        $('#button_action').val($('#action').val());
        if(data==1){
						var mymode=$('#modalInsertatten');
			           mymode.modal('hide');
		            var myModal = $('#subject_Duplicated  ');
		         	myModal.modal('show');
    		     myModal.data('hideInterval', setTimeout(function(){
    		       	myModal.modal('hide');
				
    	    	}, 3000));
				}

	           else if(data==2){
				var mymode=$('#modalInsertatten');
			mymode.modal('hide');
			
			var myModal = $('#insert_Success');
		
			myModal.modal('show');

			clearTimeout(myModal.data('hideInterval'));
    		myModal.data('hideInterval', setTimeout(function(){
    			myModal.modal('hide');
    		}, 3000));
			
			
	
	}

       
      }
    })
  });

  
 

  $('#create_report').click(function(){
    var from_date = $('#from_date').val();
    var to_date = $('#to_date').val();
   
    
      $('#from_date').val('');
      $('#to_date').val('');
      $('#formModal').modal('hide');
      window.open("report.php?action=attendance_report&from_date="+from_date+"&to_date="+to_date);
    

  });

				
</script>


              
<?php include_once('footer.php');?>