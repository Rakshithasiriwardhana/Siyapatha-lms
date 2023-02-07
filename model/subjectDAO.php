<?php
include "dbcon.php";
include "subject.php";

class subjectDAO{
    



    function getAllSubjectId(){
        $arr=[];
        $db = new Db;

        
        $query="SELECT subject_id,name FROM subject"; 
        $result=mysqli_query($db->dbConnection(),$query);
        while($row=mysqli_fetch_assoc($result)){
           
            array_push($arr, [
            'subject_id' => $row['subject_id'],
            'subject_name' => $row['name']
            ]); 
        }
        echo json_encode($arr);
    }


    function getAllSubjectByTeacher($id){
        $arr=[];
        $db = new Db;

        
        $query="SELECT DISTINCT subject.name AS subject FROM teacher,class,subject WHERE teacher.teacher_id=class.teacher_id AND subject.subject_id=class.sub_id AND teacher.teacher_id='$id'"; 
        $result=mysqli_query($db->dbConnection(),$query);
        while($row=mysqli_fetch_assoc($result)){
           
            array_push($arr, [
            'subject_name' => $row['subject']
            ]); 
        }
        echo json_encode($arr);
    }


    function getAllSubjects($subject_id){
        $arr=[];
        $db = new Db;

        if($subject_id==''){
            $query="SELECT * FROM subject";
        }else{
            $query="SELECT * FROM subject WHERE subject_id='$subject_id'";
        }

        $result=mysqli_query($db->dbConnection(),$query);
        while($row=mysqli_fetch_assoc($result)){

            array_push($arr, [
            'id' => $row['subject_id'],
            'name' => $row['name'],
            'medium' => $row['medium']
            ]); 
        }
        echo json_encode($arr);
    }





}





    $subjectdao=new subjectDAO;

  

    if(isset($_GET['all_subject_id'])){
        $subjectdao->getAllSubjectId();
    } 

    if(isset($_GET['get_subject_names'])){
        $teacher_id = $_GET['teacher_id'];
        $subjectdao->getAllSubjectByTeacher($teacher_id);
    } 

    if(isset($_GET['search_subject_id'])){
        $search_subject_id = $_GET['search_subject_id'];
        $subjectdao->getAllSubjects($search_subject_id);
    }


?>



