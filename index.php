<?php
include_once 'vues/banner.php';
include "modeles/model_cars.php";

$brand = (!empty($_POST['brand'])) ? ($_POST['brand']) : null;
$submit_brand = (!empty($_POST['submit_brand'])) ? ($_POST['submit_brand']) : null;
$model = (!empty($_POST['model'])) ? ($_POST['model']) : null;
$submit = (!empty($_POST['submit'])) ? ($_POST['submit']) : null;

function createSelectCategory($array_brandAndModel, $brand){
  echo '<select name='.'"'.'brand'.'"'.'>';
  foreach($array_brandAndModel as $key=>$value){
    if ($brand == $key){
      echo "<option selected value="."\""."$key"."\"".">" . "$key" . "</option>";
    }
    else{
      echo "<option value="."\""."$key"."\"".">" . "$key" . "</option>";
    }
  }
  echo "</select>";
  echo "<input type=". "\"" . "submit" . "\"" . "name=" . "\"" . "submit_brand" . "\"". "value=" . "\"" . "ok". "\"". ">";
}
$arrayLength = sizeOf($array_brandAndModel[$brand]);

function selectedCarModel($array_brandAndModel,$brand,$model){
  echo '<select name='.'"'.'model'.'"'.'>';
  foreach($array_brandAndModel[$brand] as $key=> $value){
    if($array_brandAndModel[$brand][$key] == $model){
      echo "<option selected value="."\""."$value"."\"".">" . "$value" . "</option>";
    }
    else{
      echo "<option value="."\""."$value"."\"".">" . "$value" . "</option>";
    }
  }
  echo "</select>";
  echo "<input type=". "\"" . "submit" . "\"" . "name=" . "\"" . "submit" . "\"". "value=" . "\"" . "envoyer". "\"". ">";
}

function validate_cat_car($brand){
  if(empty($brand)){
    throw new Exception ("Vous devez sélectionner une catégorie de voiture");
  }
}

function validate_car($model){
  if(empty($model)){
    throw new Exception ("Vous devez sélectionner un modèle de voiture");
  }
}


include_once 'vues/accueil.php';

// if(!empty($submit_brand)){
//   try{
//     validate_cat_car($brand);
//   }
//   catch(Exception $e){
//     echo "Erreur : " . $e->getMessage();
//   }
// }
//
// if(!empty($submit)){
//   try{
//     validate_car($model);
//     include_once "vues/selection.php";
//     header("location:vues/selection.php?car=$model");
//
//   }
//   catch(Exception $e){
//     echo "Erreur : " . $e->getMessage();
//   }
// }

?>
