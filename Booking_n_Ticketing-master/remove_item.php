<?php  
session_start();
	 if (isset($_SESSION['cart_tickets'])) {
unset($_SESSION['cart_tickets'][$_GET['key']]);


		header("Location: cart.php");
} ?>