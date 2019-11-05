<?php
session_start();
// require_once('Installments.php');
require_once('ticket.php');
require_once('Days.php');
// require_once('Test.php');
require_once('TransactionProcessing.php');
require_once('SendEmail.php');

$username = $_SESSION['username'];

function getEmailInfo($username){
    $email_info = array();
    echo "<pre>";
    //*Getting email add of user
    $sql = "SELECT *  FROM user_table WHERE Username = '$username' ";
    // print_r(getData($sql)['0']['Email']);
    $emailAdd = getData($sql)['0']['Email'];
    array_push( $email_info,$emailAdd);
    $receiverName = getData($sql)['0']['Name'];
    array_push( $email_info,$receiverName);
    return $email_info;
}


$obj = getCallBackResponse();
transactionDetails($obj, $username);
$total_to_pay = $_SESSION['total-to-pay'] ;
unset($_SESSION['total-to-pay'] );
$installment = $_SESSION['installment'];
unset($_SESSION['installment']);
$installment_amt = $_SESSION['installmet-amt'];
unset($_SESSION['installment-amt']);
$total_payable = $_SESSION['total-payable'];
unset($_SESSION['total-payable']);
$next_installment = $_SESSION['next-installment'];
unset($_SESSION['next-installment']);





$sql = "INSERT INTO installment( DownPayment, No_of_Installments, Total_Payable, Next_Installment, Installment_amt, User_Id) VALUES ( $total_to_pay, $installment, $total_payable ,$next_installment ,$installment_amt, $user_id)";
setData($sql);

$body ='<style>
    .wrap {
    border: 1px solid black;
    max-width: 50%;
    margin: auto;
    }
    .wrap h1 {
    text-align: center;
    }
    .wrap p {
    padding: 5px;
    }
    </style>
    </head>
    <body>
    <div class="wrap">
    <h1>M-ticket.com</h1>
    <p>Hi customer,</p>
    <p>
    You have paid *** amount for the purchase of ticket xyz.You are expected
    to pay -amt by this day otherwise your installment plan will be
    nullified.
    </p>
    <p>Your other installments will be paid on xyz</p>
    <p>Email reminders will be sent to you 2 days before the deadline</p>
    <p>Thank you.</p>
    </div>';

sendMail(getEmailInfo($username)['0'], getEmailInfo($username)['1'], "M-ticket Installment Pay", $body, null, null );

// unsetCart();



?>