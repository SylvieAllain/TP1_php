<!--
Programmation Web II - TP1
Projet : Voiture @Variée
Hiver 2019
Auteur: Sylvie Allain & Cyrice Paradis
-->

<?php
//TODO // réusiner le code pour qu'il ait moins de DRY. Tenter également de retirer tout les éléments globals.
include_once 'vues/banner.php';
include "modeles/model_cars.php";
//Attribution des variables "POST".
$brand = (!empty($_POST['brand'])) ? ($_POST['brand']) : "Lada";
$submit_brand = (!empty($_POST['submit_brand'])) ? ($_POST['submit_brand']) : null;
$model = (!empty($_POST['model'])) ? ($_POST['model']) : "Granta";
$submit_model = (!empty($_POST['submit_model'])) ? ($_POST['submit_model']) : null;
$color = (!empty($_POST['color'])) ? ($_POST['color']) : null;
$submit_color = (!empty($_POST['submit_color'])) ? ($_POST['submit_color']) : null;
$builtYear = (!empty($_POST['builtYear'])) ? ($_POST['builtYear']) : null;
$submit_builtYear = (!empty($_POST['submit_builtYear'])) ? ($_POST['submit_builtYear']) : null;
$mileage = (!empty($_POST['mileage'])) ? ($_POST['mileage']) : null;
$submit_mileage = (!empty($_POST['submit_mileage'])) ? ($_POST['submit_mileage']) : null;
$state = (!empty($_POST['state'])) ? ($_POST['state']) : null;
$submit_state = (!empty($_POST['submit_state'])) ? ($_POST['submit_state']) : null;
$search = (!empty($_POST['search'])) ? ($_POST['search']) : null;

//Crée le menu déroulant pour les marques de voiture.
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
  echo "<input type=". "\"" . "submit" . "\"" . "name=" . "\"" . "submit_brand" . "\"". "value=" . "\"" . "Ok". "\"". ">";
}

//Crée le menu déroulant pour les modèles de voitures rattachés à la marque sélectionnée.
function createSelectedCarModel($array_brandAndModel,$brand,$model){
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
  echo "<input type=". "\"" . "submit" . "\"" . "name=" . "\"" . "submit_model" . "\"". "value=" . "\"" . "Ok". "\"". ">";
}

//Array buffer.
$array_choosedModel = [
  "car1" => ["imageSrc" => null ,"miniSrc" => null, "nameMini" => null,"brand" => null, "model" => null, "builtYear"=> null, "color1"=> null, "color2" => null, "description" => null, "price" => null ],
  "car2" => ["imageSrc" => null ,"miniSrc" => null, "nameMini" => null,"brand" => null, "model" => null, "builtYear"=> null, "color1"=> null, "color2" => null, "description" => null, "price" => null],
  "car3" => ["imageSrc" => null ,"miniSrc" => null, "nameMini" => null,"brand" => null, "model" => null, "builtYear"=> null, "color1"=> null, "color2" => null, "description" => null, "price" => null]
];



