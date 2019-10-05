<?php
require('require.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
  // $filetype = $_FILES['imageupload']['type'];
  $filepath =  $imgContent; 
  // $sql = "INSERT INTO food(name,image,price)
  // VALUES('$type','$filepath','$price')";



  $desc1 = $_POST["description1"];
  $desc2 = $_POST["description2"];
  $ticket = $_POST["tname"];
  $quantity = $_POST["quantity"];
  $price = $_POST["price"];
  $groupquantity = $_POST["group"];
  $date3 = $_POST["1date"];
  $time3 = $_POST["1time"];
  $date4 = $_POST["2date"];
  $time4 = $_POST["2time"];
  
  $sql = "INSERT INTO `event` (`Title`,`Type`, `Category`, `Organizers`, `Location`, `Eventstart`, `StartTime1`,`Eventend`, `EndTime1`, `Poster`, `Description1`, `Description2`, `Tickname`,`Quantity`, `Price`, `Gquantity`, `Salestart`, `StartTime2`, `Saleend`, `EndTime2`) VALUES ('$title', '$type','$category', '$organizers', '$location', '$date1', '$time1', '$date2', '$time2', '$imgContent', '$desc1', '$desc2', '$ticket', '$quantity', '$price', '$groupquantity', '$date3', '$time3', '$date4', '$time4')";
  // if (move_uploaded_file($_FILES['image']['tmp_name'], $imgContent)) {
  //insertData($sql);
  connect();
  upload($sql);
  echo '<script>alert("New Item inserted successfully ")</script>';
  //echo '<script>window.location="quantityTable.php"</script>';
  // }
  connect();
  // upload($sql);
}
