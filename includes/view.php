<?php 


class View{

	static public function renderNav($aGenres){

		$sHTML = '<div class="list-group">';

		for($iCount=0; $iCount<count($aGenres); $iCount++){

			$oGenre = $aGenres[$iCount];
			

			$sHTML .= '<a href="index.php?genreid='.$oGenre->GenreID.'" class="list-group-item">'.$oGenre->GenreName.'</a>';
		}

		if(isset($_SESSION["CustomerID"]) == false){

			$sHTML .= '<a href="http://localhost/theRecordBreakers/login.php" 
			class="list-group-item">Login</a>

			<a href="http://localhost/theRecordBreakers/register.php" 

			class="list-group-item">Sign Up</a>
			</div>';

		}else{

			$sHTML .= '<a href="http://localhost/theRecordBreakers/show_cart.php" 
			class="list-group-item"><strong>Cart</strong></a>

			<a href="http://localhost/theRecordBreakers/my_account.php" 
			class="list-group-item"><strong>Account Details</strong></a>

			<a href="http://localhost/theRecordBreakers/logout.php" 
			class="list-group-item"><strong>Logout</strong></a>

			</div>';

		}

		return $sHTML;

	}

	static public function renderCustomer($oCustomer){

		$sHTML = '<div class="details">';


		$sHTML .='<p><strong>Name</strong></p><p>'.$oCustomer->Name.'</p>
		<p><strong>Address</strong></p><p>'.$oCustomer->Address.'</p>
		<p><strong>Phone</strong></p><p>'.$oCustomer->Phone.'</p>
		<p><strong>Email</strong></p><p>'.$oCustomer->Email.'</p>';

		$sHTML .= '</div>';

		return $sHTML;


	}

	static public function renderGenre($oGenre){

		$sHTML = '<div class="row">

                 <h1 class="GenreName">'.$oGenre->GenreName.'</h1>';

                    $aRecords = $oGenre->Records;
                    for($iCount=0; $iCount<count($aRecords); $iCount++){

						$oRecord = $aRecords[$iCount]; 
						$sHTML .= '<div class="col-sm-4 col-lg-4 col-md-4">
		                        <div class="thumbnail">
		                            <img src="images/records/'.$oRecord->PhotoPath.'" alt="">
		                            <div class="caption">
		                                
		                                <h3><a href="#">'.$oRecord->Artist.'</a>
		                                </h3>
		                                 <h4><a href="#">'.$oRecord->Title.'</a>
		                                </h4>
		                            
		                                <a href="addToCart.php?RecordID='.$oRecord->RecordID.'"><i class="fa fa-shopping-cart fa-lg"></i></a>
		                                <h4 class="pull-right">'.$oRecord->Price.'</h4>
		                            </div>
		                            <div class="ratings">
		                                <p class="pull-right">15 reviews</p>
		                                <p>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                </p>
		                            </div>
		                        </div>
		                    </div>';

		                    
					}


               $sHTML .= '</div>';

         return $sHTML;

	}

	static public function renderCart($oCart){

		$sHTML = '<table class="cart">';

		$sHTML .='	<tr>
						<th>Artist</th>
						<th>Title</th>
						<th>Price</th>
						<th>RecordID</th>
						<th>Quantity</th>
					</tr>';

		$aContents = $oCart->contents;

		// echo "<pre>";
		// print_r($aContents);
		// echo "</pre>";

		foreach($aContents as $iRecordID=>$iQuantity){
			
			$oRecord = new Record();
			$oRecord->load($iRecordID);

			$sHTML .='	<tr>
						<td>'.$oRecord->Artist.'</td>
						<td>'.$oRecord->Title.'</td>
						<td>'.$oRecord->Price.'</td>
						<td>'.$oRecord->RecordID.'</td>
						<td>'.$iQuantity.'</td>
						<td class="remove"><a href="removeFromCart.php?RecordID='.$oRecord->RecordID.'">x</a>
					</tr>';

		}
		

		$sHTML .='</table>';

		return $sHTML;


	}
}


// <table class="cart">
	// <tr>
	// 	<th>CustomerID</th>
	// 	<th>OrderID</th>
	// 	<th>Price</th>
	// </tr>
// 	<tr>
// 		<td>2</td>
// 		<td>6</td>
// 		<td>19.99</td>
// 	</tr>
// </table>



















 ?>