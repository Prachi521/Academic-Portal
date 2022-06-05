<?php
include_once('../controller/config.php');
session_start();
if(isset($_POST["action"]) ){
    if( $_POST["action"]="class" ){
        $gradename=$_POST['grade'];
        $sql="select id from grade where name='$gradename'";
        $rest=mysqli_query($conn,$sql);
        $r=mysqli_fetch_assoc($rest);
        $grade=$r['id'];
        $sub=$_POST['attensub'];
      
        $output='';
      
    
                  $index=$_SESSION["index_number"];
                 
              
                  $sql3="select student.full_name,student.index_number,grade.name as g_name,subject.name as s_name,student_attendance.status,student_attendance.date from student_attendance INNER join student on student_attendance.index_number=student.index_number INNER JOIN grade on grade.id=student_attendance.grade_id INNER JOIN subject on subject.id=student_attendance.subject_id where student_attendance.index_number='$index' and student_attendance.subject_id='$sub' and student_attendance.grade_id='$grade'";
                   $res=mysqli_query($conn,$sql3);
                
                  while($row3=mysqli_fetch_assoc($res)){
                    // echo $row3["full_name"];
                     $output.='<tr>
                     <td>'.$row3["full_name"].'</td>
                               <td>'.$row3["index_number"].'</td>
                   
                     <td>'.$row3["g_name"].'</td>
                     
                     <td>
                     '.$row3["s_name"].'
                     </td>
                     <td>
                     '.$row3["status"].'
                     </td>
                     <td>
                     '.$row3["date"].'
                     </td>
                   </tr>';
                  }
               
                
           echo $output;
    }
}
?>