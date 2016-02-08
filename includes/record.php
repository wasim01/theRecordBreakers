<?php 
require_once("connection.php");
// require_once("genre.php");


class Record{

	private $iRecordID;
	private $sTitle;
	private $sArtist;
	private $fPrice;
	private $iGenreID;
	private $iPhotoPath;

	public function __construct(){

		$this->iRecordID = 0;
		$this->sTitle = '';
		$this->sArtist = '';
		$this->fPrice = 0;
		$this->iGenreID = 0;
		$this->iPhotoPath = 0;
	}

	public function load($iRecordID){

		$oCon = new connection();

		$sSQL = "SELECT RecordID, Title, Artist, Price, GenreID, PhotoPath
				FROM tbrecords 
				WHERE RecordID = ".$iRecordID;

		$oResultSet = $oCon->query($sSQL);

		$aRow = $oCon->fetchArray($oResultSet);

		$this->iRecordID = $aRow['RecordID'];
		$this->sTitle = $aRow['Title'];
		$this->sArtist = $aRow['Artist'];
		$this->fPrice = $aRow['Price'];
		$this->iGenreID = $aRow['GenreID'];
		$this->iPhotoPath = $aRow['PhotoPath'];



		$oCon->close();

	}

	public function __get($var){

		switch($var){

		case 'RecordID':
			return $this->iRecordID;
			break;
		case 'Title':
			return $this->sTitle;
			break;
		case 'Artist';
			return $this->sArtist;
			break;
		case 'Price':
			return $this->fPrice;
			break;
		case 'GenreID';
			return $this->iGenreID;
			break;
		case 'PhotoPath':
			return $this->iPhotoPath;
			break;
		default:
			die($var . " i not allowed");

		}
	}
}

// $oRecord = new Record();
// $oRecord->load(5);
// echo "<pre>";
// echo $oRecord->RecordID;
// echo "</pre>";











 ?>