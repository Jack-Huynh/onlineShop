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
<form action="../../Controller/loginController.php?action=login" method="post">
  <div class="imgcontainer">
    <img src="http://localhost/onlineShop/onlineShop/Image/img_avatar2.png" alt="Avatar" class="avatar">
  </div>
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
    <?php
          $error='';
          $login= '';
          if(isset($_GET["error"])){
            $error=$_GET["error"];
          }
          if(isset($_GET["login"])){
            $login=$_GET["login"];
          }
          if($error==1) {
            echo '<div class="alert alert-danger"><strong>Wrong email or password</strong></div>';
          }
          if($login == "success"){
            echo '<div class="alert alert-info"><strong>Register success!</strong></div>';
          }
    ?>
  </div>
  
  <div class="container" style="background-color:#f1f1f1">
    <a href="http://localhost/onlineShop/onlineShop/View/login/registerPage.php">
      <button type="button" class="signUpbtn">Sign up</button>
    </a>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

</body>
</html>