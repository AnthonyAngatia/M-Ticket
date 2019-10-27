<?php
function connect()
{
	$dbServer = 'localhost';
	$dbUsername = 'root';
	$dbPassword = '';
	$dbName     = 'ticketing';

	$link = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName) or die("Could not connect");
	return $link;
}

function setData($sql)
{
	$link = connect();
	if (mysqli_query($link, $sql)) {
		echo "<script>alert('Your data has been recorded')</script>";
		return true;
	} else {
		echo "<script>alert('Not working')</script>";
		"Error: " . $sql . "<br>" . mysqli_error($link);
		echo mysqli_error($link);
		return false;
	}
}

function getData($sql)
{
	$link = connect();
	$result = mysqli_query($link, $sql);
	$rowData = array();
	if (mysqli_num_rows($result) > 0) {
		while ($row = $result->fetch_assoc()) {
			array_push($rowData, $row);
		}
	}
	return $rowData;
}
function pass(){
    $p = '14711738';
    return $p;
}
function unsetCart(){
	//session_start();
	 if (isset($_SESSION['cart_tickets'])) {
		unset($_SESSION['cart_tickets']);
	 }
}
function register($sql)
{
	// echo "<script>alert('Testing')</script>";
	$link = connect();
	// $result = mysqli_query($link, $sql);
	// if ($result) {
	// 	echo "<script>alert('User registered successfuly')</script>";
	// }
	// else{
	// 	echo "<script>alert('Not working')</script>";
	// }
	// $link->close();
	if(mysqli_query($link, $sql)){
		echo "<script>alert('New record inserted')</script>";
		header("Location:Homepage.php");
	}
	else{
		echo "<script>alert('Not working')</script>";
		"Error: " . $sql . "<br>" . mysqli_error($link);
	}
	$link->close();
}
function upload($sql)
{
	$link = connect();
	$result = mysqli_query($link, $sql);

	if ($result) {
		echo "<script>alert('Event uploaded successfuly')</script>";
	}
	$link->close();
}
function retrievePass($insert, $username)
{
	$link = connect();
	$sql = mysqli_query($link, $insert);

	while ($row = $sql->fetch_assoc()) {
		$password = ($row['Password']);

		return $password;
	}
	mysql_close($link);
}
function retrieveUser($insert, $username)
{
	$link = connect();
	$sql = mysqli_query($link, $insert);

	while ($row = $sql->fetch_assoc()) {
		$username = ($row['Username']);

		return $username;
	}
	mysql_close($link);
}
