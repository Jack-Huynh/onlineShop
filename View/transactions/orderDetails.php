<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simple Sidebar - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="http://localhost/onlineShop/onlineShop/CSS/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="http://localhost/onlineShop/onlineShop/CSS/simple-sidebar.css" rel="stylesheet">


</head>
<style type="text/css">
  .container-fluid{
    margin-left: -26%;
  }
  .actionButton{
    width: 200px;
    display: inline-block;
  }
</style>
<body>
<?php
    include '../../Controller/transactionController.php';
    if(isset($_GET["id"])){
      $orderID=$_GET["id"];
    }
    $orderDetailsArray= array();
    $orderDetailsArray=getOrderDetailsInfo($orderID);
?>
<table class="table">
            <thead>
              <th>OrderID</th>
              <th>ProductName</th>
              <th>Quantity</th>
              <th>Sum</th>
              <th>Price</th>
              <th>Image</th>
              
            </thead>
            <tbody>
              <?php
                for ($i= 0; $i < count($orderDetailsArray); $i++) {
                    echo "<tr>";
                    echo "<td>".$orderDetailsArray[$i]['OrderID']."</td>";
                    echo "<td>".$orderDetailsArray[$i]['ProductName']."</td>";
                    echo "<td>".$orderDetailsArray[$i]['Quantity']."</td>";
                    echo "<td>".$orderDetailsArray[$i]['Sum']."</td>";
                    echo "<td>".$orderDetailsArray[$i]['Price']."</td>";
                    echo '<td><img src="http://localhost/onlineShop/onlineShop/Image/products/'.$orderDetailsArray[$i]['Image'].'" width="120" height="110"><td>';
                }
              ?>
            </tbody>
        </table>
  </body>
</html>