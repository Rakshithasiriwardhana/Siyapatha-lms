<?php 

class Db{
	public $dbhost = 'localhost';
	public $dbuser = 'root';
	public $dbpass = '';
	public $dbname = 'siyapatha';

	function dbConnection(){
		$con = mysqli_connect($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);

		if(mysqli_connect_errno()){
		die('Database connection faield'.mysqli_connect_error());
		}
		else{
			//echo "Database connection Sucess!";
		}
		return $con;
	} 

}

?>
