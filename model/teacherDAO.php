<?php
include "dbcon.php";
include "teacher.php";
class teacherDAO{
    
    function getAllTeacher($teacher_id){
        $arr=[];
        $db = new Db;

        if($teacher_id==''){
            $query="SELECT * FROM teacher";
        }else{
            $query="SELECT * FROM teacher WHERE teacher_id='$teacher_id'";
        }

        $result=mysqli_query($db->dbConnection(),$query);
        while($row=mysqli_fetch_assoc($result)){

            array_push($arr, [
            'id' => $row['teacher_id'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'email' => $row['email'],
            'contact_no' => $row['contact_no'],
            'photo' => $row['photo'],
            'address_no' => $row['address_no'],
            'address_street' => $row['street'],
            'address_city' => $row['city'],
            'nic' => $row['nic'],
            ]); 
        }
        echo json_encode($arr);
    }


    
    function getTeacher($teacher_id){
        $db = new Db;

        $query="SELECT * FROM teacher WHERE teacher_id='$teacher_id'";
        
        $result=mysqli_query($db->dbConnection(),$query);
        while($row=mysqli_fetch_assoc($result)){
            
            
            $data["id"]=$row['teacher_id'];
            $data["first_name"]=$row['first_name'];
            $data["last_name"]=$row['last_name'];
            $data["email"]=$row['email'];
            $data["contact_no"]=$row['contact_no'];
            $data["photo"]=$row['photo'];
            $data["address_no"]=$row['address_no'];
            $data["street"]=$row['street'];
            $data["city"]=$row['city'];
            $data["nic"]=$row['nic'];
 
        }
        echo json_encode($data);
    }



}


    $teacherdao=new teacherDAO;

    if(isset($_GET['search_teacher_id'])){
        $search_teacher_id=$_GET['search_teacher_id'];
        $teacherdao->getAllTeacher($search_teacher_id);
        
    } 

    if(isset($_GET['show_teacher_id'])){
        $teacher_id=$_GET['show_teacher_id'];
        $teacherdao->getTeacher($teacher_id);
    } 

    
?>



