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
	$user='';
	$addressName='';
	$addresses='';
	$phone='';

	if(isset($_GET["action"])){
		$action=$_GET["action"];
	}
	if(isset($_GET["user"])){
		$user = $_GET["user"];
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
	if(isset($_POST["addressName"])){
		$addressName=$_POST["addressName"];
	}
	if(isset($_POST["addresses"])){
		$addresses=$_POST["addresses"];
	}
	if(isset($_POST["Phone"])){
		$phone=$_POST["phone"];
	}
	if(isset($_POST["index"])){
		$index=$_POST["index"];
	}
	if ($action=="create") {
		$addresses=defaultAddresses($address, $phone);

		createCustomer($user, $customerID, $customerName, $contactName, $address, $addresses, $city, $postCode, $country, $phone, $userName, $password);
		//defaultAddresses($address, $phone);
	}
	else if($action=="update"){
		updateUser($user, $customerID, $customerName, $address, $contactName, $city, $postCode, $country, $phone, $userName, $password);
	}
	else if($action=="delete"){
		deleteUser($id);
	}
	else if($action=="login"){
		checkCustomerLogin ($userName, $password);
	}
	else if($action=="logout"){
		session_start();
		unset($_SESSION["checkCustomerLogin"]);
		unset($_SESSION["currentUser"]);
		unset($_SESSION["userID"]);
		header("Location:http://localhost/onlineShop/onlineShop/View/customerAccount/loginPage.php");
	}
	else if($action=="getAddresses"){
		//defaultAddresses();
		getAddresses();
	}
	else if($action=="addAddresses"){
		addAddresses($addressName, $addresses, $phone);
	}
	else if($action=="deleteAddresses"){
		deleteAddresses($index);
	}
	else if($action=="changeDefaultAddresses"){
		changeDefaultAddresses($index);
	}
	function loadUsersData() {
		include '../../Model/userModel.php';
		$userArray = array();
		$userArray = getUsers();
		return $userArray;
	} 	

	function createUser($user, $customerID, $customerName, $contactName, $address,$addresses, $city, $postCode, $country, $phone, $userName, $password) {
		include '../Model/userModel.php';
		createUserModel($customerID, $customerName, $contactName, $address, $addresses, $city, $postCode, $country, $phone, $userName, $password);
			header("Location: http://localhost/onlineShop/onlineShop/View/user/");
	}

	function getUserInfo($customerID){
		include '../../Model/userModel.php';
		$userArray = array();
		$userArray = getUserInfoModel($customerID);
		return $userArray;
	}

	function updateUser($user, $customerID, $customerName, $address, $contactName, $city, $postCode, $country, $phone, $userName, $password) {
		include '../Model/userModel.php';
		updateUserModel($customerID, $customerName, $address, $contactName, $city, $postCode, $country, $phone, $userName, $password);
		if($user=="customer"){
			header("Location: http://localhost/onlineShop/onlineShop/View/customerAccount/customerinfo.php");
		}else{
			header("Location: http://localhost/onlineShop/onlineShop/View/user/");
		}
	}

	function deleteUser($customerID) {
		include '../Model/userModel.php';
		deleteUserModel($customerID);
		header("Location: http://localhost/onlineShop/onlineShop/View/user/");
	}
	function checkCustomerLogin ($userName, $password) {
		include '../Model/userModel.php';
		if(checkAccountModel($userName, $password)){
			$userArray=array();
			$userArray=checkAccountModel($userName, $password);
			session_start();
			$_SESSION["checkCustomerLogin"]=true;
			$_SESSION["currentUser"]=$userName;
			$_SESSION["userID"]=$userArray[0]['CustomerID'];
			if($remember) {
				//setcookie('saveUser', $email, time() + 60*60*60, "/");
				//setcookie('savePassword', $psw, time() + 60*60*60, "/");
			}
			header("Location: http://localhost/onlineShop/onlineShop/View/PLP/");
		}
		else{
			header("Location: http://localhost/onlineShop/onlineShop/View/customerAccount/loginPage.php?error=1");
		}
	}
	function createCustomer($user, $customerID, $customerName, $contactName, $address,$addresses, $city, $postCode, $country, $phone, $userName, $password) {
		include '../Model/userModel.php';
		if (6 >= strlen($password) || strlen($password) > 10) {
			header("Location: http://localhost/onlineShop/onlineShop/View/user/create.php?error=2&user=$user");
		} else {
			$result =createCustomerModel($customerID, $customerName, $contactName, $address,$addresses, $city, $postCode, $country, $phone, $userName, $password);
			if($result == 2 && $user=="customer") {
				header("Location: http://localhost/onlineShop/onlineShop/View/customerAccount/loginPage.php");
			}
			else if($result==2){
				header("Location: http://localhost/onlineShop/onlineShop/View/user/");
			}
			else if ($result == 3) {
				header("Location: http://localhost/onlineShop/onlineShop/View/user/create.php?error=3&user=$user");
			}
		}
	}
    function defaultAddresses($address, $phone){
    	$addressName="Default";
    	$addressObj = (object)[];
    	$addressObj->AddressName = $addressName;
    	$addressObj->Addresses = $address;
    	$addressObj->Phone = $phone;
    	$addressObj->isDefault = true;
    	//step_2
    	$addressArray=array();
    	array_push($addressArray, $addressObj);
    	return $addressJson=json_encode($addressArray);
    	//addAddressesModel($addressJson, $userID);
    }
    function getAddresses(){
    	session_start();
		$userID='';
		if(isset($_SESSION["userID"])){
       		$userID=$_SESSION["userID"];
    	}
    	include '../Model/userModel.php';
    	$myArray=array();
    	$myArray=getUserInfoModel($userID);
    	echo $myArray[0]['Addresses'];
    }

     function addAddresses($addressName, $addresses, $phone){
    	//step_1
    	$addressObj = (object)[];
    	$addressObj->AddressName = $addressName;
    	$addressObj->Addresses = $addresses;
    	$addressObj->Phone = $phone;
    	//step_2
    	session_start();
		$userID='';
		if(isset($_SESSION["userID"])){
       		$userID=$_SESSION["userID"];
    	}
    	include '../Model/userModel.php';
    	$myArray=array();
    	$myArray=getUserInfoModel($userID);
    	$addressJson=$myArray[0]['Addresses'];
    	$addressArray=json_decode($addressJson);
    	array_push($addressArray, $addressObj);
    	$addressJson_=json_encode($addressArray);
    	addAddressesModel($addressJson_, $userID);
    	echo $addressJson_;
    }

    function deleteAddresses($index){
    	session_start();
		$userID='';
		if(isset($_SESSION["userID"])){
       		$userID=$_SESSION["userID"];
    	}
    	include '../Model/userModel.php';
    	$myArray=array();
    	$myArray=getUserInfoModel($userID);
    	$addressJson=$myArray[0]['Addresses'];
    	$addressArray=json_decode($addressJson);
    	unset($addressArray[$index]);
    	$testArray=array_values($addressArray);
    	$addressJson_=json_encode($testArray);
    	addAddressesModel($addressJson_, $userID);
    	echo $addressJson_;
    }

   function changeDefaultAddresses($index){
   		session_start();
		$userID='';
		if(isset($_SESSION["userID"])){
       		$userID=$_SESSION["userID"];
    	}
    	include '../Model/userModel.php';
    	$myArray=array();
    	$myArray=getUserInfoModel($userID);
    	$addressJson=$myArray[0]['Addresses'];
    	$addressArray=json_decode($addressJson);
    	for($i=0; $i<count($addressArray); $i++){
    		if($i==$index){
    			$addressArray[$i]->isDefault=true;
    			$Addresses=$addressArray[$i]->Addresses;
    			$Phone=$addressArray[$i]->Phone;
    			updateAddressDefaultModel($userID, $Addresses, $Phone);
    		}else{
    			$addressArray[$i]->isDefault=false;
    		}
    	}
    	$addressJson_=json_encode($addressArray);
    	addAddressesModel($addressJson_, $userID);
    	echo $addressJson_;
   }
?>
