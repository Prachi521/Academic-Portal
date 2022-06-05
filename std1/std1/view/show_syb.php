<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../index.php');
    exit;

   
}

if(!isset($_GET['id'])){
    header('location:my_subject.php');
    exit;
}
?>
<?php include_once('head.php'); ?>
<?php include_once('header_student.php'); ?>
<?php include_once('sidebar1.php'); ?>
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
    <section class="content-header" id="addnotes">
	<h1>
        	Subject
            <small>Notes</small>
        </h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Notes</a></li>
        </ol>
	</section>
<?php
include_once('../controller/config.php');

$index=$_GET["id"];
$sql="SELECT * FROM `subject` INNER JOIN subject_routing on subject_routing.subject_id=subject.id where subject_routing.id='$index'";
$res=mysqli_query($conn,$sql);
$n='';
$syb='';

while($row=mysqli_fetch_assoc($res)){
    $n=$row['name'];

  
    $syb=$row['syllabus'];
}
?>
	<!-- table for view all records -->
	<section class="content" > <!-- Start of table section -->
    	<div class="row" id="table1"><!--MSK-000132-1-->
        	<div class="col-md-7">
            	<div class="box">
                	<div class="box-header">
                  	<h3 class="box-title"><?php echo $n;?> Syllabus</h3>
                	</div><!-- /.box-header -->
                	<div class="box-body table-responsive">
                    	<!-- MSK-00093-->
                		<table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <!-- <th class="col-md-1">ID</th> -->
                                <!-- <th class="col-md-1">syllabus</th> -->
                                <th class="col-md-1">Syllabus</th>
                               
                            </thead>
<tbody>
     
  <tr>
                                 
               						<td><a href="../uploadnotes/<?php echo $syb; ?>"><?php echo $syb; ?></a></td>
               						
                            	</tr>

                    	</tbody>
                    	</table>
                	</div><!-- ./box-body -->
            	</div><!-- ./box -->
        	</div> 
    	</div><!-- ./row -->'
		</section> <!-- End of table section --> 
    
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
 	 	
</div><!-- /.content-wrapper -->  
                            
<?php include_once('footer.php');?>



                            
