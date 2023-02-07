<?php

	include "connection.php";
	class TimeTable extends connection{
		

		public function addTimetable($classid,$stime,$etime,$day,$location){
    		$db= new connection();
    		$con = $db ->dbconnection();
        	$sql = "INSERT INTO timetable(start_time,end_time,day,location) VALUES('$stime','$etime','$day','$location')";
       		
       		$result=  mysqli_query($con,$sql);
        	
        	if(!$result){
        		echo '<script> alert("Cannot add the Timetable"); window.location.href="../view/admin/dashboard-admin.php?timetable";</script>' .mysqli_error($con);
        	}

        	else{
				$id= $con->insert_id;        		
				$sql1 = "INSERT INTO class_timetable(class_id,timetable_id) VALUES('$classid','$id')";
        		$result=  mysqli_query($con,$sql1);
        		if(!$result){
        			echo "not entering".mysqli_error($con);
        		}

        		echo '<script> alert("Successfully Add New Timetable"); window.location.href="../view/admin/dashboard-admin.php?timetable";</script>';
        	}
   		}
    	
    	public function updateTimetable($id,$stime,$etime,$day,$location){
    		$db= new connection();
    		$con = $db ->dbconnection();
        	$sql = "UPDATE timetable SET start_time='$stime', end_time='$etime' , day='$day' ,location='$location' WHERE timetable_id = '$id'";        		
       		$result=  mysqli_query($con,$sql);
        	
        	if(!$result){
        		echo '<script> alert("Cannot Update the Timetable"); window.location.href="../view/admin/dashboard-admin.php?timetable";</script>' .mysqli_error($con);
        	}

        	else
        		echo '<script> alert("Successfully Update the Timetable"); window.location.href="../view/admin/dashboard-admin.php?timetable";</script>';
   		}

		public function getTimetabledetails(){
			$db= new connection();
    		$con = $db ->dbconnection();

        	$sql = "SELECT tt.location,tt.day,tt.start_time,tt.end_time,c.name,t.first_name,t.last_name FROM timetable tt,class c,teacher t, class_timetable ct WHERE tt.timetable_id=ct.timetable_id AND c.class_id=ct.class_id AND c.teacher_id= t.teacher_id ORDER BY tt.timetable_id" ;

       		$result=  mysqli_query($con,$sql);
        	
        	if(!$result){
        		echo '<script> alert("Cannot retrieve the Timetables"); window.location.href="../view/admin/dashboard-admin.php?timetable";</script>' .mysqli_error($con);
        	}

        	else return $result;
		}

		public function searchTimetable($subject,$gr,$day){
			$db= new connection();
    		$con = $db ->dbconnection();

			$sql = "SELECT tt.location,tt.day,tt.start_time,tt.end_time,c.name,t.first_name,t.last_name FROM timetable tt,class c,teacher t, class_timetable ct,subject s WHERE (tt.timetable_id=ct.timetable_id AND c.class_id=ct.class_id AND c.teacher_id= t.teacher_id AND s.subject_id=c.sub_id) AND (s.name='$subject' AND c.grade ='$gr' AND tt.day='$day')";
    		$result = mysqli_query($con,$sql);
        	
        	if(!$result){
        		echo '<script> alert("Cannot Search the details"); window.location.href="../view/admin/dashboard-admin.php?timetable";</script>' .mysqli_error($con);
        	}

        	else
        		return $result;
		}

		/*public function removeTimetable(){
			$db= new connection();
    		$con = $db ->dbconnection();
        	$sql = "DELETE tt.timetable_id, tt.start_time,tt.end_time,tt.day, tt.location FROM timetable tt, class c, class_timetable ct WHERE tt.timetable_id=ct.timetable_id AND c.class_id=ct.class_id AND c.teacher_id= t.teacher_id";

       		$result=  mysqli_query($con,$sql);
        	
        	if(!$result){
        		echo "Not Selecting".mysqli_error($con);
        	}

        	else return $result;
		}*/


	}

	
?>