//Ce switch permet de transférer les données du tableau du modèle de voiture sélectionnées dans le tableau buffer.
switch($model){
  case "Granta":
    foreach($array_ladaGranta as $key1 => $value){
      foreach($array_ladaGranta[$key1] as $key2 => $value){
        $array_choosedModel[$key1][$key2] = $value;
      }
    }
    break;
  case "Largus":
    foreach($array_ladaLargus as $key1 => $value){
      foreach($array_ladaLargus[$key1] as $key2 => $value){
        $array_choosedModel[$key1][$key2] = $value;
      }
    }
    break;
  case "Niva":
    foreach($array_ladaNiva as $key1 => $value){
      foreach($array_ladaNiva[$key1] as $key2 => $value){
        $array_choosedModel[$key1][$key2] = $value;
      }
    }
    break;
  case "Firebird":
    foreach($array_pontiacFirebird as $key1 => $value){
      foreach($array_pontiacFirebird[$key1] as $key2 => $value){
        $array_choosedModel[$key1][$key2] = $value;
      }
    }
    break;
  case "GTO":
    foreach($array_pontiacGTO as $key1 => $value){
      foreach($array_pontiacGTO[$key1] as $key2 => $value){
        $array_choosedModel[$key1][$key2] = $value;
      }
    }
    break;
  case "Sunfire":
    foreach($array_pontiacSunfire as $key1 => $value){
      foreach($array_pontiacSunfire[$key1] as $key2 => $value){
        $array_choosedModel[$key1][$key2] = $value;
      }
    }
    break;
  case "Korando":
    foreach($array_ssangyongKorando as $key1 => $value){
      foreach($array_ssangyongKorando[$key1] as $key2 => $value){
        $array_choosedModel[$key1][$key2] = $value;
      }
    }
    break;
  case "Musso":
    foreach($array_ssangyongMusso as $key1 => $value){
      foreach($array_ssangyongMusso[$key1] as $key2 => $value){
        $array_choosedModel[$key1][$key2] = $value;
      }
    }
    break;
  case "Rexton":
    foreach($array_ssangyongRexton as $key1 => $value){
      foreach($array_ssangyongRexton[$key1] as $key2 => $value){
        $array_choosedModel[$key1][$key2] = $value;
      }
    }
    break;
  case "Beetle":
    foreach($array_volkswagenBeetle as $key1 => $value){
      foreach($array_volkswagenBeetle[$key1] as $key2 => $value){
        $array_choosedModel[$key1][$key2] = $value;
      }
    }
    break;
  case "Golf":
    foreach($array_volkswagenGolf as $key1 => $value){
      foreach($array_volkswagenGolf[$key1] as $key2 => $value){
        $array_choosedModel[$key1][$key2] = $value;
      }
    }
    break;
  case "Jetta":
    foreach($array_volkswagenJetta as $key1 => $value){
      foreach($array_volkswagenJetta[$key1] as $key2 => $value){
        $array_choosedModel[$key1][$key2] = $value;
      }
    }
    break;
}

$array_modelColors = [];
$array_modelBuiltYear = [];
$array_rangedMilageCarsFromChoosedModel = [];
$array_modelState = [];
$indexOfTheCar = "";
$keyToGet = "";

//Récolte les valeurs du kilométrage d'une voitures du modèle sélectionnés, puis les convertis en une catégorie.
function determinateRangeMileageForACar ($array_choosedModel,$array_rangeMilageCategory,$keyToGet){
  global $array_rangeMilageCategory;
  $textToReturn = "";
  foreach($array_choosedModel[$keyToGet] as $key => $valueMilage){
    if($key == "mileage"){
      foreach ($array_rangeMilageCategory as $key1 => $value1){
        foreach($array_rangeMilageCategory[$key1] as $valueRange){
          if ($valueMilage >= $array_rangeMilageCategory[8]["minRange"]){
            $textToReturn = $array_rangeMilageCategory[8]["textRange"];
          }
          elseif ($valueMilage >= $array_rangeMilageCategory[$key1]["minRange"] && $valueMilage < $array_rangeMilageCategory[$key1]["maxRange"]){
            $textToReturn = $array_rangeMilageCategory[$key1]["textRange"];
          }
        }
      }
    }
  }
  return $textToReturn;
}

