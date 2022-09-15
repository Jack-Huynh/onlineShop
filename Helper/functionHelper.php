<?php
	function verifyLogin(){
		session_start();
		if(!isset($_SESSION["checkLogin"])||$_SESSION["checkLogin"]!=true){
			header("Location: http://localhost/onlineShop/onlineShop/View/login/loginPage.php");
		}
	}
	function sendMail($email, $id, $secCode){
	    $subject = "Active your email";
	    $message = "<a href='http://localhost/onlineShop/onlineShop/Controller/adminController.php?action=changeStatus&adminID=".$id."&secCode=".$secCode."'>Click</a>";
	    $header  = "From:onlineShop.com.vn \r\n";
	    $header .= "MIME-Version: 1.0\r\n";             
        $header .= "Content-type: text/html\r\n";
	    $success = mail ($email,$subject,$message,$header);

	    if( $success == true )
	    {
	        echo "Sent mail successfully...";
	    }
	    else
	    {
	        echo "Can not send...";
	    }
	}
	function sendMailForgotPassword($email, $id){
	    $subject = "Active your email";
	    $message = "<a href='http://localhost/onlineShop/onlineShop/View/login/resetPassword.php?adminID=".$id."&secCode=".$secCode."'>ResetPassword</a>";
	    $header  = "From:onlineShop.com.vn \r\n";
	    $header .= "MIME-Version: 1.0\r\n";             
        $header .= "Content-type: text/html\r\n";
	    $success = mail ($email,$subject,$message,$header);

	    if( $success == true )
	    {
	        return 1;
	    }
	    else
	    {
	        return 0;
	    }
	}
?>
