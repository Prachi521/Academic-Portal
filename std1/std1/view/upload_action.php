<?php

//classes_action.php
include_once('../controller/config.php');

if(isset($_POST["do"])){
   if(($_POST["do"]=="add_syllabus")){
	if($_POST["action"] == 'add')
	{
		

        $msg=0;
        $name= $_POST['subject_id'];
        $file_name = $_FILES['fil']['name'];
		$sql1="SELECT * FROM subject where name='$name' and syllabus='$file_name'";	
	    $result1=mysqli_query($conn,$sql1);
	    $row1=mysqli_num_rows($result1);
	  if($row1>0){
        echo json_encode($msg+=1);
      }
    else{
		//MSK-000143-2
         
		  if($_FILES["fil"]["name"] != '')
          {
              
             $file_name = $_FILES['fil']['name'];
              $tmp_name = $_FILES['fil']['tmp_name'];
              $time = time();
              
              move_uploaded_file($tmp_name,"../uploadnotes/".$file_name);

              $name= $_POST['subject_id'];



		$sql="update subject set syllabus='$file_name' where name='$name'";
      		  
	  
	 	if(mysqli_query($conn,$sql)){
            echo json_encode($msg+=2);  
			//MSK-000143-3 The record has been successfully inserted into the database.
	  	}else{
            echo json_encode($msg+=3);  
		  	//MSK-000143-4 Connection problem.	
	  	}
	
	}



	}
}
}
if(($_POST["do"]=="add_notes")){
	if($_POST["action"] == 'add')
	{
		
      
        $msg=0;
        $sr_id= $_POST['sid'];
        $file_name = $_FILES['fil']['name'];
		$sql1="SELECT * FROM notes where notes='$file_name'";	
	    $result1=mysqli_query($conn,$sql1);
	    $row1=mysqli_num_rows($result1);
	  if($row1>0){
        echo json_encode($msg+=1);
      }
    else{
		//MSK-000143-2
         
		  if($_FILES["fil"]["name"] != '')
          {
			$current_year=date('Y');
             $file_name = $_FILES['fil']['name'];
              $tmp_name = $_FILES['fil']['tmp_name'];
              $time = time();
              
              move_uploaded_file($tmp_name,"../uploadnotes/".$file_name);

              $sr_id= $_POST['sid'];



		$sql="insert into notes (sr_id,notes,added_on) values('$sr_id' ,'$file_name','$current_year')";
      		  
	  
	 	if(mysqli_query($conn,$sql)){
            echo json_encode($msg+=2);  
			//MSK-000143-3 The record has been successfully inserted into the database.
	  	}else{
            echo json_encode($msg+=3);  
		  	//MSK-000143-4 Connection problem.	
	  	}
	
	}



	}
}
}





}

// 	if($_POST["action"] == 'fetch_single')
// 	{
        
      
// 		$object->query = "
// 		SELECT * FROM upload_soes 
// 		WHERE upload_id = '".$_POST['notes_id']."'
// 		";

// 		$result = $object->get_result();

// 		$data = array();

// 		foreach($result as $row)
// 		{
// 			$data['subject_id'] = $object->Get_Subject_id($row['subject_name']);
// 			$data['notes'] = $row['notes'];
// 		}

// 		echo json_encode($data);
// 	}

// 	if($_POST["action"] == 'Edit')
// 	{
// 		$error = '';

// 		$success = '';

//         $subject_name= $object->Get_Subject_name($_POST['subject_id']);
//         $file_name = $_FILES['notes']['name'];
// 		$object->data = array(
// 			':subject_name' 	=>	$subject_name,
// 			':notes'	     =>	$file_name,
		
// 		);

// 		$object->query = "
// 		SELECT * FROM upload_soes 
// 		WHERE notes = :notes
// 		AND subject_name = :subject_name
// 		";

// 		$object->execute_query();

// 		if($object->row_count() > 0)
// 		{
// 			$error = '<div class="alert alert-danger">notes  Already Exists</div>';
// 		}
// 		else
// 		{

//             if($_FILES["notes"]["name"] != '')
// 			{
				
//                $file_name = $_FILES['notes']['name'];
// 			    $tmp_name = $_FILES['notes']['tmp_name'];
// 				$time = time();
				
// 				move_uploaded_file($tmp_name,"../notes/".$file_name);

//                 $subject_name= $object->Get_Subject_name($_POST['subject_id']);
// 				$object->data = array(
// 			     	':subject_name'			=>	$object->clean_input($subject_name),
// 			    	':notes'             =>   $file_name,
                
				    
				   
// 			);

// 			$object->query = "
// 			UPDATE upload_soes 
// 			SET subject_name=:subject_name , notes=:notes where upload_id = '".$_POST['hidden_id']."';
// 			";

// 			$object->execute_query();

// 			$success = '<div class="alert alert-success">notes updated</div>';
		
// 		}
	
//         }
// 		$output = array(
// 			'error'		=>	$error,
// 			'success'	=>	$success
// 		);

// 		echo json_encode($output);

// 	}

// 	if($_POST["action"] == 'change_status')
// 	{
// 		$object->data = array(
// 			':status'		=>	$_POST['next_status']
// 		);

// 		$object->query = "
// 		UPDATE upload_soes 
// 		SET status = :status 
// 		WHERE upload_id = '".$_POST["id"]."'
// 		";

// 		$object->execute_query();

// 		echo '<div class="alert alert-success">Class Status change to '.$_POST['next_status'].'</div>';
// 	}

// 	if($_POST["action"] == 'delete')
// 	{
// 		$object->query = "
// 		DELETE FROM upload_soes 
// 		WHERE upload_id = '".$_POST["id"]."'
// 		";

// 		$object->execute_que();

// 		echo '<div class="alert alert-success">notes Deleted</div>';
// 	}
// }

?>