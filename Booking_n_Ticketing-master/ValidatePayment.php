<?php 
// 
// *Coming from directpay.php
// 
session_start();
require_once('ticket.php');
require_once('Test.php');
require_once('SendEmail.php');
require_once('TransactionProcessing.php');


$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
//! check whether the user has paid or cancelled b4 continuing
$obj = getCallBackResponse();
transactionDetails($obj, $username);

if(isset($_SESSION['request'])){
  // echo "<script>alert(' zsxfcgvbhjnhgfdxfcbhjnnhbfcdx vbnt')</script>";
  $sql = "UPDATE request SET Status = '0' WHERE User_Id='$user_id'";
  setData($sql);
  unset($_SESSION['request']);
  
  $message = "Succcessful Transaction. Check your Email for the ticket";
  for($i=0; $i<sizeof(ticketBody()['0']); $i++){
    sendMail(getEmailInfo()['0'], getEmailInfo()['1'], "M-ticket", ticketBody()['0'][$i], ticketBody()['1'][$i], ticketBody()['1'][$i]);
  }
  unsetCart();
}
else{
  //*Get the total amt and points
$total_amt = $_SESSION['total_amount'];
unset($_SESSION['total_amount'] );
$points = $_SESSION['points'];
unset( $_SESSION['points']);
echo "<script>alert(' Gotten total amt and points')</script>";
//*
 if(isset($_SESSION['paid'])){
   echo "<script>alert(' Sessiion paid isset')</script>";

  if($_SESSION['paid'] == 1){
    echo "<script>alert(' Transaction Successfull at validate payment')</script>";
    unset($_SESSION['paid']);
    //   // //*Updates our table
    $Event_id = $_SESSION['cart_tickets']['0']['id'];//Event id for the first item in the cart
    updateTables($user_id, $Event_id, $total_amt, $points);


    //*Send the emails
    //header("Location: Test.php");
    for($i=0; $i<sizeof(ticketBody()['0']); $i++){
      //* This functions are in Test.php
      //?sendMail(getEmailInfo()['0'], getEmailInfo()['1'], "Subject", $value, $path, $cid);
        sendMail(getEmailInfo()['0'], getEmailInfo()['1'], "M-ticket", ticketBody()['0'][$i], ticketBody()['1'][$i], ticketBody()['1'][$i]);
      }
    //*Increase the points and reduce the points used
    $sess = $_SESSION["username"];
    $sql=("SELECT Points FROM user_table WHERE Username ='$sess'");
    // getData($sql);
    $currentpoints=getData($sql)['0']['Points'];
    $updatedpoints=($currentpoints + 1 - $points);
    $sql = "UPDATE user_table SET Points='$updatedpoints' WHERE Username='$sess'";
    setData($sql);
    //*Show how many points were used in the purchase of tickets
    // $sql = "UPDATE tickets SET PointsUsed='$points' WHERE Username='$sess'";
    // setData($sql);
    unsetCart();
    $message = "Succcessful Transaction. Check your Email for the ticket";
   }
   else{
    //failed transaction
     echo "<script>alert('Failed Transaction at validate payment')</script>";
     $message = "Failed transaction";
    header("refresh:10;url=Cart.php");
    unset($_SESSION['paid']);
   }
 }
}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      href="plugins/font-awesome-4.7.0/css/font-awesome.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="plugins/colorbox/colorbox.css"
      rel="stylesheet"
      type="text/css"
    />
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css" />
    <link rel="stylesheet" type="text/css" href="styles/responsive.css" />
    <title>Success</title>
    <style>
      .success {
        
        border:2px solid black;
        width:45%;
        text-align:center;
        margin:auto;
        margin-top:15em;
      }
      .success h2,
       {
        /* margin: auto; */
        padding:1em;
      }
      .success i{
        padding:5px;
      }
    </style>
  </head>
  <body>
    <header class="header">
      <div
        class="header_inner d-flex flex-row align-items-center justify-content-start"
      >
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
            <a href="UserProfile.php" style="color:black;">
              <div class="avatar" id="avatar">
                <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
                <img src="avatar.png" alt="" />
              </div>
            </a>
            &emsp;

            <!-- Cart -->
            <a href="cart.php">
              <div class="cart">
                <img src="cart3.png" width="27" height="27" alt="" />
                <div class="cart_num_container">
                  <div class="cart_num_inner">
                    <div class="cart_num">
                      <?php
                        if (  isset( $_SESSION['cart_tickets'])  && !empty($_SESSION['cart_tickets'])) {
                            echo sizeof($_SESSION['cart_tickets']);
                        } else{
                            echo "0";
                        }
                        ?>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            <div
              class="burger_container d-flex flex-column align-items-center justify-content-around menu_mm"
            >
              <div></div>
              <div></div>
              <div></div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="success">
      <h2> <?php echo $message;?> </h2>
      <i class="fa fa-5x fa-ticket"></i>
    </div>

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
                <li>
                  <a href="#"
                    ><i class="fa fa-pinterest" aria-hidden="true"></i
                  ></a>
                </li>
                <li>
                  <a href="#"
                    ><i class="fa fa-linkedin" aria-hidden="true"></i
                  ></a>
                </li>
                <li>
                  <a href="#"
                    ><i class="fa fa-instagram" aria-hidden="true"></i
                  ></a>
                </li>
                <li>
                  <a href="#"
                    ><i class="fa fa-reddit-alien" aria-hidden="true"></i
                  ></a>
                </li>
                <li>
                  <a href="#"
                    ><i class="fa fa-twitter" aria-hidden="true"></i
                  ></a>
                </li>
              </ul>
            </div>
            <div class="copyright">
              Copyright &copy;<script>
                document.write(new Date().getFullYear());
              </script>
              All rights reserved
            </div>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>