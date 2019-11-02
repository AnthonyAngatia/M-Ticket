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
//*Get the userid
$sql =  "SELECT * FROM user_table WHERE Username='$username'";
$rowData = getData($sql);
$_SESSION['user_id'] = $rowData['0']['User_Id'];

if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    $sess = $_SESSION["username"];
   
}
else{
    $sess = "null";
}

header("Location: HomePage.php");
exit();
}
?>