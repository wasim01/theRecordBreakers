<?php 
ob_start();

require_once("includes/header.php");
require_once("includes/form.php");
require_once("includes/customer.php");

session_start();

if (isset($_SESSION['CustomerID'])== false) {
	header("Location:index.php");
	exit;
}
	$iCurrentID = $_SESSION['CustomerID'];
	
	$oExistingCustomer = new Customer();
	$oExistingCustomer->load($iCurrentID);

	$aExistingData = [];
	$aExistingData["Name"] = $oExistingCustomer->Name;
	$aExistingData["Address"] = $oExistingCustomer->Address;
	$aExistingData["Phone"] = $oExistingCustomer->Phone;
	$aExistingData["Email"] = $oExistingCustomer->Email;

	$oForm = new Form();
	$oForm->data = $aExistingData;

	if(isset($_POST["submit"])==true){

		$oForm->data = $_POST;

		$oForm->checkRequired("Name");
		$oForm->checkRequired("Address");
		$oForm->checkRequired("Phone");
		$oForm->checkRequired("Email");

		if($oForm->valid == true){

			$oExistingCustomer->Name = $_POST["Name"];
			$oExistingCustomer->Address = $_POST["Address"];
			$oExistingCustomer->Phone = $_POST["Phone"];
			$oExistingCustomer->Email = $_POST["Email"];

			$oExistingCustomer->save();

			header("Location:my_account.php?CustomerID=".$oExistingCustomer->CustomerID);
			exit;

		}
	
	}

	$oForm->makeTextInput("Name","Name");
	$oForm->makeTextInput("Address","Address");
	$oForm->makeTextInput("Phone","Phone");
	$oForm->makeTextInput("Email","Email");
	$oForm->makeSubmit("Update");

 ?>
	<h3>Edit Details</h3>

	<?php echo $oForm->html; ?>

