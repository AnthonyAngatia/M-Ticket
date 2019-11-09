<?php
require_once('require.php');
// session_start();
function getCallBackResponse(){
    $url = 'CallBackResponse.json';
    $data = file_get_contents($url);
    $obj = json_decode($data);
    unlink('CallbackResponse.json');
    return $obj;
}


function transactionDetails($obj, $username){
        $resultcode = $obj->Body->stkCallback->ResultCode;
        // echo $resultcode;
        if($resultcode == 1032){
            $MerchantRequestId = $obj->Body->stkCallback->MerchantRequestID;
            $ResultDescription = $obj->Body->stkCallback->ResultDesc;
            $sql = "INSERT INTO `transactions`(`MerchantRequestId`, `RequestDesc`, `UserName`) VALUES ('$MerchantRequestId','$ResultDescription','$username')";
            setData($sql);
            $_SESSION['paid'] = 0;
            echo "<script>alert('Failed transaction')</script>";
            header('Location: Cart.php');
            exit();
            
        }
        else if($resultcode == 0){
            $MerchantRequestId = $obj->Body->stkCallback->MerchantRequestID;
            $ResultDescription = $obj->Body->stkCallback->ResultDesc;
            $item = $obj->Body->stkCallback->CallbackMetadata->Item;
            // print_r($item);
            $payinfo = array();
            foreach ($item as $key => $value) {
                // echo $value->Value;
                $arrData = $value->Value;
                array_push($payinfo, $arrData);
            }
            // print_r($payinfo);
            $MpesaReceipt = $payinfo['1'];
            $amount = $payinfo['0'];
            $Balance = $payinfo['2'];
            $date = $payinfo['3'];
            $phonenumber = $payinfo['4'];
            $sql = "INSERT INTO `transactions`(`UserName`, `MerchantRequestId`, `RequestDesc`, `MpesaReceiptNumber`, `PhoneNumber`, `Amount`, `TransactionDate`, `Balance`) VALUES ('$username','$MerchantRequestId','$ResultDescription','$MpesaReceipt', '$phonenumber', '$amount', '$date', '$Balance')";
            setData($sql);
            $_SESSION['paid'] = 1;

        }
}
// transactionDetails($obj);






// //   {
//     "Body": {
//         "stkCallback": {
//           "MerchantRequestID": "14049-1495006-1",
//           "CheckoutRequestID": "ws_CO_DMZ_2258641911_03112019220627962",
//           "ResultCode": 1032,
//           "ResultDesc": "[STK_CB - ]Request cancelled by user"
//         }
//       }
//     },
//   {
//     "Body": {
//       "stkCallback": {
//         "MerchantRequestID": "28853-1506979-1",
//         "CheckoutRequestID": "ws_CO_DMZ_410734545_03112019222228591",
//         "ResultCode": 0,
//         "ResultDesc": "The service request is processed successfully.",
//         "CallbackMetadata": {
//           "Item": [
//             { "Name": "Amount", "Value": 2.0 },
//             { "Name": "MpesaReceiptNumber", "Value": "NK35PGLRXD" },
//             { "Name": "Balance" },
//             { "Name": "TransactionDate", "Value": 20191103222236 },
//             { "Name": "PhoneNumber", "Value": 254791278088 }
//           ]
//         }
//       }
//     }

?>