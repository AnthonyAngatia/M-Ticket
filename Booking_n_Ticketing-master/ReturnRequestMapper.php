<?php
session_start();
require_once('require.php');
require_once('SendEmail.php');
set_time_limit ( 300 );
//?Fetch all the requests waiting to buy
$sql = "SELECT * FROM request WHERE Status = '1' ORDER BY TimeStamp ASC ";
$request = getData($sql);
// print_r($request);

//?Fetch the return tickets to return
$sql = "SELECT * FROM tickets WHERE Status = '0' ";
$returns = getData($sql);


    foreach ($request as $key => $value1) {
        // $request['User_Id'];
        echo "<pre>";
        print_r($value1);
        foreach ($returns as $key => $value2) {
            if($value1['Event_Id'] == $value2['Event_id']){
                //Send an email to the person who request
                $requester = $value1['User_Id'];
                $sql ="SELECT * FROM user_table WHERE User_Id = '$requester'";
                $requester_info = getData($sql);
                $emailAdd = $requester_info['0']['Email'];
                $name = $requester_info['0']['Name'];
                $subject = "M-Ticket.Available ticket!!";
                $body = "Ticket for event Id XYZ is available. Please confirm in you user profile page the purchase of the ticket";
                $path = null;
                $cid = null;
                // echo "Test.return made";
                sendMail($emailAdd, $name, $subject, $body, $path, $cid);
                exit();
            }
            else{
                // No return request available
            }
            

        }

    }





?>