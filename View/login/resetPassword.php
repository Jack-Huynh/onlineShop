<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src=""></script>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.signUpbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #0844ebe0;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 20%;
  border-radius: 50%;
}

.container {
  padding: 16px;
  margin :0 auto;
  width: 300px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
<form action="../../Controller/adminController.php?action=changeNewPassword" method="post">
  <div class="imgcontainer">
    <img src="http://localhost/onlineShop/onlineShop/Image/img_avatar2.png" alt="Avatar" class="avatar">
  </div>
  <div class="container">
    <input type="hidden" name="adminID" value="<?php echo $_GET['adminID'] ?>">
    <label for="uname"><b>New Password: </b></label>
    <input type="text" placeholder="Enter New Password" name="newPassword" required>

     <label for="uname"><b>Re-enter New Password: </b></label>
    <input type="text" placeholder="Re-enter New Password" name="reNewPassword" required>

    <?php
          $error='';
          if(isset($_GET["error"])){
            $error=$_GET["error"];
          }
          if($error=='unmatch') {
            echo '<div class="alert alert-danger"><strong>Password Unmatch!</strong></div>';
          }
    ?>
    <button type="submit" class="signUpbtn">Submit</button>
  </div>
</form>
</body>
</html>