
	<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Bootstrap core CSS -->
  <link href="http://localhost/onlineShop/onlineShop/CSS/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="http://localhost/onlineShop/onlineShop/CSS/simple-sidebar.css" rel="stylesheet">


</head>
<style type="text/css">
</style>
<body>
        <?php
            session_start();
            $userID = '';
            if(isset($_SESSION["userID"])){
              $userID=$_SESSION["userID"];
            }
            include '../../Controller/transactionController.php';
            $orderInfoArray = getOrderInfo($userID);
        ?>
        
        <div class="container">
          <h1>ORDER HISTORY</h1>
          <table class="table">
            <thead>
            	<th>CustomerName</th>
            	<th>Address</th>
            	<th>Phone</th>
            	<th>OrderDate</th>
            	<th>Total</th>
              	<th>StatusName</th>
              	<th>Description</th>
              	<th>Action</th>
            </thead>
            <tbody>
              <?php
                for ($i=0; $i < count($orderInfoArray); $i++) {
                    echo "<tr>";
                    echo "<td>".$orderInfoArray[$i]['CustomerName']."</td>";
                    echo "<td>".$orderInfoArray[$i]['Address']."</td>";
                    echo "<td>".$orderInfoArray[$i]['Phone']."</td>";
                    echo "<td>".$orderInfoArray[$i]['OrderDate']."</td>";
                    echo "<td>".$orderInfoArray[$i]['Total']."</td>";
                    echo "<td>".$orderInfoArray[$i]['statusName']."</td>";
                    echo "<td>".$orderInfoArray[$i]['Description']."</td>";
                    if($orderInfoArray[$i]['Status']==0){
                      echo '<td style="width: 280px" class="actionButton">'.'<a href="http://localhost/onlineShop/onlineShop/Controller/transactionController.php?id='.$orderInfoArray[$i]['OrderID'].'&action=cancel"><button type="button" class="btn btn-danger">Cancel</button></a>';
                    }
                    else if($orderInfoArray[$i]['Status']==2){
                      echo '<td style="width: 280px" class="actionButton">'.'<a href="http://localhost/onlineShop/onlineShop/Controller/transactionController.php?id='.$orderInfoArray[$i]['OrderID'].'&action=undoCancel"><button type="button" class="btn btn-info">Undo Cancel</button></a>';
                    }
                    else{
                      echo '<td style="width: 280px" class="actionButton">'.'<a href="http://localhost/onlineShop/onlineShop/Controller/transactionController.php?id='.$orderInfoArray[$i]['OrderID'].'&action=cancel"><button type="button" class="btn btn-danger" disabled="">Cannot Cancel</button></a>';
                    }
                    
                    echo '<a href="http://localhost/onlineShop/onlineShop/View/transactions/orderDetails.php?id='.$orderInfoArray[$i]['OrderID'].'"><button type="button" style= "margin-left:2px;" class="btn btn-success">View Details</button></a>'."</td>";
                    echo "</tr>";
                }
              ?>
            </tbody>
        </table>
        </div>
</body>

</html> 