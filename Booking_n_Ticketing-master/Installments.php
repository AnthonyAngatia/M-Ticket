<?php
session_start();
require_once('require.php');
require_once('SendEmail.php');
require_once('Days.php');
require_once('Lipa-Mpesa.php');

$username = $_SESSION['username'];
$phone_number = $_POST['phone_number'];
$total_to_pay = $_POST['total-pay'];//DownPayment
$installment = $_POST['installment'];
$installment_amt = $total_to_pay/$installment;
$installment_amt = (int)$installment_amt;
$total_payable = $total_to_pay *2;

function getEmailInfo(){
    $email_info = array();
    $sess = $_SESSION["username"];
    echo "<pre>";
    //*Getting email add of user
    $sql = "SELECT *  FROM user_table WHERE Username = '$sess' ";
    // print_r(getData($sql)['0']['Email']);
    $emailAdd = getData($sql)['0']['Email'];
    array_push( $email_info,$emailAdd);
    $receiverName = getData($sql)['0']['Name'];
    array_push( $email_info,$receiverName);
    return $email_info;
}
function getNextInstallment($installment){
    $days = getNoOfDays();
    $installment_time_interval = $days/$installment;
    echo "<br>";
    $next_installment_date =  date('Y-m-d', strtotime(' + '.$installment_time_interval.'days'));//Add currnet date to time interval
    return $next_installment_date;
}
$next_installment  = getNextInstallment($installment);

function getUserId($username){
    $sql = "SELECT User_id  FROM user_table WHERE Username = '$username' ";
    
    $user_id = getData($sql)['0']['User_id'];
    return $user_id;
}
$user_id = getUserId($username);


$access_token =  accessTokenGenerator();
mpesaSendMoney($phone_number, $total_to_pay, $access_token);

// echo $next_installment;
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

sendMail(getEmailInfo()['0'], getEmailInfo()['1'], "M-ticket Installment Pay", $body, null, null );

unsetCart();



/*
CREATE TABLE Installmet (
    Payment_id int AUTO_INCREMENT,
    DownPayment int,
    No_of_Installments int,
    Total_Payable int,
    Next_Installment DATE,
    Installment_amt int,
    User_Id int,
    PRIMARY KEY(Payment_id),
    FOREIGN KEY (User_id) REFERENCES user_table(User_id)
);
*/ 
?>
