<?php
	$categoriesName='';
	$description='';
	$action='';
	$categoriesID='';
	$parentID='';
	if(isset($_GET["action"])){
		$action=$_GET["action"];
	}
	if(isset($_GET["id"])){
		$categoriesID=$_GET["id"];
	}
	if(isset($_POST["categoriesID"])){
		$categoriesID=$_POST["categoriesID"];
	}
	if(isset($_POST["parentID"])){
		$parentID=$_POST["parentID"];
	}
	if(isset($_POST["categoriesName"])){
		$categoriesName=$_POST["categoriesName"];
	}
	if(isset($_POST["description"])){
		$description=$_POST["description"];
	}
	function loadCategoriesData($flagConn, $flagDisconn) {
		include '../../Model/categoriesModel.php';
		$categoriesArray = array();
		$categoriesArray = getCategories($flagConn, $flagDisconn);
		return $categoriesArray;
	}
	function createCategories($categoriesName, $description, $parentID) {
		include '../Model/categoriesModel.php';
		createCategoriesModel($categoriesName, $description, $parentID);
		header("Location: http://localhost/onlineShop/onlineShop/View/categories/");
	}
	function getCategoriesInfo($categoriesID, $flagConn, $flagDisconn) {
		include '../../Model/categoriesModel.php';
		$Array = array();
		$Array = getCategoriesInfoModel($categoriesID, $flagConn, $flagDisconn);
		return $Array;
	}
	function updateCategories($categoriesID, $categoriesName, $description, $parentID) {
		include '../Model/categoriesModel.php';
		updateCategoriesModel($categoriesID, $categoriesName, $description, $parentID);
		header("Location: http://localhost/onlineShop/onlineShop/View/categories/");
	}
	function deleteCategories($categoriesID) {
		include '../Model/categoriesModel.php';
		deleteCategoriesModel($categoriesID);
		header("Location: http://localhost/onlineShop/onlineShop/View/categories/");
	}
	if ($action=="create") {
		createCategories($categoriesName, $description, $parentID);
	} else if($action=="update") {
		updateCategories($categoriesID, $categoriesName, $description, $parentID);
	} else if($action=="delete") {
		deleteCategories($categoriesID);
	}
?>