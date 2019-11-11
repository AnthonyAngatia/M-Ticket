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

    <title>Cart</title>
    <style>
    *{
        margin:1em;
    }
      .whole-cart {
        
        margin-top: 9em;
        margin-right: 5em;
        margin-left: 5em;
        box-shadow: 
      }
      .headings {
        display: grid;
        grid-template-columns: 2.2fr 1fr 1.4fr 1fr 1fr 1fr;
        text-align: center;
      }
      .cart {
        display: grid;
        grid-template-columns: 2.2fr 1fr 1.4fr 1fr 1fr 1fr;
        grid-auto-rows: minmax(200px, auto);
        grid-gap: 1px;
        box-shadow: 0 8px 6px -6px black;
      }
      .cart > div {
          
          background-color: #ddd;
          text-align:center;
        
      }
      
      .cart img {
        
        height:150px;
        max-height: 150px;
        max-width: 150px;
      }

      .type{
        height:200px;
      }
      .quantity{
         height:200px;
      }
      .price{
         height:200px;
      }
  
    .previous {
      background-color: #ddd;
      color: black;
    }

    .next {
      background-color: #ddd;
      color: black;
    }
    .remove{
        padding-top: 5em;
      }
      .remove button{
      padding: 5px 25px;
      background-color: rgb(231, 44, 19);
      border: none;
      border-radius: 1em;
      cursor: pointer;
      transition: all 0.3s ease 0s;
      color:white;
      }
        button:hover {
      background-color: black;
    } 

     </style>
    </head>
<body>
<form method = "POST">
<label>Enter amount</label>
<input type="number" name = "amount" class="cart_coupon_input" name="points" placeholder="Enter amount" required="required" min = "0"  style="width:350px !important;">
<label>Enter Phone Number</label>
<input type="number" name = "phone_no" class="cart_coupon_input" name="points" placeholder="07xxxxxxxx" value = "0791278088" required="required" min = "0"  style="width:350px !important;">
<input name="submit" type = "submit" class="button_clear cart_button_2">
<form>
</body>
</html>
<?php
// echo "njmk";
session_start();
require_once('Lipa-Mpesa.php');
require_once('TransactionProcessing.php');

$username = $_SESSION['username'];
$userid = $_SESSION['user_id'];

if(isset($_POST['submit'])){
  
    //* Mpesa
    $amount = $_POST['amount'];
    $phone_no = $_POST['phone_no'];
    $access_token = accessTokenGenerator();
    // mpesaSendMoney($phone_no, $amount, $access_token);
    mpesaSendMoney($phone_no, '2', $access_token);
    $_SESSION['amt'] = $amount;
    $message = "Please check your phone to complete the transaction";
    header("refresh:30;url=InstallmentCheckoutValidation.php");
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
                <!-- <img src="cart3.png" width="27" height="10" alt="" /> -->
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

<?php 
}
?>