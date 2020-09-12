<?php
	$email='';
	$psw='';
	$repsw='';
	$action='';
	if(isset($_POST["email"])){
		$email=$_POST["email"];
	}
	if(isset($_POST["psw"])){
		$psw=$_POST["psw"];
	}
	if(isset($_POST["repsw"])){
		$repsw=$_POST["repsw"];
	}
	if(isset($_GET["action"])) {
		$action=$_GET["action"];
	}
	if($action=="register") {
		createAdmin($email, $psw, $repsw);
	}
	function createAdmin($email, $psw, $repsw) {
		if($psw != $repsw) {
			header("Location: http://localhost/onlineShop/onlineShop/View/login/registerPage.php?error=1");
		} else if(6 >= strlen($psw) || strlen($psw) > 10) {
			header("Location: http://localhost/onlineShop/onlineShop/View/login/registerPage.php?error=2");
		} else {
			include '../Model/adminModel.php';
			$result = registerUserModel($email, $psw);
			if($result) {
				header("Location: http://localhost/onlineShop/onlineShop/View/login/loginPage.php");
			}
		}
	}
?>
