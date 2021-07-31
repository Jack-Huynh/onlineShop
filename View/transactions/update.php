<!DOCTYPE html>
<html>
<head>
		<title>UPDATE STATUS</title>
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
	<h1 style="text-align: center">UPDATE STATUS</h1>
	<div class="container">
		<?php
			if(isset($_GET["id"])){
				$orderStatusID=$_GET["id"];
			}
			include '../../Controller/transactionController.php';
			$StatusArray = array();
			$StatusArray=getOrderInfo($orderStatusID);
		?>
		<form id="formLogin" action="../../Controller/transactionController.php?action=update" method="POST">
			<div class="form-group">
				<input type="hidden" name="orderID" class="form-control" value="<?php echo $StatusArray[0]['OrderID']?>">
			</div>
			<div class="form-group">
				<label for="textbox" style="text-align: left;">OrderStatus: </label>
				<select class="form-control" name="orderStatusID">
					<?php
						$orderStatusArray = array();
						$orderStatusArray=getOrderStatusInfo();
						for ($i=0; $i < count($orderStatusArray); $i++) {
						    $selected = ($orderStatusArray[$i]['orderStatusID'] == $StatusArray[0]['Status']) ? 'selected' : '';
		                    echo '<option '.$selected.' value="'.$orderStatusArray[$i]['orderStatusID'].'">';
		                    echo $orderStatusArray[$i]['statusName'];
		                    echo '</option>';
                		}
					?>
					
				</select>
			</div>
			<button type="submit" class="btn btn-primary btn-save">
				<h5>
					SAVE
				</h5>
			</button>
			<a href="http://localhost/onlineShop/onlineShop/View/transactions/"><button type="button" class="btn btn-danger">
				<h5>
					CANCEL
				</h5>
			</button></a>
		</form>
	</div>
</body>
</html>