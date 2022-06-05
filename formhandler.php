<?php

$con = mysqli_connect('localhost','root','','education');


if(isset($POST['submit'])){
    $name =mysqli_get_save_value($con,$_POST['name']);
$visitor_email = mysqli_get_save_value($con,$_POST['email']);
$subject = mysqli_get_save_value($con,$_POST['subject']);
$message = mysqli_get_save_value($con,$_POST['message']);

$query = "insert into contactdetails (name,email,subject,message)values('$name','$visitor_email', '$subject','$message')";
$sql = mysqli_query($con,$query);

}

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