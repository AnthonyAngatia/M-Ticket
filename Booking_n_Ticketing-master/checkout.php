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
  $_SESSION['ticketname'];
  // echo "<pre>";
  // print_r($_SESSION['cart_tickets']);
  function getParam() {
      if (!isset($_GET["w1"])){
      echo "<script> alert('No param passed. I will redirect you soon')</script>";
      }
      else{
        $param = $_GET["w1"];
        return $param;
      }
  }
  function getParam2(){
    if (!isset($_GET["w2"])){
      echo "<script> alert('No param passed. I will redirect you soon')</script>";
      }
      else{
        $param2 = $_GET["w2"];
        return $param2;
      }
  }
  echo getParam();


?>
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

    <title>Checkout</title>
    <style>
    
    .postnav{
        margin-top: 130px;
        margin-bottom: 10px;
    }
    #direct{
      margin-bottom: 30px;
      background-color: #ddd;
      text-align:center;
      padding: 15px;
      display:none;
    }
    #installment{
       margin-bottom: 10px;
      background-color: #ddd;
      text-align:center;
      padding: 15px;
      display:none;
    }
   </style>
</head>
<body>
  <div class="super_container">
    <header class="header" >  
    <div class="header_inner d-flex flex-row align-items-center justify-content-start">
      <div class="logo"><a href="Homepage.php">M-ticket</a></div>
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
           <a href="account.php" style="color:black;">
            <div class="avatar" id="avatar"><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
              <img src="avatar.png" alt="">
            </div>
          </a>
         
          <!-- Cart -->
          <a href="#">
            <div class="cart">
              <img src="cart3.png" width="30" height="30" alt="">
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
        </div>
      </div>
    

    </div>
  </header>
<?php 

  require_once('Days.php');
  $days = getNoOfDays();
  // $days = 90;
  // echo $days;
  $installment_number = 0;
  if($days <= 7){
    // echo  "Installment is not available";
  }
  else if($days > 7 && $days <= 30){
    // echo "You can have one installment";
    $installment_number = 1;
  }
  else if($days > 30 && $days <= 60){
    // echo "you have 4 installments";
    $installment_number = 4;
  }
  else{
    // echo "You have 5 installments";
    $installment_number = 5;
  }
?>
    <div class="postnav">
    <div class="section_title_container text-center">
    <div class="section_title" style="font-size: 40px !important;">complete your purchase</div>
    </div>
  </div>

            <center>
              <div class="section_subtitle" style="color:black !important; font-size: 16px !important;">choose your payment plan</div>
              <div class="cart_positioning" style="display:inline-flex; margin-bottom: 30px;">
                <div class="button extra_1_button" onclick = "openDirect();"><a href="#">direct payment</a></div>&emsp;
                <div class="button extra_1_button" onclick = "openInstallment();" style="width:200px !important;"><a href="#">installment payment</a></div>
              </div>
            </center>
            <?php 
            $total = getParam();
            $interest = (0.05*$total);
            $wholepay = $total + $interest;
            $downpayment = $wholepay/2;
            $downpayment = (int)$downpayment;
            ?>


          <div id="direct">
            <div class="section_subtitle" style="color:black !important; font-size: 16px !important;">order summary</div>
            <br>
            <div class="section_subtitle">total to pay: <?php echo $total; ?></div>
            <br>
            <div class="section_subtitle" style="color:black !important; font-size: 16px !important;">payment</div>
            <br>
            <div class="section_subtitle" style="margin-bottom: 10px;">confirm mpesa no.</div>
            
              <form action="DirectPay.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="total-pay" value = "<?php echo getParam(); ?>">
              <input type="hidden" name="points" value = "<?php echo getParam2(); ?>">

              <input type="text" class="cart_coupon_input" name="number" placeholder="Enter phone number" required="required">
              <button type="submit" name="apply" class="button_clear cart_button_2">make payment</button>
              </form>
    
          </div>
          <div id="installment">
            <div class="section_subtitle" style="color:black !important; font-size: 16px !important;">order summary</div>
            <br>
            <div class="section_subtitle">total:<?php echo $total; ?></div>
            <div class="section_subtitle">interest:<?php echo $interest; ?></div>
            <div class="section_subtitle">whole payment:<?php echo $wholepay; ?></div>
            <div class="section_subtitle">downpayment:<?php echo $downpayment; ?></div>
            <br>
            <div class="section_subtitle" style="color:black !important; font-size: 16px !important;">payment</div>
            <div class="section_subtitle">Total to pay:<?php echo $downpayment; ?></div>
            <form action="Installments.php" method="POST" enctype="multipart/form-data">
            <div class="section_subtitle" id = "installment-div">Installments:<input type = "number" name = "installment" min = "1" max = "<?php echo $installment_number; ?>" value = "1" style="width:60px;" onkeypress="return false;"></div>
            <br>
             <div class="section_subtitle" style="margin-bottom: 10px;">confirm mpesa no.</div>
            
              
              <input type="text" class="cart_coupon_input" name="phone_number" placeholder="Enter phone number" required="required">
              <input type="hidden" name="total-pay" value = "<?php echo ((int)((1.1*getParam())/2)); ?>">
              <input type="hidden" name="points" value = "<?php echo getParam2(); ?>">
              <button type="submit" name="apply" class="button_clear cart_button_2">make payment</button>
              </form>
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

     
  <script>
    /*
    TODO:script to check if session exist
   */
    var sess = "<?php echo $sess; ?>";
    if (sess == "null") {
        // alert("null");
        document.getElementById('avatar').style.display = "none";
    } else {
        // alert("not null");
    }
  </script>
  <script >
      function openInstallment(){
        const installPay = document.getElementById('installment').style.display = "unset";
        const directPay = document.getElementById('direct').style.display = "none";
      }
      function openDirect(){
        const directPay = document.getElementById('direct').style.display = "unset";
        const installPay = document.getElementById('installment').style.display = "none";
      }
  </script>
 </body>
</html>