<?php
	$action='';
	$adminID='';
	$email='';
	$password='';
	$id="";
	if(isset($_POST["emailID"])){
		$id=$_POST["emailID"];
	}
	if(isset($_GET["action"])){
		$action=$_GET["action"];
	}
	if(isset($_POST["adminID"])){
		$adminID=$_POST["adminID"];
	}
	if(isset($_POST["email"])){
		$email=$_POST["email"];
	}
	if(isset($_POST["password"])){
		$password=$_POST["password"];
	}
	if(isset($_GET["adminID"])){
		$adminID=$_GET["adminID"];
	}
	if($action=="loadPage"){
		loadAdminsData();
	} else if ($action=="changeStatus") {
		changeAdminStatus($adminID);
	} else if ($action=="sentMail") {
		sendWelcomeEmail($id);
	}

	function loadAdminsData() {
		include '../Model/adminModel.php';
		$userArray = array();
		$userArray = getAdmins();
		die(json_encode($userArray));
	}

	function changeAdminStatus($adminID) {
		include '../Model/adminModel.php';
		changeStatusModel($adminID);
		header("Location:http://localhost/onlineShop/onlineShop/View/login/loginPage.php");
	}

	function sendWelcomeEmail($id) {
		include '../Model/adminModel.php';
		include '../Helper/functionHelper.php';
		$userArray = array();
		$userArray = getAdminModel($id);
		$email = $userArray[0]['Email'];
		sendMail($email, $id);
	}
?>