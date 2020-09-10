<?php
	// get param
	$action='';
	$id='';
	$customerID='';
	$customerName='';
	$contactName='';
	$address='';
	$city='';
	$postCode='';
	$country='';
	$userName='';
	$password='';

	if(isset($_GET["action"])){
		$action=$_GET["action"];
	}
	if(isset($_GET["id"])){
		$id=$_GET["id"];
	}
	if(isset($_POST["CustomerID"])){
		$customerID=$_POST["CustomerID"];
	}
	if(isset($_POST["CustomerName"])){
		$customerName=$_POST["CustomerName"];
	}
	if(isset($_POST["ContactName"])){
		$contactName=$_POST["ContactName"];
	}
	if(isset($_POST["Address"])){
		$address=$_POST["Address"];
	}
	if(isset($_POST["City"])){
		$city=$_POST["City"];
	}
	if(isset($_POST["PostalCode"])){
		$postCode=$_POST["PostalCode"];
	}
	if(isset($_POST["Country"])){
		$country=$_POST["Country"];
	}
	if(isset($_POST["Username"])){
		$userName=$_POST["Username"];
	}
	if(isset($_POST["Password"])){
		$password=$_POST["Password"];
	}
	if ($action=="create") {
		createUser($customerID, $customerName, $address, $contactName, $city, $postCode, $country, $userName, $password);
	}
	else if($action=="update"){
		updateUser($customerID, $customerName, $address, $contactName, $city, $postCode, $country, $userName, $password);
	}
	else if($action=="delete"){
		deleteUser($id);
	}

	function loadUsersData() {
		include '../../Model/userModel.php';
		$userArray = array();
		$userArray = getUsers();
		return $userArray;
	} 	

	function createUser($customerID, $customerName, $address, $contactName, $city, $postCode, $country, $userName, $password) {
		include '../Model/userModel.php';
		createUserModel($customerID, $customerName, $address, $contactName, $city, $postCode, $country, $userName, $password);
		header("Location: http://localhost/onlineShop/onlineShop/View/user/");
	}

	function getUserInfo($customerID){
		include '../../Model/userModel.php';
		$userArray = array();
		$userArray = getUserInfoModel($customerID);
		return $userArray;
	}

	function updateUser($customerID, $customerName, $address, $contactName, $city, $postCode, $country, $userName, $password) {
		include '../Model/userModel.php';
		updateUserModel($customerID, $customerName, $address, $contactName, $city, $postCode, $country, $userName, $password);

		header("Location: http://localhost/onlineShop/onlineShop/View/user/");
	}

	function deleteUser($customerID) {
		include '../Model/userModel.php';
		deleteUserModel($customerID);
		header("Location: http://localhost/onlineShop/onlineShop/View/user/");
	}

?>
