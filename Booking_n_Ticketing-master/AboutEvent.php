<?php
session_start();
if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
  $sess = $_SESSION["username"];
 echo 'Set and not empty, and no undefined index error!';
}
else{
  $sess = "null";
   echo "empty";
} 
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
 $description = "descripton";
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
<script>
alert("check");
</script>
<style>
.event-poster {
    font-weight: bold;
    margin-top: 9em;
    margin-left: 9em;
    z-index: 9;
    width: 80%;
    display: flex;
    border: 2px solid black;
}

.poster {

    height: 550px;
    max-height: 550px;
    max-width: 450px;
}

.poster-details {
    background-color: white;
    font-family: helvetica;
}

.poster-details h1,
h4 {
    margin: 10px;
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

.get-ticket-container>div {
    background-color: #ddd;
    padding: 0em;
    text-align: center;

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

.similar-events-container>div {
    background-color: #ddd;
    box-shadow: 0 8px 6px -6px black;
}

#inputstyle-sq {
    margin-bottom: 10px;
    margin-top: 10px;
    text-align: center;
    border: none;
    background-color: #ddd;
}

#inputstyle-gq {
    margin-bottom: 10px;
    margin-top: 10px;
    text-align: center;
    border: none;
    background-color: #ddd;
}

#inputstyle-single {
    margin-top: 18px;
    text-align: center;
    border: none;
    background-color: #ddd;
}

#inputstyle-group {
    margin-top: 18px;
    text-align: center;
    border: none;
    background-color: #ddd;
}

#total-display-input {
    margin-bottom: 10px;
    text-align: center;
    border: none;
    background-color: #ddd;

}

#inputstyle-title {
    color: black;
    width: 95%;
    font-family: timesnewroman;
    border: none;
    background-color: white;
}
</style>

<body>

    <div class="super_container">

        <header class="header">
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
                        <a href="cart.php">
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
                    <div class="avatar" id="avatar">
                        <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
                        <img src="avatar.png" alt="">
                    </div>
                </a>
                <!-- &emsp; -->

            </div>
        </header>

        <form action="cart.php" method="POST" enctype="multipart/form-data">
            <!-- 
  <?php
      session_start();
      $image= $value['Poster'];
      $_SESSION['photo']=$image;
      ?> -->

            <div class="event-poster">
                <img class="poster" id="poster" src="<?php echo  $value['Poster'];?>" alt="poster" />

                <div class="poster-details">
                    <h1><input type="text" id="inputstyle-title" name="price" value="<?php echo  $value['Title']; ?>"
                            disabled="true"></h1>

                    <h4>Description:</h4>
                    <p id="description">
                        <?php 
        $description = $value['Description2'];
        echo substr($value['Description2'],0,200);} ?>

                    </p>
                    <a id="see-more" onclick="seeMore()" style="cursor:pointer; margin-left: 1em;">See
                        more</a>
                    <a id="close" onclick="closeFunc()"
                        style="display:none; cursor:pointer; margin-left: 1em;">Close</a>
                    <script>
                    function seeMore() {
                        document.getElementById('poster').style.display = "none";
                        const description = document.getElementById('description');
                        description.textContent = "<?php echo $description ?>";
                        document.getElementById('close').style.display = "unset";
                        document.getElementById('see-more').style.display = "none";


                    }

                    function closeFunc() {
                        document.getElementById('poster').style.display = "unset";
                        const description = document.getElementById('description');
                        description.textContent = "<?php  echo substr($value['Description2'],0,200); ?>";
                        document.getElementById('close').style.display = "none";
                        document.getElementById('see-more').style.display = "unset";

                    }
                    </script>
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



                <div class="container" id="single-price">
                    <input type="text" id="inputstyle-single" name="price" value="<?php echo  $value['Price']; ?>"
                        disabled="true">
                </div>
                <div class="container">
                    <input type="number" name="input-single-price" id="inputstyle-sq" value="0"
                        onchange="getSinglePrice();totalPay();" min="0" max="5" style="width:60px; height:40px;">
                </div>
                <div class="container" id="single-display"></div>

                <div class="container">
                    <h4>Group Ticket</h4>
                </div>
                <!--!We need to adjust our DB FOR GROUP-Ticket price-->
                <div class="container" id="group-price">
                    <input type="text" id="inputstyle-group" name="price" value="<?php echo  $value['Price']; ?>"
                        disabled="true">
                </div>
                <div class="container">
                    <input type="number" name="group-price-input" id="inputstyle-gq" value="0"
                        onchange="getGroupPrice();totalPay();" min="0" max="5" style="width:60px; height:40px;">
                </div>
                <div class="container" id="group-display"></div>
            </div>



            <div class="get-ticket-container">
                <div class="subtotal-box" style="background-color:white"></div>
                <div class="subtotal-box" style="background-color:white"></div>
                <div class="subtotal-box" style="background-color:white"></div>
                <div class="subtotal-box">
                    <h4>Total to Pay</h4>
                    <input type="text" id="total-display-input" name="price" value="" disabled="true">

                </div>
            </div>
            <script>

            </script>
            <center>
                <button class="button extra_1_button" type="submit" name="add" value='.$description.'><a href="#">add to
                        cart</a></button>
            </center>



            <div class="section_title" style="text-align:center !important; margin-top: 40px !important; ">similar
                events</div>
            <div class="similar-events-container">
                <div class="sec1"></div>
                <div class="sec2"></div>
                <div class="sec3"></div>
            </div>
            <center>
                <div class="button extra_1_button"><a href="#">see more</a></div>
            </center>
        </form>


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
                        <div class="copyright">Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                            </script> All rights reserved</div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
    function getSinglePrice() {
        const price = document.getElementById('inputstyle-single').getAttribute('value');
        const quantity = document.getElementById('inputstyle-sq').value;
        if (quantity < 0) {
            alert('Invalid input');
        } else {
            var totalPriceSingle = price * quantity;
            const totalPriceDisplay = document.getElementById('single-display');
            totalPriceDisplay.textContent = totalPriceSingle;
        }
        return totalPriceSingle;
    }

    function getGroupPrice() {
        const price = document.getElementById('inputstyle-group').getAttribute('value');
        const quantity = document.getElementById('inputstyle-gq').value;
        if (quantity < 0) {
            alert('Invalid input');
        } else {
            var totalPriceGroup = price * quantity;
            const totalPriceDisplay = document.getElementById('group-display');
            totalPriceDisplay.textContent = totalPriceGroup;
        }
        return totalPriceGroup;
    }

    function totalPay() {
        const single = getSinglePrice();
        const group = getGroupPrice();
        const totalPay = single + group;
        document.getElementById('total-display-input').setAttribute('value', totalPay);
    }
    getSinglePrice();
    getGroupPrice();
    </script>
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