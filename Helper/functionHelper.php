<?php
	function verifyLogin(){
		session_start();
		if(!isset($_SESSION["checkLogin"])||$_SESSION["checkLogin"]!=true){
			header("Location: http://localhost/onlineShop/onlineShop/View/login/loginPage.php");
		}
	}
?>
