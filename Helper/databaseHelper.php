<?php
	function connectToDB() {
		$hostname='localhost';
		$username='root';
		$password='';
		$dbname='myonlineshop';
		$conn=mysqli_connect($hostname, $username, $password, $dbname);
		if(!$conn) {
			die('Cannot connect'.mysql_error($conn));
			exit();
		}
		return $conn;	
	}
	function disconnectToDB($conn) {
		mysqli_close($conn);
	}
?>
