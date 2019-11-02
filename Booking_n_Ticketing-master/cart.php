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
  if(isset($_POST["submit"])) {
    // print_r($_POST);
    $title = ($_POST['ticket']);
    $_SESSION['ticketname']=$title;//!We might need to use id instead of title
    //*Fetching details about an event
    $sql=("SELECT * FROM event WHERE Title ='$title'");
    $link=connect();
    $result=mysqli_query($link,$sql);
    while ($row = $result->fetch_assoc()){
      $poster=$row['Poster'];
      $id=$row['Event_Id'];
    }
    //End of fetching
    $singleticket = ($_POST['sprice']);
    $singlequantity = ($_POST['squantity']);
    $groupticket = ($_POST['gprice']);
    $groupquantity = ($_POST['gquantity']);
    $subtotal = (($singleticket*$singlequantity)+($groupticket*$groupquantity));//*Not working well Maybe we need to store in an array and then calculate the subtotal

    if (!isset($_SESSION['cart_tickets'])) {
      $_SESSION['cart_tickets'] = array();
    }
    $ticket = array('id' => $id,
                    'squantity' => $_POST['squantity'],
                    'gquantity' => $_POST['gquantity'],
                    'subtotal_in_array' => $subtotal
                    );
    foreach ($_SESSION['cart_tickets'] as $key => $value) {
      if (  $value['id'] == $id) {
        header( 'Location: Homepage.php');//Return to homepage if the value has been selectedted
        exit();
      }
    }
    array_push($_SESSION['cart_tickets'],$ticket);
  }
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

  <title>Cart</title>
  <style>
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
            <div class="avatar"><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
              <img src="avatar.png" alt="">
            </div>

          </a>
      
        </div>  
      </div>
    </div>
  </header>



  <div class="whole-cart">
    <div class="headings">
      <div class="section_subtitle" style="font-size: 25px !important;">ticket</div>
      <div class="section_subtitle" style="font-size: 25px !important;">Type</div>
      <div class="section_subtitle" style="font-size: 25px !important;">quantity</div>
      <div class="section_subtitle" style="font-size: 25px !important;">price</div>
      <div class="section_subtitle" style="font-size: 25px !important;">total</div>
        
    </div>
    <?php 
      if (  isset( $_SESSION['cart_tickets']) ) {
      $link=connect();
      foreach ($_SESSION['cart_tickets'] as $key => $value) {
        // print_r($_SESSION['cart_tickets']);
        $eid = $value['id'];
        $sql=("SELECT * FROM event WHERE Event_Id ='$eid'");
        $result=mysqli_query($link,$sql);
        $row = $result->fetch_assoc();//getting all columns about an event
    ?>
    <div class="cart" style="margin: 10px">  

      <div class="item">
          <h5><?php echo($row['Title']); ?></h5>
          <img src= "<?php echo $row['Poster']?>" alt="test"/>
      </div>

      <div class="type">
        <div style="height:99px; padding-top: 40px; border-bottom: 1px solid;">
          <h5>Single</h5>
        </div>
        <div style="height:99px; padding-top: 40px; border-top: 1px solid;">
          <h5>Group</h5>
        </div>   
      </div>

      <div class="quantity">
        <div style="height:99px; padding-top: 40px; border-bottom: 1px solid;">
          <h5><?php echo($value['squantity']);; ?></h5>
        </div>
        <div style="height:99px; padding-top: 40px; border-top: 1px solid;">
          <h5><?php  echo  (isset($value['gquantity'])) ? $value['gquantity'] : 0 ; ?></h5>
        </div>
      </div>

      <div class="price">
          <div style="height:99px; padding-top: 40px; border-bottom: 1px solid;">
           <h5><?php echo($row['Price']);; ?></h5>
          </div>
            <div style="height:99px; padding-top: 40px; border-top: 1px solid;">
            <h5><?php echo($row['Groupprice']);; ?></h5>
           </div>  
      </div>

      <div class="totalprice" style="padding-top: 90px;">
          <h5><?php echo $value['subtotal_in_array'];?></h5>
      </div>
      <div class="remove">
        <button><a href="remove_item.php?key=<?php  echo $key ?>" style="color:white;">Remove</a></button>
        <!-- <p><?php  //echo $key ?></p>*For degbugging -->
      </div>
    </div>

    <?php  
      } } ?>
      <center>
        <div class="cart_positioning" style="display:inline-flex; ">
          <div class="button extra_1_button"><a href="clear_cart.php">clear cart</a></div>&emsp;
          <div class="button extra_1_button" style="width:200px !important;"><a href="browse.php">continue shopping</a></div>
        </div>
      </center>

          <?php
              $sql=("SELECT Points FROM user_table WHERE Username ='$sess'");
              $link=connect();
              $result=mysqli_query($link,$sql);
              $points =0;

              while ($row = $result->fetch_assoc()){
              $points=$row['Points'];
            }
            ?>

      <div class="cart_container" style="padding-top: 25px !important;padding-bottom: 20px !important;">
        <div class="container">
          <div class="row cart_extra">
              <!-- Cart Coupon -->
            <div class="col-lg-6" style="">
              <div class="cart_coupon">
                <div class="cart_title">reward points</div>
                <div class="cart_coupon_form d-flex flex-row align-items-start justify-content-start" id="cart_coupon_form">
                  <input type="text" class="cart_coupon_input" value="<?php echo($points);?>"disabled>
                  <input type="number" id = "coupon_input" class="cart_coupon_input" name="points" placeholder="Enter points for discount" required="required" min = "0" max = "<?php echo($points);?>" onkeypress = "false" style="width:350px !important;">
                  <button name="apply" class="button_clear cart_button_2" onclick = "discountCalculation()">apply</button>
                  </div>
              </div>
            </div>
            <br>
            <br>

            <?php
            $subtotal = 0;
            foreach ($_SESSION['cart_tickets'] as $key => $ticket) {
              $subtotal = $subtotal + $ticket['subtotal_in_array'];
            }
             ?>
              <!-- Cart Total -->
            <div class="col-lg-5 offset-lg-1">
              <div class="cart_total">
                <div class="cart_title">cart total</div>
                <ul>
                  <li class="d-flex flex-row align-items-center justify-content-start">
                    <div class="cart_total_title">Subtotal</div>
                    <div id = "subtotal" class="cart_total_price ml-auto" data-value = <?php echo($subtotal);?> ><?php echo($subtotal);?></div>
                  </li>
                  <li class="d-flex flex-row align-items-center justify-content-start">
                    <div class="cart_total_title">Discount</div> 
                    <div id = "discount_display" class="cart_total_price ml-auto"><?php //echo($discount);?></div>
                  </li>
                  <li class="d-flex flex-row align-items-center justify-content-start">
                    <div class="cart_total_title">Total</div>
                    <div id = "total" class="cart_total_price ml-auto"><?php //echo($total);?></div>
                  </li>
                </ul>
                <a id = "redirect" data-value ="checkout.php"style="color:black;"><button class="cart_total_button" onclick = "redirection();">proceed to checkout</button></a>
              </div>
            </div>
          </div>
        </div>
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
    var totDisplay = document.getElementById('total').textContent = "<?php echo($subtotal);?>";//Total display
             function discountCalculation(){
              const subtotal =document.getElementById('subtotal').getAttribute('data-value');
              const discount = document.getElementById('coupon_input').value;
              document.getElementById('discount_display').textContent = discount*100;
              var total = subtotal - (discount*100);
              document.getElementById('total').textContent = total;//Total display
              // alert(total);
              totDisplay = total;
              // alert(url+"?w1="+total);
             }
            //  alert(totDisplay);
             function redirection(){
              window.location.href = "http://localhost/M-Ticket/Booking_n_Ticketing-master/checkout.php?w1="+totDisplay;
             }

             </script>

 </body>
</html>
