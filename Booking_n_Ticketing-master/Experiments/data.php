<?php
require('MyDatabase.php');
function getData()
{
    $link = connect();
    $sql = "SELECT Event_name, Event_description, Event_caption FROM event_tbl";
    $result = mysqli_query($link, $sql);
    // print_r($result);
    $rowData = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            $rowData[] = $row;
        }
    }

    //print_r($rowData[1]);
    return json_encode($rowData);
}
