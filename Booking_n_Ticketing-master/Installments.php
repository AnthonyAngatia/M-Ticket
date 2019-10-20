<?php
session_start();
require('require.php');

echo "<pre>";
// print_r( $_SESSION['cart_tickets']);
if (  isset( $_SESSION['cart_tickets'])  && !empty($_SESSION['cart_tickets'])) {
    // echo sizeof($_SESSION['cart_tickets']);

$ticket_sale_end = array();
//* Gets info from the database about the sale end and puts it in an array
$rowData = array();
foreach ( $_SESSION['cart_tickets'] as $key => $value) {
    // print_r($value);
    // echo $value['id'];
    $event_id = $value['id'];
    $sql = ("SELECT Event_id, Saleend FROM event WHERE Event_id = '$event_id' ");
    $link=connect();
    $result=mysqli_query($link,$sql);
    while ($row = $result->fetch_assoc()){
      array_push($rowData, $row);
    }
    array_push($ticket_sale_end,getData($sql));
}
print_r($rowData);
//*Extract each item and compare
$earliest_event = $rowData[0]['Saleend'];
for ($i = 0; $i < sizeof($rowData) ; $i++) {
    if($earliest_event > $rowData[$i]['Saleend']){
        // echo "couner".$i;
        $earliest_event = $rowData[$i]['Saleend'];
        // print_r($earliest_event);//Earliest event
    }
 }
$today = date("Y-m-d"); 
$earliest_event = strtotime($earliest_event);
$today = strtotime($today);
$diff = ($earliest_event - $today)/ 86400;//*divide to convert to days
$diff = (int)$diff;
echo $diff." days";
//?Find no. of weeks.
$weeks = $diff/7;
$weeks = (int)$weeks;
echo $weeks. "weeks";
//TODO:Divide the number of weeks from the total amount

} else{
    echo "0";
}
?>