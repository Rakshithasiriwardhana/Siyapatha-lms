<?php
session_start();

include "dbcon.php";
//include "home.php";

class homeDAO{
    
    function home(){
        $arr=[];
        $db = new Db;

        $teachers="";
        $students="";
        $classes="";
        //$halls="";

        $query1="SELECT COUNT(teacher_id) as teachers FROM teacher;";
        $result1=mysqli_query($db->dbConnection(),$query1);
        
        while($row=mysqli_fetch_assoc($result1)){
            $teachers=$row['teachers'];
        }


        $query2="SELECT COUNT(student_id) as students FROM student;";
        $result2=mysqli_query($db->dbConnection(),$query2);
        
        while($row=mysqli_fetch_assoc($result2)){
            $students=$row['students'];
        }


        $query3="SELECT COUNT(class_id) as classes FROM class;";
        $result3=mysqli_query($db->dbConnection(),$query3);
        
        while($row=mysqli_fetch_assoc($result3)){
            $classes=$row['classes'];
        }


        array_push($arr, [
            'teachers' => $teachers,
            'students' => $students,
            'classes' => $classes

        ]);


        echo json_encode($arr);
    }



    function income(){
        $arr=[];
        $db = new Db;


        $month = date('m');
        $month_name='';
        if($month=='01'){
            $month_name='January';
        }elseif($month=='02'){
            $month_name='February';
        }elseif($month=='03'){
            $month_name='March';
        }elseif($month=='04'){
            $month_name='April';
        }elseif($month=='05'){
            $month_name='May';
        }elseif($month=='06'){
            $month_name='June';
        }elseif($month=='07'){
            $month_name='July';
        }elseif($month=='08'){
            $month_name='August';
        }elseif($month=='09'){
            $month_name='September';
        }elseif($month=='10'){
            $month_name='October';
        }elseif($month=='11'){
            $month_name='November';
        }else{
            $month_name='December';
        }


        $query1="SELECT SUM(class.fee) as income FROM class,fee WHERE fee.status='payed' AND class.class_id=fee.class_id AND month='$month_name'";
        $result1=mysqli_query($db->dbConnection(),$query1);
        
        while($row=mysqli_fetch_assoc($result1)){
            array_push($arr, [
                'amount' => $row['income'].".00",
                'month' => $month_name
    
            ]);
        }

        


        echo json_encode($arr);
    }

    
    function today(){
        $arr=[];
        $db = new Db;


        $day = date('D');
        


        $query1="SELECT class.name,timetable.location,timetable.start_time,timetable.end_time FROM class,timetable,class_timetable WHERE class.class_id=class_timetable.class_id AND timetable.timetable_id=class_timetable.timetable_id AND timetable.day LIKE '$day%'";
        $result1=mysqli_query($db->dbConnection(),$query1);
        
        while($row=mysqli_fetch_assoc($result1)){
            array_push($arr, [
                'name' => $row['name'],
                'location' => $row['location'],
                'start' => $row['start_time'],
                'end' => $row['end_time']
    
            ]);
        }

        


        echo json_encode($arr);
    }
    


}


    ///////////////////// interface connection //////////////////////////////////////


    if(isset($_GET['home_details'])){
        $homedao=new homeDAO;

        $homedao->home();
        
    } 

    if(isset($_GET['income'])){
        $homedao=new homeDAO;

        $homedao->income();
        
    } 


    if(isset($_GET['today'])){
        $homedao=new homeDAO;

        $homedao->today();
        
    }

    //$homedao=new homeDAO;

    //$homedao->home();
 
?>



