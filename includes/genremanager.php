<?php 
	require_once("connection.php");
	require_once("genre.php");

	

	class GenreManager{

		static public function all(){

			$aGenres = array();

			$oCon = new Connection();

			$sSQL = "SELECT GenreID FROM tbgenres";

			$oResultSet = $oCon->query($sSQL);

			while($aRow = $oCon->fetchArray($oResultSet)){
				$iGenreID = $aRow["GenreID"];

				$oGenre = new Genre();
				$oGenre->load($iGenreID);
				$aGenres[] = $oGenre;
			}

			$oCon->close();

			return $aGenres;
		}


	}

	// $aAllRecords = GenreManager::all();

	// echo "<pre>";
	// print_r($aAllRecords);
	// echo "</pre>";



 ?>