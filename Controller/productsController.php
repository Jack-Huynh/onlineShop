<?php
	$productName='';
	$action='';
	$productID='';
	$supplierID='';
	$categoryID='';
	$price='';
	$image='';
	$fromPrice='';
	$toPrice='';
	$categoryName='';
	if(isset($_GET["action"])){
		$action=$_GET["action"];
	}
	if(isset($_GET["id"])){
		$productID=$_GET["id"];
	}
	if(isset($_POST["productID"])){
		$productID_=$_POST["productID"];
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
	if(isset($_POST["categoryName"])){
		$categoryName=$_POST["categoryName"];
	}
	if(isset($_POST["price"])){
		$price=$_POST["price"];
	}
	if(isset($_POST["image"])){
		$image=$_POST["image"];
	}
	if(isset($_POST["fromPrice"])){
		$fromPrice=$_POST["fromPrice"];
	}
	if(isset($_POST["toPrice"])){
		$toPrice=$_POST["toPrice"];
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
	function getProductsInfo($productID, $flagConn, $flagDisconn){
		include '../../Model/productsModel.php';
		$Array = array();
		$Array = getproductsInfoModel($productID, $flagConn, $flagDisconn);
		return $Array;
	}
	function updateProducts($productID_, $productName, $supplierID, $categoryID, $price, $image) {
		include '../Model/productsModel.php';
		updateProductsModel($productID_, $productName, $supplierID, $categoryID, $price, $image);
		header("Location: http://localhost/onlineShop/onlineShop/View/product/");
	}
	function deleteProducts($productID) {
		include '../Model/productsModel.php';
		deleteProductsModel($productID);
		header("Location: http://localhost/onlineShop/onlineShop/View/product/");
	}
	function searchProducts($productName, $categoryName, $fromPrice, $toPrice) {
		include '../Model/productsModel.php';
		$productsArray = array();
		$productsArray = searchProductsModel($productName, $categoryName, $fromPrice, $toPrice);
	die(json_encode($productsArray));
	}
	if ($action=="create") {
		createProducts($productName, $supplierID, $categoryID, $price, $image);
	} else if($action=="update") {
		updateProducts($productID_, $productName, $supplierID, $categoryID, $price, $image);
	} else if($action=="delete") {
		deleteProducts($productID);
	} else if($action=="search") {
		searchProducts($productName, $categoryName, $fromPrice, $toPrice);
	}
?>