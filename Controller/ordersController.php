<?php
	$customername='';
	$address='';
	$phone='';
	if(isset($_POST["customername"])){
		$customername=$_POST["customername"];
	}
	if(isset($_POST["address"])){
		$address=$_POST["address"];
	}
	if(isset($_POST["Phone"])){
		$phone=$_POST["Phone"];
	}
	if(isset($_GET["action"])){
		$action=$_GET["action"];
	}
	function createOrders($customername, $address, $phone, $total, $secCode) {
		include '../Model/ordersModel.php';
		$userID=0;
		if(isset($_SESSION["userID"])){
           $userID=$_SESSION["userID"];
        }
		createOrdersModel($userID, $customername, $address, $phone, $total, $secCode);
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
		
		//reset cart

		header("Location: http://localhost/onlineShop/onlineShop/View/PDP/orderSuccess.php");
	}


?>