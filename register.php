
<?php 
ob_start();

require_once("includes/header.php");
require_once("includes/form.php");
require_once("includes/customer.php");

$oForm = new Form();

if (isset($_POST["submit"])==true) {
	
	$oForm->data = $_POST;

		$oForm->checkRequired("Name");
		$oForm->checkRequired("Address");
		$oForm->checkRequired("Phone");
		$oForm->checkRequired("Email");
		$oForm->checkRequired("Password");
		$oForm->checkEqual("Password","Confirm_Password");

		$oTestCustomer = new Customer();
		$bLoaded = $oTestCustomer->loadByEmail($_POST["Email"]);
		if($bLoaded == true){
			$oForm->raiseCustomError("Email",'<p class="validate">Taken!</p>');
			
		}



	// echo "<pre>";
	// print_r($_POST);
	// echo "</pre>"; 
	

	if($oForm->valid == true){

		$oCustomer = new Customer();

		$oCustomer->Name = $_POST["Name"];
		$oCustomer->Address = $_POST["Address"];
		$oCustomer->Phone = $_POST["Phone"];
		$oCustomer->Email = $_POST["Email"];
		$oCustomer->Password = $_POST["Password"];
		$oCustomer->save();

		header("Location:congrats.php");
		exit;
	}
}

		$oForm->makeTextInput("Name","Name");
		$oForm->makeTextInput("Address","Address");
		$oForm->makeTextInput("Phone","Phone");
		$oForm->makeTextInput("Email","Email");
		$oForm->makePasswordInput("Password","Password");
		$oForm->makePasswordInput("Confirm Password","Confirm_Password");
		$oForm->makeSubmit("Sign Up");


?>

<?php echo $oForm->html; ?>

<!-- <form class="register" action="" method="post">
	
	<div class="row">
		<label for="">Name</label>
		<input type="text" name="firstName" id="firstNname" value="">
	</div>
	<div class="row">
		<label for="" for="">Address</label>
		<input type="text" name="firstName" id="firstNname" value="">
	</div>
	<div class="row">
		<label for="">Phone</label>
		<input type="text" name="firstName" id="firstNname" value="">
	</div>
	<div class="row">
		<label for="">Email</label>
		<input type="text" name="firstName" id="firstNname" value="">
	</div>

	<div class="row">
		<label for="">Password</label>
		<input type="text" name="firstName" id="firstNname" value="">
	</div>

	<div class="submit">
		<input type="submit" name="submit" value="Sign Up">
	</div>
	

</form> -->


<?php 
require_once("includes/footer.php");
 ?>