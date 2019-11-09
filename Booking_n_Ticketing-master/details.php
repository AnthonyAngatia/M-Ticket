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

require('require.php');
connect();

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
 $eventtitle=$value['Title'];
 $_SESSION['eventtitle']=$eventtitle;

 $eventtype=$value['Type'];
$category=$value['Category'];
$ticketname=$value['Tickname'];
$description_1=$value['Description1'];
$description_2=$value['Description2'];
$startdate=$value['Eventstart'];
$starttime=$value['StartTime1'];
$enddate=$value['Eventend'];
$endtime=$value['EndTime1'];
$location=$value['Location'];
$organizers=$value['Organizers'];
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

    <title>event details</title>
    <style>
    .eventdetail{
      margin-top: 130px;
      text-align: center;
      float:left;
      width:63%;
      padding-left: 2em;
      padding-right: 2em;
    }
    .update{
      border-left: 2px solid black;
      margin-top: 130px;
      text-align: center;
      float:right;
      width:37%;
    }
    .title{

       display:inline-block;
    }
    .eventposter{
      display:flex;
    }
    .poster {
        margin-top: 1em;
        z-index: 9;
        border: 2px solid black;
        height:300px;
        max-width: 450px;
    }
    .eventdetail p{
      font-family: timesnewroman;
      font-size: 20px;
      color:black;

    }
    .after{
      content: "";
      display: table;
      clear: both;
    } 
    .update_button
{
   margin-top: 25px;
  width: 142px;
  height: 46px;
  background: #937c6f;
  color: #FFFFFF;
  font-size: 12px;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  border: none;
  outline: none;
  cursor: pointer;
  -webkit-transition: all 200ms ease;
  -moz-transition: all 200ms ease;
  -ms-transition: all 200ms ease;
  -o-transition: all 200ms ease;
  transition: all 200ms ease;
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


            <div class="eventdetail">
                <div class="section_title_container text-center">
                <div class="section_title" style="font-size:30px !important;">event details</div>
                </div>
                <br>
            
                    <div class="section_subtitle">poster:</div>
                    <img class="poster" id="poster" src="<?php echo  $value['Poster'];?>" alt="poster"/>
                    <br>
                    <br>
                    <div class="title">
                    <div class="section_subtitle">Event Title:</div>
                    <p><?php echo  $eventtitle;?></p></div>
                    <br>
                    <div class="section_subtitle">event type:</div>
                    <p><?php echo $eventtype;?></p>
                    <div class="section_subtitle">event category:</div>
                    <p><?php echo $category;?></p>
                    <div class="section_subtitle">ticket name:</div>
                    <p><?php echo $ticketname;?></p>
                    <div class="section_subtitle">summary description:</div>
                    <p><?php echo $description_1;?></p>
                    <div class="section_subtitle">main description:</div>
                    <p><?php echo $description_2; ?></p>
                    <div class="section_subtitle">start date:</div>
                    <p><?php echo  $startdate;?></p>
                    <div class="section_subtitle">start time:</div>
                    <p><?php echo  $starttime;?></p>
                    <div class="section_subtitle">end date:</div>
                    <p> <?php echo  $enddate;?></p>
                    <div class="section_subtitle">end time:</div>
                    <p><?php echo  $endtime;?></p>
                    <div class="section_subtitle" >location:</div>
                    <p><?php echo  $location;?></p>
                    <div class="section_subtitle" >organizers:</div>
                    <p><?php echo  $organizers;?></p>

          </div>

              <div class="update">
                <div class="section_title_container text-center">
                <div class="section_title" style="font-size:30px !important;">update info.</div>
                </div>
                <br> 

                <form action="detailsposter.php" method="POST" enctype="multipart/form-data">
                    <div class="section_subtitle">poster:</div>
                    <br>  
                    <center>
                    <div class="form-group col-md-6">
                    <input type="file" name="imageupload" id="imageupload">
                    </div></center>
                    <button type="submit" class="update_button">update poster</button>
                </form>
                    <br>

                     <form action="details2.php" method="POST" enctype="multipart/form-data">
                     <div class="section_subtitle">Event Title:</div>
                   <br>
                   <center>
                   <div class="form-group col-md-6">
          <input type="text" class="form-control" name="name" style="color:grey !important;" value="<?php echo  $eventtitle;?>">
        </div></center>
                    <br>
                    <div class="section_subtitle">event type:</div>
                    <br>
                    <center>
                     <div class="form-group col-md-6">
          <select id="inputState" class="form-control" name="type" style="color:grey !important;">
            <option selected><?php echo  $eventtype;?></option>
            <option value="seminar">Seminar</option>
            <option value="conference">Conference</option>
            <option value="convention">Convention</option>
            <option value="concert">Concert</option>
            <option value="workshop">Workshop</option>
            <option value="gala">Gala</option>
            <option value="festival">Festival</option>
            <option value="other">Other</option>
          </select>
        </div></center>
                    <br>
                    <div class="section_subtitle">event category:</div>
                    <br>
                    <center>
                    <div class="form-group col-md-6">
          <select id="inputState" class="form-control" name="category" style="color:grey !important;">
            <option selected><?php echo  $category;?></option>
            <option value="music">Music</option>
            <option value="entertainment">Film, Media & Entertainment</option>
            <option value="visual">Performance & Visual Arts</option>
            <option value="communityculture">Community & Culture</option>
            <option value="Other">Other</option>
          </select>
        </div></center>
                    <br>
                    <div class="section_subtitle">ticket name:</div>
                    <br>
                    <center>
                    <div class="form-group col-md-6">
          <input type="text" class="form-control" name="tname" style="color:grey !important;" value="<?php echo  $ticketname;?>">
        </div></center>
                    <br>
                    <div class="section_subtitle">summary description:</div>
                    <br>
                    <div class="form-group col-md-6">
          <input type="text" class="form-control" name="description1" style="width:435px !important; color:grey !important;" value="<?php echo  $description_1;?>">
        </div>
                    <br>
                    <div class="section_subtitle">main description:</div>
                    <br>
                    <div class="form-group col-md-6">
          <input type="textarea" class="form-control" name="description2" style="height:150px !important; width: 435px !important; color:grey !important;" value="<?php echo  $description_2;?>">
        </div>
                    <br>
                    <div class="section_subtitle">start date:</div>
                    <br>
                    <center>
                    <div class="form-group col-md-6">
            <input type="date" class="form-control" name="date1" style="color:grey !important;" value="<?php echo  $startdate;?>">
          </div></center>
                    <br>
                    <div class="section_subtitle">start time:</div>
                    <br>
                    <center>
                    <div class="form-group col-md-6">
            <input type="time" class="form-control" name="time1" style="color:grey !important;" value="<?php echo  $starttime;?>">
          </div></center>
                    <br>
                    <div class="section_subtitle">end date:</div>
                    <br>
                    <center>
                    <div class="form-group col-md-6">
            <input type="date" class="form-control" name="date2" style="color:grey !important;" value="<?php echo  $enddate;?>">
          </div></center>
                    <br>
                    <div class="section_subtitle">end time:</div>
                    <center>
                    <div class="form-group col-md-6">
            <input type="time" class="form-control" name="time2" style="color:grey !important;" value="<?php echo  $endtime;?>">
          </div></center>
                    <br>
                    <div class="section_subtitle" >location:</div>
                    <br>
                    <center>
                    <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="location" style="color:grey !important;"value="<?php echo  $location;?>">
                    </div></center>
                    <br>
                    <div class="section_subtitle">organizers:</div>
                    <br>
                    <center>
                    <div class="form-group col-md-6">
          <input type="text" class="form-control" name="organizer" style="color:grey !important;" value="<?php echo  $organizers;?>">
        </div></center>

              <button type="submit" class="update_button">update details</button>
                </form>
              </div>
             


    <section class="after">
    </section>
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