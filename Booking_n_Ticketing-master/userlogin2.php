<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true){
	header("Location: login.php");
	exit;
}

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

header("Location: HomePage.php");
exit();
}
?>

