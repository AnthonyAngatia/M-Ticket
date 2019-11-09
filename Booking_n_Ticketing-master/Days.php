<?php
// session_start();
require_once('require.php');
//?Gets the no of days between now and the earliest evnt in the cart
function getNoOfDays(){
    
    if (  isset( $_SESSION['cart_tickets'])  && !empty($_SESSION['cart_tickets'])) {
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
        // print_r($rowData);
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
        $diff = (int)$diff;////removing decimals
        // echo $diff." days";
        //*Find no. of weeks.
        $weeks = $diff/7;
        $weeks = (int)$weeks;
        // echo $weeks. "weeks";
        //TODO:Divide the number of weeks from the total amount
    } else{
        echo "Cart is empty";
       exit();
    }
    return $diff;

}


// $days = getNoOfDays();
// // $days = 90;
// echo $days;
// $installment_number = 0;
// if($days <= 7){
//   echo  "Installment is not available";
// }
// else if($days > 7 && $days <= 30){
//   echo "You can have one installment";
//   $installment_number = 1;
// }
// else if($days > 30 && $days <= 60){
//   echo "you have 4 installments";
//   $installment_number = 4;
// }
// else{
//   echo "You have 5 installments";
//   $installment_number = 5;
// }
?>