<?php
session_start();
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
    <title>Success</title>
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
                <img src="cart3.png" width="27" height="27" alt="" />
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
      <h2> Waiting Request Set </h2>
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
