<?php
//
//
//?This file
//@Checks for  the no of remaining tickets and updates it.
//@Calls a function that generates a QR code
//!This file is being called in DirectPays
require_once('generate.php');
require_once('require.php');
session_start();
$user_id = $_SESSION['user_id'];
$Event_id = $_SESSION['cart_tickets']['0']['id'];//Event id for the first item in the cart
// print_r($_SESSION['cart_tickets']);

function updateTables($user_id, $Event_id, $Totalpaid){
    foreach ($_SESSION['cart_tickets'] as $key => $value) {
        print_r($value);
        $single_tickets = $value['squantity'];
        $group_tickets = $value['gquantity'];
        //*If you buy more than one ticket please put this for loops in the for each loop
        for($x=0; $x < $single_tickets; $x++){
            //*Get the no.of remaining tickets.
            $sql = "SELECT `Single_Quant_Remaining` FROM  event WHERE Event_id = '$Event_id'";
            $Single_Remainder = getData($sql)['0']['Single_Quant_Remaining'];
            //*Check if there is no of remaining tickets
            if($Single_Remainder > 0){
                //*Update the event table
                $Single_Remainder = $Single_Remainder - 1;
                $sql = "UPDATE `event` SET `Single_Quant_Remaining`='$Single_Remainder' WHERE  Event_id = '$Event_id'";
                setData($sql);
                //*insert into the table of tickets
                $randomnumber = rand(1000, 99000);
                $ticketNo = generateQr($randomnumber);
                $status = 1;
                $sql = "INSERT INTO `tickets`(`Ticket_Id`, `Status`, `User_Id`, `Event_id`, `Totalpaid`) VALUES ('$ticketNo', '$status', '$user_id', '$Event_id', '$Totalpaid')";
                setData($sql);
            }
            else{
                echo "<script>alert('All tickets have been sold out.You can put a waiting request for an available ticket')</script>";
                break;
            }
        }
        for($x=0; $x < $group_tickets; $x++){
            //*Get the no.of remaining tickets.
            $sql = "SELECT `Group_Quant_Remaining` FROM  event WHERE Event_id = '$Event_id'";
            $Group_Remainder = getData($sql)['0']['Group_Quant_Remaining'];
            //*Check if there is no of remaining tickets
            if($Group_Remainder > 0){
                //*Update the event table
                $Group_Remainder = $Group_Remainder - 1;
                $sql = "UPDATE `event` SET `Group_Quant_Remaining`='$Group_Remainder' WHERE  Event_id = '$Event_id'";
                setData($sql);
                //*insert into the table of tickets
                $randomnumber = rand(1000, 99000);
                $ticketNo = generateQr($randomnumber);
                $status = 1;
                $sql = "INSERT INTO `tickets`(`Ticket_Id`, `Status`, `User_Id`, `Event_id`) VALUES ('$ticketNo', '$status', '$user_id', '$Event_id')";
                setData($sql);
            }
            else{
                echo "<script>alert('All tickets have been sold out.You can put a waiting request for an available ticket')</script>";
                break;
            }
        }
    
    }
}






?>