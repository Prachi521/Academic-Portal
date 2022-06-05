<?php

//attendance_action.php

include_once('../controller/config.php');
session_start();


if(isset($_POST["action"]))
{
	if($_POST["action"] == "fetch")
	{
        $index=$_SESSION["index_number"];

        $sql1="SELECT * FROM teacher WHERE index_number='$index'";
          $result1=mysqli_query($conn,$sql1);
       $row1=mysqli_fetch_assoc($result1);
     $id=$row1['id'];
		$query = "
		SELECT student.index_number,student.full_name,grade.name as g_name,subject.name as s_name,student_attendance.status,student_attendance.date from student INNER JOIN student_attendance on student.index_number=student_attendance.index_number INNER JOIN grade on grade.id=student_attendance.grade_id INNER JOIN subject on subject.id=student_attendance.subject_id INNER JOIN teacher on teacher.id =student_attendance.teacher_id where student_attendance.teacher_id='".$id."' AND (";

		if(isset($_POST["search"]["value"]))
		{
			$query .= '
			student.full_name LIKE "%'.$_POST["search"]["value"].'%" 
			OR student.index_number LIKE "%'.$_POST["search"]["value"].'%" 
			OR grade.name LIKE "%'.$_POST["search"]["value"].'%" 
			OR subject.name LIKE "%'.$_POST["search"]["value"].'%" 
			OR student_attendance.status LIKE "%'.$_POST["search"]["value"].'%" 
			OR  student_attendance.date LIKE "%'.$_POST["search"]["value"].'%") 
			';
		}
		if(isset($_POST["order"]))
		{
			$query .= '
			ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' 
			';
		}
		else
		{
			$query .= '
			ORDER BY student_attendance.id DESC 
			';
		}

		if($_POST["length"] != -1)
		{
			$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$res=mysqli_query($conn,$query);
		$data = array();
       
		$filtered_rows =mysqli_num_rows($res);
		while($row = mysqli_fetch_assoc($res))
		{
			$sub_array = array();
			$status = '';
			if($row["status"] == "Present")
			{
				$status = '<label class="badge badge-success">Present</label>';
			}

			if($row["status"] == "Absent")
			{
				$status = '<label class="badge badge-danger">Absent</label>';
			}

			$sub_array[] = $row["full_name"];
			$sub_array[] = $row["index_number"];
			$sub_array[] = $row["g_name"];
			$sub_array[] = $row["s_name"];
			$sub_array[] = $status;
			$sub_array[] = $row["date"];
			$data[] = $sub_array;
		}

		$output = array(
			'draw'				=>	intval($_POST["draw"]),
			"recordsTotal"		=> 	$filtered_rows,
			"recordsFiltered"	=>	get_total_records($conn, 'student_attendance'),
			"data"				=>	$data
		);

		echo json_encode($output);
	}

		

	if($_POST["action"] == "Add")
	{
		$msg=0;
	
			$attendance_date = $_POST["attendance_date"];
		    $index=$_SESSION["index_number"];

            $sql1="SELECT * FROM teacher WHERE index_number='$index'";
              $result1=mysqli_query($conn,$sql1);
           $row1=mysqli_fetch_assoc($result1);
         $id=$row1['id'];
        $student_id = $_POST["student_id"];
        $grade = $_POST["grade_id"];
        $sub=$_POST["sub_id"];

       
			$sql = '
			SELECT date FROM student_attendance 
			WHERE teacher_id = "'.$id.'" 
			AND date = "'.$attendance_date.'" and grade_id="'.$grade.'" and subject_id="'.$sub.'"
			';
			$result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                echo json_encode($msg+=1);
            }
		
			else
			{
				
               
				for($count = 0; $count < count((array)$student_id); $count++)
				{
					
						$student_id			=	$student_id[$count];
						
						$attendance_status	=	$_POST["attendance_status".$student_id];
						$attendance_date		=$attendance_date;
						$teacher_id			=	$id;
                        $grade = $_POST["grade_id"];
                        $sub=$_POST["sub_id"];
				

					$query = "
					INSERT INTO student_attendance
					(index_number,grade_id,subject_id, status,date, teacher_id) 
					VALUES ('$student_id','$grade','$sub', '$attendance_status','$attendance_date', '$teacher_id')";
                    mysqli_query($conn,$query);
				
				}
				
                echo json_encode($msg+=2);  
			}
		}
       
	}

// 	if($_POST["action"] == "index_fetch")
// 	{
// 		$query = "
// 		SELECT * FROM tbl_attendance 
// 		INNER JOIN tbl_student 
// 		ON tbl_student.student_id = tbl_attendance.student_id 
// 		INNER JOIN tbl_grade 
// 		ON tbl_grade.grade_id = tbl_student.student_grade_id 
// 		WHERE tbl_attendance.teacher_id = '".$_SESSION["teacher_id"]."' AND (
// 		";
// 		if(isset($_POST["search"]["value"]))
// 		{
// 			$query .= '
// 			tbl_student.student_name LIKE "%'.$_POST["search"]["value"].'%" 
// 			OR tbl_student.student_roll_number LIKE "%'.$_POST["search"]["value"].'%" 
// 			OR tbl_grade.grade_name LIKE "%'.$_POST["search"]["value"].'%" )
// 			';
// 		}
// 		$query .= 'GROUP BY tbl_student.student_id ';
// 		if(isset($_POST["order"]))
// 		{
// 			$query .= '
// 			ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' 
// 			';
// 		}
// 		else
// 		{
// 			$query .= '
// 			ORDER BY tbl_student.student_roll_number ASC 
// 			';
// 		}

// 		if($_POST["length"] != -1)
// 		{
// 			$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
// 		}

// 		$statement = $connect->prepare($query);
// 		$statement->execute();
// 		$result = $statement->fetchAll();
// 		$data = array();
// 		$filtered_rows = $statement->rowCount();
// 		foreach($result as $row)
// 		{
// 			$sub_array = array();
// 			$sub_array[] = $row["student_name"];
// 			$sub_array[] = $row["student_roll_number"];
// 			$sub_array[] = $row["grade_name"];
// 			$sub_array[] = get_attendance_percentage($connect, $row["student_id"]);
// 			$sub_array[] = '<button type="button" name="report_button" id="'.$row["student_id"].'" class="btn btn-info btn-sm report_button">Report</button>';
// 			$data[] = $sub_array;
// 		}
// 		$output = array(
// 			'draw'					=>	intval($_POST["draw"]),
// 			"recordsTotal"		=> 	$filtered_rows,
// 			"recordsFiltered"	=>	get_total_records($connect, 'tbl_student'),
// 			"data"				=>	$data
// 		);
// 		echo json_encode($output);
// 	}
function get_total_records($connect, $table_name)
{
	$query = "SELECT * FROM $table_name";
	$result=mysqli_query($connect,$query);
	return mysqli_num_rows($result);
}



?>