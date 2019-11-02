<?php
require_once("require.php");
session_start();
if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
  $sess = $_SESSION["username"];
}
    
    //connect();
    $sql=("SELECT Points FROM user_table WHERE Username ='$sess'");
    // getData($sql);
    $currentpoints = 0;
    $currentpoints=getData($sql)['0']['Points'];
    $updatedpoints=($currentpoints+1);

    $sql = "UPDATE user_table SET Points='$updatedpoints' WHERE Username='$sess'";
    setData($sql);

?>