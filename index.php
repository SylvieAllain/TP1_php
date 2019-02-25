<?php

include "modeles/model_cars.php";

$cat_cars = (!empty($_POST['catCars'])) ? ($_POST['catCars']) : null;
$submit_cat = (!empty($_POST['submit_cat'])) ? ($_POST['submit_cat']) : null;
$car = (!empty($_POST['car'])) ? ($_POST['car']) : null;
$submit = (!empty($_POST['submit'])) ? ($_POST['submit']) : null;

function createSelectCategory($array_cars, $cat_cars){
  echo '<select name='.'"'.'catCars'.'"'.'>';
  foreach($array_cars as $key=>$value){
    if ($cat_cars == $key){
      echo "<option selected value="."\""."$key"."\"".">" . "$key" . "</option>";
    }
    else{
      echo "<option value="."\""."$key"."\"".">" . "$key" . "</option>";
    }
  }
  echo "</select>";
  echo "<input type=". "\"" . "submit" . "\"" . "name=" . "\"" . "submit_cat" . "\"". "value=" . "\"" . "envoyer". "\"". ">";
}
$arrayLength = sizeOf($array_cars[$cat_cars]);

function selectedCarModel($array_cars,$cat_cars,$car){
  echo '<select name='.'"'.'car'.'"'.'>';
  foreach($array_cars[$cat_cars] as $key=> $value){
    if($array_cars[$cat_cars][$key] == $car){
      echo "<option selected value="."\""."$value"."\"".">" . "$value" . "</option>";
    }
    else{
      echo "<option value="."\""."$value"."\"".">" . "$value" . "</option>";
    }
  }
  echo "</select>";
  echo "<input type=". "\"" . "submit" . "\"" . "name=" . "\"" . "submit" . "\"". "value=" . "\"" . "envoyer". "\"". ">";
}

function validate_cat_car($cat_cars){
  if(empty($cat_cars)){
    throw new Exception ("Vous devez sélectionner une catégorie de voiture");
  }
}

function validate_car($car){
  if(empty($car)){
    throw new Exception ("Vous devez sélectionner un modèle de voiture");
  }
}


include_once 'vues/accueil.php';

if(!empty($submit_cat)){
  try{
    validate_cat_car($cat_cars);
  }
  catch(Exception $e){
    echo "Erreur : " . $e->getMessage();
  }
}

if(!empty($submit)){
  try{
    validate_car($car);
    include_once "vues/manger.php";
    header("location:vues/selection.php?car=$car");

  }
  catch(Exception $e){
    echo "Erreur : " . $e->getMessage();
  }
}

?>
