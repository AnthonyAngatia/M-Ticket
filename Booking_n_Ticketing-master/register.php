<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Ticket system">
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">

  <title>RegisterPage</title>
  <style>
    * {
      margin: 0px;
    }

    body {
      background: #fff;
      padding: 0px;
      margin: 0px;
      font-family: 'Nunito', sans-serif;
      font-size: 15px;
    }

    #register {
      background-color: white;
      padding: 25px;
      width: 550px;
    }
/*
    button {
      font-family: 'Nunito', sans-serif;
      font-weight: 700;
      background: #5d8ffc;
      color: #fff;
      border: 1px solid #5d8ffc;
      border-radius: 5px;
      padding: 15px;
      display: block;
      width: 50%;
      transition: 0.3s;
      -webkit-transition: 0.3s;
      -moz-transition: 0.3s;
    }
    */

    button:hover {
      background: #fff;
      color: #5d8ffc;
      border: 1px solid #5d8ffc;
      cursor: pointer;
    }
  </style>

</head>

<body>


  <center>
    <div id="register">
      <form action="register.php" method="POST" enctype="multipart/form-data">

        <center>
          <h4><b>REGISTER</b></h4>
        </center>
        <br>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Type your name">
          </div>
          <div class="form-group col-md-6">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Type your username">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" name="phone" placeholder="Type your number">
          </div>
          <div class="form-group col-md-6">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Type your email">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="password1">Password</label>
            <input type="password" class="form-control" name="password1" placeholder="Type your password">
          </div>
          <div class="form-group col-md-6">
            <label for="password2">Confirm Password</label>
            <input type="password" class="form-control" name="password2" placeholder="Re-type your password">
          </div>
        </div>
        <br>
        <center>
          <a href="#"> Terms and Conditions</a>
          <br>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
              <label class="form-check-label" for="invalidCheck3">
                Agree to terms and conditions
              </label>
              <div class="invalid-feedback">
                You must agree before submitting.
              </div>
            </div>
          </div>
          <button name="submit" type="submit">Sign up</button>
          <br>
          <p>Already have an account?<a href="userlogin.php"> Sign in</a></p>
        </center>
      </form>
    </div>
  </center>


  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="styles/bootstrap4/popper.js"></script>
  <script src="styles/bootstrap4/bootstrap.min.js"></script>
  <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
  <script src="plugins/easing/easing.js"></script>
  <script src="plugins/parallax-js-master/parallax.min.js"></script>
  <script src="plugins/colorbox/jquery.colorbox-min.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>

<?php
require('require.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name = $_POST["name"];
  $user = $_POST["username"];
  $phoneno = $_POST["phone"];
  $email = $_POST["email"];
  $password = $_POST["password1"];
  $passcon = $_POST["password2"];



  if (strlen($_POST["password1"]) <= '6') {
    echo "<script> alert('Your Password Must Contain At Least 6 Characters!')</script>";
  } elseif (!preg_match("#[0-9]+#", $password)) {
    echo "Your Password Must Contain At Least 1 Number!";
  } elseif (!preg_match("#[A-Z]+#", $password)) {
    echo "Your Password Must Contain At Least 1 Capital Letter!";
  } elseif (!preg_match("#[a-z]+#", $password)) {
    echo "Your Password Must Contain At Least 1 Lowercase Letter!";
  } elseif (empty($name) || empty($user) || empty($phoneno) || empty($email) || empty($password) || empty($passcon)) {
    echo "Please ensure you've entered all fields";
  } elseif (!($password == $passcon)) {
    echo "password does not match";
  } else {
    $pass = sha1($password);
    $conf = sha1($passcon);
    $sql = "INSERT INTO `users` (`Name`, `Username`, `PhoneNo`, `Email`, `Password`, `Password_Confirmation`) VALUES ('$name', '$user', '$phoneno', '$email', '$pass', '$conf')";

    connect();
    register($sql);
  }
}
?>