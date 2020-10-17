<?php
	function verifyLogin(){
		session_start();
		if(!isset($_SESSION["checkLogin"])||$_SESSION["checkLogin"]!=true){
			header("Location: http://localhost/onlineShop/onlineShop/View/login/loginPage.php");
		}
	}
	function sendMail($email, $id){
	    $subject = "Active your email";
	    $message = "<a href='http://localhost/onlineShop/onlineShop/Controller/adminController.php?action=changeStatus&adminID=".$id."'>Click</a>";
	    $header  = "From:onlineShop.com.vn \r\n";
	    $header .= "MIME-Version: 1.0\r\n";             
        $header .= "Content-type: text/html\r\n";
	    $success = mail ($email,$subject,$message,$header);

	    if( $success == true )
	    {
	        echo "Đã gửi mail thành công...";
	    }
	    else
	    {
	        echo "Không gửi đi được...";
	    }
	}
?>
