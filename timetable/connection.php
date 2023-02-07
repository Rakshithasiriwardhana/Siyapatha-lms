<?php
    class connection{

    	public $host ="localhost";
    	public $user ="root";
    	public $pw ="0000";
    	public $dbname ="siyapatha";

    	public function dbconnection(){
    		$con = mysqli_connect($this->host,$this->user,$this->pw,$this->dbname) or die("not connected");
					
			if ($con->connect_errno) {
    			//echo "Connect failed: %s\n", $mysqli->connect_error;
    			exit();
			}
			return $con;
		}
    }
   
?>