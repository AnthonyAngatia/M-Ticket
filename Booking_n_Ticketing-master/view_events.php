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

    <title>your events</title>
    <style>
       .postnav{
        margin-top: 125px;
    }

        .carddeck1 {
        margin-left: 20px;
        margin-right: 20px;
        color: black;
        display: grid;
        grid-column-gap: 1em;
        grid-row-gap: 2em;
        grid-template-columns: 1fr 1fr 1fr 1fr;

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
          <!-- <li><a href="browse.php">browse events</a></li> -->
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
    <div class="section_title">your events</div>
    </div>
    <br>  

<div class="carddeck1">
    <?php
 require('require.php');

  $sql = "SELECT User_Id  FROM user_table WHERE Username = '$sess'";

  $rowsData = getData($sql);
  foreach ($rowsData as $value) {
    $userid=$value ['User_Id'];
  }
    $sql=("SELECT Poster,Title,Event_Id FROM event WHERE User_Id ='$userid' ORDER BY Event_id DESC");
  $rowsData = getData($sql);
  foreach ($rowsData as $value) {
    ?>
       <div class="card">
                    <img src="<?php echo $value['Poster']; ?>" class="card-img-top" height="420" alt="...">
                    <div class="card-body">
                      <h5 style="color:black;" class="card-title"><?php echo $value['Title']; ?></h5>
                      <a href="details.php?w1=<?php echo $value['Event_Id']; ?>">View Details........</a><br>
                      <a href="Pie.html?w1=<?php echo $value['Event_Id']; ?>">View Stats</a>

                    </div>
            </div>

        <?php 
          } 
            ?>
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