//Créer le tableau contenant les catégories de kilométrage selon le contenu des autres variables (année de construction,couleur et l'état du véhicule).
function createArrayMileageRangeFromChoosedModel($array_choosedModel,$array_rangeMilageCategory,$array_rangedMilageCarsFromChoosedModel,$builtYear,$color,$state){
  global $array_rangeMilageCategory,$array_rangedMilageCarsFromChoosedModel,$builtYear,$color,$state;
  if($color != null && $builtYear != null && $state != null){
    foreach($array_choosedModel as $key1 => $value){
      $keyToGet = $key1;
      foreach($array_choosedModel[$key1] as $key2 => $value){
        if($array_choosedModel[$key1]["color1"] == $color || $array_choosedModel[$key1]["color2"] == $color && $array_choosedModel[$key1]["builtYear"] == $builtYear && $array_choosedModel[$key1]["state"] == $state){
        $textToAdd = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$keyToGet);
      }
      if(!in_array($textToAdd,$array_rangedMilageCarsFromChoosedModel) && $textToAdd != null){
        $array_rangedMilageCarsFromChoosedModel[] = $textToAdd;
      }
      }
    }
  }
  elseif($color != null && $builtYear == null && $state != null){
  foreach($array_choosedModel as $key1 => $value){
  $indexOfTheCar = $key1;
    foreach($array_choosedModel[$key1] as $key2 => $value){
          if($array_choosedModel[$key1]["color1"] == $color || $array_choosedModel[$key1]["color2"] == $color && $array_choosedModel[$key1]["state"] == $state){
          $textToAdd = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$indexOfTheCar);
          }
        if(!in_array($textToAdd,$array_rangedMilageCarsFromChoosedModel)){
          $array_rangedMilageCarsFromChoosedModel[] = $textToAdd;
        }
        }
      }
    }
  elseif($color == null && $builtYear != null && $state != null){
    foreach($array_choosedModel as $key1 => $value){
    $indexOfTheCar = $key1;
    foreach($array_choosedModel[$key1] as $key2 => $value){
      if($array_choosedModel[$key1]["builtYear"] == $builtYear && $array_choosedModel[$key1]["state"] == $state){
      $textToAdd = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$indexOfTheCar);
    }
      if(!in_array($textToAdd,$array_rangedMilageCarsFromChoosedModel)){
        $array_rangedMilageCarsFromChoosedModel[] = $textToAdd;
      }
      }
    }
  }
  elseif($color != null && $builtYear != null && $state == null){
    foreach($array_choosedModel as $key1 => $value){
    $indexOfTheCar = $key1;
    foreach($array_choosedModel[$key1] as $key2 => $value){
      if($array_choosedModel[$key1]["builtYear"] == $builtYear && $array_choosedModel[$key1]["color1"] == $color || $array_choosedModel[$key1]["color2"] == $color){
      $textToAdd = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$indexOfTheCar);
    }
      if(!in_array($textToAdd,$array_rangedMilageCarsFromChoosedModel)){
        $array_rangedMilageCarsFromChoosedModel[] = $textToAdd;
      }
      }
    }
  }
  elseif($color != null && $builtYear == null && $state == null){
    foreach($array_choosedModel as $key1 => $value){
    $indexOfTheCar = $key1;
    foreach($array_choosedModel[$key1] as $key2 => $value){
      if($array_choosedModel[$key1]["color1"] == $color || $array_choosedModel[$key1]["color2"] == $color){
      $textToAdd = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$indexOfTheCar);
    }
      if(!in_array($textToAdd,$array_rangedMilageCarsFromChoosedModel)){
        $array_rangedMilageCarsFromChoosedModel[] = $textToAdd;
      }
      }
    }
  }
  elseif($color == null && $builtYear != null && $state == null){
    foreach($array_choosedModel as $key1 => $value){
    $indexOfTheCar = $key1;
    foreach($array_choosedModel[$key1] as $key2 => $value){
      if($array_choosedModel[$key1]["builtYear"] == $builtYear){
      $textToAdd = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$indexOfTheCar);
    }
      if(!in_array($textToAdd,$array_rangedMilageCarsFromChoosedModel)){
        $array_rangedMilageCarsFromChoosedModel[] = $textToAdd;
      }
      }
    }
  }
  elseif($color == null && $builtYear == null && $state != null){
    foreach($array_choosedModel as $key1 => $value){
    $indexOfTheCar = $key1;
    foreach($array_choosedModel[$key1] as $key2 => $value){
      if($array_choosedModel[$key1]["state"] == $state){
      $textToAdd = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$indexOfTheCar);
    }
      if(!in_array($textToAdd,$array_rangedMilageCarsFromChoosedModel)){
        $array_rangedMilageCarsFromChoosedModel[] = $textToAdd;
      }
      }
    }
  }
  else{
    foreach($array_choosedModel as $key1 => $value){
      $indexOfTheCar = $key1;
      $textToAdd = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$indexOfTheCar);
      if(!in_array($textToAdd,$array_rangedMilageCarsFromChoosedModel)){
        $array_rangedMilageCarsFromChoosedModel[] = $textToAdd;
      }
    }
  }
}

