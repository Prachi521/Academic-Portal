<?php
include_once('../controller/config.php');
session_start();
if(isset($_POST["action"]) ){
    if( $_POST["action"]="add_class_atten" ){
        $grade=$_POST['atten'];
        $sub=$_POST['attensub'];
        $output='';
       $sql="select * from grade where id='$grade' ";
       $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
     
       $output.=  '<label class="col-md-4 text-right">Grade <span class="text-danger">*</span></label>
                   <div class="col-md-8">
                   <label id="name">'.$row['name'].'</label>
                    </div>
                    </div>
                    <div class="form-group" >
                    <div class="row">
                    <label class="col-md-4 text-right">Attendance Date <span class="text-danger">*</span></label>
                    <div class="col-md-8">
                      <input type="text"  class="form-control" id="attendance_date" placeholder="yyyy-mm-dd" name="attendance_date" autocomplete="off"  />
                      <span id="error_attendance_date" class="text-danger"></span>
                    </div>
                  </div>
                    </div>
                    <div class="form-group" id="student_details">
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Roll No.</th>
                    <th>Student Name</th>
                    <th>Present</th>
                    <th>Absent</th>
                  </tr>
                  </thead>
                  <tbody>';
                
                  $index=$_SESSION["index_number"];
                  $sql1="SELECT * FROM teacher WHERE index_number='$index'";
                  $re=mysqli_query($conn,$sql1);
                  $id='';
                 
                 while($r=mysqli_fetch_assoc($re))
                   $id=$r['id'];
              
                  
                 
                 $sql3="SELECT student.index_number,student.full_name FROM `student` INNER JOIN student_subject on student_subject.index_number=student.index_number INNER JOIN subject_routing on subject_routing.id=student_subject.sr_id where subject_routing.grade_id='$grade'and subject_routing.subject_id='$sub'and subject_routing.teacher_id='$id'";
                  $res=mysqli_query($conn,$sql3);
                
                  while($row3=mysqli_fetch_assoc($res)){
                    // echo $row3["full_name"];
                     $output.='<tr>
                               <td>'.$row3["index_number"].'</td>
                     <td>'.$row3["full_name"].'
                       <input type="hidden" name="student_id[]" value="'.$row3["index_number"].'" />
                     </td>
                     <td>
                       <input type="radio" name="attendance_status'.$row3["index_number"].'" value="Present" />
                     </td>
                     <td>
                       <input type="radio" name="attendance_status'.$row3["index_number"].'"  checked value="Absent" />
                     </td>
                   </tr>';
                  }
                 $output.=' 
                 </tbody>
                 </table>
                  </div>
                </div>
                </div>

      
        <div class="modal-footer">
          <input type="hidden" name="action" id="action" value="Add" />
          <input type="hidden" name="grade_id" id="grdae_id" value="'.$grade.'" />
          <input type="hidden" name="sub_id" id="sub_id" value="'.$sub.'" />
          <input type="submit" name="button_action" id="button_action" class="btn btn-success btn-sm" value="Add" />
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>';
                
           echo $output;
    }
}
?>