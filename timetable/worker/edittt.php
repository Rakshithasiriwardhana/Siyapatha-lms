<?php
include "functiontt-worker.php";
$timetable = new TimeTable();
if (isset($_POST['submit']))
{
    $id=$_POST['ttid'];
    $stime = $_POST['start_time'];
    $etime = $_POST['end_time'];
    $day = $_POST['day'];
    $location = $_POST['location'];
    
    
    $timetable->updateTimetable($id,$stime,$etime,$day,$location);
    
}
?>
