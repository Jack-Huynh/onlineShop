<?php
	$action='';
	$adminID='';
	$email='';
	$password='';
	$newPassword='';
	$reNewPassword='';
	$id="";
	$secCode=0;
	if(isset($_POST["emailID"])){
		$id=$_POST["emailID"];
	}
	if(isset($_GET["action"])){
		$action=$_GET["action"];
	}
	if(isset($_GET["secCode"])){
		$secCode=$_GET["secCode"];
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
	if(isset($_POST["newPassword"])){
		$newPassword=$_POST["newPassword"];
	}
	if(isset($_POST["reNewPassword"])){
		$reNewPassword=$_POST["reNewPassword"];
	}
	if($newPassword!=$reNewPassword){
		header("Location: http://localhost/onlineShop/onlineShop/View/login/resetPassword.php?adminID=20&error=unmatch");
	}
	if($action=="loadPage"){
		loadAdminsData();
	} else if ($action=="changeStatus") {
		changeAdminStatus($adminID, $secCode);
	} else if ($action=="sentMail") {
		sendWelcomeEmail($id);
	} else if ($action=="resetPassword") {
		sendResetPasswordEmail($email);
	}else if ($action=="changeNewPassword") {
		resetPassword($adminID, $newPassword);
	}

	function loadAdminsData() {
		include '../Model/adminModel.php';
		$userArray = array();
		$userArray = getAdmins();
		die(json_encode($userArray));
	}

	function changeAdminStatus($adminID, $secCode) {
		include '../Model/adminModel.php';
		changeStatusModel($adminID, $secCode);
		header("Location:http://localhost/onlineShop/onlineShop/View/login/loginPage.php");
	}

	function sendWelcomeEmail($id) {
		include '../Model/adminModel.php';
		include '../Helper/functionHelper.php';
		$userArray = array();
		$userArray = getAdminModel($id);
		$email = $userArray[0]['Email'];
		$secCode = $userArray[0]['secCode'];
		sendMail($email, $id, $secCode);
	}

	function sendResetPasswordEmail($email) {
		include '../Model/adminModel.php';
		include '../Helper/functionHelper.php';
		$userArray = array();
		$userArray = getAdminModelByEmail($email);
		$id = $userArray[0]['ID'];
		$check = sendMailForgotPassword($email, $id);
		if($check==1){
			header("Location:http://localhost/onlineShop/onlineShop/View/login/loginPage.php");
		}
	}
	function resetPassword($adminID, $newPassword){
		include '../Model/adminModel.php';
		resetPasswordModel($adminID, $newPassword);
		header("Location: http://localhost/onlineShop/onlineShop/View/login/loginPage.php");
	}
?>