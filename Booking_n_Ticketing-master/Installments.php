<?php
session_start();
// print_r($_POST);
require_once('require.php');
// require_once('SendEmail.php');
require_once('Days.php');
require_once('Lipa-Mpesa.php');

$username = $_SESSION['username'];
$phone_number = $_POST['phone_number'];
$total_to_pay = $_POST['total-pay'];//DownPayment//!Remeber to alter this 
$installment = $_POST['installment'];
$installment_amt = $total_to_pay/$installment;
$installment_amt = (int)$installment_amt;
$total_payable = $total_to_pay *2;
if(isset($_POST['points'])){
  $points =  $_POST['points'];
}
else{
  $points =  0;
}

function getNextInstallment($installment){
    $days = getNoOfDays();
    $installment_time_interval = $days/$installment;
    // echo "<br>";
    $next_installment_date =  date('Y-m-d', strtotime(' + '.$installment_time_interval.'days'));//Add currnet date to time interval
    return $next_installment_date;
}
$next_installment  = getNextInstallment($installment);

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}
else{
    header('Location: userlogin.php');
}
$_SESSION['total-to-pay'] = $total_to_pay;
$_SESSION['installment'] = $installment;
$_SESSION['installment-amt'] = $installment_amt;
$_SESSION['total-payable'] = $total_payable;
$_SESSION['next-installment'] = $next_installment;
$_SESSION['points'] = $points;
print_r($_SESSION);



//!Remember to return ths
$access_token =  accessTokenGenerator();
// mpesaSendMoney($phone_number, $total_to_pay, $access_token);
mpesaSendMoney($phone_number, '2', $access_token);

//!Pause for 30 seconds
header("refresh:20;url=InstallmentPayValidation.php");

// echo $next_installment;
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
      rel="stylesheet"
      type="text/css"
      href="plugins/OwlCarousel2-2.2.1/owl.carousel.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="plugins/OwlCarousel2-2.2.1/animate.css"
    />
    <link
      href="plugins/colorbox/colorbox.css"
      rel="stylesheet"
      type="text/css"
    />
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css" />
    <link rel="stylesheet" type="text/css" href="styles/responsive.css" />
    <title>Installments php</title>
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
      <h2 style ="text-align:center; padding:2px 1em;"> Please wait for the transaction to be processed </h2>
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
