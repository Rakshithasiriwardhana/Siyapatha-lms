<?php
session_start();

include "dbcon.php";
include "payment.php";

class paymentDAO{
    
    function getpayment($classid,$month){
        $arr=[];
        $db = new Db;

   
        $query="SELECT fee.*,student.first_name,student.last_name FROM fee,student WHERE fee.class_id='$classid' AND fee.month='$month' AND fee.stu_id=student.student_id";
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
            'status' => $row['status'],
            'uid' => $row['uid']
            ]); 
        }
        echo json_encode($arr);
    }



    
    function addClassStudentToPayment($class_id,$month){
        $db = new Db;
        $userid= $_SESSION["id"];
        $date = date("m-d-Y");
        
        //echo $class_id;
        $query="SELECT stu_id FROM student_class WHERE class_id='$class_id'";
        $result=mysqli_query($db->dbConnection(),$query);
        while($row=mysqli_fetch_assoc($result)){
            echo $stid=$row['stu_id'];

            $query="INSERT INTO fee (uid,class_id,stu_id,month,date) VALUES ('$userid','$class_id','$stid','$month','$date')";
            $run=mysqli_query($db->dbConnection(),$query);
        }
        
        
    }



    function showStudentList($class_id,$month){
        $db = new Db;
        $arr=[];

        $query="SELECT fee.*,student.first_name,student.last_name FROM fee,student WHERE fee.class_id='$class_id' AND fee.month='$month' AND fee.stu_id=student.student_id";
        
        $result=mysqli_query($db->dbConnection(),$query);
        while($row=mysqli_fetch_assoc($result)){
            array_push($arr, [
                'stid' => $row['stu_id'],
                'stname' => $row['first_name']." ".$row['last_name']

            ]);
        }

        
        echo json_encode($arr);
    }





    function addPayment($class_id,$month,$payment){
        $db = new Db;
        
        $query="UPDATE fee SET status ='payed' WHERE class_id ='$class_id' AND month ='$month' AND stu_id IN ($payment)"; 
        
        if(!mysqli_query($db->dbConnection(),$query)){
            echo "Fail!!!";

        }else{
            echo "Marked Payment Successful!!!";
        }


    }





    function updatePayment($new_status,$student_id_clicked,$class_id,$month){
        $db = new Db;
        
        //echo $class_id;
        $query="UPDATE fee SET status='$new_status' WHERE stu_id='$student_id_clicked' AND class_id='$class_id' AND month='$month' ";
        
        if(!mysqli_query($db->dbConnection(),$query)){
            echo "fail!!!";

        }else{
            echo "Update Successful!!!";
        }
        
        
    }


}


    ///////////////////// interface connection //////////////////////////////////////


    if(isset($_GET['add_class_student'])){
        $paymentDAO=new paymentDAO;

        $classid=$_GET['class_id'];
        $month=$_GET['month'];
        $paymentDAO->addClassStudentToPayment($classid,$month);
        
    } 



    if(isset($_GET['show_student_list'])){
        $paymentDAO=new paymentDAO;

        /* $classid='c02';
        $month='january'; */

        $classid=$_GET['class_id'];
        $month=$_GET['month'];
        $paymentDAO->showStudentList($classid,$month);
        
    }



    if(isset($_GET['add_payment'])){
        $paymentDAO=new paymentDAO;

        $classid=$_GET['class_id'];
        $month=$_GET['month'];
        $payment=implode(",",$_GET['payment']);
        
        $paymentDAO->addPayment($classid,$month,$payment);
        
    }



   
    if(isset($_GET['show_payment_list'])){
        $paymentDAO=new paymentDAO;

        //$classid="c02";
        //$date="07-20-2021";
        $classid=$_GET['class_id'];
        $month=$_GET['month'];
        $paymentDAO->getPayment($classid,$month);
        
    }





    if(isset($_GET['new_payment_status'])){
        $paymentDAO=new paymentDAO;

        $new_status = $_GET['new_status'];
        $student_id_clicked =$_GET['student_id_clicked'];
        $class_id = $_GET['class_id'];
        $month =$_GET['month'];

        $paymentDAO->updatePayment($new_status,$student_id_clicked,$class_id,$month);
        
    }
    
?>



