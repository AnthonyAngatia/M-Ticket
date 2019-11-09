<?php
session_start();
$event = $_SESSION["eventtitle"];

require('require.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
// echo "<pre>";
// print_r($_POST);


  $title = $_POST["name"];
  $type = $_POST["type"];
  $category = $_POST["category"];
  $organizers = $_POST["organizer"];
  $location = $_POST["location"];
  $date1 = $_POST["date1"];
  $time1 = $_POST["time1"];
  $date2 = $_POST["date2"];
  $time2 = $_POST["time2"];
  $desc1 = $_POST["description1"];
  $desc2 = $_POST["description2"];
  $ticket = $_POST["tname"];


$sql="UPDATE event
SET Title = '$title', Type= '$type', Category = '$category', Organizers= '$organizers', Location = '$location', Eventstart= '$date1', StartTime1 = '$time1', Eventend = '$date2', EndTime1= '$time2', Description1= '$desc1', Description2 = '$desc2', Tickname= '$ticket'
WHERE Title = '$event'";

connect();
$link=connect();
$result=mysqli_query($link,$sql);
        if ($result) {
         header("Location: view_events.php");
        }
// echo "<script>alert('Ticket returned successfuly')</script>";
}
?>
