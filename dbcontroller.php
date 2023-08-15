<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "artefact";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		return $conn;
	}
	
	function runQuery($query) {
		$result = $this->conn->query($query);
		$resultset = array();
		while($row = $result->fetch_assoc()) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = $this->conn->query($query);
		$rowcount = $result->num_rows;
		return $rowcount;	
	}
}
?>
