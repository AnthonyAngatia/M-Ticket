<?php
session_start();
$event = $_SESSION["eventtitle"];

require('require.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
// echo "<pre>";
// print_r($_POST);

  $imgContent = $_FILES['imageupload']['name'];

$sql="UPDATE event
SET Poster = '$imgContent'
WHERE Title = '$event'";

connect();
$link=connect();
$result=mysqli_query($link,$sql);
        if ($result) {
         header("Location: view_events.php");
        }
}
?>
