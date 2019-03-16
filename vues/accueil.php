<!--
Programmation Web II - TP1
Projet : Voiture @Variée
Hiver 2019
Auteur: Sylvie Allain & Cyrice Paradis
-->

<?php

if(!empty($search)){
  $mileageToSend = str_replace(" ","", $mileage);
  $stateToSend = str_replace(" ", "", $state);
  header("location:controleurs/controller_selection.php?model=$model&color=$color&builtYear=$builtYear&mileage=$mileageToSend&state=$stateToSend");
}
$rand_pictures = array_rand($array_randomPictures,3);
?>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" class="imgCarousel" src=<?php echo $array_randomPictures[$rand_pictures[0]];?> alt="firstSlide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src=<?php echo $array_randomPictures[$rand_pictures[1]];?> alt="secondSlide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src=<?php echo $array_randomPictures[$rand_pictures[2]];?> alt="thirdSlide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <div class="container" id="containerAccueil">
      <h2 id="homeForm"> Faites votre choix de véhicule </h2>
    <form name="formulaire" action="" method="post">
      <div class="row rowAccueil">
        <div class="col-6">
        <label for="brand">Marque<span class="requiredFields">* </span>: </label> <?php createSelectCategory($array_brandAndModel, $brand);?>
      </div>
      <div class="col-6 ">
        <label for="model">Modèle<span class="requiredFields">* </span>: </label><?php createSelectedCarModel($array_brandAndModel,$brand,$model)?>
      </div>
    </div>
    <div class="row rowAccueil" >
      <div class=" col-6" >
        <label for="color">Couleur : </label> <?php createSelectedList($array_modelColors,$color, "color", "submit_color");?>
      </div>
      <div class = "col-6">
        <label for="builtYear"> Année : </label> <?php createSelectedList($array_modelBuiltYear,$builtYear, "builtYear", "submit_builtYear"); ?>
    </div>
  </div>
  <div class="row rowAccueil ">
    <div class = "col-6">
      <label for="state"> État du véhicule : </label> <?php createSelectedList($array_modelState,$state, "state", "submit_state"); ?>
    </div>
    <div class = "col-6">
      <label for="mileage"> Kilométrage : </label> <?php createSelectedList($array_modelRangedMileage,$mileage, "mileage", "submit_mileage"); ?>
    </div>
    <span id="instruction">Il est important de cliquer sur le bouton "Ok" à la suite du menu déroulant pour confirmer vos choix.</span>
  </div>
  <div class="row rowAccueil">
    <p id="requiredFields"> *Ces champs doivent être remplis.</p>
    <div class="offset-5 col-7">
      <input type="submit" name="search" class="btn btn-success searchButton" value="Rechercher"> </input>
    </div>
  </div>
    </form>
  </div>
  <?php include_once 'vues/footer.php'; ?>
