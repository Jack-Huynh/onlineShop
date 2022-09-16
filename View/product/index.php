<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="http://localhost/onlineShop/onlineShop/JavaScript/search.js"></script>


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
    display: inline-block;
  }
  .Page {
      margin-left: 335px;
      font-size: 30px;
  }
  .Page li {
      border: solid;
      margin: 5px;
      width: 90px;
      text-align: center;
  }
</style>
<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <?php
        include '../../Helper/functionHelper.php';
        verifyLogin();
        include '../../View/main/sidebar.php';
    ?>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>


      <div class="container-fluid">
        <?php 
            include '../../Controller/productsController.php';
            $productsArray = loadproductsData();
        ?>
        <div class="container" style="margin-left:25%">
          <form style="margin-bottom: 20px;">
            <span class="form-group" style="display: inline-block;">
              <label for="">ProductName: </label>
              <input type="text" class="form-control" id="productName" width="200px">
            </span>
            <span class="form-group" style="display: inline-block; margin-left: 15px">
              <label for="">CategoryName: </label>
              <input type="text" class="form-control" id="categoryName">
            </span>
            <br>
            <span class="form-group" style="display: inline-block;">
              <label for="">PRICE FROM </label>
              <input type="text" class="form-control" id="fromPrice" width="200px">
            </span>
            <span class="form-group" style="display: inline-block; margin-left: 15px">
              <label for="">TO </label>
              <input type="text" class="form-control" id="toPrice">
            </span>
            <br>
            <button type="button" class="btn btn-primary search">Search</button>
         </form>
          <table class="table">
            <thead>
              <th>ProductID</th>
              <th>ProductName</th>
              <th>SupplierID</th>
              <th>CategoryName</th>
              <th>Price</th>
              <th>Image</th>
              <!--<span class="form-group">
                  <label for="">Number of products in a page: </label>
                 <input type="text" name="productsPerPage" id="productsPerPage">
              </span>-->
            </thead>
            <tbody>
              <?php
                $page = 1;
                $productsPerPage=3;
                if (isset($_GET['page'])){
                  $page = $_GET['page'];
                }
                $start = ($page-1)*$productsPerPage;
                $end= $start+$productsPerPage;
                if(count($productsArray)<$start+$productsPerPage){
                  $end = count($productsArray);
                }
                for ($i= $start; $i < $end; $i++) {
                    echo "<tr>";
                    echo "<td>".$productsArray[$i]['ProductID']."</td>";
                    echo "<td>".$productsArray[$i]['ProductName']."</td>";
                    echo "<td>".$productsArray[$i]['SupplierID']."</td>";
                    echo "<td>".$productsArray[$i]['CategoryName']."</td>";
                    echo "<td>".$productsArray[$i]['Price']."</td>";
                    echo '<td><img src="http://localhost/onlineShop/onlineShop/Image/products/'.$productsArray[$i]['Image'].'" width="120" height="110"><td>';
                    echo '<td class="actionButton">'.'<a href="http://localhost/onlineShop/onlineShop/View/product/update.php?id='.$productsArray[$i]['ProductID'].'"><button type="button" style="" class="btn btn-info btn-update">UPDATE</button></a>';
                    echo '<a style="margin-left: 2px" href="http://localhost/onlineShop/onlineShop/Controller/productsController.php?action=delete&id='.$productsArray[$i]['ProductID'].'"><button type="button" class="btn btn-danger btn-del">DELETE</button></a>'."</td>";
                    echo "</tr>";
                }
              ?>
            </tbody>
        </table>

        <a href="http://localhost/onlineShop/onlineShop/View/product/create.php"><button type="button" style="" class="btn btn-success btn-add">
            ADD
        </button></a>
        <?php
          if(count($productsArray)%$productsPerPage!=0){
            $maxPage = intval(count($productsArray)/$productsPerPage)+1;
          }
          else{
            $maxPage = intval(count($productsArray)/$productsPerPage);
          }
                // handle startPage and endPage
            
                $standardPage=3;
                if($maxPage<$standardPage){
                  $standardPage=$maxPage;
                }
                if($page <$standardPage){
                  $startPage = 1;
                  $endPage =$standardPage;
                }
                if($page>=$standardPage){
                  $startPage = $page-1;
                  if($maxPage==$page){
                    $endPage=$maxPage;
                  }
                  else{
                    $endPage =$page+1;
                  }
                }
        ?>
        <nav aria-label="Page navigation example" style="margin-left: 400px">
          <ul class="pagination">
            <?php
              if ($page!=1) {
                 echo '<li class="page-item"><a class="page-link" href="http://localhost/onlineShop/onlineShop/View/product/?page='.($page-1).'">Previous</a></li>';
              }
              for($i=$startPage; $i<=$endPage; $i++){
                if($i==$page){
                  echo '<li class="page-item active"><a class="page-link" href="http://localhost/onlineShop/onlineShop/View/product/?page='.$i.'">'.$i.'</a></li>';
                }else{
                  echo '<li class="page-item"><a class="page-link" href="http://localhost/onlineShop/onlineShop/View/product/?page='.$i.'">'.$i.'</a></li>';
                }
              }
              if ($page!=$maxPage) {
                 echo '<li class="page-item"><a class="page-link" href="http://localhost/onlineShop/onlineShop/View/product/?page='.($page+1).'">Next</a></li>';
              }
            ?>
          </ul>
        </nav>
        </div>
      </div>
    </div>
  </div>


      <div class='container'>
          <ul class="pagination Page">
            
          </ul>
      </div>
</body>

</html>