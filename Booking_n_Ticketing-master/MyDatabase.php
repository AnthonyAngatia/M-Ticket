<?php
/*
*
*
!This File is outdated
*
*
*/

function connect()
{
    $dbserver = "localhost";
    $username = "root";
    $password = "";
    $dbname = "m-ticket";
    $link = mysqli_connect($dbserver, $username, $password, $dbname) or die("Could not connect");
    //echo "Connected";
    return $link;
}
function getData()
{
    $link = connect();
    //!THIS sql statement has been replaced in the other file
    $sql = "SELECT  Event_name, Event_description, Image_path FROM event_tbl";
    $result = mysqli_query($link, $sql);
    // print_r($result);
    $rowData = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            $rowData[] = $row;
        }
    }

    //!print_r($rowData);
    return json_encode($rowData);
}
