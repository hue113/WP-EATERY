<?php  

Class Dao{
	public $connect = null;

	public function __construct(){
		$servername = "localhost";
        $username = "root";
        $password = "root";
        $database = 'wp_eatery';

        // Create connection
        $this->connect = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($this->connect->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
	}

	public function runSql($sql){
		$result = $this->connect->query($sql);
        if ($result  === TRUE) {
            return true ;
        } else {
            return false;
        }
	}

	public function getData($sql){
		$result = $this->connect->query($sql);
		
        if ($result) {
        	$data = [];
            if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			    	$data[] = $row;
			    }
			}
			return $data;
        } else {
            return false;
        }
	}
}