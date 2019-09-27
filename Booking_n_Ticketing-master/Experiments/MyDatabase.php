<?php
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
    $sql = "SELECT Event_name, Event_description, Event_caption FROM event_tbl";
    $result = mysqli_query($link, $sql);
    // print_r($result);
    $rowData = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            $image = ($row['Event_caption']);
            /**Retrieved image in binary */
            echo '<img src= "data:image/jpeg;base64,' . base64_encode($image) . '"  height = "300" width = "300" class="img-thumnail" > ' . "<br>";
            $event_name = ($row['Event_name']);
            /**event name/title */
            echo $event_name  . "<br>";
            $event_description = ($row['Event_description']);
            /**event description */
            echo $event_description  . "<br>";
        }
    }

    //print_r($rowData[1]);
    return $rowData;
}
