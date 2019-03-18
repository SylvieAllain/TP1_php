<!--
Programmation Web II - TP1
Projet : Voiture @Variée
Hiver 2019
Auteur: Sylvie Allain & Cyrice Paradis
-->

<?php

$model = null;
$color = null;
$builtYear = null;
$mileage = null;
$state = null;
$isIndex = false;

if(isset($_GET["model"])){
  $model = $_GET["model"];
}
if(isset($_GET["color"])){
  $color = $_GET["color"];
}
if(isset($_GET["builtYear"])){
  $builtYear = $_GET["builtYear"];
}

if(isset($_GET["mileage"])){
  $mileage = $_GET["mileage"];
}
if(isset($_GET["state"])){
  $state = $_GET["state"];
}


include_once "../modeles/model_cars.php";
include_once "fonction.php";
$array_pictures = determineCarsByModel($model,$isIndex);

function createMiniPhoto($imageSrc,$miniSrc,$nameMini){
  $img_source = imagecreatefromjpeg($imageSrc);
  $img_destination = imagecreatetruecolor(250,190);

  $largeur_src = imagesx($img_source);
  $hauteur_src = imagesy($img_source);
  $largeur_destination = 250;
  $hauteur_destination = 190;

  //créer la miniature
  imagecopyresampled($img_destination,$img_source,0,0,0,0,$largeur_destination,$hauteur_destination,$largeur_src,$hauteur_src);

  //enregistrement
  imagejpeg($img_destination,$miniSrc);
  echo "<div>";
  echo "<div ><a href=\"$imageSrc\"> <img class=\"picture\" src=\"$miniSrc\" name=\"$nameMini\" /></a></div>";
  echo "</div>";
  imagedestroy($img_source);
  imagedestroy($img_destination);
}

function sendTextWithoutWhiteSpaces($array_pictures,$keyToGet){
  $textToSend = "test";
  foreach ($array_pictures as $key => $value){
    if ($key == $keyToGet){
      foreach ($array_pictures[$key] as $key2 => $valueToReplace){
         if($key2 == "state"){
           $textToSend = str_replace(" ", "", $valueToReplace);
         }
      }
    }
  }
  return $textToSend;
}

function isPictureBelongToTable($array_pictures,$color,$builtYear,$mileage,$state,$keyToGet,$isIndex,$array_rangeMilageCategory){
  $isThisBelong = false;
  foreach($array_pictures as $key => $value){
    if($key == $keyToGet){
      if($array_pictures[$key]["color1"] == $color || $array_pictures[$key]["color2"] == $color || $color == null){
        if($array_pictures[$key]["builtYear"] == $builtYear || $builtYear == null){
          $textToCompare = determinateRangeMileageForACar($array_pictures,$array_rangeMilageCategory,$key,$isIndex);
          if($textToCompare == $mileage || $mileage == null){
            $stateToCompare = sendTextWithoutWhiteSpaces($array_pictures,$key);
            if($stateToCompare == $state || $state == null){
              $isThisBelong = true;
            }
          }
        }
      }
    }
  }
  return $isThisBelong;
}

function createTable($array_pictures,$color,$builtYear,$mileage,$state,$isIndex,$array_rangeMilageCategory){
  foreach($array_pictures as $key => $value){
    $imageSrc = $array_pictures[$key]["imageSrc"];
    $miniSrc = $array_pictures[$key]["miniSrc"];
    $nameMini = $array_pictures[$key]["nameMini"];
    $isThisPicturesBelong = isPictureBelongToTable($array_pictures,$color,$builtYear,$mileage,$state,$key,$isIndex,$array_rangeMilageCategory);
    if($isThisPicturesBelong){
      echo "<div class=\"row\" id=\"carDisplayRow\">";
      echo "<div class=\" col-3 carPicture\">";
      echo createMiniPhoto($imageSrc,$miniSrc,$nameMini) . "</div>";
      echo "<div class=\"col-3\">" .
            "<p class=\"carDescriptionTitle\">Année de fabrication : </p>" . $array_pictures[$key]["builtYear"]. "<br>".
            "<p class=\"carDescriptionTitle\"> Couleur(s) disponible(s) : </p>" . $array_pictures[$key]["color1"];
      if ($array_pictures[$key]["color2"] != null){
        echo ", " . $array_pictures[$key]["color2"];
      }
      echo  "<p class=\"carDescriptionTitle\"> Kilométrage : </p>" . $array_pictures[$key]["mileage"] . " km" .
            "<p class=\"carDescriptionTitle\"> État du véhicule : </p>" . $array_pictures[$key]["state"] .
            "</div>".
            "<div class=\"col-3\">".
            "<p class=\"carDescriptionTitle\"> Autres informations : </p>" . $array_pictures[$key]["description"] .
            " </div>";
      echo "<div class=\"col-3 anchorPicture\">" .
            "(Cliquer pour obtenir les détails) <br>".
              "<a href=\"../controleurs/controller_financing?carKey=" . $key . "&model=" . $array_pictures[$key]["model"] . "&pic=" . $array_pictures[$key]["miniSrc"] . "&price=" . $array_pictures[$key]["price"] . "\">" . $array_pictures[$key]["price"] . "</a> </div>";
      echo "</div>";
    }
  }
}
$pageTitle = "Sélection";
include_once '../vues/banner.php';
include_once "../vues/selection.php";
include_once '../vues/footer.php';



?>
