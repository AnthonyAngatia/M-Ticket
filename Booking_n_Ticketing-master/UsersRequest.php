<?php 
session_start();
require_once('require.php');
$userid = $_SESSION['user_id'];
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

        <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="css/cart.css">

    <!-- Load an icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">

  <title>Pay installments</title>
  <style>
      
    #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
    }

    </style>
</head>
  
<body>
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
            <div class="avatar"><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
              <img src="avatar.png" alt="">
            </div>

          </a>
      
        </div>  
      </div>
    </div>
  </header>
    <table id='customers'  style = "margin:auto;margin-top:9em;">
       <tr>
        <th>Name of Event</th>
        <th>Group Tickets</th>
        <th>Single Tickets</th>
        <th>TimeStamp</th>
        <th>Availability</th>
        <th>Cancel Request</th>
        <th>Buy ticket</th>
      </tr>
    <?php
    $sql = "SELECT * FROM request WHERE User_Id='$userid' AND Status = '1' OR Status = '2'";
    $requests =  getData($sql);
    foreach ($requests as $key => $value) { 
      $eventid = $value['Event_Id'];
      $status = $value['Status'];
      $sql = "SELECT Title FROM event WHERE Event_Id='$eventid'";
      $row = getData($sql);
      foreach ($row as $key => $value2) {
        $eventname = $value2['Title'];
        break;
      }
      $G_Quantity = $value['G_Ticket_Quantity'];
      $S_Quantity = $value['S_Ticket_Quantity'];
      ?>
      <tr>
      <td><?php echo $eventname; ?></td>
      <td><?php echo $value['G_Ticket_Quantity'];?></td>
      <td><?php echo $value['S_Ticket_Quantity'];?></td>
      <td><?php echo $value['TimeStamp'];?></td>
      <form action="" method="post">
      <?php if($status == 2)
      { ?>
      <td> <?php echo "available"; ?></td>
      <td><input id = 'delete' type = 'submit' name = 'cancel' value = 'Cancel'></td>
      <td><input id = 'buy' type = 'submit' name = 'Buy' value = 'Buy' style = "  "></td>
      <?php
       }
      elseif ($status == 0) 
      {?>
      <td><?php echo "Paid";?></td>
      <td><input id = 'delete' type = 'submit' name = 'cancel' value = 'Cancel'></td> <?php 
      }
      else{ 
        ?>
      <td><?php echo "Not Availbale";?>
      <td><input id = 'delete' type = 'submit' name = 'cancel' value = 'Cancel'></td> <?php 
       }?>
       </td>
      
      </form>
      </tr>
    <?php } ?>
    </table>
    </body>
    <script>
      var status = <?php echo $value['Status'];?>
      if (status == 2){
        document.getElementById('buy').style.display = "unset";
      }
      </script>
</html>
    <?PHP
    //*Cancel a request
    if(isset($_POST['cancel'])){
        $sql = "UPDATE request SET Status='3' WHERE User_Id='$userid' AND Event_Id = '$eventid'";
        // setData($sql);
        unset($_POST['cancel']);
    }
    if(isset($_POST['Buy'])){
        $sql = "SELECT * FROM event WHERE Event_Id='$eventid'";
        $row = getData($sql);
        foreach ($row as $key => $value) {
            $poster = $value['Poster'];
            $single_price =$value['Price'];
            $group_price = $value['Groupprice'];
        }
        $subtotal = (($single_price*$S_Quantity)+($group_price*$G_Quantity));
        unset($_SESSION['cart_tickets']);
        $_SESSION['cart_tickets'] = array();
        $ticket = array('id' => $eventid ,
        'squantity' => $S_Quantity,
        'gquantity' => $G_Quantity ,
        'subtotal_in_array' => $subtotal
        );
        array_push($_SESSION['cart_tickets'],$ticket);
        $_SESSION['request'] = 'paid';
        header("Location: cart.php");

    }




   
    ?>