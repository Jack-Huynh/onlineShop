<!DOCTYPE html>
<html>
	<head>
		  <title></title>
		  <meta charset="utf-8">
	    	<meta name="viewport" content="width=device-width, initial-scale=1">
	    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="http://localhost/onlineShop/onlineShop/JavaScript/PLPjavascript.js"></script>
			<script src="http://localhost/onlineShop/onlineShop/JavaScript/cartJavascript.js"></script>
	</head>
	<style type="text/css">
		.img{
			height: 50px; 
			width: 50px;
		}
		.total{
			font-size: 20px;
		}
		.but{
			font-size: 20px;
		}
		.form{
			width: 250px;
    		margin: 0 auto;
    		font-size: 17px;
		}
		span.psw {
		  float: right;
		  padding-top: 16px;
		}
		.order{
			margin-left: 46px;
    		font-size: 20px;
   			 margin-bottom: 40px;
		}
	</style>

	<!-- verify cart -->
	<body>
		<div class="row" style="text-align: center;">
			<h1>Order Summary</h1>
		</div>
		<div class="row">
			<table class="table" style="width: 90%; margin: 0px auto">
				<thead>
					<tr>
						<th>Image</th>
						<th>ID</th>
					   <th>Product Name</th>
					   <th>Quantity</th>
					   <th>Price</th>
					   <th>Sum</th>
					</tr>

				</thead>
				<tbody>
			
	  	<?php
	  		session_start();
	  		$userID = 0;
            if(isset($_SESSION["userID"])){
              $userID=$_SESSION["userID"];
            }
            include '../../Controller/userController.php';
            $orderInfoArray = getUserInfo($userID);

	  		if(!isset($_SESSION["cart"]) || count($_SESSION["cart"]) == 0){
	  			echo "<h1>Cart is empty<h1>";
	  		}
	  		else{
	  			$n=count($_SESSION["cart"]);
	  			$total=0;
	  			$sum;
		 		for ($i=0; $i<$n ; $i++) {
		 			echo '<tr>';
			  		echo '<td ><img style="height: 150px; width: 150px;" src="http://localhost/onlineShop/onlineShop/Image/products/'.$_SESSION["cart"][$i]['Image'].'"></td>';
			  		echo '<td>'.$_SESSION["cart"][$i]['ProductID'].'</td>';
			  		echo '<td>'.$_SESSION["cart"][$i]['ProductName'].'</td>';
			  		echo '<td>'.$_SESSION["cart"][$i]['Quantity'].'</td>';
			  		echo '<td>'.$_SESSION["cart"][$i]['Price'].'</td>';
			  		echo '<td class="sum-'.$_SESSION["cart"][$i]['ProductID'].'">'.$_SESSION["cart"][$i]['Sum'].'</td>';
			  		echo '</tr>';
			  		$sum = $_SESSION["cart"][$i]['Sum'];
			  		$total+=intVal($sum);
			  	}
	  		}
	  	?>
	  			<tr>
	  				<td></td>
	  				<td></td>
	  				<td></td>
	  				<td></td>
	  				<td></td>
	  				<td class="total">
	  					Total :<?php echo $total?>
	  					<br/>
	  					<a href="http://localhost/onlineShop/onlineShop/View/PDP/cart.php"><button class="btn btn-warning but">Back to Cart page</button></a> 
	  				</td>
	  				
	  			</tr>
				</tbody>
	    	</table>
		</div>
		<hr/>
		<div class="row" style="text-align: center;">
			<h1 style="margin-left: 46px">Shipping Address</h1>
			<div class="form">
				<form action="../../Controller/ordersController.php?action=sendInfo" method="post">
				  <span class="form-group psw">
				    <label>CustomerName:</label>
				    <input type="" class="form-control" name ="customername" value="<?php echo ($userID) ? $orderInfoArray[0]['CustomerName'] : ''?>">
				  </span>
				  <br>
				  <span class="form-group psw">
				    <label>Address:</label>
				    <input type="" class="form-control" name="address" value="<?php echo ($userID) ? $orderInfoArray[0]['Address'] : ''?>">
				  </span>
				  <br>
				  <span class="form-group psw">
				    <label>Phone:</label>
				    <input type="" class="form-control" name="Phone" value="<?php echo ($userID) ? $orderInfoArray[0]['Phone'] : ''?>"> 
				  </span>
				  <button type="submit" class="btn btn-success order">Send infomation</button>
				</form>
			</div>
			
		</div>

	</body>
</html>