<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Ticket system">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
   
     <title>HomePage</title>
    <style>
      *{
        margin:0px;
      }
      body{
        
        color:black;
        background-color: #FFFFFF;
      }
       p{
        font-family: 'Lucida', serif;
      
      }
      /* .main_nav{
        margin-right: 225px;
      }*/
     
      .bd-example{
        margin-bottom: 60px !important;
        
      }

      .carousel-inner{
        height: 650px !important;
      }
     
      
      
      .dropdown {
        margin-left: 37px;
        position: relative;
        display: inline-block;

      }

      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 142px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
      }

      .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
      }

      .dropdown-content a:hover {background-color: #ddd;}

      .dropdown:hover .dropdown-content {display: block;}

      .dropdown:hover .dropbtn {background-color: #3e8e41;}
            
      .card-deck{
        margin-left:20px;
        margin-right:20px;
      }
      .buttonref {
        height:38px;
        padding-left:20px;
        padding-right:20px;
        border:1px solid;

      }
      .topic{
        text-align: center;
        font-size: 40px;
      }
      #float{
      margin-top:47px;
      margin-left:45px;
      margin-bottom: 50px;
      border:1px solid;
      float:left;
      width:56%;
      min-height:470px;
      background:url(ticket.jpg) no-repeat 0-470px;
      background-position:center;
    }
      #float1{
      margin-top:47px;
      margin-right:45px;
      margin-bottom: 50px;
      border:1px solid;
      color: black;
      background-color: white;
      float:right;
      width:33%;
      min-height: 470px;  
      text-align: center;
    }

       #after{
      content: "";
      display: table;
      clear: both;
    }
    .carousel-item{
      height:560px !important;
    }
    footer {
        text-align: center;
        color:white;
        background-color: black;
        height: 220px;
      }
    #footer2{
        float:left;
        width:20%;
        text-align:center;
        font-size:17px;
        
        }
    #footer3 {
        float: left;
        width:20%;
        text-align:center;
        font-size:17px;
        }
    #footer4 {
        float:left;
        width:20%;
        text-align:center;
        font-size:17px;
        }
    button {
    height:38px;
    padding-left:10px;
    padding-right:10px;
    border:1px solid;
    font-family:timesnewroman;
    }

    </style>
  </head>
  <body>
     
  <!-- Header -->

  <header class="header" >
    <div class="header_inner d-flex flex-row align-items-center justify-content-start">
      <div class="logo"><a href="Homepage.html">M-ticket</a></div>
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
            <div class="avatar"><b><?php echo htmlspecialchars($_SESSION["username"]);?></b>
              <img src="avatar.png" alt="">
            </div>
       </a>
       &emsp;
       
          <!-- Cart -->
          <a href="#">
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

      <div class="burger_container d-flex flex-column align-items-center justify-content-around menu_mm"><div></div><div></div><div></div></div>
  
    </div>
  </header>

  <!-- Menu -->

  <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
    <div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
    <div class="logo menu_mm"><a href="#">M-ticket</a></div>
    <div class="search">
              <form action="#">
                <input type="search" class="search_input menu_mm" required="required" placeholder="Event name*"aria-label="Search" >
                <button type="submit" class="newsletter_button" style="width: 80px !important; height: 42px !important;">search</button>
              </form>
    </div>
    <nav class="menu_nav">
      <ul class="menu_mm">
        <li class="menu_mm"><a href="userlogin.php">Log in</a></li>
        <li class="menu_mm"><a href="register.php">Register</a></li>
        <li class="menu_mm"><a href="browse.php">browse events</a></li> 
        <li class="menu_mm"><a href="logout.php">logout</a></li> 
      </ul>
    </nav>
  </div>

  <!-- Home -->

 <div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="festival1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        <center>
        <div class="button extra_1_button"><a   href="#">BUY TICKET</a></div>
        </center>
        </div>
      </div>
      <div class="carousel-item">
        <img src="event2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <center>
        <div class="button extra_1_button"><a href="#">BUY TICKET</a></div>
        </center>
        </div>
      </div>
      <div class="carousel-item">
        <img src="concert5.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        <center>
        <div class="button extra_1_button"><a href="#">BUY TICKET</a></div>
        </center>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


  <div class="row">
        <div class="col">
          <div class="section_title_container text-center">
            <div class="section_title">upcoming events</div>
          </div>
        </div>
  </div>
  <br>
  
  <div class="dropdown">
  <div class="button extra_1_button">FILTER BY</div>
  <div class="dropdown-content">
    <a href="#">All</a>
    <a href="#">Concerts</a>
    <a href="#">Festivals</a>
    <a href="#">Education</a>
    <a href="#">Art</a>
  </div>
  </div>
    <br>
    <br>
  
   <div class="card-deck">
  <div class="card">
    <img src="poster6.jpg" class="card-img-top" height="420"  alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img src="poster7.jpg" class="card-img-top" height="420" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img src="poster9.jpg" class="card-img-top" height="420" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>  
   <div class="card">
    <img src="poster3.jpg" class="card-img-top" height="420" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  </div>
  <br>
  <div class="card-deck">
   <div class="card">
    <img src="poster4.jpg" class="card-img-top" height="420" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
   <div class="card">
    <img src="poster5.png" class="card-img-top" height="420" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
    <div class="card">
    <img src="poster8.jpg" class="card-img-top" height="420" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
   <div class="card">
    <img src="poster10.jpg" class="card-img-top" height="420" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
