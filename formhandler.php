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
$name =get_safe_value($conn,$_POST['name']);
$visitor_email = get_safe_value($conn,$_POST['email']);
$subject = get_safe_value($conn,$_POST['subject']);
$message = get_safe_value($conn,$_POST['message']);


$query = "insert into contactdetails(Name,Email,Subject,Message) values ('$name','$visitor_email', '$subject','$message')";

$sql = mysqli_query($conn,$query);
$output=true;
echo $output;

// }

// $email_from = 'prisha0521@gamil.com';

// $email_subject = 'New Form Submission';

// $email_body = "User Name: $name.\n".
//               "User Email: $visitor_email.\n".
//               "Subject: $subject.\n".
//               "User Message: $message .\n";

// $to = 'jaisprachi772244@gmail.com';

// $headers = "From: $email_from \r\n";

// $headers .="Reply-To: $visitor_email \r\n";

// mail($to,$email_subject,$email_body,$headers);

// header("Location: contact.html");


?>