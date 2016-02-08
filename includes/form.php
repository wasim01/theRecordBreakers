<?php 

class Form{

	private $sHTML;
	private $aData;
	private $aErrors;

	public function __construct(){
		$this->sHTML = '<form class="register" action="" method="post">' ."\n";
		$this->aData = [];
		$this->aErrors = [];		
	}

	public function makeTextInput($sControlLabel,$sControlName){

		$sControlData = "";

		if(isset($this->aData[$sControlName])==true){

			$sControlData = $this->aData[$sControlName];
		}

		$sError = "";
		if(isset($this->aErrors[$sControlName])==true){

			$sError = '<p>'.$this->aErrors[$sControlName].'</p>';
		}

		$this->sHTML .='<div class="row"><label for="'.$sControlName.'">'.$sControlLabel.'</label>
		<input type="text"  id="'.$sControlName.'" name="'.$sControlName.'" value="'.$sControlData.'"></div>' .$sError. "\n";
	}

	public function makePasswordInput($sControlLabel,$sControlName){

		$sControlData = "";

		if(isset($this->aData[$sControlName])==true){

			$sControlData = $this->aData[$sControlName];
		}

		$sError = "";
		if(isset($this->aErrors[$sControlName])==true){

			$sError = '<p>'.$this->aErrors[$sControlName].'</p>';
		}

		$this->sHTML .='<div class="row"><label for="'.$sControlName.'">'.$sControlLabel.'</label>
		<input type="password"  id="'.$sControlName.'" name="'.$sControlName.'" value="'.$sControlData.'"></div>' .$sError. "\n";
	}

	public function makeSubmit($sControlLabel){

		$this->sHTML .='<div class="submit"><input type="submit" name="submit" value="'.$sControlLabel.'"></div>';
	}
	

	public function checkRequired($sControlName){

		$sControlData = "";

		if(isset($this->aData[$sControlName])==true){
			$sControlData = trim($this->aData[$sControlName]);
		}

		if(strlen($sControlData)==0){

			$this->aErrors[$sControlName] = '<p class="validate">Must not be empty</p>';
		}
	}

	public function checkEqual($sControlName1,$sControlName2){

		$sControlData1 = "";

		if(isset($this->aData[$sControlName1])==true){
			$sControlData1 = trim($this->aData[$sControlName1]);
		}

		$sControlData2 = "";

		if(isset($this->aData[$sControlName2])==true){
			$sControlData2 = trim($this->aData[$sControlName2]);
		}

		if($sControlData1 != $sControlData2 ){

			$this->aErrors[$sControlName1] = '<p class="validate">Did not match</p>';
		}
	}

	public function raiseCustomError($sControlName,$sMessage){
		
		$this->aErrors[$sControlName] = $sMessage;

	}

	public function __get($var){

		switch($var) {
			case 'html';
			return $this->sHTML . "</form>";

			case 'valid':
			if (count($this->aErrors)==0) {
				return true;
			}else{
				return false;
			}
			break;

			default:
			die($var . " is not allowed");
			break;
		}
	}

	public function __set($var,$value){

		switch ($var) {
			case 'data':
				$this->aData = $value;
				break;
			
			default:
				die($var . " is not allowed");
				break;
		}
	}


}






 ?>