<?php
session_start();

include "dbcon.php";
include "sendEmail.php";

class emailDAO{
    
    function getEmailAddress($type){
        $arr=[];
        $db = new Db;

        if($type=="students"){
            $query="SELECT email FROM student";
        }elseif($type=="teachers"){
            $query="SELECT email FROM teacher";
        }elseif($type=="workers"){
            $query="SELECT email FROM user";
        }else{
            false;
        }

        //$query="SELECT email FROM user";

        $result=mysqli_query($db->dbConnection(),$query);

        
        if(!mysqli_query($db->dbConnection(),$query)){
            echo ("Error description: " . mysqli_error($db->dbConnection()));

        }
        while($row=mysqli_fetch_assoc($result)){

            array_push($arr, [
            'address' => $row['email']
            ]); 
        }
        echo json_encode($arr);
    }



    function sendEmail($address,$msg){

        $to = '"'. $address . '"';
        $subject = "Siyapatha Education Centre: Gampaha";
        $txt = wordwrap($msg,70);
        $txt = "Hello world!";
        $headers = "From: siyapatha@gmail.com";

        mail($to,$subject,$txt,$headers);
    }

    
    


}


    ///////////////////// interface connection //////////////////////////////////////


    if(isset($_GET['get_email'])){
        $emaildao=new emailDAO;

        $type=$_GET['type'];
        $emaildao->getEmailAddress($type);
        
    } 



    if(isset($_GET['send_email'])){
        $emaildao=new emailDAO;

        $msg=$_GET['msg'];
        $address=$_GET['address'];
        $emaildao->sendEmail($address,$msg);
        
    } 

 
?>



