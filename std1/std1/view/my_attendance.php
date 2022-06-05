<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../index.php');
    exit;
}
?>
<?php include_once('head.php'); ?>
<?php include_once('header_student.php'); ?>
<?php include_once('sidebar1.php'); ?>

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
		<a href="#" id='attendance' onClick="showModal()" class="btn btn-info btn-xs" data-toggle="modal">attendance</a>
		
        </div>
		</div>
	</section>
 <script>

var current_day_no;
var status;
var calendar_month_year;
function show_calendar(){
	
	var status = $('#status5').val().split(',');
	var date_no2 = $('#date_no2').val().split(',');
	var count5 = date_no2.length;
	
	var d = new Date();    //new Date('2017','08','25');
	var month_name = ['January','February','March','April','May','June','July','August','September','Octomber','November','December'];	
		
		
	var month = d.getMonth(); //0-11
	var year = d.getFullYear(); //2017 
	var current_date = d.getDate();
	var first_date = month_name[month] + " " + 1 + " " + year;
		
	// August 31 2017
		
	var tmp = new Date(first_date).toDateString();
	// Tue Aug 01 2017...
		
	var first_day = tmp.substring(0,3); //Thu
	var day_name = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
	var day_no = day_name.indexOf(first_day);  //4
	var days = new Date(year, month+1, 0).getDate(); //31
	// Thu Aug 31 2017...
		
	var calendar = get_calendar(day_no,days);
		
	document.getElementById("calendar_month_year").innerHTML = month_name[month]+" "+year;
	document.getElementById("calendar_dates").appendChild(calendar);
				
	for(var i=0; i<count5; i++){
		
		var d_no = parseInt(date_no2[i], 10);
			
		if(status[i] == 'Present'){
	
			$("#td_"+d_no).css("background-color", "#00FF66");
				
		}
			
		if(status[i] == 'Absent'){
			
			$("#td_"+d_no).css("background-color", "#FF0033");
		
		}
	
	}
				
};

function get_calendar(day_no,days){
	
	
	var table = document.createElement('table');
	var tr = document.createElement('tr');

	table.className = 'cal-table';
	
	// row for the day letters
	for(var c=0; c<=6; c++){
		
		var th = document.createElement('th');
		th.innerHTML =  ['S','M','T','W','T','F','S'][c];
		tr.appendChild(th);
		th.className = "tHead";
		
		
	}
	
	table.appendChild(tr);
	
	//create 2nd row
	
	tr = document.createElement('tr');
	
	var c;
	for(c=0; c<=6; c++){
		if(c== day_no){
			break;
		}
		var td = document.createElement('td');
		td.innerHTML = "";
		tr.appendChild(td);
		td.className = "td_no_number";
		tr.className = 'cal-tr';
	}
	
	var count = 1;
	for(; c<=6; c++){
		
		var td = document.createElement('td');
		td.id = "td_"+count;
		td.className = 'cal-number-td';
		tr.appendChild(td);
		tr.className = 'cal-tr';
		
		var h5 = document.createElement('h5');
		h5.id="h5_"+count;
		h5.className = 'h5';
		td.appendChild(h5);
		h5.innerHTML = count;
		count++;
		
	}
	table.appendChild(tr);
	
	//rest of the date rows
	;
	for(var r=3; r<=7; r++){
		tr = document.createElement('tr');
		for(var c=0; c<=6; c++){
			if(count > days){
				
				for(; c<=6; c++){
					
					var td = document.createElement('td');
					td.innerHTML = "";
					tr.appendChild(td);
					td.className = "td_no_number";
					tr.className = 'cal-tr';
				
				}
				table.appendChild(tr);
				return table;
			}
			
			var td = document.createElement('td');
			//td.innerHTML = count;
			td.id = "td_"+count;
			//td.style.padding = 0;
			td.className = 'cal-number-td';
			
			tr.appendChild(td);
			
			var h5 = document.createElement('h5');
			h5.className = 'h5';
			td.appendChild(h5);
			h5.innerHTML = count;
			count++;
			tr.className = 'cal-tr';
			
		}
		table.appendChild(tr);
		
		
	}
	
};	

