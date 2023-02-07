<?php
include "dbcon.php";
include "admin.php";

class adminDAO{


///////////////////////  user accounts //////////////////////////////////////

    function alreadyExistAccountCheck($id,$email,$nic){
        $db = new Db;
        $value=false;

        //////////// id check ////////////////
        $query="SELECT user_id FROM User WHERE user_id='$id'";
        $results = mysqli_query($db->dbConnection(), $query);
        if (mysqli_num_rows($results) == 0){
            
            //////////////// email check //////////////////////
            $query="SELECT email FROM User WHERE email='$email'";
            $results = mysqli_query($db->dbConnection(), $query);
            if (mysqli_num_rows($results) == 0){

                //////////////// nic check //////////////////////
                $query="SELECT nic FROM User WHERE nic='$nic'";
                $results = mysqli_query($db->dbConnection(), $query);
                if (mysqli_num_rows($results) == 0){
                    $value=true;
                }else{
                    $value=false;
                }
            }else{
                $value=false;
            }
        }else{
            $value=false;
        }

        return $value;
    }


    function addUserProfile($id,$first_name,$last_name,$type,$photo,$email,$contact_no,$address_no,$address_street,$address_city,$nic,$password,$username){
   
        $admindao=new adminDAO;
        if($admindao->alreadyExistAccountCheck($id,$email,$nic)==true){

            $db = new Db;
            $status='';

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query="INSERT INTO user (user_id,first_name,last_name,type,photo,email,contact_no,address_no,street,city,nic) VALUES (
                '$id',
                '$first_name',
                '$last_name',
                '$type',
                '$photo',
                '$email',
                '$contact_no',
                '$address_no',
                '$address_street',
                '$address_city',
                '$nic'
            )";
            if(mysqli_query($db->dbConnection(),$query)){
                $query="INSERT INTO login (uid,username,password) VALUES (
                    '$id',
                    '$username',
                    '$hashed_password'
                )";
                if(mysqli_query($db->dbConnection(),$query)){
                    $status='account create successful!!!';
                }else{
                    $status='fail';
                }
            }else{
                $status='fail';
            }

        }else{
            $status="account already exist!!!\nor User id/ email/ nic already used!!!";
        }

        echo json_encode($status);
        
    }


    function UpdateUserProfile($email,$contact_no,$address_no,$address_street,$address_city,$type,$password,$username){

        $db = new Db;
        $status='';
                                              /////////////////// update user table //////////
        $query="UPDATE user SET                          
            contact_no='$contact_no', 
            type='$type', 
            address_no='$address_no', 
            street='$address_street', 
            city='$address_city' 
            WHERE email='$email'
        ";
        if(mysqli_query($db->dbConnection(),$query)){
            $status='account updated successful!!!';
        }else{
            $status='fail';
        }
        if($password != 'false'){                      /////////////////// update password //////////
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query2= "UPDATE login SET password='$hashed_password' where username='$username'";
            if(mysqli_query($db->dbConnection(),$query2)){
                $status='account updated successful!!!';
            }else{
                $status='fail';
            }
        }
        

        echo json_encode($status);
    }    


    function removeUserProfile($id){

        $db=new Db;

        $status='fail';
        $query="DELETE FROM user WHERE user_id='$id'";
        if(mysqli_query($db->dbConnection(),$query)){
            $status='account delete successful!!!';
        }else{
            $status='fail';
        }
        echo json_encode($status);
    }
    



