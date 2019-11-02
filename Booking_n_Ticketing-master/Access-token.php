<?php
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
//curl_close($curl);
 echo $access_token;// !Testing works.End Of File
// echo getHostByName(getHostName());
?>