<?php
require_once('Lipa-Mpesa.php');
require_once('ticket.php');
require_once('Test.php');

$phone_no = $_POST['number'];
$total_amt = $_POST['total-pay'];
//*Send Money
$access_token = accessTokenGenerator();
mpesaSendMoney($phone_no, $total_amt, $access_token );
//*Updates our table
$user_id = $_SESSION['user_id'];
$Event_id = $_SESSION['cart_tickets']['0']['id'];//Event id for the first item in the cart
updateTables($user_id, $Event_id, $total_amt);


//*Send the emails
//header("Location: Test.php");
for($i=0; $i<sizeof(ticketBody()['0']); $i++){
  //?sendMail(getEmailInfo()['0'], getEmailInfo()['1'], "Subject", $value, $path, $cid);
     sendMail(getEmailInfo()['0'], getEmailInfo()['1'], "M-ticket", ticketBody()['0'][$i], ticketBody()['1'][$i], ticketBody()['1'][$i]);
  }
//*Increase the points

if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
  $sess = $_SESSION["username"];
}
$sql=("SELECT Points FROM user_table WHERE Username ='$sess'");
//getData($sql);
$currentpoints = 0;
$currentpoints=getData($sql)['0']['Points'];
$updatedpoints=($currentpoints+1);
$sql = "UPDATE user_table SET Points='$updatedpoints' WHERE Username='$sess'";
setData($sql);

?>
