<?php
session_start();
// require_once('Installments.php');
require_once('ticket.php');
require_once('Days.php');
// require_once('Test.php');
require_once('TransactionProcessing.php');
require_once('SendEmail.php');

$username = $_SESSION['username'];
$userid = $_SESSION['user_id'];
// print_r($_SESSION['cart_tickets']['0']['id']);
function getEmailInfo($username){
    $email_info = array();
    // echo "<pre>";
    //*Getting email add of user
    $sql = "SELECT *  FROM user_table WHERE Username = '$username' ";
    // print_r(getData($sql)['0']['Email']);
    $emailAdd = getData($sql)['0']['Email'];
    array_push( $email_info,$emailAdd);
    $receiverName = getData($sql)['0']['Name'];
    array_push( $email_info,$receiverName);
    return $email_info;
}

// !Remember to return this to normal
$obj = getCallBackResponse();
transactionDetails($obj, $username);

$total_to_pay = $_SESSION['total-to-pay'] ;
unset($_SESSION['total-to-pay'] );
$installment = $_SESSION['installment'];
unset($_SESSION['installment']);
$installment_amt = $_SESSION['installment-amt'];
unset($_SESSION['installment-amt']);
$total_payable = $_SESSION['total-payable'];
unset($_SESSION['total-payable']);
$next_installment = $_SESSION['next-installment'];
unset($_SESSION['next-installment']);
$balance = $total_payable - $total_to_pay;
if(isset($_SESSION['points'])){
    $points = $_SESSION['points'];
    unset($_SESSION['points']);
}
else{
    $points = '0';
}


// echo $next_installment;
$event_id = $_SESSION['cart_tickets']['0']['id'];
// print_r($_SESSION['cart-tickets']['id']);





//*Instert info into the database
$sql = "INSERT INTO installment( DownPayment, No_of_Installments, Total_Payable, Balance, Next_Installment, Installment_amt, User_Id, Event_Id) VALUES ( $total_to_pay, $installment, $total_payable , $balance, '$next_installment' ,$installment_amt, $user_id, $event_id)";
// $sql = "INSERT INTO installment( DownPayment, No_of_Installments, Total_Payable, Balance, Next_Installment, Installment_amt, User_Id, Event_Id) VALUES ( $total_to_pay, $installment, $total_payable , $balance,'2019-12-02' ,$installment_amt, $user_id, $event_id)";
setData($sql);
//*Update points
  $sess = $_SESSION["username"];

  $sql=("SELECT Points FROM user_table WHERE Username ='$sess'");
  //getData($sql);
  $currentpoints = 0;
  $currentpoints=getData($sql)['0']['Points'];
  $updatedpoints=($currentpoints + 1 - $points);
  $sql = "UPDATE user_table SET Points='$updatedpoints' WHERE Username='$sess'";
  setData($sql);
  $message = "Transaction Successful";

//*Send Email
$body ='<style>
    .wrap {
    border: 1px solid black;
    max-width: 50%;
    margin: auto;
    }
    .wrap h1 {
    text-align: center;
    }
    .wrap p {
    padding: 5px;
    }
    </style>
    </head>
    <body>
    <div class="wrap">
    <h1>M-ticket.com</h1>
    <p>Hi customer,</p>
    <p>
    You have paid *** amount for the purchase of ticket xyz.You are expected
    to pay -amt by this day otherwise your installment plan will be
    nullified.
    </p>
    <p>Your other installments will be paid on xyz</p>
    <p>Email reminders will be sent to you 2 days before the deadline</p>
    <p>Thank you.</p>
    </div>';

sendMail(getEmailInfo($username)['0'], getEmailInfo($username)['1'], "M-ticket Installment Pay", $body, null, null );

unsetCart();
?>
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
    <title></title>
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
      <h2 style ="text-align:center; padding:2px 1em;"> <?php echo $message ?></h2>
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