<?php 
require_once("includes/cart.php");
session_start();

$oCart = $_SESSION["cart"];
$oCart->remove($_GET["RecordID"]);

header("Location:show_cart.php");


 ?>