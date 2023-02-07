<?php
include "dbcon.php";
include "classUnit.php";

class classUnitDAO{
    



    function getAllClassByTeacher($id){
        $arr=[];
        $db = new Db;

        
        $query="SELECT name FROM class WHERE teacher_id='$id'"; 
        $result=mysqli_query($db->dbConnection(),$query);
        while($row=mysqli_fetch_assoc($result)){
           
            array_push($arr, [
            'class_name' => $row['name']
            ]); 
        }
        echo json_encode($arr);
    }


    function getAllClasses($id){
        $arr=[];
        $db = new Db;

        if($id==''){
            $query="SELECT class.*,teacher.first_name,teacher.last_name FROM class, teacher WHERE class.teacher_id=teacher.teacher_id";
        }else{
            $query="SELECT class.*,teacher.first_name,teacher.last_name FROM class, teacher WHERE class.teacher_id=teacher.teacher_id AND class.class_id='$id'";
        }

        $result=mysqli_query($db->dbConnection(),$query);
        while($row=mysqli_fetch_assoc($result)){

            array_push($arr, [
            'class_id' => $row['class_id'],
            'subject' => $row['sub_id'],
            'teacher_name' => $row['first_name']." ".$row['last_name'],
            'class_name' => $row['name'],
            'grade' => $row['grade'],
            'fee' => $row['fee']
            ]); 
        }
        echo json_encode($arr);
    }


    function getAllClassStudents($class_id){
        $arr=[];
        $db = new Db;
        
        $query="SELECT student.*,student_class.* FROM student_class,student WHERE student_class.class_id='$class_id' AND student.student_id=student_class.stu_id";
        

        $result=mysqli_query($db->dbConnection(),$query);
        while($row=mysqli_fetch_assoc($result)){

            array_push($arr, [
            'student_id' => $row['student_id'],
            'student_name' => $row['first_name']." ".$row['last_name'],
            'email' => $row['email'],
            'contact_no' => $row['contact_no']
            ]); 
        }
        echo json_encode($arr);
    }



}


    

  


    if(isset($_GET['get_class_names'])){
        $classUnitDAO =new classUnitDAO;

        $teacher_id = $_GET['teacher_id'];
        $classUnitDAO->getAllClassByTeacher($teacher_id);
    }
    
    if(isset($_GET['search_class_id'])){
        $classUnitDAO =new classUnitDAO;

        $search_class_id = $_GET['search_class_id'];
        $classUnitDAO->getAllClasses($search_class_id);
    }

    if(isset($_GET['search_students_class'])){
        $classUnitDAO =new classUnitDAO;

        $search_class_student_id = $_GET['search_class_student_id'];
        $classUnitDAO->getAllClassStudents($search_class_student_id);
    }



    /* $classUnitDAO =new classUnitDAO;
    $classUnitDAO->getAllClassStudents('c04'); */
?>



