<?php
include 'connection.php';
// $con = mysqli_connect('localhost','root','','education');
function get_safe_value($conn, $str){
    if($str !=''){
        $str=trim($str);
        return mysqli_real_escape_string($conn,$str);
    }
}


// if(isset($_POST['action'])){
$name =get_safe_value($conn,$_POST['name1']);
$visitor_email = get_safe_value($conn,$_POST['email1']);
$subject = get_safe_value($conn,$_POST['comment']);



$query = "insert into blogdetails(Name,Email,Comment) values ('$name','$visitor_email', '$subject')";

$sql = mysqli_query($conn,$query);
$output=true;
echo $output;
?>