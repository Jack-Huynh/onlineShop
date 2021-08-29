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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="http://localhost/onlineShop/onlineShop/JavaScript/customerJavascript.js"></script>

</head>
<style type="text/css">
</style>
  <body>
      <div class="container">
        <h1>YOUR ADDRESSES</h1>
        <table class="table">
            <thead>
              <th>AddressName</th>
              <th>Addresses</th>
              <th>Phone</th>
              <th>Action</th>
            </thead>
            <tbody>
             
            </tbody>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>

  <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog" style="margin-left: -90px">
          <div class="modal-dialog modal-sm">
            <div class="modal-content" style="width: 500px;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form style="margin-bottom: 20px">
                  <span class="form-group" style="">
                    <label for="">AddressesName: </label>
                    <input type="text" class="form-control" id="addressName">
                  </span>
                  <span class="form-group">
                    <label for="">Addresses: </label>
                    <input type="text" class="form-control" id="addresses">
                  </span>
                  <span class="form-group" style="">
                    <label for="">Phone: </label>
                    <input type="text" class="form-control" id="phone">
                  </span>
               </form>
              </div>
              <div class="modal-footer">
                <button id="closeButton" type="button" style="display: none" class="btn btn-default" data-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-success add">Save</button>
                
              </div>
            </div>
          </div>
        </div>
      </div>
  </body>

</html> 