<?php
	$customername='';
	$address='eee';
	$phone='';
	if(isset($_POST["customername"])){
		$customername=$_POST["customername"];
	}
	if(isset($_POST["address"])){
		$address=$_POST["address"];
	}
	if(isset($_POST["phone"])){
		$phone=$_POST["phone"];
	}
	if(isset($_GET["action"])){
		$action=$_GET["action"];
	}
	function createOrders($customername, $address, $phone, $total, $secCode) {
		include '../Model/ordersModel.php';
		createOrdersModel($customername, $address, $phone, $total, $secCode);
		header("Location: http://localhost/onlineShop/onlineShop/View/checkout/");
	}
	if($action=="sendInfo") {
		session_start();
		$n = count($_SESSION["cart"]);
		$total=0;
		$sum=0;
		for ($i=0; $i <$n ; $i++) {
			$sum=$_SESSION["cart"][$i]['Sum'];
			$total+=intVal($_SESSION["cart"][$i]['Sum']);
		}
		$secCode=mt_rand(100000,999999);
		createOrders($customername, $address, $phone, $total, $secCode);
		$ordersArray=array();
		$ordersArray = getOrderIdModel($secCode);
		$orderID = $ordersArray[0]["OrderID"];
		for ($i=0; $i <$n ; $i++) {
			$productID=$_SESSION["cart"][$i]['ProductID'];
			$quantity=$_SESSION["cart"][$i]['Quantity'];
			$sum=$_SESSION["cart"][$i]['Sum'];
			createOrderDetailsModel($orderID, $productID, $quantity, $sum);
		}
		
	}


?>