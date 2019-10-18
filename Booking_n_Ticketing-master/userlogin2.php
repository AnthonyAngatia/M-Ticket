<?php
// session_start();

include ("require.php");
connect();

if (isset($_POST["login"])) {
$username = ($_POST['username']);
$password = ($_POST['password']);
}
$insert = "SELECT Username, Password FROM user_table WHERE Username='$username'";

$retPass =  retrievePass($insert, $username);
$user= retrieveUser($insert, $username);

if (empty($password)||empty($username)) {
header("Location: userlogin.php");
exit();
}
if (sha1($password)==$retPass && $username==$user){

session_start();

$_SESSION["loggedin"]=true;
$_SESSION["username"]=$username;

if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    $sess = $_SESSION["username"];
//    echo 'Set and not empty, and no undefined index error!';
}
else{
    $sess = "null";
}

header("Location: HomePage.php");
exit();
}
?>