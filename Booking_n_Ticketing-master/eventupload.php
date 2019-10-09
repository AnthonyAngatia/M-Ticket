<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->  
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="css/mticket.css">

    <!-- Load an icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">

  <title>Eventupload</title>
  <style>
    #top {
      min-height: 550px;
      background: url(ticket.jpg) no-repeat 0-550px;
      background-position: center;
    }

    p {
      font-family: 'Lucida', serif;
      color: black;
      font-size: 14px;

    }

    form {
      width: 750px;
      color: black;
      font-family: 'Lucida', serif;

    }

    input {
      margin-left: 0px !important;
    }

    #basicinfo {
      padding: 20px;
      border: 1px solid;
      margin: 20px;
    }

    #details {
      padding: 20px;
      border: 1px solid;
      margin: 20px;
    }

    #tickets {
      padding: 20px;
      border: 1px solid;
      margin: 20px;
    }
  </style>
</head>

<body>

<div class="super_container">

  <header class="header">
    <div class="header_inner d-flex flex-row align-items-center justify-content-start">
      <div class="logo"><a href="Homepage.php">M-ticket</a></div>
      <nav class="main_nav">
        <ul>
          <li><a href="#">browse events</a></li>
          <li><a href="#"></a></li>
        </ul>
      </nav>
      <div class="header_content ml-auto">
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
    </div>
  </header>
  <br>

  <div id="top">
  </div>
  <br>
  <center>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
      <div id="basicinfo">
        <div class="section_title">basic info</div>
        <div class="section_subtitle">basic info</div>
        <p>Fill in the basic info regarding your event and highlight why event-goers should turn up for it.</p>
        <div class="form-group col-md-6">
          <input type="text" class="form-control" name="name" placeholder="Event Title">
        </div>
        <div class="form-group col-md-6">
          <select id="inputState" class="form-control" name="type" style="color:grey !important;">
            <option selected>Event Type</option>
            <option value="seminar">Seminar</option>
            <option value="conference">Conference</option>
            <option value="convention">Convention</option>
            <option value="concert">Concert</option>
            <option value="workshop">Workshop</option>
            <option value="gala">Gala</option>
            <option value="festival">Festival</option>
            <option value="other">Other</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <select id="inputState" class="form-control" name="category" style="color:grey !important;">
            <option selected>Event Category</option>
            <option value="music">Music</option>
            <option value="entertainment">Film,Media & Entertainment</option>
            <option value="visual">Performance & Visual Arts</option>
            <option value="culture">Community & Culture</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <input type="text" class="form-control" name="organizer" placeholder="Organizers">
        </div>

        <div class="section_subtitle">location</div>
        <p>Help people in the area discover your event and let attendees know where to show up</p>
        <div class="form-group col-md-6">
          <input type="text" class="form-control" name="location" placeholder="Location">
        </div>
        <div class="section_subtitle">date and time</div>
        <p>Tell event-goers when your event starts and ends so they can make plans to attend.</p>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Event Starts</label>
            <input type="date" class="form-control" name="date1" style="color:grey !important;">
          </div>
          <div class="form-group col-md-6">
            <label for="username">Start Time</label>
            <input type="time" class="form-control" name="time1" style="color:grey !important;">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Event Ends</label>
            <input type="date" class="form-control" name="date2" style="color:grey !important;">
          </div>
          <div class="form-group col-md-6">
            <label for="username">End Time</label>
            <input type="time" class="form-control" name="time2" style="color:grey !important;">
          </div>
        </div>
      </div>


      <div id="details">
        <div class="section_title">details</div>
        <div class="section_subtitle">poster</div>
        <p>This is the image that the attendees will see when they search for the event.</p>
        <h4>UPLOAD IMAGE</h4>
        <div class="form-group col-md-6">
          <input type="file" name="imageupload" id="imageupload">
        </div>

        <div class="section_subtitle">summary description</div>
        <p>Add more details to your event like your schedule, sponsors, event poster/image etc.</p>
        <div class="form-group col-md-6">
          <input type="text" class="form-control" name="description1" placeholder="Enter a brief description for attendee traction." style="width:400px !important;">
        </div>
        <div class="section_subtitle">main description</div>
        <p>Add more details to your event like your schedule, sponsors, event poster/image etc.</p>
        <div class="form-group col-md-6">
          <input type="textarea" class="form-control" name="description2" placeholder="Enter a comprehensive description of the event." style="height:150px !important; width:400px !important;">
        </div>
      </div>

      <div id="tickets">
        <div class="section_title">tickets</div>
        <p>Create your ticket and fill the details regarding the tickets</p>

        <div class="form-group col-md-6">
          <input type="text" class="form-control" name="tname" placeholder="Ticket Name">
        </div>
        <div class="form-group col-md-6">
          <input type="number" class="form-control" name="quantity" placeholder="Quantity (Total  tickets)">
        </div>
        <div class="form-group col-md-6">
          <input type="number" class="form-control" name="price" placeholder="Price">
        </div>
        <div class="form-group col-md-6">
          <input type="number" class="form-control" name="group" placeholder="Group Ticket quantity">
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Sales Start</label>
            <input type="date" class="form-control" name="1date" style="color:grey !important;">
          </div>
          <div class="form-group col-md-6">
            <label for="username">Start Time</label>
            <input type="time" class="form-control" name="1time" style="color:grey !important;">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Sales End</label>
            <input type="date" class="form-control" name="2date" style="color:grey !important;">
          </div>
          <div class="form-group col-md-6">
            <label for="username">End Time</label>
            <input type="time" class="form-control" name="2time" style="color:grey !important;">
          </div>
        </div>

      </div>

      <button type="submit" name="cancel" class="btn btn-primary"><a href="HomePage.php"></a>Discard</button>
      <button type="submit" name="submit" class="btn btn-primary">Save</button>

    </form>
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

</body>

</html>