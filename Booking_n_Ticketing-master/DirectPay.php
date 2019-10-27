<?php
require_once('Lipa-Mpesa.php');
$phone_no = $_POST['number'];
$total_amt = $_POST['total-pay'];

$access_token = accessTokenGenerator();
mpesaSendMoney($phone_no, $total_amt, $access_token );
header("Location: Test.php");
?>
<?php
session_start();
if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
  $sess = $_SESSION["username"];
}
    include ("require.php");
    connect();
    $sql=("SELECT Points FROM user_table WHERE Username ='$sess'");
    $link=connect();
    $result=mysqli_query($link,$sql);

    $currentpoints = 0;
    while ($row = $result->fetch_assoc()){
    $currentpoints=$row['Points'];
    }
    $updatedpoints=($currentpoints+1);

    if ($result) {
    $sql = "UPDATE user_table SET Points='$updatedpoints' WHERE Username='$sess'";
    $link=connect();
    $result=mysqli_query($link,$sql);
        if ($result) {
        echo "<script>alert('Ticket has been sent to your email')</script>";
        }
    }

?>