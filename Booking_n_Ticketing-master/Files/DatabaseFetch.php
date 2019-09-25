<?php

include('MyDatabase.php');
//connect();

$sql = "SELECT * FROM user_tbl";
getData($sql);