/////////////////////// teachers ////////////////////////////////////////////

    function alreadyExistTeacherCheck($id,$email,$nic){
        $db = new Db;
        $value=false;
        $msg='';

        //////////// id check ////////////////
        $query="SELECT teacher_id FROM teacher WHERE teacher_id='$id'";
        $results = mysqli_query($db->dbConnection(), $query);
        if (mysqli_num_rows($results) == 0){
            
            //////////////// email check //////////////////////
            $query="SELECT email FROM teacher WHERE email='$email'";
            $results = mysqli_query($db->dbConnection(), $query);
            if (mysqli_num_rows($results) == 0){

                //////////////// nic check //////////////////////
                $query="SELECT nic FROM teacher WHERE nic='$nic'";
                $results = mysqli_query($db->dbConnection(), $query);
                if (mysqli_num_rows($results) == 0){
                    $value=true;
                }else{
                    $msg='NIC Already Exist';
                    echo json_encode($msg);
                    $value=false;
                }
            }else{
                $msg='Email Already Exist';
                echo json_encode($msg);
                $value=false;
            }
        }else{
            $msg='ID Already Exist';
            echo json_encode($msg);
            $value=false;
        }

        return $value;
    }


    function addTeacher($id,$first_name,$last_name,$photo,$email,$contact_no,$address_no,$address_street,$address_city,$nic){

            $db = new Db;
            $status='';

            $query="INSERT INTO teacher (teacher_id,first_name,last_name,photo,email,contact_no,address_no,street,city,nic) VALUES (
                '$id',
                '$first_name',
                '$last_name',
                '$photo',
                '$email',
                '$contact_no',
                '$address_no',
                '$address_street',
                '$address_city',
                '$nic'
            )";
            if(mysqli_query($db->dbConnection(),$query)){
                    $status='Teacher Add successful!!!';
            }else{
                $status='fail';
            }

        echo json_encode($status);
        
    }


    function UpdateTeacher($id,$contact_no,$address_no,$address_street,$address_city){

        $db = new Db;
        $status='';

        $query="UPDATE teacher SET                          
            contact_no='$contact_no', 
            address_no='$address_no', 
            street='$address_street', 
            city='$address_city' 
            WHERE teacher_id='$id'
        ";
        if(mysqli_query($db->dbConnection(),$query)){
            $status='teacher updated successful!!!';
        }else{
            $status='fail';
        }

        echo json_encode($status);
    }


    function removeTeacher($id){

        $db=new Db;

        $status='fail';
        $query="DELETE FROM class WHERE teacher_id='$id'";
        if(mysqli_query($db->dbConnection(),$query)){
            $query="DELETE FROM teacher WHERE teacher_id='$id'";
            if(mysqli_query($db->dbConnection(),$query)){
                $status='Teacher delete successful!!!';
            }else{
                $status='fail';
            }
        }else{
            $status='fail';
        }
        echo json_encode($status);
    }




////////////////////////////// students ///////////////////////////////

    function alreadyExistStudentCheck($id,$email){
        $db = new Db;
        $value=false;
        $msg='';

        //////////// id check ////////////////
        $query="SELECT student_id FROM student WHERE student_id='$id'";
        $results = mysqli_query($db->dbConnection(), $query);
        if (mysqli_num_rows($results) == 0){
            
            //////////////// email check //////////////////////
            $query="SELECT email FROM student WHERE email='$email'";
            $results = mysqli_query($db->dbConnection(), $query);
            if (mysqli_num_rows($results) == 0){
                $value=true;
            }else{
                $msg='Email Already Exist';
                echo json_encode($msg);
                $value=false;
            }
        }else{
            $msg='ID Already Exist';
            echo json_encode($msg);
            $value=false;
        }

        return $value;
    }


    function addStudent($id,$first_name,$last_name,$photo,$email,$contact_no,$address_no,$address_street,$address_city,$grade){

            $db = new Db;
            $status='';

            $query="INSERT INTO student (student_id,first_name,last_name,photo,email,contact_no,address_no,street,city,grade) VALUES (
                '$id',
                '$first_name',
                '$last_name',
                '$photo',
                '$email',
                '$contact_no',
                '$address_no',
                '$address_street',
                '$address_city',
                '$grade'
            )";
            if(mysqli_query($db->dbConnection(),$query)){
                    $status='Student Add successful!!!';
            }else{
                $status='fail';
            }

        echo json_encode($status);
        
    }


    function UpdateStudent($id,$contact_no,$address_no,$address_street,$address_city,$grade){

        $db = new Db;
        $status='';

        $query="UPDATE student SET                          
            contact_no='$contact_no', 
            address_no='$address_no', 
            street='$address_street', 
            city='$address_city',
            grade='$grade' 
            WHERE student_id='$id'
        ";
        if(mysqli_query($db->dbConnection(),$query)){
            $status='student updated successful!!!';
        }else{
            $status='fail';
        }

        echo json_encode($status);
    }


    function removeStudent($id){

        $db=new Db;

        $status='fail';
        $query="DELETE FROM student WHERE student_id='$id'";
        if(mysqli_query($db->dbConnection(),$query)){
            //$query="DELETE FROM teacher WHERE teacher_id='$id'";
            //if(mysqli_query($db->dbConnection(),$query)){
                $status='Student delete successful!!!';
            //}else{
               // $status='fail';
           // }
        }else{
            $status='fail';
        }
        echo json_encode($status);
    }

