<?php
	$productName='';
	$action='';
	$productID='';
	$supplierID='';
	$categoryID='';
	$price='';
	$image='';
	if(isset($_GET["action"])){
		$action=$_GET["action"];
	}
	if(isset($_GET["id"])){
		$productID=$_GET["id"];
	}
	if(isset($_POST["productID"])){
		$productID=$_POST["productID"];
	}
	if(isset($_POST["productName"])){
		$productName=$_POST["productName"];
	}
	if(isset($_POST["supplierID"])){
		$supplierID=$_POST["supplierID"];
	}
	if(isset($_POST["categoryID"])){
		$categoryID=$_POST["categoryID"];
	}
	if(isset($_POST["price"])){
		$price=$_POST["price"];
	}
	if(isset($_POST["image"])){
		$image=$_POST["image"];
	}
	function loadProductsData() {
		include '../../Model/productsModel.php';
		$productsArray = array();
		$productsArray = getProducts();
		return $productsArray;
	}
	function createProducts($productName, $supplierID, $categoryID, $price, $image) {
		include '../Model/productsModel.php';
		createProductsModel($productName, $supplierID, $categoryID, $price, $image);
		header("Location: http://localhost/onlineShop/onlineShop/View/product/");
	}
	function getProductsInfo($productID){
		include '../../Model/productsModel.php';
		$Array = array();
		$Array = getproductsInfoModel($productID);
		return $Array;
	}
	function updateProducts($productID, $productName, $description) {
		include '../Model/productsModel.php';
		updateProductsModel($productsID, $productsName, $description);
		header("Location: http://localhost/onlineShop/onlineShop/View/product/");
	}
	function deleteProducts($productID) {
		include '../Model/productsModel.php';
		deleteProductsModel($productsID);
		header("Location: http://localhost/onlineShop/onlineShop/View/product/");
	}
	if ($action=="create") {
		createProducts($productName, $supplierID, $categoryID, $price, $image);
	} else if($action=="update") {
		updateProducts($productsID, $productsName, $description);
	} else if($action=="delete") {
		deleteProducts($productsID);
	}
?>