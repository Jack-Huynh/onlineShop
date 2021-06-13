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
	      <script src="http://localhost/onlineShop/onlineShop/JavaScript/search.js"></script>
		<style type="text/css">
		  	.container{
		  		border: solid;
		  		width : 100%;
		  		padding:0px;
		  	}
		  	.detail{
		  		border: solid;
		  		align-content: center;
		  	}
		  	.product{
		  		text-align: center;
  			}
		  	.product img {
		  		height: 300px;
		  		width: 300px;
		  	}
		  	.header h1{
		  		margin-left: 500px;
		  		margin-bottom: 50px;
		  	}
		    .detail{
		    	font-size: 35px;
		    }
		</style>
	<body>
		<?php
			$productID="";
			if(isset($_GET["id"])){
				$productID= $_GET["id"];
			}
			include '../../Controller/productsController.php';
			$productsArray=getProductsInfo($productID, true, true);
		?>
		<div class="container col-sm-12">
			<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <a class="navbar-brand" href="#">WebSiteName</a>
			    </div>
			    <ul class="nav navbar-nav">
			      <li class="active"><a href="#">Home</a></li>
			      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories <span class="caret"></span></a>
			        <ul class="dropdown-menu">
			        </ul>
			      </li>
			      <li><a href="#">Page 2</a></li>
			      <li><a href="#">Page 3</a></li>
			    </ul>
			  </div>
			</nav>
			<div class="row">
				<div class="col-sm-3 detail">
					
				</div>
				<div class="col-sm-9 detail">
					<div class="row header">
						<h1>PRODUCTS</h1>
						<div class="col-sm-6">
							<?php
								echo '<img src="http://localhost/onlineShop/onlineShop/Image/products/'.$productsArray[0]['Image'].'" style="width: 500px; border: solid">';
							?>
						</div>
						<div class="col-sm-6">
							<strong> <?php echo $productsArray[0]['ProductName']; ?></strong>
							<h2> Price: <?php echo $productsArray[0]['Price']; ?>$</h2>
						</div>
						<a href='http://localhost/onlineShop/onlineShop/Controller/cartController.php?id=<?php echo $productsArray[0]['ProductID']; ?>&action=addToCart'><button style="width: 200px; height: 50px; font-size: 20px;" class="btn btn-info">ADD TO CART</button></a>
					</div>
					<div class="PLP">
						
					</div>
				</div>
			</div>
		</div>
		<div class=" col-sm-12 row footer" style="border: solid; height:50px; width: 100%">
				
		</div>
	</body>
</html>