/* 
    function addPhoto($id,$name){
        $db = new Db;
        $status='';

        $query="UPDATE student SET                          
            photo='$name'
            WHERE student_id='$id'
        ";
        if(mysqli_query($db->dbConnection(),$query)){
            //$status='student updated successful!!!';
        }else{
            //$status='fail';
        }
    }
 */

//////////////////////////// subjects //////////////////////////////

    function addSubject($id,$name,$medium){

        $db = new Db;
        $status='';

        $query="INSERT INTO subject (subject_id,name,medium) VALUES (
            '$id',
            '$name',
            '$medium'
        )";
        if(mysqli_query($db->dbConnection(),$query)){
                $status='Subject Add successful!!!';
        }else{
            $status='Fail!!   Subject Allready Exists!!!';
        }

        echo json_encode($status);

    }


    function removeSubject($id){

        $db=new Db;

        $status='fail';
        $query="DELETE FROM subject WHERE subject_id='$id'";
        if(mysqli_query($db->dbConnection(),$query)){
            $query="DELETE FROM class WHERE sub_id='$id'";
            if(mysqli_query($db->dbConnection(),$query)){
                $status='Subject delete successful!!!';
            }else{
                $status='fail';
            }
        }else{
            $status='fail';
        }
        echo json_encode($status);
    }



///////////////////////////////// classes ///////////////////////////////

    function addClass($id,$subject,$teacher,$name,$grade,$fee){

        $db = new Db;
        $status='';

        $query="INSERT INTO class (class_id,sub_id,teacher_id,name,grade,fee) VALUES (
            '$id',
            '$subject',
            '$teacher',
            '$name',
            '$grade',
            '$fee'
        )";
        if(mysqli_query($db->dbConnection(),$query)){
                $status='Class Add successful!!!';
        }else{
            $status='Fail!!';
        }

        echo json_encode($status);

    }


    function addStudentToClass($id,$classid){

        $db = new Db;
        $status='';

        $query="INSERT INTO student_class (stu_id,class_id) VALUES (
            '$id',
            '$classid'
        )";
        if(mysqli_query($db->dbConnection(),$query)){
                $status='Student add to the Class!!!';
        }else{
            $status='Fail!!';
        }

        echo json_encode($status);

    }


    function removeClass($id){

        $db=new Db;

        $status='fail';
        $query="DELETE FROM class WHERE class_id='$id'";
        if(mysqli_query($db->dbConnection(),$query)){
                $status='Class delete successful!!!';
        }else{
                $status='fail';
        }
        echo json_encode($status);
    }


    function removeStudentFromClass($id,$classid){

        $db = new Db;
        $status='';

        $query="DELETE FROM student_class WHERE stu_id='$id' AND class_id='$classid'";

        if(mysqli_query($db->dbConnection(),$query)){
                $status='Remove student from class!!!';
        }else{
            $status='Fail!!';
        }

        echo json_encode($status);

    }








}

    