//Permet d'ajouter un élément dans le tableau de couleurs disponibles.
function addElementModelColor ($array_choosedModel, $keyToGet, $array_modelColors){
  global $array_modelColors;
  foreach($array_choosedModel[$keyToGet] as $key2 => $value){
    if ($key2 == "color1" || $key2 == "color2"){
      if(!in_array($value,$array_modelColors) && $value != null){
        $array_modelColors[] = $value;
      }
    }
  }
}

//Permet d'ajouter un élément dans le tableau d'années de construction disponibles.
function addElementToModelBuiltYear($array_choosedModel,$keyToGet,$array_modelBuiltYear){
  global $array_modelBuiltYear;
  foreach($array_choosedModel[$keyToGet] as $key2 => $value){
    if($key2 == "builtYear"){
      if(!in_array($value,$array_modelBuiltYear) && $value != null){
        $array_modelBuiltYear[] = $value;
      }
    }
  }
}

//Permet d'ajouter un élément dans le tableau d'états de véhicule disponibles.
function addElementToModelState($array_choosedModel,$keyToGet,$array_modelState){
  global $array_modelState;
  foreach($array_choosedModel[$keyToGet] as $key2 => $value){
    if($key2 == "state"){
      if(!in_array($value,$array_modelState) && $value != null){
        $array_modelState[] = $value;
      }
    }
  }
}

//Créer le tableau contenant les années disponibles selon le contenu des autres variables (kilométrage,couleur et l'état du véhicule).
function createArrayModelBuiltYear($array_choosedModel,$array_modelBuiltYear,$color,$array_rangeMilageCategory,$milage,$state){
global $array_modelBuiltYear,$color,$mileage,$state;
  if ($color != null && $mileage != null && $state != null){
    foreach($array_choosedModel as $key1 => $value){
    $textToCompare = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$key1);
      if($array_choosedModel[$key1]["color1"] == $color || $array_choosedModel[$key1]["color2"] == $color && $textToCompare == $mileage && $array_choosedModel[$key1]["state"] == $state){
          addElementToModelBuiltYear ($array_choosedModel,$key1,$array_modelBuiltYear);
      }
    }
  }
  elseif ($color != null && $mileage == null && $state != null){
    foreach($array_choosedModel as $key1 => $value){
    $keyToGet = $key1;
      if($array_choosedModel[$key1]["color1"] == $color || $array_choosedModel[$key1]["color2"] == $color && $array_choosedModel[$key1]["state"] == $state){
        addElementToModelBuiltYear ($array_choosedModel,$key1,$array_modelBuiltYear);
      }
    }
  }
  elseif ($color == null && $mileage != null && $state != null){
    foreach($array_choosedModel as $key1 => $value){
    $keyToGet = $key1;
    $textToCompare = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$key1);
      if($textToCompare == $mileage && $array_choosedModel[$key1]["state"] == $state){
        addElementToModelBuiltYear ($array_choosedModel,$key1,$array_modelBuiltYear);
      }
    }
  }
  elseif ($color != null && $mileage != null && $state == null){
    foreach($array_choosedModel as $key1 => $value){
    $keyToGet = $key1;
    $textToCompare = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$key1);
      if($textToCompare == $mileage && $array_choosedModel[$key1]["color1"] == $color || $array_choosedModel[$key1]["color2"] == $color){
        addElementToModelBuiltYear ($array_choosedModel,$key1,$array_modelBuiltYear);
      }
    }
  }
  elseif ($color != null && $mileage == null && $state == null){
    foreach($array_choosedModel as $key1 => $value){
    $keyToGet = $key1;
      if($array_choosedModel[$key1]["color1"] == $color || $array_choosedModel[$key1]["color2"] == $color){
        addElementToModelBuiltYear ($array_choosedModel,$key1,$array_modelBuiltYear);
      }
    }
  }
  elseif ($color == null && $mileage != null && $state == null){
    foreach($array_choosedModel as $key1 => $value){
    $keyToGet = $key1;
    $textToCompare = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$key1);
      if($textToCompare == $mileage){
        addElementToModelBuiltYear ($array_choosedModel,$key1,$array_modelBuiltYear);
      }
    }
  }
  elseif ($color == null && $mileage == null && $state != null){
    foreach($array_choosedModel as $key1 => $value){
    $keyToGet = $key1;
      if($array_choosedModel[$key1]["state"] == $state){
        addElementToModelBuiltYear ($array_choosedModel,$key1,$array_modelBuiltYear);
      }
    }
  }
  else{
    foreach($array_choosedModel as $key1 => $value){
      $keyToGet = $key1;
      addElementToModelBuiltYear ($array_choosedModel,$key1,$array_modelBuiltYear);
    }
  }
}

