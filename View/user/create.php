<!DOCTYPE html>
<html>
<head>
		<title>CREATE</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	  <script src="http://localhost/onlineShop/onlineShop/JavaScript/validateJavascript.js"></script>
	  <style type="text/css">
	  	.container{
	  		width: 400px;
	  	}
	  </style>
</head>
<body>
	<?php
		$user='';
		if(isset($_GET["user"])){
		    $user=$_GET["user"];
		}
	?>
	<h1 style="text-align: center">CREATE</h1>
	<div class="container">
		<form id="formLogin" action="../../Controller/userController.php?action=create&user=<?php echo $user?>" method="POST">
			<div class="form-group">
				<label for="textbox" style="text-align: left;">CustomerName: </label>
				<input type="text" name="CustomerName" class="form-control" id="CustomerName">
			</div>
			<div class="form-group">
				<label for="textbox" style="text-align: left;">Address: </label>
				<input type="text" name="Address" class="form-control" id="Address">
			</div>
			<div class="form-group">
				<label for="textbox" style="text-align: left;">ContactName: </label>
				<input type="text" name="ContactName" class="form-control" id="ContactName">
			</div>
			<div class="form-group">
				<label for="textbox" style="text-align: left;">City: </label>
				<input type="text" name="City" class="form-control" id="City">
			</div>
			<div class="form-group">
				<label for="textbox" style="text-align: left;">Postcode: </label>
				<input type="text" name="PostalCode" class="form-control" id="Postalcode">
				<div class="errMess" style="color: red"></div>
			</div>
			<div class="form-group">
				<label for="textbox" style="text-align: left;">Country: </label>
				<input type="text" name="Country" class="form-control" id="Country">
				<div class="errMess" style="color: red"></div>
			</div>
			<div class="form-group">
				<label for="textbox" style="text-align: left;">Phone: </label>
				<input type="text" name="Phone" class="form-control phoneValidate">
				<div class="errMess" style="color: red"></div>
			</div>
			<div class="form-group">
				<label for="textbox" style="text-align: left;">Username: </label>
				<input type="text" name="Username" class="form-control" id="Username">
			</div>
			<div class="form-group">
				<label for="pwd" style="text-align: left;">Password: </label>
				<input type="password" name="Password" id="psw" class="form-control pwdValidate" required>
      			<div class="errMess" style="color: red"></div>
			</div>
			<?php
				$link=($user=="customer")?"PLP":"user";
				echo'<button type="button" class="btn btn-primary btn-save2" >
					<h5>
						SAVE
					</h5>
				</button>
				<a href="http://localhost/onlineShop/onlineShop/View/'."$link".'"><button type="button" class="btn btn-danger">
					<h5>
						CANCEL
					</h5>
				</button></a>';
				
			?>
		</form>
		<?php
		$error='';
      if(isset($_GET["error"])){
        $error=$_GET["error"];	
      }
      if($error==2) {
        echo '<div class="alert alert-danger"><strong>Password more than 6 chars and less than 10 chars</strong></div>';
      }
      if($error==3) {
        echo '<div class="alert alert-danger"><strong>Password has exist!</strong></div>';
      }
	?>
	</div>
</body>
</html>
