<?php
include_once('../controller/config.php');
session_start();
if(isset($_POST["action"]) ){
if( $_POST["action"]="attenclass" ){
  

$id=$_POST["ixd"];
$index=$_SESSION['index_number'];
$sql1="SELECT * FROM teacher WHERE index_number='$index'";
$result1=mysqli_query($conn,$sql1);
$r='';
$row1=mysqli_fetch_assoc($result1);
$r=$row1['id'];

$sql1="SELECT subject.id,subject.name from subject INNER JOIN subject_routing on subject.id=subject_routing.subject_id where subject_routing.grade_id='$id' and subject_routing.teacher_id='$r'";
$result1=mysqli_query($conn,$sql1);

$output="<option value=''>Select</option>";
while($row1=mysqli_fetch_assoc($result1))
{
    $output.="<option value='{$row1['id']}'>{$row1['name']}</option>";
}
echo $output;
}


}


?>   