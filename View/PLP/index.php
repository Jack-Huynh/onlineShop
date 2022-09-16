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
		?>
		<div class="container col-sm-12">
			<div class="row" style="border: solid; height:522px;">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		    <li data-target="#myCarousel" data-slide-to="1"></li>
		    <li data-target="#myCarousel" data-slide-to="2"></li>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner">
		    <div class="item active">
		      <img src="http://localhost/onlineShop/onlineShop/Image/products/slide1.jpg" alt="">
		  	</div>

		    <div class="item">
		      <img src="http://localhost/onlineShop/onlineShop/Image/products/slide2.jpg" alt="">
		    </div>

		    <div class="item">
		      <img src="http://localhost/onlineShop/onlineShop/Image/products/slide3.jpg" alt="">
		    </div>
		  </div>

  <!-- Left and right controls -->
		  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#myCarousel" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right"></span>
		    <span class="sr-only">Next</span>
		  </a>
				</div>
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
			    	session_start();
					if(isset($_SESSION["currentUser"])){
						$user=$_SESSION["currentUser"];
					}
			    	if(isset($_SESSION["checkCustomerLogin"]) && $_SESSION["checkCustomerLogin"]==true){
			    		echo '<ul class="nav navbar-nav navbar-right">
      							<li>
      								<a href="http://localhost/onlineShop/onlineShop/View/customerAccount/customerinfo.php"><span class="glyphicon glyphicon-user" style="font-size: 20px;font-weight: bold;"</span>'.$user.'</a>
      							</li>
      							<li><a href="http://localhost/onlineShop/onlineShop/Controller/userController.php?action=logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
      							</li>
    						</ul>';
			    	}else{
    					echo '<ul class="nav navbar-nav navbar-right">
      							<li><a href="http://localhost/onlineShop/onlineShop/View/user/create.php?user=customer"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
      							</li>
      							<li><a href="http://localhost/onlineShop/onlineShop/View/customerAccount/loginPage.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
      							</li>
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