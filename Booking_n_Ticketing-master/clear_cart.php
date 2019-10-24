<?php 
session_start();
	 if (isset($_SESSION['cart_tickets'])) {
		unset($_SESSION['cart_tickets']);
		header("Location: cart.php");
} ?>