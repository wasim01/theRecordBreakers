<?php 
ob_start();
session_start();

require_once("includes/header.php");
require_once("includes/form.php");
require_once("includes/customer.php");
require_once("includes/cart.php");

$oForm = new Form();

if(isset($_POST["submit"])==true){

	$oForm->data = $_POST;

	$oForm->checkRequired("Email");
	$oForm->checkRequired("Password");

	$oCheckCustomer = new Customer();
	$bLoaded = $oCheckCustomer->loadByEmail($_POST["Email"]);

	if($bLoaded == false){
			$oForm->raiseCustomError("Email",'<p class="validate">Bad Email!</p>');
	}else{

		if($oCheckCustomer->Password != $_POST["Password"]){
			$oForm->raiseCustomError("Password",'<p class="validate">Bad Password!</p>');
		}
	}

	if($oForm->valid == true){

		$_SESSION['CustomerID'] = $oCheckCustomer->CustomerID;

		$oCart = new Cart();

		// // $oCart->add(1);
		// // $oCart->add(5);
		// // $oCart->add(5);
		// // $oCart->add(4);

		$_SESSION["cart"] = $oCart;

		//redirect

		header("Location:my_account.php");
		exit;
	}


}

	$oForm->makeTextInput("Email","Email");
	$oForm->makePasswordInput("Password","Password");
	$oForm->makeSubmit("Log In");

?>

<?php 

echo $oForm->html; 

?>

<?php 
require_once("includes/footer.php");
 ?>