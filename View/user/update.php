<!DOCTYPE html>
<html>
<head>
		<title>UPDATE</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	  <script src=""></script>
	  <style type="text/css">
	  	.container{
	  		width: 400px;
	  	}
	  </style>
</head>
<body>
	<?php 
        include '../../Controller/userController.php';
        if(isset($_GET["id"])){
			$CustomerID=$_GET["id"];
		}
        $userArray = getUserInfo($CustomerID);
        echo "hhhhhhhhhhhhhhhhhhh";
        echo "<pre>";
   		print_r($userArray);
   		echo "</pre>";
     ?>
	<h1 style="text-align: center">UPDATE</h1>
	<div class="container">
		<form id="formLogin" action="../../Controller/userController.php?action=update" method="POST">
			<div class="form-group">
				
				<input type="hidden" name="CustomerID" class="form-control" id="CustomerName" value="<?php echo $userArray[0]['CustomerID'] ?>">
			</div>
			<div class="form-group">
				<label for="textbox" style="text-align: left;">CustomerName: </label>
				<input type="text" name="CustomerName" class="form-control" id="CustomerName" value="<?php echo $userArray[0]['CustomerName'] ?>">
			</div>
			<div class="form-group">
				<label for="textbox" style="text-align: left;">Address: </label>
				<input type="text" name="Address" class="form-control" id="Address" value="<?php echo $userArray[0]['Address'] ?>">
			</div>
			<div class="form-group">
				<label for="textbox" style="text-align: left;">ContactName: </label>
				<input type="text" name="ContactName" class="form-control" id="ContactName" value="<?php echo $userArray[0]['ContactName'] ?>">
			</div>
			<div class="form-group">
				<label for="textbox" style="text-align: left;">City: </label>
				<input type="text" name="City" class="form-control" id="City" value="<?php echo $userArray[0]['City'] ?>">
			</div>
			<div class="form-group">
				<label for="textbox" style="text-align: left;">Postcode: </label>
				<input type="text" name="PostalCode" class="form-control" id="Postalcode" value="<?php echo $userArray[0]['PostalCode'] ?>">
			</div>
			<div class="form-group">
				<label for="textbox" style="text-align: left;">Country: </label>
				<input type="text" name="Country" class="form-control" id="Country" value="<?php echo $userArray[0]['Country'] ?>">
			</div>
			<div class="form-group">
				<label for="textbox" style="text-align: left;">Phone: </label>
				<input type="text" name="Phone" class="form-control" id="Country" value="<?php echo $userArray[0]['Country'] ?>">
			</div>
			<div class="form-group">
				<label for="textbox" style="text-align: left;">Username: </label>
				<input type="text" name="Username" class="form-control" id="Username" value="<?php echo $userArray[0]['Username'] ?>">
			</div>
			<div class="form-group">
				<label for="pwd" style="text-align: left;">Password: </label>
				<input type="textbox" name="Password" class="form-control" id="pwd" value="<?php echo $userArray[0]['Password'] ?>">
			</div>
			<button type="submit" class="btn btn-primary btn-save">
				<h5>
					SAVE
				</h5>
			</button>
			<a href="http://localhost/onlineShop/onlineShop/View/user/"><button type="button" class="btn btn-danger">
				<h5>
					CANCEL
				</h5>
			</button></a>
		</form>
	</div>
	<?php
			echo "hhhhhhh";
	?>
</body>
</html>