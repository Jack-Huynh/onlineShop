<?php
	$email='';
	$psw='';
	$repsw='';
	$action='';
	$remember='';
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
	if(isset($_POST["remember"])){
		$remember=$_POST["remember"];
	}

	if($action=="register") {
		createAdmin($email, $psw, $repsw);
	} else if ($action=="login") {
		checkLogin($email, $psw, $remember);
	}
	//echo "hii";
	if($action=="logOut"){
		session_start();
		unset($_SESSION["checkLogin"]);
		unset($_SESSION["name"]);
		header("Location:http://localhost/onlineShop/onlineShop/View/login/loginPage.php");
	}

	function createAdmin($email, $psw, $repsw) {
		include '../Model/adminModel.php';
		if($psw != $repsw) {
			header("Location: http://localhost/onlineShop/onlineShop/View/login/registerPage.php?error=1");
		} else if (6 >= strlen($psw) || strlen($psw) > 10) {
			header("Location: http://localhost/onlineShop/onlineShop/View/login/registerPage.php?error=2");
		} else {
			$result = registerUserModel($email, $psw);
			if($result == 2) {
				header("Location: http://localhost/onlineShop/onlineShop/View/login/loginPage.php?login=success");
			} else if ($result == 3) {
				header("Location: http://localhost/onlineShop/onlineShop/View/login/registerPage.php?error=3");
			}
		}
	}

	function checkLogin ($email, $psw, $remember) {
		include '../Model/adminModel.php';
		if(checkAccountModel($email, $psw)){
			session_start();
			$_SESSION["checkLogin"]=true;
			$_SESSION["currentEmail"]=$email;
			if($remember) {
				setcookie('saveUser', $email, time() + 60*60*60, "/");
				setcookie('savePassword', $psw, time() + 60*60*60, "/");
			}
			header("Location: http://localhost/onlineShop/onlineShop/View/user/");
		}else{
			header("Location: http://localhost/onlineShop/onlineShop/View/login/loginPage.php?error=1");
		}
	}
?>
