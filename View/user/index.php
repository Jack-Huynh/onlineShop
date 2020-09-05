<html>
	<head>
		<title>User</title>
		<meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		  <script src=""></script>
		  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  		  <link href="css/simple-sidebar.css" rel="stylesheet">
	</head>
	<style type="text/css">
		.container{
			width: 50%;
		}
	</style>
	<body>
		<?php 
		    include '../../Controller/userController.php';
			$userArray = loadUsersData();
		?>
		
		<div class="container" style="margin-left:25%">
			<table class="table">
				<thead>
					<th>CustomerID</th>
					<th>CustomerName</th>
					<th>ContactName</th>
					<th>Address</th>
					<th>City</th>
					<th>PostalCode</th>
					<th>Country</th>
					<th>Username</th>
					<th>Password</th>
				</thead>
				<tbody>
					<?php
						for ($i=0; $i < count($userArray); $i++) {
							echo "<tr>";
						  	echo "<td>".$userArray[$i]['CustomerID']."</td>";
						  	echo "<td>".$userArray[$i]['CustomerName']."</td>";
						  	echo "<td>".$userArray[$i]['ContactName']."</td>";
						  	echo "<td>".$userArray[$i]['Address']."</td>";
						  	echo "<td>".$userArray[$i]['City']."</td>";
						  	echo "<td>".$userArray[$i]['PostalCode']."</td>";
						  	echo "<td>".$userArray[$i]['Country']."</td>";
						  	echo "<td>".$userArray[$i]['Username']."</td>";
						  	echo "<td>".$userArray[$i]['Password']."</td>";
						  	echo "</tr>";
						}  
					?>
				</tbody>
		</table>
		<a href="http://localhost/onlineShop/onlineShop/View/user/create.php"><button type="button" style="width: 80px" class="btn btn-info btn-add">
				<h4>ADD</h4>
		</button></a>
		</div>
	</body>
</html>
