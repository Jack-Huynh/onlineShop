<?php
	$orderID='';
	$customerID='';
	$orderdate='';
	$total='';
	$status='';
	$seccode='';
	$orderstatusID='';
	$statusname='';
	$description='';
	$customername='';
	$address='';
	$phone='';
	$action='';
	if(isset($_GET["action"])){
		$action=$_GET["action"];
	}
	if(isset($_GET["id"])){
		$orderID=$_GET["id"];
	}
	if(isset($_POST["orderStatusID"])){
		$orderStatusID=$_POST["orderStatusID"];
	}
	if(isset($_POST["orderID"])){
		$orderID=$_POST["orderID"];
	}
	function getOrderInfo() {
		include '../../Model/ordersModel.php';
		$orderInfoArray=array();
		$orderInfoArray=getOrderInfoModel();
		return $orderInfoArray;
		//header("Location: http://localhost/onlineShop/onlineShop/View/checkout/");
	}

	function getOrderDetailsInfo($orderID){
		include '../../Model/ordersModel.php';
		$orderDetailsInfoArray=array();
		$orderDetailsInfoArray=getOrderDetailsInfoModel($orderID);
		return $orderDetailsInfoArray;
	}

	function getOrderStatusInfo(){
		include '../../Model/orderStatusModel.php';
		$orderStatusArray=array();
		$orderStatusArray=getOrderStatusInfoModel();
		return $orderStatusArray;
	}
	function updateOrderStatus($orderStatusID, $orderID) {
		include '../Model/orderStatusModel.php';
		updateOrderStatusModel($orderStatusID, $orderID);
		header("Location: http://localhost/onlineShop/onlineShop/View/transactions/");
	}
	if ($action=="update") {
		updateOrderStatus($orderStatusID, $orderID);
	}
?>