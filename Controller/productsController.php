<?php
	$productsName='';
	$description='';
	$action='';
	$productsID='';
	if(isset($_GET["action"])){
		$action=$_GET["action"];
	}
	if(isset($_GET["id"])){
		$productsID=$_GET["id"];
	}
	if(isset($_POST["productsID"])){
		$productsID=$_POST["productsID"];
	}
	if(isset($_POST["productsName"])){
		$productsName=$_POST["productsName"];
	}
	if(isset($_POST["description"])){
		$description=$_POST["description"];
	}
	function loadProductsData() {
		include '../../Model/productsModel.php';
		$productsArray = array();
		$productsArray = getProducts();
		return $productsArray;
	}
	function createProducts($productsName, $description) {
		include '../Model/productsModel.php';
		createProductsModel($productsName, $description);
		header("Location: http://localhost/onlineShop/onlineShop/View/products/");
	}
	function getProductsInfo($productsID){
		include '../../Model/productsModel.php';
		$Array = array();
		$Array = getproductsInfoModel($productsID);
		return $Array;
	}
	function updateProducts($productsID, $productsName, $description) {
		include '../Model/productsModel.php';
		updateProductsModel($productsID, $productsName, $description);
		header("Location: http://localhost/onlineShop/onlineShop/View/products/");
	}
	function deleteProducts($productsID) {
		include '../Model/productsModel.php';
		deleteProductsModel($productsID);
		header("Location: http://localhost/onlineShop/onlineShop/View/products/");
	}
	if ($action=="create") {
		createProducts($productsName, $description);
	} else if($action=="update") {
		updateProducts($productsID, $productsName, $description);
	} else if($action=="delete") {
		deleteProducts($productsID);
	}
?>