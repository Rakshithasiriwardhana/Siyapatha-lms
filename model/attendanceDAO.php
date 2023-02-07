<?php
include "dbcon.php";
include "attendance.php";

class attendanceDAO{
    
    function getAttendance($classid,$date){
        $arr=[];
        $db = new Db;

   
        $query="SELECT attendance.*,student.first_name,student.last_name FROM attendance,student WHERE attendance.class_id='$classid' AND attendance.date='$date' AND attendance.stu_id=student.student_id";
        $result=mysqli_query($db->dbConnection(),$query);

        //echo $classid.' '.$date." from dao";
        
        //echo "hello";
        
        if(!mysqli_query($db->dbConnection(),$query)){
            echo ("Error description: " . mysqli_error($db->dbConnection()));

        }
        while($row=mysqli_fetch_assoc($result)){

            array_push($arr, [
            'student_id' => $row['stu_id'],
            'student_name' => $row['first_name']." ".$row['last_name'],
            'date' => $row['date'],
            'status' => $row['status']
            ]); 
        }
        echo json_encode($arr);
    }



    
    function addClassStudentToAttendance($class_id,$date){
        $db = new Db;
        
        //echo $class_id;
        $query="SELECT stu_id FROM student_class WHERE class_id='$class_id'";
        $result=mysqli_query($db->dbConnection(),$query);
        while($row=mysqli_fetch_assoc($result)){
            echo $stid=$row['stu_id'];

            $query="INSERT INTO attendance (class_id,date,stu_id) VALUES ('$class_id','$date','$stid')";
            $run=mysqli_query($db->dbConnection(),$query);
        }
        
        
    }



    function showStudentList($class_id,$date){
        $db = new Db;
        $arr=[];

        $query="SELECT attendance.*,student.first_name,student.last_name FROM attendance,student WHERE attendance.class_id='$class_id' AND attendance.date='$date' AND attendance.stu_id=student.student_id";
        
        $result=mysqli_query($db->dbConnection(),$query);
        while($row=mysqli_fetch_assoc($result)){
            $stid=$row['stu_id'];
            $name=$row['first_name']." ".$row['last_name'];
            $warning='';

            $query2="SELECT DISTINCT(SUBSTRING(date,1,2)) as month FROM attendance WHERE stu_id='st01' AND class_id='c02' AND status='present'";
            $result2=mysqli_query($db->dbConnection(),$query2);
            while($row=mysqli_fetch_assoc($result2)){
                $paid_month='';
                $month=$row['month'];
                if($month=='01'){
                    $paid_month='January';
                }elseif($month=='02'){
                    $paid_month='February';
                }elseif($month=='03'){
                    $paid_month='March';
                }elseif($month=='04'){
                    $paid_month='April';
                }elseif($month=='05'){
                    $paid_month='May';
                }elseif($month=='06'){
                    $paid_month='June';
                }elseif($month=='07'){
                    $paid_month='July';
                }elseif($month=='08'){
                    $paid_month='August';
                }elseif($month=='09'){
                    $paid_month='September';
                }elseif($month=='10'){
                    $paid_month='October';
                }elseif($month=='11'){
                    $paid_month='November';
                }else{
                    $paid_month='December';
                }

                
                $query3="SELECT status FROM fee WHERE class_id='$class_id' AND stu_id='$stid' AND month='$paid_month' ";
                $result3=mysqli_query($db->dbConnection(),$query3);
                while($row=mysqli_fetch_assoc($result3)){
                    $payment=$row['status'];
                    if($payment=="not-paid"){
                        $warning="Class fees not paid! not allow attending to class";
                    }else{
                        $warning='';
                    }

                }



            }






            array_push($arr, [
                'id' => $stid,
                'name' => $name,
                'warning' => $warning

            ]);
        }

        
        echo json_encode($arr);
    }


    function addAttendance($class_id,$date,$attendance){
        $db = new Db;
        
        $query="UPDATE attendance SET status ='present' WHERE class_id ='$class_id' AND date ='$date' AND stu_id IN ($attendance)"; 
        
        if(!mysqli_query($db->dbConnection(),$query)){
            echo "Fail!!!";

        }else{
            echo "Marked Attendance Successful!!!";
        }


    }



    function updateAttendance($new_status,$student_id_clicked,$class_id,$date){
        $db = new Db;
        
        //echo $class_id;
        $query="UPDATE attendance SET status='$new_status' WHERE stu_id='$student_id_clicked' AND class_id='$class_id' AND date='$date' ";
        
        if(!mysqli_query($db->dbConnection(),$query)){
            echo "fail!!!";

        }else{
            echo "Update Successful!!!";
        }
        
        
    }


}


    ///////////////////// interface connection //////////////////////////////////////


    if(isset($_GET['add_class_student'])){
        $attendancedao=new attendanceDAO;

        $classid=$_GET['class_id'];
        $date=$_GET['date'];
        $attendancedao->addClassStudentToAttendance($classid,$date);
        
    } 



    if(isset($_GET['show_student_list'])){
        $attendancedao=new attendanceDAO;

        $classid=$_GET['class_id'];
        $date=$_GET['date'];
        $attendancedao->showStudentList($classid,$date);
        
    }



    if(isset($_GET['add_attendance'])){
        $attendancedao=new attendanceDAO;

        $classid=$_GET['class_id'];
        $date=$_GET['date'];
        $attendance=implode(",",$_GET['attendance']);
        
        $attendancedao->addAttendance($classid,$date,$attendance);
        
    }

   
    if(isset($_GET['show_attendance_list'])){
        $attendancedao=new attendanceDAO;

        //$classid="c02";
        //$date="07-20-2021";
        $classid=$_GET['class_id'];
        $date=$_GET['date'];
        $attendancedao->getAttendance($classid,$date);
        
    }


    if(isset($_GET['new_attendance_status'])){
        $attendancedao=new attendanceDAO;

        $new_status = $_GET['new_status'];
        $student_id_clicked =$_GET['student_id_clicked'];
        $class_id = $_GET['class_id'];
        $date =$_GET['date'];

        $attendancedao->updateAttendance($new_status,$student_id_clicked,$class_id,$date);
        
    }
    
?>



