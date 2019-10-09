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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- Bootstrap CSS -->  
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="css/mticket.css">

    <!-- Load an icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">
    <title>Event</title>
  </head>
  <style>
   
    .event-poster {
      font-weight: bold;
      margin-top:9em;
      margin-left:9em;
      z-index: 9;
      width: 80%;
      display: flex;
      border:2px solid black;
    }
    .poster {
      
      height: 550px;
      max-height:550px;
      max-width:450px;
    }
    .poster-details {
      background-color: white;
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
    .container1{
      margin-left:30%;
    }
    .container2{
      margin-right:30%;
    }
    .container3{
      margin-left:30%;
    }
    .container4{
      margin-right:30%;
    }
  

    .previous {
      background-color: #ddd;
      color: black;
    }

    .next {
      background-color: #ddd;
      color: black;
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
   
<div class="super_container">

      <header class="header" >
    <div class="header_inner d-flex flex-row align-items-center justify-content-start">
      <div class="logo"><a href="Homepage.php">M-ticket</a></div>
      <nav class="main_nav">
        <ul>
          <li><a href="browse.php">browse events</a></li>
          <li><a href="#">about us</a></li>
          <li><a href="#">contact</a></li>
        </ul>
      </nav>
      <div class="header_content ml-auto">
        <div class="shopping">
          <!-- Cart -->
          <a href="#">
            <div class="cart">
              <img src="cart3.png" width="30" height="30" alt="">
              <div class="cart_num_container">
                <div class="cart_num_inner">
                  <div class="cart_num">0</div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
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
          &emsp;

    </div>
  </header>
    
    <div class="event-poster">
      <img
        class="poster"
        src="<?php echo  $value['Poster']; ?>"
        alt="poster"
       
      />

      <div class="poster-details">
        <h1> <?php echo $value['Title'];?></h1>
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
    <br>
    <center>
     <div class="section_subtitle" style="font-size: 25px !important;">buy ticket</div>
   </center>
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
      <h4>Single</h4>
      </div>
      <div class="container"><?php echo  $value['Price']; ?></div>
      <div class="container"></div>
      <div class="container"></div>

      <div class="container">
      <h4>Advanced</h4></div>
      <div class="container"></div>
      <div class="container"></div>
      <div class="container"></div>
    </div>
    <center>
   <div class="button extra_1_button"><a href="#">add to cart</a></div>
 </center>

   <div class="section_title" style="text-align:center !important; margin-top: 40px !important; ">similar events</div>
    <div class="similar-events-container">
      <div class="sec1"></div>
      <div class="sec2"></div>
      <div class="sec3"></div>
    </div>
  <center>
   <div class="button extra_1_button"><a href="#">see more</a></div>
 </center>


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
