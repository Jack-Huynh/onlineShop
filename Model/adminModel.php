<?php
	function registerUserModel($email, $psw) {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		if(!checkExistEmailModel($email)) {
			return 3;
		}
		$query='INSERT INTO admin(Email, Password) VALUES("'.$email.'","'.$psw.'")';
		$result = mysqli_query($conn, $query);
		disconnectToDB($conn);
		if ($result) {
			return 2;
		} else {
			return 0;
		}
		
	}

	function checkExistEmailModel($email){
		$query = 'SELECT * FROM admin WHERE admin.Email = "'.$email.'"';
		$conn = connectToDB();
		$result = mysqli_query($conn, $query);
		disconnectToDB($conn);
		if(mysqli_num_rows($result)>0){
			return false;
		} else {
			return true;
		}
	}
?>
