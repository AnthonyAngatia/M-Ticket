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
            $event_name = ($row['Event_name']);
            echo $event_name;
            $event_description = ($row['Event_description']);
            echo $event_description;
            $image = ($row['Event_caption']);
            echo '<img src= "data:image/jpeg;base64,' . base64_encode($image) . '"  height = "500" width = "300" class="img-thumnail" > ';
            ////$rowData[] = $row;
        }
    }

    //print_r($rowData[1]);
    return $rowData;

    //*Displays data in a row

    ////foreach ($rowData[0] as $data) {
    //// echo $data . "<br>  ";
    ////  }
    //*Displays data of a column
    //// foreach ($rowData as $data) {
    ////echo $data['Event_name'] . " ";
    ////}
}
