<?php
// echo "Call_back url test"; 
$CallbackResponse = file_get_contents('php://input');

$logFile = "CallbackResponse.json";
$log = fopen($logFile, "a");
fwrite($log, $CallbackResponse);
fclose($log);

?>