<?php
session_start();
require('require.php');
function getParam() {
 if (!isset($_GET["w1"])){
  echo "<script> alert('No param passed')</script>";
  }
  else{
    $param = $_GET["w1"];
   return $param;
  }
  }
  echo getParam();
  $param = getParam();
  $sql = "SELECT *  FROM event WHERE Event_id = ' $param' ";
 //print_r(getData($sql)) ;
 $rowData = getData($sql);
 foreach ($rowData as $value) {
 

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
    <title>Document</title>
  </head>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0px;
     /* border:1px solid aqua;*/
    }
    img {
      border: 1px solid tomato;
      margin: 0px;
    }
  li,
    a,
    button {
      font-family: verdana;
      color: aliceblue;
      text-decoration: none;

      margin: 5px;
    }
    
    header {
      border: 1px solid darkkhaki;
      display: flex;
      justify-content: flex-end;
      align-items: center;
      background-color: white;
    }
    .logo {
      cursor: pointer;
      margin-right: auto;
      height: 50px;
      width: auto;
    }

    .nav-links {
      list-style: none;
    }
    .nav-links li {
      display: inline-block;
      padding: 0px 5px;
    }
    .nav-links li a {
      transition: all 0.3s ease 0s;
    }
    .nav-links li a :hover {
      color: black;
    }
    .checkout-button {
      padding: 5px 25px;
      background-color: #937c6f;
      border: none;
      border-radius: 50px;
      cursor: pointer;
      transition: all 0.3s ease 0s;
    }
    .checkout-button:hover {
      background-color: black;
    }
  
    .login-signup {
      border-radius: 100px;
      height: 50px;
      cursor: pointer;
    }
    /*
    .poster-bg {
      height: 500px;
      width: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      filter: blur(8px);
      -webkit-filter: blur(8px);

    }
    */
   
    .event-poster {
      font-weight: bold;
      margin-top:7.5em;
      margin-left:12em;
     /*position: absolute;*/
     /* top: 51%;
      left: 50%;
     /* transform: translate(-50%, -50%);*/
      z-index: 9;
      width: 80%;
      display: flex;
      border:1px solid green;
    }
    .poster {
      border:1px solid red;
      height: 550px;
      max-height:550px;
      max-width:400px;
    }
    .poster-details {
      background-color: white;
      /*box-shadow:*/
      font-family: helvetica;
    }
    .poster-details h1,
    h4 {
      margin: 20px;
    }
    .poster-details p {
      margin: 20px;
      color: grey;
    }
    .get-ticket-heading {
     /* margin-top: 2em;*/
      text-align: center;
    }
    .get-ticket-container {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr 1fr;
      margin: 1em 5em;
      grid-auto-rows: minmax(50px, auto);
      grid-gap: 1px;
      font-size: 18px;
     
    }
    .get-ticket-container > div {
      background-color: #ddd;
      padding: 0em;
      text-align: center;
      
    }
    a {
      text-decoration: none;
      display: inline-block;
      padding: 2px 16px;
      cursor: pointer;
    }
    a:hover {
      /*background-color: #80868b;*/
      color: black;
    }

    .previous {
      background-color: #ddd;
      color: black;
    }

    .next {
      background-color: #ddd;
      color: black;
    }
    

    .checkout {
      text-align: center;
      font-size: 18px;
    }
    .similar-events-heading {
      margin-top: 2em;
      text-align: center;
    }
    .similar-events-container {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-auto-rows: minmax(300px, auto);
      margin: 1em;
      grid-gap: 1em;
    }
    .similar-events-container > div {
      background-color: #ddd;
      box-shadow: 0 8px 6px -6px black;
    }
  </style>
  <body>
    <header class="header">
      <div
        class="header_inner d-flex flex-row align-items-center justify-content-start"
      >
        <div class="logo"><a href="#">M-ticket</a></div>
        <nav class="main_nav">
          <ul>
            <li><a href="HomePage.php">home</a></li>
            <li><a href="#">events</a></li>
            <li><a href="#">about us</a></li>
            <li><a href="#">contact</a></li>
          </ul>
        </nav>
        <div class="header_content ml-auto">
          <div class="shopping">
            <!-- Cart -->
            <a href="#">
              <div class="cart">
                <img src="cart.png" width="30" height="30" alt="" />
                <div class="cart_num_container">
                  <div class="cart_num_inner">
                    <div class="cart_num">0</div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div
          class="burger_container d-flex flex-column align-items-center justify-content-around menu_mm"
        >
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
    </header>

    <!-- Menu -->

    <div
      class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400"
    >
      <div class="menu_close_container">
        <div class="menu_close">
          <div></div>
          <div></div>
        </div>
      </div>
      <div class="logo menu_mm"><a href="#">M-ticket</a></div>
      <div class="search">
        <form action="#">
          <input
            type="search"
            class="search_input menu_mm"
            required="required"
            placeholder="Event name*"
            aria-label="Search"
          />
          <button
            type="submit"
            class="newsletter_button"
            style="width: 80px !important;"
          >
            search
          </button>
        </form>
      </div>
      <nav class="menu_nav">
        <ul class="menu_mm">
          <li class="menu_mm"><a href="#">home</a></li>
          <li class="menu_mm"><a href="#">Sign in</a></li>
          <li class="menu_mm">
            <a href="#">
              <div class="avatar">
                account
                <img
                  src="/Booking_n_Ticketing-master/Assets/account1.png"
                  width="30"
                  height="30"
                  alt=""
                />
              </div>
            </a>
          </li>
          <li class="menu_mm"><a href="#">browse events</a></li>
        </ul>
      </nav>
    </div>
    
    <div class="event-poster">
      <img
        class="poster"
        src="<?php echo  $value['Poster'];  ?>"
        alt="poster"
       
      />

      <div class="poster-details">
        <h1><?php echo $value['Title'];?></h1>
        <h4>Description:</h4>
        <p>
        <?php echo $value['Description2'];} ?>
        </p>
        <h4>Date:</h4>
        <p>September 11th 2019</p>
        <h4>Location:</h4>
        <p>Nairobi</p>
        <p>Moi avenue</p>
        <p>XYZ Building 4th floor</p>
      </div>
    </div>
    <div class="get-ticket-heading">
      <h1>Get Ticket</h1>
    </div>
    <div class="get-ticket-container">
      <div class="container">
        <h4>Type</h4>
      </div>
      <div class="container">
      <h4>Price</h4>
      <!--  <button class="previous">&#8249;</button>
        <span><input type="number" name="quantity" min="1" max="5" value = "1" style = "padding-left:2em;"></span>
        <button class="next">&#8250;</button> -->
      </div>
      <div class="container">
      <h4>Quantity</h4>
      </div>
      <div class="container">
      <h4>Total Price</h4>
      </div>
      <div class="container">
      <H4>Single</H4>
      </div>
      <div class="container"></div>
      <div class="container"></div>
      <div class="container"></div>

      <div class="container">
      <h4>Advanced</h4></div>
      <div class="container"></div>
      <div class="container"></div>
      <div class="container"></div>
      
    </div>
    <div class="checkout">
      <button class="checkout-button">Checkout</button>
    </div>

    <div class="similar-events-heading">
      <h1>Similar events</h1>
    </div>
    <div class="similar-events-container">
      <div class="sec1"></div>
      <div class="sec2"></div>
      <div class="sec3"></div>
    </div>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="plugins/colorbox/jquery.colorbox-min.js"></script>
    <script src="js/custom.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
