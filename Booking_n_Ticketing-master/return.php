<!DOCTYPE html>
<html lang="en">
  <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="css/mticket.css">

    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="css/cart.css">

    <!-- Load an icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">

    <title>Return</title>
    <style>
       .postnav{
        margin-top: 200px;
        margin-bottom: 50px;

    }
    </style>
    </head>
  <body>

  <div class="super_container">

    <!-- Header -->
        <header class="header">
            <div class="header_inner d-flex flex-row align-items-center justify-content-start">
                <div class="logo"><a href="HomePage.php">M-ticket</a></div>
                <nav class="main_nav">
                    <ul>
                        <li><a href="browse.php">browse events</a></li>
                        <li><a href="eventupload.php">create event</a></li>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">contact</a></li>
                    </ul>
                </nav>

                <div class="header_content ml-auto">
                    <div class="shopping">
                        <!-- Avatar -->
                        <a href="account.php" style="color:black;">
                            <div class="avatar" id="avatar">
                                <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
                                <img src="avatar.png" alt="">
                            </div>
                        </a>
                        &emsp;


                        <!-- Cart -->
                        <a href="cart.php">
                            <div class="cart">
                                <img src="cart3.png" width="27" height="27" alt="">
                                <div class="cart_num_container">
                                    <div class="cart_num_inner">
                                        <div class="cart_num">0</div>
                                           </div>
                                  </div>
                                </div>
                              </a>
                            </div>
                          </div>
                       </div>
        </header>


<div class="postnav">
  <center>
 <div class="col-lg-6" style="">
          <div class="cart_coupon">
            <div class="cart_title">return ticket</div>
            <br>
            <form action="return.php" method="POST" enctype="multipart/form-data">
              <input type="text" class="cart_coupon_input" name="tnumber" placeholder="Enter ticket number" required="required">
              <button type="submit" name="return" class="button_clear cart_button_2">return</button>
            </form>
          </div>
        </div>
      </center>
      </div>

  <!-- Footer -->

  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <div class="footer_logo"><a href="HomePage.php">M-ticket</a></div>
          <nav class="footer_nav">
           <ul>
              <li><a href="browse.php">events</a></li>
              <li><a href="HomePage.php">create event</a></li>
              <li><a href="about.php">about us</a></li>
              <li><a href="contact.php">contact</a></li>
            </ul>
          </nav>
          <div class="footer_social">
            <ul>
              <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-reddit-alien" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            </ul>
          </div>
          <div class="copyright">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</div>
        </div>
      </div>
    </div>
  </footer>

</div>

    <script src="js/jquery.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js" ></script>

 </body>
</html>

<?php
session_start();
if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
  $sess = $_SESSION["username"];
//  echo 'Set and not empty, and no undefined index error!';
}
else{
  $sess = "null";
  // echo "empty";
}

include ("require.php");
connect();


if (isset($_POST["submit"])) {

$number = ($_POST['tnumber']);
$_SESSION['ticketnumber']=$number;
$sql=("SELECT Totalpaid FROM tickets WHERE Ticket_Id ='$number'");
$link=connect();
$result=mysqli_query($link,$sql);
while ($row = $result->fetch_assoc()){
$total=$row['Totalpaid'];
}
$returnpoints=(($total*0.6)/100);

if ($result) {
    $sql=("SELECT Points FROM user_table WHERE Username ='$sess'");
    $link=connect();
    $result=mysqli_query($link,$sql);
    while ($row = $result->fetch_assoc()){
    $currentpoints=$row['points'];
    }
    $newpoints=($currentpoints+$returnpoints);

        if ($result) {
              $sql=("DELETE * FROM tickets WHERE Ticket_Id ='$number'");
              $link=connect();
              $result=mysqli_query($link,$sql);
                  if ($result) {
                        $sql = "UPDATE user_table SET Points='$newpoints' WHERE Username=$sess";
                        $link=connect();
                        $result=mysqli_query($link,$sql);
                            if ($result) {
                                    echo "<script>alert('Ticket returned successfuly')</script>";
                                          }
                            $link->close();                 
                                }
                  $link->close();
                      }
        $link->close();
              }
 $link->close();
}
?>
