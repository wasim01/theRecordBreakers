<?php 
session_start();
require_once("includes/header.php");

require_once("includes/view.php");
require_once("includes/genre.php");


 ?>
<!--header-->


                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="images/banner1.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="images/banner2.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="images/banner3.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

<?php 


$oGenre = new Genre();

$iCurrentGenreID = 1;
if(isset($_GET['genreid'])){
  $iCurrentGenreID = $_GET['genreid'];  
}

$oGenre->load($iCurrentGenreID);


echo View::renderGenre($oGenre);

 ?>

            
<?php 

require_once("includes/footer.php");


 ?>
