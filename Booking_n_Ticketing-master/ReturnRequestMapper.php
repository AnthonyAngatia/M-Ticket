<?php
session_start();
require_once('require.php');
require_once('SendEmail.php');
set_time_limit ( 300 );
//?Fetch all the requests waiting to buy
$sql = "SELECT * FROM request WHERE Status = '1' ORDER BY TimeStamp ASC ";// from the return table
$request = getData($sql);
// print_r($request);

//?Fetch the return tickets to return
$sql = "SELECT * FROM tickets WHERE Status = '0' ";// from the  ticket tble
$returns = getData($sql);
// echo "<pre>";
echo "return ticket is. Not yet returned";
print_r($returns);


    foreach ($request as $key => $value1) {
        
        // $request['User_Id'];
        // echo "<pre>";
        // echo "value 1";
        // print_r($value1);
        foreach ($returns as $key => $value2) {
            // echo "<script>alert(' here')</script>";
            // echo "value 2";
            // print_r($value2);
            if($value1['Event_Id'] == $value2['Event_id']){
                echo "<script>alert('Found a request')</script>";



                //?Send an email to the person who request
                $requester = $value1['User_Id'];
                $sql ="SELECT * FROM user_table WHERE User_Id = '$requester'";
                $requester_info = getData($sql);
                $eventid = $value2['Event_id'];
                $sql ="SELECT Title FROM event WHERE Event_Id = '$eventid' ";
                $events = getData($sql);
                // print_r($events);
                foreach ($events as $key => $value3) {
                    // print_r($value3);
                    $eventName = $value3['Title'];
                    break;
                }
                $emailAdd = $requester_info['0']['Email'];
                echo $emailAdd;
                $name = $requester_info['0']['Name'];
                $subject = "M-Ticket.Available ticket!!";
                $body = "Dear ".$_SESSION['username'].",<br>
                Ticket for ". $eventName ." event is available. Please confirm in you user profile page the purchase of the ticket";
                $path = null;
                $cid = null;
                sendMail($emailAdd, $name, $subject, $body, $path, $cid);





                // echo "Test.return made";
                //* 2 means on hold to be given to a person who has put a request.
                $ticketid = $value2['Ticket_Id'];
                $sql = "UPDATE tickets SET Status='2' WHERE Ticket_Id= '$ticketid'";
                setData($sql);

                $User_Id = $value1['User_Id'];
                $sql = "UPDATE request SET Status='2' WHERE User_ID= '$User_Id'";
                setData($sql);

                
                //Store this data in the data
                
                exit();
                break;
            }
            else{
                // No return request available
                // echo "<script>alert('No request available')</script>";
            }
            

        }
        // echo "<script>alert(' a request loop')</script>";

    }





?>