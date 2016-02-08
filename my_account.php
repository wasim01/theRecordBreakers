<?php 
session_start();

if (isset($_SESSION['CustomerID'])== false) {
	header("Location:index.php");
	exit;
}

require_once("includes/header.php");
require_once("includes/customer.php");
require_once("includes/view.php");
 
	$iCustomerID = 1;

	if(isset($_GET["CustomerID"])){

		$iCustomerID = $_GET["CustomerID"];
	
	}
	
	$oCustomer = new Customer();
	$iCustomerID = $_SESSION["CustomerID"];
	$oCustomer->load($iCustomerID);

	echo View::renderCustomer($oCustomer);

?>
<a href="edit_details.php?CustomerID=<?php echo $iCustomerID;?>">+Edit Details</a>

<?php 

 require_once("includes/footer.php");

 ?>

