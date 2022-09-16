<?php
	function getQuantity() {
		include '../../Helper/databaseHelper.php';
		$conn = connectToDB();

		//
		$query='SELECT SUM(Quantity) as quantitySold FROM orderdetails;';
		$Array = array();
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
				array_push($Array, $row);
			}
		}
		$quantitySold = $Array[0]['quantitySold'];

		//
		$query='SELECT COUNT(ProductID) as quantityProduct FROM product;';
		$Array = array();
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
				array_push($Array, $row);
			}
		}
		$quantityProduct = $Array[0]['quantityProduct'];

		$query='SELECT COUNT(OrderID) as quantityOrder FROM orders;';
		$Array = array();
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
				array_push($Array, $row);
			}
		}
		$quantityOrder = $Array[0]['quantityOrder'];

		$query='SELECT Sum(Sum) as Total FROM orderdetails;';
		$Array = array();
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
				array_push($Array, $row);
			}
		}
		$Total = $Array[0]['Total'];


		$query='SELECT CustomerName, Phone, Total FROM orders GROUP BY OrderID ORDER BY Total DESC Limit 1';
		$Array = array();
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
				array_push($Array, $row);
			}
		}
		$CustomerName = $Array[0]['CustomerName'];
		$Phone = $Array[0]['Phone'];
		$highestTotal = $Array[0]['Total'];

		disconnectToDB($conn);

		$obj = (object)[
			'quantityProduct' => $quantityProduct,
			'quantitySold' => $quantitySold,
			'quantityOrder' => $quantityOrder,
			'Total' => $Total,
			'CustomerName' => $CustomerName,
			'Phone' => $Phone,
			'highestTotal' => $highestTotal
		];
		return $obj;
	}
	function countProductsModel($status){
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$query='SELECT COUNT(Status) as statusQuantity FROM orders WHERE orders.Status='.$status.'';
		$Array = array();
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
				array_push($Array, $row);
			}
		}
		$statusQuantity = $Array[0]['statusQuantity'];
		disconnectToDB($conn);
		//return $statusQuantity;
		return $statusQuantity;
	}
?>