//Créer le tableau contenant les couleurs disponibles selon le contenu des autres variables (année de construction, le kilométrage et l'état du véhicule).
function createArrayModelColor($array_choosedModel,$array_modelColors,$builtYear,$mileage,$state){
global $array_modelColors,$builtYear,$color,$state;
  if ($builtYear != null && $mileage != null && $state != null){
    foreach($array_choosedModel as $key1 => $value){
    $keyToGet = $key1;
    $textToCompare = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$key1);
      if($array_choosedModel[$key1]["builtYear"] == $builtYear && $textToCompare == $mileage && $array_choosedModel[$key1]["state"] == $state){
        addElementModelColor ($array_choosedModel,$key1,$array_modelColors);
      }
    }
  }
  elseif ($builtYear != null && $mileage == null && $state !=null){
    foreach($array_choosedModel as $key1 => $value){
    $keyToGet = $key1;
      if($array_choosedModel[$key1]["builtYear"] == $builtYear && $array_choosedModel[$key1]["state"] == $state){
        addElementModelColor ($array_choosedModel,$key1,$array_modelColors);
      }
    }
  }
  elseif ($builtYear == null && $mileage != null && $state != null){
    foreach($array_choosedModel as $key1 => $value){
    $keyToGet = $key1;
    $textToCompare = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$key1);
      if($textToCompare == $mileage && $array_choosedModel[$key1]["state"] == $state){
        addElementModelColor ($array_choosedModel,$key1,$array_modelColors);
      }
    }
  }
  elseif ($builtYear != null && $mileage != null && $state == null){
    foreach($array_choosedModel as $key1 => $value){
    $keyToGet = $key1;
    $textToCompare = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$key1);
      if($textToCompare == $mileage && $array_choosedModel[$key1]["builtYear"] == $builtYear){
        addElementModelColor ($array_choosedModel,$key1,$array_modelColors);
      }
    }
  }
  elseif ($builtYear != null && $mileage == null && $state == null){
    foreach($array_choosedModel as $key1 => $value){
    $keyToGet = $key1;
    $textToCompare = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$key1);
      if($array_choosedModel[$key1]["builtYear"] == $builtYear){
        addElementModelColor ($array_choosedModel,$key1,$array_modelColors);
      }
    }
  }
  elseif ($builtYear == null && $mileage != null && $state == null){
    foreach($array_choosedModel as $key1 => $value){
    $keyToGet = $key1;
    $textToCompare = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$key1);
      if($textToCompare == $mileage){
        addElementModelColor ($array_choosedModel,$key1,$array_modelColors);
      }
    }
  }
  elseif ($builtYear == null && $mileage == null && $state != null){
    foreach($array_choosedModel as $key1 => $value){
    $keyToGet = $key1;
    $textToCompare = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$key1);
      if($array_choosedModel[$key1]["state"] == $state){
        addElementModelColor ($array_choosedModel,$key1,$array_modelColors);
      }
    }
  }
  else{
    foreach($array_choosedModel as $key1 => $value){
      $keyToGet = $key1;
      addElementModelColor ($array_choosedModel,$key1,$array_modelColors);
    }
  }
}

