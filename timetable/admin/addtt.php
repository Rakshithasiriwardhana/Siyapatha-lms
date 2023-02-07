<?php
include "functiontt-admin.php";
$timetable = new TimeTable();
if (isset($_POST['add']))
{    
    $id=$_POST['classID'];
    $stime = $_POST['start_time'];
    $etime = $_POST['end_time'];
    $day = $_POST['day'];
    $location = $_POST['location'];
    
    
    $timetable->addTimetable($id,$stime,$etime,$day,$location);
    
}
?>