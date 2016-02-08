<?php
require_once("includes/cart.php");
session_start();

if (isset($_SESSION['CustomerID'])== false) {
	header("Location:index.php");
	exit;
}else{

}

$oCart = $_SESSION["cart"];
$oCart->add($_GET["RecordID"]);

header("Location:show_cart.php");
?>