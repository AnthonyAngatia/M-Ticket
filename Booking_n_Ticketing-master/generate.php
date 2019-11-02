<?php
require "vendor/autoload.php";

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

function generateQr($randomnumber){
    //$randomnumber = rand(1000, 99000);
    $qrCode = new QrCode("M".$randomnumber."Ticket");
    $qrCode->setSize(300);

    // header("Content-Type:image/png");
    // echo $qrCode->writeString();
    $qrCode->writeString();
    //todo:Check if the random nuber is in the database
    echo $randomnumber;
    $qrCode->writeFile(__DIR__.'/new/'.$randomnumber.'.png');
    return $randomnumber;
}

/*
CREATE TABLE Installmet (
    Ticket_Id int,
    Status int,
    User_Id int,
    Event_id int,
    PRIMARY KEY(Ticket_Id),
    FOREIGN KEY (User_id) REFERENCES user_table(User_id),
    FOREIGN KEY (Event_id) REFERENCES event(Event_id)
);
*/

?>
