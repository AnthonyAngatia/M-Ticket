<?php
//session_start();
// require_once('require.php');
// require_once('SendEmail.php');
set_time_limit ( 300 );

// session_start();
function ticketBody(){
    // echo "<PRE>";
    $ticket_body = array();
    $path_arr = array();
    foreach ($_SESSION['cart_tickets'] as $key => $value) {
        $id = $value['id'];
        $sql = "SELECT Tickname, Eventstart, StartTime1, Eventend, EndTime1, Poster, Location  FROM event WHERE Event_id = '$id' ";
        // print_r(getData($sql));
        // print_r(getData($sql)['0']['Tickname']);    
        $body = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Ticket body</title>
            <style>
            .wrap{
                display:flex;
                border:3px solid black;
                /*margin:auto;*/
                max-width:60%;
                min-height:300px;
                
            }
            .poster{
                margin:1em;
                border:1px solid red;
                height:300px;
                max-width:300px;
                min-width:250px;

            }
            .qr{
                margin:1em;
                border:1px solid red;
                height:250px;
                max-width:250px;
                min-width:250px;
            }
            .wrap img{
                margin:1em;
                border:1px solid red;
                height:300px;
                max-width:250px;
                min-width:200px;
            }
            .wrap div{
                
                min-width:300px;
                
            }
            </style>
        </head>
        <body>
            <div class="wrap">
                <img class = "poster" src="cid:';
                $path = getData($sql)['0']['Poster'];
                $second = '" alt="Poster">
                <div class="ticket-info">
                    <h3>Start time:';
                    $third = getData($sql)['0']['Eventstart'];
                    $fourth = '</h3>
                    <h3>End time:';$fifth = getData($sql)['0']['Eventend'];
                    $sixth = '</h3>
                    <h3>Location:';
                    $seventh =getData($sql)['0']['Location'];
                    $eighth ='</h3>
                    <h3>Ticket Number:</h3>
                </div>
                <img class = " qr" src="" alt="Qr code">
            </div>
        </body>
        </html>';
        $fullbody =  $body.$path.$second.$third.$fourth.$sixth.$seventh.$eighth;
        array_push($ticket_body, $fullbody);
       array_push($path_arr, $path);
    }
    $Ticket_path_arr = array('0' => $ticket_body,
    '1' =>$path_arr );
    // array_push($Ticket_path_arr, $ticket_body);
    // array_push($Ticket_path_arr, $path_arr);
    return $Ticket_path_arr;
}
function getEmailInfo(){
    $email_info = array();
    $sess = $_SESSION["username"];
    // echo "<pre>";
    //*Getting email add of user
    $sql = "SELECT *  FROM user_table WHERE Username = '$sess' ";
    // print_r(getData($sql)['0']['Email']);
    $emailAdd = getData($sql)['0']['Email'];
    array_push( $email_info,$emailAdd);
    $receiverName = getData($sql)['0']['Name'];
    array_push( $email_info,$receiverName);
    return $email_info;
}
// print_r(ticketBody()['0']['0']);//fot the body
// print_r(ticketBody()['1']['0']);//fot the path
// for($i=0; $i<sizeof(ticketBody()['0']); $i++){
//?sendMail(getEmailInfo()['0'], getEmailInfo()['1'], "Subject", $value, $path, $cid);
   //sendMail(getEmailInfo()['0'], getEmailInfo()['1'], "M-ticket", ticketBody()['0'][$i], ticketBody()['1'][$i], ticketBody()['1'][$i]);
// }
//unsetCart();
//header("Location: Success.php");


?>
