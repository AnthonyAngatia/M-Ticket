<?php
session_start();
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
        grid-template-columns: 2.5fr 1fr 1fr 1fr 1fr;
        text-align: center;
      }
      .cart {
        display: grid;
        grid-template-columns: 2.5fr 1fr 1fr 1fr 1fr;
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
      .price{
          padding-top: 5em;
      }
      a {
      text-decoration: none;
      display: inline-block;
      padding: 2px 16px;
      
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
          
        </ul>
      </nav>    
      <div class="header_content ml-auto">
        <div class="shopping">
          <a href="account.php" style="color:black;">
            <div class="avatar"><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
              <img src="avatar.png" alt="">
            </div>
            
               <!-- session -->
            <script>
              if ('<%=Session["username"] == null%>') {
                //alert('null session');
               // document.querySelector('.avatar').style.display = 'none';
              } else {
                //alert('Session found');
              }
            </script>

          </a>
      
        </div>
      </div>
    </div>
  </header>


   <div class="whole-cart">
      <div class="headings">
        <div class="section_subtitle" style="font-size: 25px !important;">ticket</div>
        <div class="section_subtitle" style="font-size: 25px !important;">quantity</div>
        <div class="section_subtitle" style="font-size: 25px !important;">price</div>
        <div class="section_subtitle" style="font-size: 25px !important;">total</div>
        
      </div>
      <div class="cart">
        <div class="item">
       
          
        </div>
        <div class="quantity">
               
        
        </div>
        <div class="price">
        
        </div>
        <div class="totalprice">
          
        </div>
        <div class="remove">
          <button>Remove</button>
        </div>
 
    </div>
  </div>

            <center>
            <div class="cart_positioning" style="display:inline-flex; ">
             <div class="button extra_1_button"><a href="cart.php">clear cart</a></div>&emsp;
             <div class="button extra_1_button" style="width:200px !important;"><a href="browse.php">continue shopping</a></div>
              </div>
            </center>
    

<div class="cart_container" style="padding-top: 25px !important;
  padding-bottom: 20px !important;">
<div class="container">
   
    <div class="row cart_extra">
              <!-- Cart Coupon -->
        <div class="col-lg-6" style="">
          <div class="cart_coupon">
            <div class="cart_title">award points code</div>
            <form action="#" class="cart_coupon_form d-flex flex-row align-items-start justify-content-start" id="cart_coupon_form">
              <input type="text" class="cart_coupon_input" placeholder="Award points code" required="required">
              <button class="button_clear cart_button_2">apply code</button>
            </form>
          </div>
        </div>
        <br>
        <br>
        <!-- Cart Total -->
        <div class="col-lg-5 offset-lg-1">
          <div class="cart_total">
            <div class="cart_title">cart total</div>
            <ul>
              <li class="d-flex flex-row align-items-center justify-content-start">
                <div class="cart_total_title">Subtotal</div>
                <div class="cart_total_price ml-auto">3500.00</div>
              </li>
              <li class="d-flex flex-row align-items-center justify-content-start">
                <div class="cart_total_title">Discount (code)</div> 
                <div class="cart_total_price ml-auto">500.00</div>
              </li>
              <li class="d-flex flex-row align-items-center justify-content-start">
                <div class="cart_total_title">Total</div>
                <div class="cart_total_price ml-auto">3000.00</div>
              </li>
            </ul>
            <button class="cart_total_button"><a href="checkout.php" style="color:black;">proceed to checkout</a></button>
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

 </body>
</html>