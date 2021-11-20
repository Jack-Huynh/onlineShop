<?php
	$status='';
	$action='';
	if(isset($_POST["status"])){
		$status=$_POST["status"];
	}

	if(isset($_GET["action"])){
		$action=$_GET["action"];
	}
	function countProducts($status) {
		include '../Model/dashboardModel.php';
		$statusQuantity=countProductsModel($status);
		die(json_encode($statusQuantity));
	}
	if($action=="statistics"){
		countProducts($status);
	}
?>