//Créer le tableau contenant les états du véhicule disponibles selon le contenu des autres variables (année de construction,couleur et le kilométrage).
function createArrayModelState($array_choosedModel,$array_modelState,$color,$array_rangeMilageCategory,$milage,$builtYear){
global $array_modelState,$color,$mileage,$builtYear;
  if ($color != null && $mileage != null && $builtYear != null){
    foreach($array_choosedModel as $key1 => $value){
    $textToCompare = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$key1);
      if($array_choosedModel[$key1]["color1"] == $color || $array_choosedModel[$key1]["color2"] == $color && $textToCompare == $mileage && $array_choosedModel[$key1]["builtYear"] == $builtYear){
          addElementToModelState ($array_choosedModel,$key1,$array_modelState);
      }
    }
  }
  elseif ($color != null && $mileage == null && $builtYear != null){
    foreach($array_choosedModel as $key1 => $value){
      if($array_choosedModel[$key1]["color1"] == $color || $array_choosedModel[$key1]["color2"] == $color && $array_choosedModel[$key1]["builtYear"] == $builtYear){
        addElementToModelState ($array_choosedModel,$key1,$array_modelState);
      }
    }
  }
  elseif ($color == null && $mileage != null && $builtYear != null){
    foreach($array_choosedModel as $key1 => $value){
    $textToCompare = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$key1);
      if($textToCompare == $mileage && $array_choosedModel[$key1]["builtYear"] == $builtYear){
        addElementToModelState ($array_choosedModel,$key1,$array_modelState);
      }
    }
  }
  elseif ($color != null && $mileage != null && $builtYear == null){
    foreach($array_choosedModel as $key1 => $value){
    $textToCompare = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$key1);
      if($textToCompare == $mileage && $array_choosedModel[$key1]["color1"] == $color || $array_choosedModel[$key1]["color2"] == $color){
        addElementToModelState ($array_choosedModel,$key1,$array_modelState);
      }
    }
  }
  elseif ($color != null && $mileage == null && $builtYear == null){
    foreach($array_choosedModel as $key1 => $value){
      if($array_choosedModel[$key1]["color1"] == $color || $array_choosedModel[$key1]["color2"] == $color){
        addElementToModelState ($array_choosedModel,$key1,$array_modelState);
      }
    }
  }
  elseif ($color == null && $mileage != null && $builtYear == null){
    foreach($array_choosedModel as $key1 => $value){
    $textToCompare = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$key1);
      if($textToCompare == $mileage){
        addElementToModelState ($array_choosedModel,$keyToGet,$array_modelState);
      }
    }
  }
  elseif ($color == null && $mileage == null && $builtYear != null){
    foreach($array_choosedModel as $key1 => $value){
      if($array_choosedModel[$key1]["builtYear"] == $builtYear){
        addElementToModelState ($array_choosedModel,$key1,$array_modelState);
      }
    }
  }
  else{
    foreach($array_choosedModel as $key1 => $value){
      addElementToModelState ($array_choosedModel,$key1,$array_modelState);
    }
  }
}

// Création du menu déroulang contenant les couleurs disponibles selon les choix de l'utilisateur.
function createSelectedCarColors($array_choosedModel,$array_modelColors,$color,$builtYear,$mileage,$state){
  global $array_modelColors;
  echo "<select name=color>";
  echo "<option value=". null . "> </option>";
  createArrayModelColor($array_choosedModel,$array_modelColors,$builtYear,$array_rangeMilageCategory,$mileage,$state);
  foreach($array_modelColors as $value){
    if($color == null){
      echo "<option value=" . "\"". $value . "\"" . ">" . $value . "</option>";
    }
    else {
      if($value == $color){
        echo "<option selected value=" . "\"". $value . "\"" . ">" . $value . "</option>";
      }
      else{
        echo "<option value=" . "\"". $value . "\"" . ">" . $value . "</option>";
      }
    }
  }
  echo "</select>";
  echo "<input type =". "\"" . "submit" . "\"". "name=" . "\"" . "submit_color" . "\"". "value=" . "\"" . "Ok" . "\"" . ">";
}

