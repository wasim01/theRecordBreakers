<?php 

require_once("connection.php");

class Cart{

	private $aContents;

	public function __construct(){
		$this->aContents = [];
		
	}

	public function add($iRecordID){


		if(isset($this->aContents[$iRecordID])==false){
			$this->aContents[$iRecordID] = 1;
		}else{
			$this->aContents[$iRecordID]++;
		}

	}

	public function remove($iRecordID){

		$this->aContents[$iRecordID]--;
		if($this->aContents[$iRecordID]<=0){
			unset($this->aContents[$iRecordID]);
		}
		
	}

	public function __get($var){

		switch ($var) {
			case 'contents':
				return $this->aContents;
				break;
			
			default:
				die($var . " is not allowed");
				break;
		}


	}
}

// $oCart = new Cart();

// $oCart->add(2);
// $oCart->add(5);
// $oCart->add(8);
// $oCart->add(3);

// $oCart->remove(2);

// echo "<pre>";
// print_r($oCart);
// echo "</pre>";

 ?>