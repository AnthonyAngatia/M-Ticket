<?php
require "vendor/autoload.php";

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

$qrCode = new QrCode("jnjnmkl,;hbjnmkmkl");
$qrCode->setSize(500);


// header("Content-Type:image/png");
echo $qrCode->writeString();
$randomnumber = rand(1000, 10000);
//todo:Check if the random nuber is in the database
echo $randomnumber;

$qrCode->writeFile(__DIR__.'/new/'.$randomnumber.'.png');



?>