//////////////////////// interface connection //////////////////////////

    if(isset($_GET['add_new_user'])){
        $admindao=new adminDAO;

        $id = $_GET['id'];
        $first_name = $_GET['fname'];
        $last_name = $_GET['lname'];
        $type = $_GET['type'];
        $email = $_GET['email'];
        $contact_no = $_GET['tp'];
        $address_no = $_GET['address_no'];
        $address_street = $_GET['address_street'];
        $address_city = $_GET['address_city'];
        $nic = $_GET['nic'];
        $username = $_GET['username'];
        $password = $_GET['password'];
        //$photo = $_GET['show_user_id'];
        $photo = "2424";

        $admindao->addUserProfile($id,$first_name,$last_name,$type,$photo,$email,$contact_no,$address_no,$address_street,$address_city,$nic,$password,$username);

    } 

    if(isset($_GET['update_user'])){
        $admindao1=new adminDAO;

        $email = $_GET['email'];
        $type = $_GET['type'];
        $contact_no = $_GET['tp'];
        $address_no = $_GET['address_no'];
        $address_street = $_GET['address_street'];
        $address_city = $_GET['address_city'];
        $password = $_GET['password'];
        $username = $_GET['username'];

        $admindao1->UpdateUserProfile($email,$contact_no,$address_no,$address_street,$address_city,$type,$password,$username);
       

    }

    if(isset($_GET['delete_user'])){
        $admindao2=new adminDAO;

        $id = $_GET['id'];

        $admindao2->removeUserProfile($id);
       

    }

    if(isset($_GET['add_new_teacher'])){
        $admindao=new adminDAO;

        $id = $_GET['id'];
        $first_name = $_GET['fname'];
        $last_name = $_GET['lname'];
        $email = $_GET['email'];
        $contact_no = $_GET['tp'];
        $address_no = $_GET['address_no'];
        $address_street = $_GET['address_street'];
        $address_city = $_GET['address_city'];
        $nic = $_GET['nic'];
        //$photo = $_GET['show_user_id'];
        $photo = "2424";

        if($admindao->alreadyExistTeacherCheck($id,$email,$nic) == true){
            $admindao->addTeacher($id,$first_name,$last_name,$photo,$email,$contact_no,$address_no,$address_street,$address_city,$nic);
        }
    } 

    if(isset($_GET['update_teacher'])){
        $admindao=new adminDAO;

        $id = $_GET['teacher_id'];
        $contact_no = $_GET['tp'];
        $address_no = $_GET['address_no'];
        $address_street = $_GET['address_street'];
        $address_city = $_GET['address_city'];

        $admindao->UpdateTeacher($id,$contact_no,$address_no,$address_street,$address_city);
        
    }

    if(isset($_GET['delete_teacher'])){
        $admindao=new adminDAO;

        $id = $_GET['id'];

        $admindao->removeTeacher($id);
        
    }

    if(isset($_GET['add_new_student'])){
        $admindao=new adminDAO;

        $id = $_GET['id'];
        $first_name = $_GET['fname'];
        $last_name = $_GET['lname'];
        $email = $_GET['email'];
        $contact_no = $_GET['tp'];
        $address_no = $_GET['address_no'];
        $address_street = $_GET['address_street'];
        $address_city = $_GET['address_city'];
        $grade = $_GET['grade'];
        //$photo = $_GET['show_user_id'];
        $photo = "2424";

        if($admindao->alreadyExistStudentCheck($id,$email) == true){
            $admindao->addStudent($id,$first_name,$last_name,$photo,$email,$contact_no,$address_no,$address_street,$address_city,$grade);
        }
    } 

    if(isset($_GET['update_student'])){
        $admindao=new adminDAO;

        $id = $_GET['student_id'];
        $contact_no = $_GET['tp'];
        $address_no = $_GET['address_no'];
        $address_street = $_GET['address_street'];
        $address_city = $_GET['address_city'];
        $grade = $_GET['grade'];

        $admindao->UpdateStudent($id,$contact_no,$address_no,$address_street,$address_city,$grade);
        
    }

    if(isset($_GET['delete_student'])){
        $admindao=new adminDAO;

        $id = $_GET['id'];

        $admindao->removeStudent($id);
        
    }

    if(isset($_GET['add_new_subject'])){
        $admindao=new adminDAO;

        $id = $_GET['id'];
        $name = $_GET['name'];
        $medium = $_GET['medium'];

        $admindao->addSubject($id,$name,$medium);
        
    }

    if(isset($_GET['delete_subject'])){
        $admindao=new adminDAO;

        $id = $_GET['id'];

        $admindao->removeSubject($id);
        
    }

    if(isset($_GET['add_new_class'])){
        $admindao=new adminDAO;

        $id = $_GET['id'];
        $subject = $_GET['subject'];
        $teacher = $_GET['teacher'];
        $name = $_GET['name'];
        $grade = $_GET['grade'];
        $fee = $_GET['fee'];

        $admindao->addClass($id,$subject,$teacher,$name,$grade,$fee);
        
    }

    if(isset($_GET['delete_class'])){
        $admindao=new adminDAO;

        $id = $_GET['id'];

        $admindao->removeClass($id);
        
    }

    if(isset($_GET['add_new_student_to_class'])){
        $admindao=new adminDAO;

        $classid = $_GET['classid'];
        $studentid = $_GET['studentid'];

        $admindao->addStudentToClass($studentid,$classid);
        
    }

    if(isset($_GET['delete_student_from_class'])){
        $admindao=new adminDAO;

        $studentid = $_GET['studentid'];
        $classid = $_GET['classid'];

        $admindao->removeStudentFromClass($studentid,$classid);
        
    }




/* 
    if(isset($_GET['student_updateImage'])){
        $admindao=new adminDAO;

        $id = $_GET['id'];
        $imageName = $_GET['imageName'];

        $admindao->removeStudentFromClass($id,$imageName);
        
    } */


?>