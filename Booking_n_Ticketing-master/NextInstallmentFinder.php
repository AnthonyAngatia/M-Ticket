<?php
require_once('require.php');
session_start();

//* Get data from the Database
$sql = "SELECT Next_Installment FROM installment";
$next_installment = getData($sql);
foreach ($next_installment as $key => $value) {
    // print_r($value);
    print_r($value['Next_Installment']);
    // echo "<br>";
    echo date('Y-m-d');
    // echo "<br>";
    

    
}





?>