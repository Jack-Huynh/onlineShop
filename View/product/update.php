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
	  <script src=""></script>
	  <style type="text/css">
	  	.container{
	  		width: 400px;
	  	}
	  </style>
</head>
<body>
	<h1 style="text-align: center">CREATE</h1>
	<div class="container">
		<?php
			if(isset($_GET["id"])){
				$productID=$_GET["id"];
			}
			include '../../Controller/productsController.php';
			$productsArray = array();
			$productsArray=getProductsInfo($productID, true, false); 
		?>
		<form id="formLogin" action="../../Controller/productsController.php?action=update" method="POST">
			<div class="form-group">
				<input type="hidden" name="productID" class="form-control" value="<?php echo $productsArray[0]['ProductID']?>">
			</div>
			<div class="form-group">
				<label for="textbox" style="text-align: left;">ProductName: </label>
				<input type="text" name="productName" class="form-control" value="<?php echo $productsArray[0]['ProductName']?>">
			</div>
			<div class="form-group">
				<label for="textbox" style="text-align: left;">SupplierID: </label>
				<input type="text" name="supplierID" class="form-control" value="<?php echo $productsArray[0]['SupplierID']?>">
			</div>
			<div class="form-group">
				<label for="textbox" style="text-align: left;">CategoryID: </label>
				<select class="form-control" name="categoryID">
					<?php
						include '../../Controller/categoriesController.php';
						$categoriesArray = array();
						$categoriesArray=loadCategoriesData(false, true);

						for ($i=0; $i < count($categoriesArray); $i++) {
						    $selected = ($categoriesArray[$i]['CategoryID'] == $productsArray[0]['CategoryID']) ? 'selected' : '';
		                    echo '<option '.$selected.' value="'.$categoriesArray[$i]['CategoryID'].'">';
		                    echo $categoriesArray[$i]['CategoryName'];
		                    echo '</option>';
                		}
					?>
					
				</select>
			</div>
			<div class="form-group">
				<label for="textbox" style="text-align: left;">Price: </label>
				<input type="text" name="price" class="form-control" value="<?php echo $productsArray[0]['Price']?>">
			</div>
			<div class="form-group">
				<label for="textbox" style="text-align: left;">Image: </label>
				<input type="file" name="image" class="form-control" value="<?php echo $productsArray[0]['Image']?>">
			</div>
			<button type="submit" class="btn btn-primary btn-save">
				<h5>
					SAVE
				</h5>
			</button>
			<a href="http://localhost/onlineShop/onlineShop/View/products/"><button type="button" class="btn btn-danger">
				<h5>
					CANCEL
				</h5>
			</button></a>
		</form>
	</div>
</body>
</html>