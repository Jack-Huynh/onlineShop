<?php
	function registerUserModel($email, $psw) {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$query='INSERT INTO admin(Email, Password) VALUES("'.$email.'","'.$psw.'")';
		$result = mysqli_query($conn, $query);
		disconnectToDB($conn);
		return $result;
	}  
?>