</div>
    <br>
    <center>
      <div class="button extra_1_button" style="padding-right: 5px !important; padding-left: 5px !important; width: 150px !important;"><a href="index.html"> see more events </a></div>
    </center>
    <br>
    <br>

    <div id="float">
    </div>

    <div id="float1">
    <br>
   <div class="section_subtitle" style="font-size: 25px !important;">about m-ticket</div>
    <br>
     <p>
          M-ticket is a platform for live experiences that allows event organisers to create their events and avails tickets for those particular events to any interested parties. 
        </p>
    <br>
    </div>
    <br>

    <section id="after">
    </section>

    <div class="row">
        <div class="col">
          <div class="section_title_container text-center">
            <div class="section_subtitle">everything you need to know about</div>
            <div class="section_title">the deal</div>
          </div>
        </div>
      </div>
        <br>

      <div class="card-deck">
  <div class="card">
    <div class="card-body" style="text-align: center !important;">
      <h3 class="card-title">AWARD POINTS</h3>
       <img src="reward2.jpg" class="card-img-top" height="250" alt="...">
       <br><br>
       <h4 class="card-text">SHOP.EARN.REDEEM.</h4>
       <p class="card-text">Buy tickets. Earn points. Use points for discount.</p>
       <center>
        <div class="button extra_1_button"><a href="index.html">learn more</a></div>
        </center>
        <br>
    </div>
  </div>

  <div class="card">
    <div class="card-body" style="text-align: center !important;">
      <h3 class="card-title">INSTALLMENT PAYMENT</h3>
       <img src="wallet.jpg" class="card-img-top" height="250" alt="...">
       <br><br>
       <h4 class="card-text">PAY DOWNPAYMENT.PAY BALANCE.</h4>
       <p class="card-text">Are you broke? NO problem.</p>
      <center>
        <div class="button extra_1_button"><a href="index.html">learn more</a></div>
        </center>
        <br>
    </div>
  </div>

  <div class="card">
    <div class="card-body" style="text-align: center !important;">
      <h3 class="card-title">TICKET RETURN</h3>
      <img src="ticket2.jpg" class="card-img-top" height="250" alt="...">
      <br><br>
       <h4 class="card-text">RETURN TICKET.GET REFUND.</h4>
       <p class="card-text">Change of heart on event attendance?NO problem.</p>
      <center>
        <div class="button extra_1_button"><a href="index.html">learn more</a></div>
        </center>
        <br>
    </div>
  </div>
</div>
    <br>
    <br>

<div class="newsletter" style="margin-bottom: 20px;">
    <div class="newsletter_content">
      <div class="newsletter_image" style="background-image:url(firework2.jpg)"></div>
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="section_title_container text-center">
              <div class="section_subtitle">M-ticket</div>
              <div class="section_title">subscribe to our newsletter</div>
            </div>
          </div>
        </div>

        <div class="newsletter_text" style="text-align: center;">Sign up to get our newsletter for all the latest updates and details on upcoming events.</div>
        <div class="row newsletter_container">

          <div class="col-lg-10 offset-lg-1">
            <div class="newsletter_form_container">
              <form action="#">
                <input type="email" class="newsletter_input" required="required" placeholder="Enter your email here"> 
                <button type="submit" class="newsletter_button">subscribe</button>
              </form>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>

    <footer>
      <div id="footer2">
      <br>
      <p style="color:;">ABOUT US</p>
      <a href="" style="color:white"> Terms & Conditions</a><br>
      <a href="" style="color:white"> Privacy Policy</a><br>
      <a href="" style="color:white"> Support</a><br>
      </div>
      
      
      <div id="footer3">
      <br>
      <p style="color:;">CONNECT WITH US</p>
      <a href="https://www.twitter.com" style="color:white">Twitter</a><br>
      <a href="https://www.instagram.com" style="color:white">Instagram</a><br>
      <a href="https://www.facebook.com" style="color:white">Facebook</a><br>
      <a href="https://www.pinterest.com" style="color:white">Pinterest</a><br>
      <a href="https://www.googleplus.com" style="color:white">Google+</a><br>
      </div>
    

      <div id="footer4">
      <br>
      <p style="color:;">SERVICES</p>
      <a href="" style="color:white">Events</a><br>
      <a href="" style="color:white">Login</a><br>
      <a href="" style="color:white">Register</a><br>
      </div>
      <br>
    
    </footer>
        
   
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="plugins/colorbox/jquery.colorbox-min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  

  </body>
</html>