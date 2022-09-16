<?php
	function getOrderStatusInfoModel(){
		$hostname='localhost';
		$username='root';
		$password='';
		$dbname='myonlineshop';
		$conn=mysqli_connect($hostname, $username, $password, $dbname);
		if(!$conn) {
			die('Khong the ket noi'.mysql_error($conn));
			exit();
		}

		$sql='SELECT * FROM orderstatus';
		$Array = array();
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
				array_push($Array, $row);
			}
		}
		mysqli_close($conn);
		return $Array;
	}
	function updateOrderStatusModel($orderStatusID, $orderID) {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$query = 'UPDATE orders SET Status = "'.$orderStatusID.'" WHERE OrderID = '.$orderID.'';

		$result = mysqli_query($conn, $query);
		disconnectToDB($conn);
		return $result;
	}
?>