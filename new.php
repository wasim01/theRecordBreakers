<?php 
require_once("includes/cart.php");
session_start();
require_once("includes/header.php");
require_once("includes/view.php");


$oCart = $_SESSION["cart"];
echo View::renderCart($oCart);

?>

<?php 

require_once("includes/footer.php");
 ?>