<?php 
require_once("connection.php");


class Customer{

	private $iCustomerID;
	private $sName;
	private $sAddress;
	private $sPhone;
	private $sEmail;
	private $sPassword;

	public function __construct(){

		$this->iCustomerID = 0;
		$this->sName = '';
		$this->sAddress = '';
		$this->sPhone = '';
		$this->sEmail = ''; 
		$this->sPassword = ''; 
	}

	public function load($iCustomerID){

		$oCon = new Connection();

		$sSQL = "SELECT CustomerID, Name, Address, Phone, Email, Password
				FROM tbcustomer 
				WHERE CustomerID = ".$iCustomerID;

		$oResultSet = $oCon->query($sSQL);

		$aRow = $oCon->fetchArray($oResultSet);

		$this->iCustomerID = $aRow ['CustomerID'];
		$this->sName = $aRow ['Name'];
		$this->sAddress = $aRow ['Address'];
		$this->sPhone = $aRow ['Phone'];
		$this->sEmail = $aRow ['Email'];
		$this->sPassword = $aRow ['Password'];

		$oCon->close();
	}

	public function loadByEmail($sEmail){

		$oCon = new Connection();

		$sSQL = "SELECT CustomerID  
				FROM tbcustomer 
				WHERE Email = '".$sEmail."'";

		$oResultSet = $oCon->query($sSQL);
		$aRow = $oCon->fetchArray($oResultSet);

		if($aRow  ==true){

			$sID = $aRow['CustomerID'];
			$this->load($sID);

			return true;

		}else{

			return false;

		}

		$oCon->close();

	}

	public function save(){

		$oCon = new Connection();

		if($this->iCustomerID == 0){

		$sSQL = "INSERT INTO tbcustomer (Name, Address, Phone, Email, Password) 
				VALUES ('".$this->sName."', '"
					.$this->sAddress."', '"
					.$this->sPhone."', '"
					.$this->sEmail."', '"
					.$this->sPassword."')";

		$bResult = $oCon->query($sSQL);

		if ($bResult == true){
			$this->iCustomerID = $oCon->getInsertID();
		}else{
			die($sSQL . " Did not run");
		}
		
		}else{

			$sSQL = "UPDATE tbcustomer 
					SET Name = '".$this->sName."',
					 	Address = '".$this->sAddress."',
					 	Phone = '".$this->sPhone."',
					 	Email = '".$this->sEmail."',
					 	Password = '".$this->sPassword."'
					 	WHERE CustomerID = ".$this->iCustomerID;

				$bResult = $oCon->query($sSQL);

				if($bResult==false){
					die($sSQL . " Did not run");
				}
		}

		$oCon->close();

	}

	public function __get($var){

		switch ($var) {
			case 'CustomerID':
				return $this->iCustomerID;
				break;
			case 'Name':
				return $this->sName;
				break;
			case 'Address':
				return $this->sAddress;
				break;
			case 'Phone':
				return $this->sPhone;
				break;

			case 'Password':
				return $this->sPassword;
				break;

			case 'Email':
				return $this->sEmail;
				break;	
			default:
				die($var . " is not allowed");
				break;
		}

	}

	public function __set($var,$value){

		switch ($var) {
		case 'Name':
			$this->sName = $value;
			break;
		case 'Address':
			$this->sAddress = $value;
			break;
		case 'Phone':
			$this->sPhone = $value;
			break;
		case 'Email':
			$this->sEmail = $value;
			break;
		case 'Password':
			$this->sPassword = $value;
			break;	
		
		default:
			die($var . " is not allowed");
			break;
		}

	}

}

// $oCustomer = new Customer();
// $oCustomer->loadbyEmail("123@gmail.com");
// // // $oCustomer->CustomerID = 2;
// // $oCustomer->Name = 'Patrick';
// // $oCustomer->Address = '15 Walden Place Mangere East Auckland';
// // $oCustomer->Phone = '09 2785452';
// // $oCustomer->Email = 'pmasoe@gmail.com';
// // $oCustomer->Password = '2142';
// // $oCustomer->save();

// echo "<pre>";
// print_r($oCustomer);
// echo "</pre>";








 ?>