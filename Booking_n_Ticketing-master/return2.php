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

include ("require.php");
connect();


if (isset($_POST["submit"])) {
  //?Value of points to be returned
  $number = ($_POST['tnumber']);
  $_SESSION['ticketnumber']=$number;
  $sql=("SELECT Totalpaid, Status FROM tickets WHERE Ticket_Id ='$number'");
  $link=connect();
  $result=mysqli_query($link,$sql);
  $total =0;

  while ($row = $result->fetch_assoc()){
    $total=$row['Totalpaid'];
    $status = $row['Status'];
  }
  $returnpoints=(($total*0.6)/100);
//?Check whether the ticket has not been returned before
if(status == 1){
  if ($result) {
    $sql=("SELECT Points FROM user_table WHERE Username ='$sess'");
    $result=mysqli_query($link,$sql);
    $currentpoints = 0;
    while ($row = $result->fetch_assoc()){
      $currentpoints=$row['Points'];
    }
    $newpoints=($currentpoints+$returnpoints);
    if (!empty($result)) {
      // $sql= "DELETE  FROM tickets WHERE Ticket_Id ='$number'";
      $sql = "UPDATE tickets SET Status ='0' WHERE Ticket_Id = '$number'";
      $result=mysqli_query($link,$sql);
      echo mysqli_error($link);
      //!We need to inntroduce another proccess

      if ($result) {
        $sql = "UPDATE user_table SET Points='$newpoints' WHERE Username='$sess'";
        $link=connect();
        $result=mysqli_query($link,$sql);
        if ($result) {
          echo "<script>alert('Return request successfull. We will notify you for an opportunity to resel the ticket')</script>";
        }
      }
    }
  }
  

}
else{
  echo "<script>alert('The ticket was returned prior')</script>";
}
  
}
  //header("Location: Homepage.php");
?>