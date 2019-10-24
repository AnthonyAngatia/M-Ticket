<?php
//*
//*
//*!Note This files will be used for debuggin only. After debugging copy the funtion to the file 
//*
//*
require('require.php');
session_start();
function getEmailInfo(){
    $email_info = array();
    $sess = $_SESSION["username"];
    echo "<pre>";
    //*Getting email add of user
    $sql = "SELECT *  FROM user_table WHERE Username = '$sess' ";
    // print_r(getData($sql)['0']['Email']);
    $emailAdd = getData($sql)['0']['Email'];
    array_push( $email_info,$emailAdd);
    $receiverName = getData($sql)['0']['Name'];
    array_push( $email_info,$receiverName);
    return $email_info;
}
?>