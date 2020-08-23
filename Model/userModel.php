<?php 
	include '../../Helper/databaseHelper.php';

	function getUsers () {
		$conn = connectToDB();
		$sql='SELECT * FROM Customers';
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
?>
