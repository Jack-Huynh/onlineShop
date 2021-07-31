<?php
	function createOrdersModel($customername, $address, $phone, $total, $secCode) {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$query='INSERT INTO orders(CustomerName, Address, Phone, Total, secCode) VALUES("'.$customername.'","'.$address.'","'.$phone.'","'.$total.'","'.$secCode.'")';

		$result = mysqli_query($conn, $query);
		disconnectToDB($conn);
		return $result;
	}
	function createOrderDetailsModel($orderID, $productID, $quantity, $sum) {
		$hostname='localhost';
		$username='root';
		$password='';
		$dbname='myonlineshop';
		$conn=mysqli_connect($hostname, $username, $password, $dbname);
		if(!$conn) {
			die('Khong the ket noi'.mysql_error($conn));
			exit();
		}

		$query='INSERT INTO orderdetails(OrderID, ProductID, Quantity, Sum) VALUES("'.$orderID.'","'.$productID.'","'.$quantity.'","'.$sum.'")';

		$result = mysqli_query($conn, $query);
		mysqli_close($conn);
		return $result;
	}

	function getOrderIdModel($secCode){
		$hostname='localhost';
		$username='root';
		$password='';
		$dbname='myonlineshop';
		$conn=mysqli_connect($hostname, $username, $password, $dbname);
		if(!$conn) {
			die('Khong the ket noi'.mysql_error($conn));
			exit();
		}

		$sql='SELECT * FROM orders WHERE secCode ='.$secCode.'';
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

	function getOrderInfoModel(){
		include '../../Helper/databaseHelper.php';
		$sql='SELECT * FROM orders, orderstatus WHERE orders.Status = orderstatus.orderStatusID';
		$conn = connectToDB();
		$result = mysqli_query($conn, $sql);
		$Array = array();
		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
				array_push($Array, $row);
			}
		}
		disconnectToDB($conn);
		return $Array;	
	}

	function getOrderDetailsInfoModel($orderID){
		include '../../Helper/databaseHelper.php';
		$sql='SELECT * FROM orderdetails, product WHERE orderdetails.OrderID ='.$orderID.' AND orderdetails.ProductID= product.ProductID';
		$conn = connectToDB();
		$result = mysqli_query($conn, $sql);
		$Array = array();
		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
				array_push($Array, $row);
			}
		}
		disconnectToDB($conn);
		return $Array;	
	}
?>