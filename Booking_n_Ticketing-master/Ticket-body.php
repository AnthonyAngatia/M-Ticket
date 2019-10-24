//*
//*
//*!Note This files will be used for debuggin only. After debugging copy the funtion to the file 
//*
//*
<?php 
require('require.php');
session_start();
function ticketBody(){
    echo "<PRE>";
    $ticket_body = array();
    $path_arr = array();
    foreach ($_SESSION['cart_tickets'] as $key => $value) {
        $id = $value['id'];
        $sql = "SELECT Tickname, Eventstart, StartTime1, Eventend, EndTime1, Poster  FROM event WHERE Event_id = '$id' ";
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
                margin:auto;
                max-width:60%;
                min-height:300px;
                
            }
            .wrap img{
                margin:1em;
                border:1px solid red;
                height:100px;
                max-width:150px;
                min-width:100px;
            }
            .wrap div{
                
                min-width:300px;
                
            }
            </style>
        </head>
        <body>
            <div class="wrap">
                <img src="cid:';
                $path = getData($sql)['0']['Poster'];
                $second = '" alt="Poster">
                <div class="ticket-info">
                    <h3>Start time:</h3>
                    <h3>Start time:</h3>
                    <h3>Location:</h3>
                </div>
                <img src="" alt="Qr code">
            </div>
        </body>
        </html>';
        $fullbody =  $body.$path.$second;
        array_push($ticket_body, $fullbody);
       array_push($path_arr, $path);
    }
    $Ticket_path_arr = array('0' => $ticket_body,
    '1' =>$path_arr );
    // array_push($Ticket_path_arr, $ticket_body);
    // array_push($Ticket_path_arr, $path_arr);
    return $Ticket_path_arr;
}
//print_r(ticketBody());

?>