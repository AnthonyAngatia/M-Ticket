<?php
session_start();
require_once('require.php');
$userid = $_SESSION['user_id'];
//*Get all installments made by user
$sql = "SELECT * FROM installment WHERE User_Id = '$userid' AND Status = 'Incomplete'";
$installment = getData($sql);
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
<div class="tbl"></div>
<table id='customers' style = "margin:auto;margin-top:9em;">
    <tr>
        <th>Name of Event</th>
        <th>Balance</th>
        <th>Next Installment Deadline</th>
        <th>Next Installment</th>
        <th>Amount Paid</th>
        <th>Make Payment</th>
    </tr>
<?php
//*Loop through to display data on a table
foreach ($installment as $key => $value) {
    // echo "<pre>";
    $event = $value['Event_Id'];
    //*Get details about the event whose info is being displayed
    $sql = "SELECT * FROM event WHERE Event_id = '$event'";
    $events_tbl = getData($sql);
    // echo "<pre>";
    foreach ($events_tbl as $key => $value2) {
        $event_name = $value2['Title'];
    }
    $totalpaid = $value['Total_Payable'] - $value['Balance'];
    $balance = $value['Balance'];
    $deadline = $value['Next_Installment'];
    $installment_amt = $value['Installment_amt'];
    ?>
    <tr>
      <td><?php echo $event_name; ?></td>
      <td><?php echo $balance; ?></td>
      <td><?php echo $deadline; ?></td>
      <td><?php echo $installment_amt;?></td>
      <td><?php echo $totalpaid;?></td>
      <form action="" method="post">
      <!-- <td><input id = 'delete' type = 'submit' name = 'cancel' value = 'Cancel'></td> -->
      <td><input id = 'buy' type = 'submit' name = 'Buy' value = 'Make Payment'></td>
      </form>
      </tr>
<?php
}
?>
    
</body>
</html>


<?php
 if(isset($_POST['Buy'])){
     $_SESSION['balance'] = $balance;
     $_SESSION['event'] = $event;
    header("Location: InstallmentCheckout.php");
    
}

?>