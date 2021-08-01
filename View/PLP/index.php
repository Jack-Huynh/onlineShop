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
		  
		</style>
	<body>
		<?php
			include '../../Controller/categoriesController.php';
			$categoriesArray=loadCategoriesData(true, true);
			$error='1';
			$userName='';
			if(isset($_GET["error"])){
				$error=$_GET["error"];
			}
			if(isset($_GET["customer"])){
				$userName=$_GET["customer"];
			}
		?>
		<div class="container col-sm-12">
			<div class="row" style="border: solid; height:200px;">
				
			</div>
			<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <a class="navbar-brand" href="#">WebSiteName</a>
			    </div>
			    <ul class="nav navbar-nav">
			      <li class="active"><a href="#">Home</a></li>
			      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories <span class="caret"></span></a>
			        <ul class="dropdown-menu">
			        <?php
			        	for($i=0; $i<count($categoriesArray); $i++){
			        		echo '<li><a class="categories" data-type="'.$categoriesArray[$i]['CategoryName'].'" href="">'.$categoriesArray[$i]['CategoryName'].'</a></li>';

			        	}  
			        ?>
			        </ul>
			      </li>
			      <li><a href="#">Page 2</a></li>
			      <li><a href="#">Page 3</a></li>
			    </ul>
			    <?php
			    	if($error==0){
			    		echo '<ul class="nav navbar-nav navbar-right">
      							<li>
      								<a href="http://localhost/onlineShop/onlineShop/View/customerAccount/customerinfo.php"><span class="glyphicon glyphicon-user" style="font-size: 25px;font-weight: bold;"</span>'.$userName.'</a>
      							</li>
    						</ul>';
			    	}else{
    					echo '<ul class="nav navbar-nav navbar-right">
      							<li><a href="http://localhost/onlineShop/onlineShop/View/user/create.php?user=customer"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      							<li><a href="http://localhost/onlineShop/onlineShop/View/customerAccount/loginPage.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    						  </ul>';
			    	}
			    ?>
			  </div>
			</nav>
			<div class="row">
				<div class="col-sm-3 detail">
					<form style="margin-bottom: 20px;">
		            <span class="form-group" style="display: inline-block;">
		              <label for="">ProductName: </label>
		              <input type="text" class="form-control" id="productName" width="200px">
		            </span>
		            <span class="form-group" style="display: inline-block;">
		              <label for="">CategoryName: </label>
		              <input type="text" class="form-control" id="categoryName">
		            </span>
		            <br>
		            <span class="form-group" style="display: inline-block;">
		              <label for="">PRICE FROM </label>
		              <input type="text" class="form-control" id="fromPrice" width="200px">
		            </span>
		            <span class="form-group" style="display: inline-block;">
		              <label for="">TO </label>
		              <input type="text" class="form-control" id="toPrice">
		            </span>
		            <br>
		            <button type="button" class="btn btn-primary search">Search</button>
		         </form>
				</div>
				<div class="col-sm-9 detail">
					<div class="row header">
						<h1>PRODUCTS</h1>
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