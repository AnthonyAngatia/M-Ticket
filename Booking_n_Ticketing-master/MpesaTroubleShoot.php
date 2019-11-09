<?php
function accessTokenGenerator(){
  //Access token
  $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
    
  $curl = curl_init($access_token_url);
  curl_setopt($curl, CURLOPT_URL, $access_token_url);
  $credentials = base64_encode('h8OLwRAO8EvN7nlzGAAnO8SdMv3JlvsF:nw0NTustPaAH8gdt');
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
  curl_setopt($curl, CURLOPT_HEADER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

  $curl_response = curl_exec($curl);//Contains the access token and the time it takes to expire

  $access_token = json_decode($curl_response)->access_token;

  //   echo $access_token; //Testing works.
  //   echo "<br>";
  curl_close($curl);
  return $access_token;

}


$access_token = accessTokenGenerator();
function mpesaSendMoney($phone_no, $total_amt, $access_token){
  //define variables
  $phone_no =ltrim($phone_no, '0');
  $localIP = getHostByName(getHostName());
  $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
  $BusinessShortcode = '174379';
  $Timestamp = date('Ymdhis');//date('Ymdis');
  $PartyA = '254'.$phone_no;//25491278088
  $CallBackURL = 'https://570ea50c.ngrok.io/M-ticket/Booking_n_Ticketing-master/callback_url.php';
  //   $CallBackURL = 'http://'.$localIP.'/M-ticket/Booking_n_Ticketing-master/callback_url.php';
  $AccountReference =  'M-ticket.com ';
  $TransactionDesc =  'Transaction description ';
  $Amount = $total_amt;
  $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
  $Password = base64_encode($BusinessShortcode.$Passkey.$Timestamp);

  $stkheader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $initiate_url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader); //setting custom header


  $curl_post_data = array(
    //Fill in the request parameters with valid values
    'BusinessShortCode' => $BusinessShortcode,
    'Password' => $Password,
    'Timestamp' => $Timestamp,
    'TransactionType' => 'CustomerPayBillOnline',
    'Amount' =>$Amount,
    'PartyA' => $PartyA,
    'PartyB' => $BusinessShortcode,
    'PhoneNumber' => $PartyA,
    'CallBackURL' => $CallBackURL,
    'AccountReference' => $AccountReference,
    'TransactionDesc' => $TransactionDesc
  );

  $data_string = json_encode($curl_post_data);

  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

  $curl_response = curl_exec($curl);
  print_r($curl_response);

  // echo $curl_response;
  // set_time_limit(40);
  // sleep(5);
}

$no = '0791278088';
$amt = '5';
mpesaSendMoney($no ,$amt);   


?>
