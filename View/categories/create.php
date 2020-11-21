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
		<form id="formLogin" action="../../Controller/categoriesController.php?action=create" method="POST">
			<div class="form-group">
				<label for="textbox" style="text-align: left;">ParentID: </label>
				<input type="text" name="parentID" class="form-control">
			</div>
			<div class="form-group">
				<label for="textbox" style="text-align: left;">CategoryName: </label>
				<input type="text" name="categoriesName" class="form-control">
			</div>
			<div class="form-group">
				<label for="textbox" style="text-align: left;">Description: </label>
				<input type="text" name="description" class="form-control">
			</div>
			<button type="submit" class="btn btn-primary btn-save">
				<h5>
					SAVE
				</h5>
			</button>
			<a href="http://localhost/onlineShop/onlineShop/View/categories/"><button type="button" class="btn btn-danger">
				<h5>
					CANCEL
				</h5>
			</button></a>
		</form>
	</div>
</body>
</html>