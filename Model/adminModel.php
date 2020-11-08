<?php
	function registerUserModel($email, $psw) {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		if(!checkExistEmailModel($email)) {
			return 3;
		}
		$secCode=mt_rand(100000,999999);
		$query='INSERT INTO admin(Email, Password, secCode) VALUES("'.$email.'","'.$psw.'",'.$secCode.')';
		$result = mysqli_query($conn, $query);
		disconnectToDB($conn);
		if ($result) {
			return 2;
		} else {
			return 0;
		}
		
	}

	function checkAccountModel($email, $psw) {
		include '../Helper/databaseHelper.php';
		$query = 'SELECT * FROM admin WHERE admin.Email = "'.$email.'" AND admin.Password = "'.$psw.'" AND admin.Status=1';
		$conn = connectToDB();
		$result = mysqli_query($conn, $query);
		disconnectToDB($conn);
		if(mysqli_num_rows($result)>0){
			return true;
		} else {
			return false;
		}
	}

	function checkExistEmailModel($email) {
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
	function getAdmins () {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$sql='SELECT * FROM admin';
		$result = mysqli_query($conn, $sql);
		$userArray = array();
		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
				array_push($userArray, $row);
			}
		}
		disconnectToDB($conn);
		return $userArray;
	}

	function changeStatusModel($adminID, $secCode){
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$sql='Update admin SET Status = 1 WHERE ID='.$adminID.' AND secCode='.$secCode.'';
		$result = mysqli_query($conn, $sql);
		disconnectToDB($conn);
		return $result;
	}

	function getAdminModel($id){
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$sql='SELECT * FROM admin WHERE ID = '.$id.'';
		$result = mysqli_query($conn, $sql);
		$userArray = array();
		if (mysqli_num_rows($result)>0) {
			$row=mysqli_fetch_assoc($result);
			array_push($userArray, $row);
		}
		disconnectToDB($conn);
		return $userArray;
	}

	function getAdminModelByEmail($email) {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$sql='SELECT * FROM admin WHERE Email = "'.$email.'"';
		$result = mysqli_query($conn, $sql);
		$userArray = array();
		if (mysqli_num_rows($result)>0) {
			$row=mysqli_fetch_assoc($result);
			array_push($userArray, $row);
		}
		disconnectToDB($conn);
		return $userArray;
	}

	function resetPasswordModel($adminID, $newPassword){
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$sql='Update admin SET Password = "'.$newPassword.'" WHERE ID='.$adminID.'';
		$result = mysqli_query($conn, $sql);
		disconnectToDB($conn);
	}
?>
