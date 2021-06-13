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
	</style>
	<body>
		<div class="row" style="text-align: center;">
			<h1>Cart Page</h1>
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
					   <th>Action</th>
					</tr>

				</thead>
				<tbody>
			
	  	<?php
	  		session_start();
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
			  		echo '<td><input type="number" class="quantity" data-id="'.$_SESSION["cart"][$i]['ProductID'].'" value="'.$_SESSION["cart"][$i]['Quantity'].'"></td>';
			  		echo '<td>'.$_SESSION["cart"][$i]['Price'].'</td>';
			  		echo '<td class="sum-'.$_SESSION["cart"][$i]['ProductID'].'">'.$_SESSION["cart"][$i]['Sum'].'</td>';
			  		echo '<td>'.'<a href="http://localhost/onlineShop/onlineShop/Controller/cartController.php?id='.$_SESSION["cart"][$i]["ProductID"].'&action=delete"><button class="btn btn-danger">DELETE</button></a>'.'</td>';
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
	  				<td class="total">Total :<?php echo $total?> </td>
	  				<td><a href="http://localhost/onlineShop/onlineShop/View/checkout/"><button class="btn btn-info but">Place order</button></a></td>
	  			</tr>
				</tbody>
	    	</table>
		</div>
	</body>
</html>