</script> 
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
                                        
										<?php
                                            include_once('../controller/config.php');

											$index=$_SESSION["index_number"];
											
											$sql1="SELECT grade.id,grade.name FROM grade INNER JOIN student_grade ON grade.id=student_grade.grade_id WHERE student_grade.index_number='$index'";
											$result1=mysqli_query($conn,$sql1);
										
											
											if(mysqli_num_rows($result1) > 0) {
												while($row=mysqli_fetch_assoc($result1)){
                                            ?>
											  <input type="text"  class="form-control" id="from" value="<?php echo $row["name"];?>" name="grade" autocomplete="off"  />
											

											<?php }}?>
										</select>

                                    </div>   
									<div class="form-group" id="divRange1">
                                        <label for="" >Subject</label>
                                        <select name="attensub" id="attensub">  
										<?php
                                            include_once('../controller/config.php');

											$index=$_SESSION["index_number"];
											
											$sql1="SELECT subject.id,subject.name FROM subject INNER JOIN subject_routing ON subject_routing.subject_id=subject.id INNER JOIN student_grade ON subject_routing.grade_id=student_grade.grade_id INNER JOIN student_subject on student_subject.sr_id = subject_routing.id WHERE student_grade.index_number='$index'";
											$result1=mysqli_query($conn,$sql1);
											if(mysqli_num_rows($result1) > 0) {
												while($row=mysqli_fetch_assoc($result1)){
                                            ?>
										<option value="<?php echo $row["id"];?>"> <?php echo $row["name"];?></option>
										<?php }}?>
									</div>
									
									
                                </div><!--/.modal body-->
                                <div class="panel-footer bg-blue-active">
                                    <input type="hidden" name="action" value="class" id="add"  />
                                    
                                   
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
    <!-- table for view all records -->     
	<section class="content" > <!-- Start of table section -->
    	<div class="row" id="table1"><!--MSK-000132-1-->    
            <div class="col-md-12">
            	<div class="box">
                	<div class="box-header">
                    	<h3 class="box-title">My Attendance</h3>
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
                                   	<tbody id="tbody">

                                   </tbody>
                    			</table>
                        	</div>
                            <div id="calendar-container" class="col-md-5">
                                <div id="calendar-header">
                                    <center><h3><span id="calendar_month_year"></span></h3></center>
                                </div>
                                <div id="calendar_dates">
                                <input type="hidden" id="date_no2" value="<?php echo $date_no2; ?>">
                                <input type="hidden" id="status5" value="<?php echo $status5; ?>">  
                            	</div><br><br>
                            <div style="float:left; width:100px; ">
                                	<div style="background-color:#FF0033; width:15px; height:15px; float:left; margin-right:2px;"> </div> <span style="text-align:left;">  - Absent </span><br> 
                                    <div style="background-color:#00FF66; width:15px; height:15px; float:left; margin-right:2px;"> </div> <span style="text-align:left;">  - Present </span><br> 
                                    <div style="background-color:#FFCC33; width:15px; height:15px; float:left; margin-right:2px;"> </div> <span style="text-align:left;">  - Not Held  </span><br> 
                            </div>
<!--                -->
                    	</div>
                	</div><!-- /.box-body -->           
            	</div><!-- /.box-->
        	</div> 
		</div>
	</section>  
    
<!--redirect your own url when clicking browser back button -->
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
<script>

function showModal(){
    $('#form2')[0].reset();
//var Id =id; 
var mymode=$('#modalInsert');
        mymode.modal('show');
        // $('input[name="sid"]').val(Id);
}

	$('#form2').on('submit', function(event){
event.preventDefault();

    $.ajax({
        url:"subaction.php",
        method:"POST",
		data:$(this).serialize(),
		success:function(data)
      {
		var mymode=$('#modalInsert');
		mymode.modal('hide');
		
	    $('#tbody').append(data);
	  }
	})
	});


</script>
     
</div><!-- /.content-wrapper -->  
               
<?php include_once('footer.php');?>