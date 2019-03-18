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
$needHref = true;

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
include_once "controller_function.php";
$array_pictures = determineCarsByModel($model,$isIndex);

$array_usingKey = [
  "color" => $color,
  "builtYear" => $builtYear,
  "mileage" => $mileage,
  "state" => $state
];

//fonction qui permet de retirer les espaces entre les mots. Comparant le kilométrage se trouvant dans le url.
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

//fonction qui permet de générer les autos qui répondent aux choix de l'utilisateur.
function insertCarsThatFitWithUserChoice($array_pictures,$array_usingKey,$isIndex,$array_rangeMilageCategory,$needHref){
  foreach($array_pictures as $key => $value){
    $imageSrc = $array_pictures[$key]["imageSrc"];
    $miniSrc = $array_pictures[$key]["miniSrc"];
    $nameMini = $array_pictures[$key]["nameMini"];
    $isThisPicturesBelong = isPictureBelongToTable($array_pictures,$array_usingKey,$key,$isIndex,$array_rangeMilageCategory);
    if($isThisPicturesBelong){
      createTable($array_pictures,$key, $imageSrc,$miniSrc,$nameMini, $needHref);
    }
  }
}
$pageTitle = "Sélection";
include_once '../vues/banner.php';
include_once "../vues/selection.php";
include_once '../vues/footer.php';



?>
