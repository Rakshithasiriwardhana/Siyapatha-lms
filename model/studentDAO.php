<?php
include "dbcon.php";
include "student.php";
class studentDAO{
    
    function getAllStudent($student_id){
        $arr=[];
        $db = new Db;

        if($student_id==''){
            $query="SELECT * FROM student";
        }else{
            $query="SELECT * FROM student WHERE student_id='$student_id'";
        }

        $result=mysqli_query($db->dbConnection(),$query);
        while($row=mysqli_fetch_assoc($result)){

            array_push($arr, [
            'id' => $row['student_id'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'email' => $row['email'],
            'contact_no' => $row['contact_no'],
            'photo' => $row['photo'],
            'address_no' => $row['address_no'],
            'address_street' => $row['street'],
            'address_city' => $row['city'],
            'grade' => $row['grade'],
            ]); 
        }
        echo json_encode($arr);
    }


    
    function getStudent($student_id){
        $db = new Db;

        $query="SELECT * FROM student WHERE student_id='$student_id'";
        
        $result=mysqli_query($db->dbConnection(),$query);
        while($row=mysqli_fetch_assoc($result)){
            
            $data["id"]=$row['student_id'];
            $data["first_name"]=$row['first_name'];
            $data["last_name"]=$row['last_name'];
            $data["email"]=$row['email'];
            $data["contact_no"]=$row['contact_no'];
            $data["photo"]=$row['photo'];
            $data["address_no"]=$row['address_no'];
            $data["street"]=$row['street'];
            $data["city"]=$row['city'];
            $data["grade"]=$row['grade'];
 
        }
        echo json_encode($data);
    }



}


    $studentdao=new studentDAO;

    if(isset($_GET['search_student_id'])){
        $search_student_id=$_GET['search_student_id'];
        $studentdao->getAllStudent($search_student_id);
        
    } 

    if(isset($_GET['show_student_id'])){
        $show_student_id=$_GET['show_student_id'];
        $studentdao->getStudent($show_student_id);
    } 

    
?>



