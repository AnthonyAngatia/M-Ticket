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
		return true;
	} else {
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
			$rowData[] = $row;
		}
	}
	return $rowData;
}
function register($sql)
{
	echo "<script>alert('Testing')</script>";
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
		echo "New record created successfully";
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
