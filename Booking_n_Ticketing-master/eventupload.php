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
   
    <title>Eventupload</title>
    <style>
    #top{
     min-height:550px;
      background:url(ticket.jpg) no-repeat 0-550px;
      background-position:center;
    }
    .section_title{
    font-family: 'Lucida', serif;
    font-size: 35px;
    text-transform: uppercase;
    color: #2f2f2f;
    margin-top: -4px;
        }
    .section_subtitle{
    font-size: 20px;
    font-weight: 600;
    color: #937c6f;
    text-transform: uppercase;
    letter-spacing: 0.1em;
        }
    p{
        font-family: 'Lucida', serif;
        color:black;
        font-size: 14px;

    }
    form{
        width:750px;
        color:black;
        font-family: 'Lucida', serif;

    }
    input{
        margin-left: 0px !important;
    }
    #basicinfo{
        padding:20px;
        border: 1px solid;
        margin:20px;
    }
    #details{
        padding:20px;
        border: 1px solid;
        margin:20px;
    }
    #tickets{
        padding:20px;
        border: 1px solid;
        margin:20px;
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
          <li><a href="#">browse events</a></li>
          
          <li><a href="#"></a></li>
        </ul>
      </nav>
      <div class="header_content ml-auto">
      </div>
       <!-- Avatar -->
        <a href="account.php" style="color:black;">
            <div class="avatar"><b><?php echo htmlspecialchars($_SESSION["username"]);?></b>
              <img src="avatar.png" alt="">
            </div>
       </a>
       &emsp;
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
    <div class="form-group col-md-6" >
      <select id="inputState" class="form-control" name="category" style="color:grey !important;">
        <option selected >Event Category</option>
        <option value="music">Music</option> 
        <option value="entertainment">Film,Media & Entertainment</option> 
        <option value="visual">Performance & Visual Arts</option> 
        <option value="culture">Community & Culture</option>
        <option value="Other">Other</option>
      </select> 
    </div>
    <div class="form-group col-md-6">
    <input type="text" class="form-control" name="organizer" placeholder="Organizers" >
  </div>

    <div class="section_subtitle">location</div>
    <p>Help people in the area discover your event and let attendees know where to show up</p>
     <div class="form-group col-md-6">
    <input type="text" class="form-control" name="location" placeholder="Location" >
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
    <input type="file" name="file" id="imageupload">
     </div>

    <div class="section_subtitle">summary description</div>
    <p>Add more details to your event like your schedule, sponsors, event poster/image etc.</p>
    <div class="form-group col-md-6">
    <input type="text" class="form-control" name="description1" placeholder="Enter a brief description for attendee traction." style="width:400px !important;" >
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
<br>
<br>
  <footer>
      <div id="footer2">
      <br>
      <p style="color:grey;">ABOUT US</p>
      <a href="" style="color:white"> Terms & Conditions</a><br>
      <a href="" style="color:white"> Privacy Policy</a><br>
      <a href="" style="color:white"> Support</a><br>
      </div>
      
      
      <div id="footer3">
      <br>
      <p style="color:grey;">CONNECT WITH US</p>
      <a href="https://www.twitter.com" style="color:white">Twitter</a><br>
      <a href="https://www.instagram.com" style="color:white">Instagram</a><br>
      <a href="https://www.facebook.com" style="color:white">Facebook</a><br>
      <a href="https://www.pinterest.com" style="color:white">Pinterest</a><br>
      <a href="https://www.googleplus.com" style="color:white">Google+</a><br>
      </div>
    

      <div id="footer4">
      <br>
      <p style="color:grey;">SERVICES</p>
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
    

