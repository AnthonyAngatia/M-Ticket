<?php
require('require.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
echo "<pre>";
print_r($_POST);


  $title = $_POST["name"];
  $type = $_POST["type"];
  $category = $_POST["category"];
  $organizers = $_POST["organizer"];
  $location = $_POST["location"];
  $date1 = $_POST["date1"];
  $time1 = $_POST["time1"];
  $date2 = $_POST["date2"];
  $time2 = $_POST["time2"];
  $imgContent = $_FILES['imageupload']['name'];
  $desc1 = $_POST["description1"];
  $desc2 = $_POST["description2"];
  $ticket = $_POST["tname"];
  $singlequantity = $_POST["singlequantity"];
  $sprice = $_POST["price1"];
  $groupquantity = $_POST["groupquantity"];
  $groupnumber = $_POST["groupnumber"];
  $gprice = $_POST["price2"];
  $date3 = $_POST["1date"];
  $time3 = $_POST["1time"];
  $date4 = $_POST["2date"];
  $time4 = $_POST["2time"];

  
  $sql = "INSERT INTO `event` (`Title`,`Type`, `Category`, `Organizers`, `Location`, `Eventstart`, `StartTime1`,`Eventend`, `EndTime1`, `Poster`, `Description1`, `Description2`, `Tickname`,`Quantity`, `Price`, `GroupQuantity`, `Gquantity`, `Groupprice`, `Salestart`, `StartTime2`, `Saleend`, `EndTime2`) VALUES ('$title', '$type','$category', '$organizers', '$location', '$date1', '$time1', '$date2', '$time2', '$imgContent', '$desc1', '$desc2', '$ticket', '$singlequantity', '$sprice', '$groupquantity', '$groupnumber', '$gprice', '$date3', '$time3', '$date4', '$time4')";

connect();
upload($sql);

}