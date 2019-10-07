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
   
    <title>Browse</title>
    <style>
         p{
        font-family: 'Lucida', serif;
      
             }
      .card-deck{
        margin-left:20px;
        margin-right:20px;

      }
      .card-body{
        height:170px; 
      }
         #form1{
        width:400px;
        color:black;
        font-family: 'Lucida', serif;

    }
    .postnav{
        margin-top: 120px;
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
    </style>
    </head>
  <body>

      <header class="header" >
    <div class="header_inner d-flex flex-row align-items-center justify-content-start">
      <div class="logo"><a href="Homepage.php">M-ticket</a></div>
      <nav class="main_nav">
        <ul>
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
            
      
    </div>
  </header>

    <div class="postnav">
    <div class="section_title_container text-center">
    <div class="section_title">upcoming events</div>
    </div>
    <br>
    <center>
    <div id="form1">
    <form action="#">
        <input type="search" class="search_input menu_mm" required="required" placeholder="Enter event name*"aria-label="Search" >
        <button type="submit" class="newsletter_button" style="width: 80px !important; height: 42px !important;">search</button>
    </form>
  </div>
</center>
</div>
 
 
  <br>
  <br>
  <div class="dropdown" style="margin-left: 37px !important;">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter by</button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
<br>
   <div class="card-deck">
  <div class="card">
    <img src="poster6.jpg" class="card-img-top" height="320"  alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Summary Description.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img src="poster7.jpg" class="card-img-top" height="320" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Summary Description.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img src="poster9.jpg" class="card-img-top" height="320" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Summary Description.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>  
   <div class="card">
    <img src="poster3.jpg" class="card-img-top" height="320" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Summary Description.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  </div>
  <br>
  <div class="card-deck">
  <div class="card">
    <img src="poster6.jpg" class="card-img-top" height="320"  alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Summary Description.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img src="poster7.jpg" class="card-img-top" height="320" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Summary Description.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img src="poster9.jpg" class="card-img-top" height="320" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Summary Description.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>  
   <div class="card">
    <img src="poster3.jpg" class="card-img-top" height="320" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Summary Description.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  </div>
  <br>
  <div class="card-deck">
  <div class="card">
    <img src="poster6.jpg" class="card-img-top" height="320"  alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Summary Description.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img src="poster7.jpg" class="card-img-top" height="320" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Summary Description.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img src="poster9.jpg" class="card-img-top" height="320" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Summary Description.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>  
   <div class="card">
    <img src="poster3.jpg" class="card-img-top" height="320" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Summary Description.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  </div>
  <br>
  <div class="card-deck">
  <div class="card">
    <img src="poster6.jpg" class="card-img-top" height="320"  alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Summary Description.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img src="poster7.jpg" class="card-img-top" height="320" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Summary Description.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img src="poster9.jpg" class="card-img-top" height="320" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Summary Description.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>  
   <div class="card">
    <img src="poster3.jpg" class="card-img-top" height="320" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Summary Description.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  </div>
<div class="card-deck">
  <div class="card">
    <img src="poster6.jpg" class="card-img-top" height="320"  alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Summary Description.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img src="poster7.jpg" class="card-img-top" height="320" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Summary Description.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img src="poster9.jpg" class="card-img-top" height="320" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Summary Description.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>  
   <div class="card">
    <img src="poster3.jpg" class="card-img-top" height="320" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Summary Description.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  </div>
  <br>
  <br>


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