// Création du menu déroulang contenant les années de fabrication disponibles selon les choix de l'utilisateur.
function createSelectedCarBuiltYear($array_choosedModel,$array_modelBuiltYear,$color,$builtYear,$mileage,$state){
  global $array_modelBuiltYear/*,$color,$mileage,$builtYear,$state*/;
  echo "<select name=builtYear>";
  echo "<option value=". null . "> </option>";
  createArrayModelBuiltYear($array_choosedModel,$array_modelBuiltYear,$builtYear,$array_rangeMilageCategory,$mileage,$state);
  foreach($array_modelBuiltYear as $value){
    if($builtYear == null){
      echo "<option value=" . "\"". $value . "\"" . ">" . $value . "</option>";
    }
    else {
      if($value == $builtYear){
        echo "<option selected value=" . "\"". $value . "\"" . ">" . $value . "</option>";
      }
      else{
        echo "<option value=" . "\"". $value . "\"" . ">" . $value . "</option>";
      }
    }
  }
  echo "</select>";
  echo "<input type =". "\"" . "submit" . "\"". "name=" . "\"" . "submit_builtYear" . "\"". "value=" . "\"" . "Ok" . "\"" . ">";
}

// Création du menu déroulang contenant les écarts de kilométrage disponibles selon les choix de l'utilisateur.
function createSelectedCarRangedMileage($array_choosedModel,$array_rangedMilageCarsFromChoosedModel, $array_rangeMilageCategory,$color,$builtYear,$state){
  global $array_choosedModel,$array_rangedMilageCarsFromChoosedModel,$array_rangeMilageCategory,$color,$mileage,$state;
  echo "<select name=mileage>";
  echo "<option value=". null . "> </option>";
  createArrayMileageRangeFromChoosedModel($array_choosedModel,$array_rangeMilageCategory,$array_rangedMilageCarsFromChoosedModel,$builtYear,$color,$state);
  foreach($array_rangedMilageCarsFromChoosedModel as $value){
    if($mileage == null){
      echo "<option value=" . "\"". $value . "\"" . ">" . $value . "</option>";
    }
    else {
      if($value == $mileage && $value != null){
        echo "<option selected value=" . "\"". $value . "\"" . ">" . $value . "</option>";
      }
      else{
      echo "<option value=" . "\"". $value . "\"" . ">" . $value . "</option>";
      }
    }
  }
  echo "</select>";
  echo "<input type =". "\"" . "submit" . "\"". "name=" . "\"" . "submit_mileage" . "\"". "value=" . "\"" . "Ok" . "\"" . ">";
}

// Création du menu déroulang contenant les états du véhicule disponibles selon les choix de l'utilisateur. 
function createSelectedCarState($array_choosedModel,$array_modelState,$builtYear,$mileage,$color,$state){
  global $array_modelState,$builtYear,$color,$mileage,$color,$state;
  echo "<select name=state>";
  echo "<option value=". null . "> </option>";
  createArrayModelState($array_choosedModel,$array_modelState,$builtYear,$array_rangeMilageCategory,$mileage,$color);
  foreach($array_modelState as $value){
    if($state == null){
      echo "<option value=" . "\"". $value . "\"" . ">" . $value . "</option>";
    }
    else {
      if($value == $state){
        echo "<option selected value=" . "\"". $value . "\"" . ">" . $value . "</option>";
      }
      else{
        echo "<option value=" . "\"". $value . "\"" . ">" . $value . "</option>";
      }
    }
  }
  echo "</select>";
  echo "<input type =". "\"" . "submit" . "\"". "name=" . "\"" . "submit_state" . "\"". "value=" . "\"" . "Ok" . "\"" . ">";
}

include_once 'vues/accueil.php';
?>
