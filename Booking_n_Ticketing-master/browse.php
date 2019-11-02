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

    <!-- Load an icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">

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
        .carddeck1 {
        margin-left: 20px;
        margin-right: 20px;
        color: black;
        display: grid;
        grid-column-gap: 1em;
        grid-row-gap: 5em;
        grid-template-columns: 1fr 1fr 1fr 1fr;
    }
    .filterby{
      margin-left: 20px;
      display: flex;
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
          <li><a href="eventupload.php">create event</a></li>
          <li><a href="return.php">return ticket</a></li>
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
         
          <!-- Cart -->
          <a href="cart.php">
            <div class="cart">
              <img src="cart3.png" width="30" height="30" alt="">
              <div class="cart_num_container">
                <div class="cart_num_inner">
                  <div class="cart_num"><?php 
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


  <form name="filter" class="filterby" method="POST" action="browse.php">
  
<div class="section_subtitle" style="font-size:15px !important; margin-top: 8px !important;">filter by</div>
 <div class="form-group col-md-6">
          <select id="inputState" class="form-control" name="category" style="color:grey !important; width:220px !important; font-size: 15px !important;">
            <option value="music" href="browse.php?category=all" >All</option>
            <option value="music" href="browse.php?category=music">Music</option>
            <option value="entertainment" href="browse.php?category=film,media & entertainment">Film,Media & Entertainment</option>
            <option value="visual" href="browse.php?category=performance & visual arts">Performance & Visual Arts</option>
            <option value="culture" href="browse.php?category=community & culture">Community & Culture</option>
            <option value="Other" href="browse.php?category=other">Other</option>
          </select>
        </div>
</form>

<br>
        <div class="carddeck1">
            <!--!PHP funtion to retrieve info to the database and redirect-->
            <?php
    require('require.php');


    $sql = "SELECT Poster, Title, Description1, Event_id  FROM event ORDER BY Event_id DESC";
    if (isset($_GET['category'])) {
      
      $sql = "SELECT Poster, Title, Description1, Event_id  FROM event WHERE category='".$_GET['category']."'  ORDER BY Event_id DESC";
      
    }
     $rowsData = getData($sql);
    foreach ($rowsData as $value) {
      ?>

            <div class="card">
                <a href="AboutEvent.php?w1=<?php echo $value['Event_id']; ?>">
                    <img src="<?php echo $value['Poster']; ?>" class="card-img-top" height="420" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $value['Title']; ?></h5>
                        <p class="card-text"><?php echo $value['Description1']; ?></p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </a>

            </div>
            <?php } ?>

        </div>
  <br>
  <br>

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
 </body>
</html>