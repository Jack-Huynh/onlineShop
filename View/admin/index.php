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
     z-index: 1;
    position: relative;
  }
  .actionButton{
    width: 200px;
    display: inline-block;
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
            include '../../Controller/userController.php';
            $userArray = loadUsersData();
        ?>
        
        <div class="container" style="margin-left:25%">
          <table class="table">
            <thead>
              <th>AdminID</th>
              <th>Email</th>
              <th>Password</th>
              <th>Status</th>
              <th>Action</th>
            </thead>
            <tbody>
              
            </tbody>
        </table>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="http://localhost/onlineShop/onlineShop/JavaScript/bootstrap.bundle.min.js"></script>
   <script src="http://localhost/onlineShop/onlineShop/JavaScript/adminJavaScript.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>