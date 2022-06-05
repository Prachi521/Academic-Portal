<?php

//report.php
include_once('../controller/config.php');
    use Dompdf\Dompdf;
    require_once 'dompdf/autoload.inc.php';
    session_start();
if(isset($_GET["action"]))
{
if($_GET["action"] == "attendance_report")
	{
		if(isset($_GET["from_date"], $_GET["to_date"]))
		{
			

            $index=$_SESSION["index_number"];

        $sql1="SELECT * FROM teacher WHERE index_number='$index'";
          $result1=mysqli_query($conn,$sql1);
       $row1=mysqli_fetch_assoc($result1);
     $id=$row1['id'];
			$query = "
			SELECT date FROM student_attendance 
			WHERE teacher_id = '".$id."' 
			AND (date BETWEEN '".$_GET["from_date"]."' AND '".$_GET["to_date"]."')
			GROUP BY date 
			ORDER BY date ASC
			";
			$re=mysqli_query($conn,$query);
            
			$output = '
				<style>
				@page { margin: 20px; }
				
				</style>
				<p>&nbsp;</p>
				<h3 align="center">Attendance Report</h3><br />';
			while($row=mysqli_fetch_assoc($re))
			{
				$output .= '
				<table width="100%" border="0" cellpadding="5" cellspacing="0">
			        <tr>
			        	<td><b>Date - '.$row["date"].'</b></td>
			        </tr>
			        <tr>
			        	<td>
			        		<table width="100%" border="1" cellpadding="5" cellspacing="0">
			        			<tr>
			        				<td><b>Student Name</b></td>
			        				<td><b>Roll Number</b></td>
			        				<td><b>Grade</b></td>
			        				<td><b>Subject</b></td>
			        				<td><b>Attendance Status</b></td>
			        			</tr>
				';
				$sub_query = "
					SELECT student.index_number,student.full_name,grade.name as g_name,subject.name as s_name,student_attendance.status,student_attendance.date from student INNER JOIN student_attendance on student.index_number=student_attendance.index_number INNER JOIN grade on grade.id=student_attendance.grade_id INNER JOIN subject on subject.id=student_attendance.subject_id INNER JOIN teacher on teacher.id =student_attendance.teacher_id where student_attendance.teacher_id='".$id."'AND student_attendance date = '".$row["_date"]."'
				";
                $rep=mysqli_query($conn,$query);
				
				while($sub_row=mysqli_fetch_assoc($rep))
			    {
					$output .= '
					<tr>
						<td>'.$sub_row["full_name"].'</td>
						<td>'.$sub_row["index_number"].'</td>
						<td>'.$sub_row["g_name"].'</td>
						<td>'.$sub_row["s_name"].'</td>
						<td>'.$sub_row["status"].'</td>
					</tr>
					';
				}
				$output .= '
					</table>
					</td>
					</tr>
				</table><br />
				';
			}
            $pdf = new Dompdf();

            $pdf->set_paper('A4', 'landscape');
        
            $file_name = 'attendance_report.pdf';
        
            $pdf->loadHtml($output);
            $pdf->render();
            $pdf->stream($file_name, array("Attachment" => false));
            exit(0);
		}
	}
}








// 	if($_GET["action"] == "student_report")
// 	{
// 		if(isset($_GET["student_id"], $_GET["from_date"], $_GET["to_date"]))
// 		{
// 			$pdf = new Pdf();
// 			$query = "
// 			SELECT * FROM tbl_student 
// 			INNER JOIN tbl_grade 
// 			ON tbl_grade.grade_id = tbl_student.student_grade_id 
// 			WHERE tbl_student.student_id = '".$_GET["student_id"]."' 
// 			";

// 			$statement = $connect->prepare($query);
// 			$statement->execute();
// 			$result = $statement->fetchAll();
// 			$output = '';
// 			foreach($result as $row)
// 			{
// 				$output .= '
// 				<style>
// 				@page { margin: 20px; }
				
// 				</style>
// 				<p>&nbsp;</p>
// 				<h3 align="center">Attendance Report</h3><br /><br />
// 				<table width="100%" border="0" cellpadding="5" cellspacing="0">
// 			        <tr>
// 			            <td width="25%"><b>Student Name</b></td>
// 			            <td width="75%">'.$row["student_name"].'</td>
// 			        </tr>
// 			        <tr>
// 			            <td width="25%"><b>Roll Number</b></td>
// 			            <td width="75%">'.$row["student_roll_number"].'</td>
// 			        </tr>
// 			        <tr>
// 			            <td width="25%"><b>Grade</b></td>
// 			            <td width="75%">'.$row["grade_name"].'</td>
// 			        </tr>
// 			        <tr>
// 			        	<td colspan="2" height="5">
// 			        		<h3 align="center">Attendance Details</h3>
// 			        	</td>
// 			        </tr>
// 			        <tr>
// 			        	<td colspan="2">
// 			        		<table width="100%" border="1" cellpadding="5" cellspacing="0">
// 			        			<tr>
// 			        				<td><b>Attendance Date</b></td>
// 			        				<td><b>Attendance Status</b></td>
// 			        			</tr>
// 				';
// 				$sub_query = "
// 				SELECT * FROM tbl_attendance 
// 				WHERE student_id = '".$_GET["student_id"]."' 
// 				AND (attendance_date BETWEEN '".$_GET["from_date"]."' AND '".$_GET["to_date"]."') 
// 				ORDER BY attendance_date ASC
// 				";
// 				$statement = $connect->prepare($sub_query);
// 				$statement->execute();
// 				$sub_result = $statement->fetchAll();
// 				foreach($sub_result as $sub_row)
// 				{
// 					$output .= '
// 					<tr>
// 						<td>'.$sub_row["attendance_date"].'</td>
// 						<td>'.$sub_row["attendance_status"].'</td>
// 					</tr>
// 					';
// 				}
// 				$output .= '
// 						</table>
// 					</td>
// 					</tr>
// 				</table>
// 				';
// 				$file_name = 'Attendance Report.pdf';
// 				$pdf->loadHtml($output);
// 				$pdf->render();
// 				$pdf->stream($file_name, array("Attachment" => false));
// 				exit(0);
// 			}
// 		}
// 	}
// }


?>