<?php 
require_once("connection.php");
require_once("record.php");


class Genre{

	private $iGenreID;
	private $sGenreName;
	private $iDisplayOrder;

	private $aRecords;

	public function __construct(){

		$this->iGenreID = 0;
		$this->sGenreName = '';
		$this->iDisplayOrder = 0;

		$this->aRecords = [];

	}

	public function load($iGenreID){

	$oCon = new Connection();

	$sSQL = "SELECT GenreID, GenreName, DisplayOrder 
			FROM tbgenres 
			WHERE GenreID = ". $iGenreID;

	$oResultSet = $oCon->query($sSQL);

	$aRow = $oCon->fetchArray($oResultSet);

	$this->iGenreID = $aRow['GenreID'];
	$this->sGenreName = $aRow['GenreName'];
	$this->iDisplayOrder = $aRow['DisplayOrder'];



	$sSQL = "SELECT RecordID
			FROM tbrecords 
			WHERE GenreID = ".$iGenreID;

	$oResultSet = $oCon->query($sSQL);

	while($aRow = $oCon->fetchArray($oResultSet)){
		$iRecordID = $aRow["RecordID"];

		$oRecord = new Record();
		$oRecord->load($iRecordID);
		$this->aRecords[] = $oRecord;
	}		


	$oCon->close();

	}

	public function __get($var){

		switch ($var){

			case 'GenreID':
				return $this->iGenreID;
				break;
			case 'GenreName':
				return $this->sGenreName;
				break;
			case 'DisplayOrder':
				return $this->iDisplayOrder;
				break;
			case 'Records':
				return $this->aRecords;
				break;
			default:
				die($var . " is not allowed");


		}
	}
}

// $oGenre = new Genre();
// $oGenre->load(3);
// echo "<pre>";
// echo $oGenre->GenreID;
// echo "</pre>";





 ?>