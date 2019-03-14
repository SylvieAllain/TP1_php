<!--
Programmation Web II - TP1
Projet : Voiture @Variée
Hiver 2019
Auteur: Sylvie Allain & Cyrice Paradis
-->

<?php
//TODO Tenter également de retirer tout les éléments globals.
$pageTitle = "Accueil";
include_once 'vues/banner.php';
include "modeles/model_cars.php";
include "controleurs/fonction.php";
$isIndex = true;
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
  echo "<select name=brand>";
  foreach($array_brandAndModel as $key=>$value){
    if ($brand == $key){
      echo "<option selected value="."\""."$key"."\"".">" . "$key" . "</option>";
    }
    else{
      echo "<option value="."\""."$key"."\"".">" . "$key" . "</option>";
    }
  }
  echo "</select>";
  echo "<input type=". "\"" . "submit" . "\"" . "name=" . "\"" . "submit_brand" . "\"". "class=\"btn btn-success\"" . "value=" . "\"" . "Ok". "\"". ">";
}

//Crée le menu déroulant pour les modèles de voitures rattachés à la marque sélectionnée.
function createSelectedCarModel($array_brandAndModel,$brand,$model){
  echo "<select name=model>";
  foreach($array_brandAndModel[$brand] as $key=> $value){
    if($array_brandAndModel[$brand][$key] == $model){
      echo "<option selected value="."\""."$value"."\"".">" . "$value" . "</option>";
    }
    else{
      echo "<option value="."\""."$value"."\"".">" . "$value" . "</option>";
    }
  }
  echo "</select>";
  echo "<input type=". "\"" . "submit" . "\"" . "name=" . "\"" . "submit_model" . "\"". "class=\"btn btn-success\"" . "value=" . "\"" . "Ok". "\"". ">";
}

$array_choosedModel = determineCarsByModel($model,$isIndex);

$array_modelColors = [];
$array_modelBuiltYear = [];
$array_rangedMilageCarsFromChoosedModel = [];
$array_modelState = [];


//Créer le tableau contenant les catégories de kilométrage selon le contenu des autres variables (année de construction,couleur et l'état du véhicule).
function createArrayMileageRangeFromChoosedModel($array_choosedModel,$array_category,$array_rangedMilageCarsFromChoosedModel,$option1,$option2,$option3,$isIndex){
  global $array_rangedMilageCarsFromChoosedModel;
  if($option1 != null && $option2 != null && $option3 != null){
    foreach($array_choosedModel as $key1 => $value){
      foreach($array_choosedModel[$key1] as $key2 => $value){
        if(($array_choosedModel[$key1]["color1"] == $option1 || $array_choosedModel[$key1]["color2"] == $option1) && $array_choosedModel[$key1]["builtYear"] == $option2 && $array_choosedModel[$key1]["state"] == $option3){
          $textToAdd = determinateRangeMileageForACar($array_choosedModel,$array_category,$key1,$isIndex);
          if(!in_array($textToAdd,$array_rangedMilageCarsFromChoosedModel) && $textToAdd != null){
            $array_rangedMilageCarsFromChoosedModel[] = $textToAdd;
          }
        }
      }
    }
  }
  elseif($option1 != null && $option2 == null && $option3 != null){
    foreach($array_choosedModel as $key1 => $value){
      foreach($array_choosedModel[$key1] as $key2 => $value){
            if(($array_choosedModel[$key1]["color1"] == $option1 || $array_choosedModel[$key1]["color2"] == $option1) && $array_choosedModel[$key1]["state"] == $option3){
              $textToAdd = determinateRangeMileageForACar($array_choosedModel,$array_category,$key1,$isIndex);
              if(!in_array($textToAdd,$array_rangedMilageCarsFromChoosedModel) && $textToAdd != null){
                $array_rangedMilageCarsFromChoosedModel[] = $textToAdd;
              }
            }
          }
        }
    }
  elseif($option1 == null && $option2 != null && $option3 != null){
    foreach($array_choosedModel as $key1 => $value){
      foreach($array_choosedModel[$key1] as $key2 => $value){
        if($array_choosedModel[$key1]["builtYear"] == $option2 && $array_choosedModel[$key1]["state"] == $option3){
          $textToAdd = determinateRangeMileageForACar($array_choosedModel,$array_category,$key1,$isIndex);
          if(!in_array($textToAdd,$array_rangedMilageCarsFromChoosedModel) && $textToAdd != null){
            $array_rangedMilageCarsFromChoosedModel[] = $textToAdd;
          }
        }
      }
    }
  }
  elseif($option1 != null && $option2 != null && $option3 == null){
    foreach($array_choosedModel as $key1 => $value){
      foreach($array_choosedModel[$key1] as $key2 => $value){
        if(($array_choosedModel[$key1]["color1"] == $option1 || $array_choosedModel[$key1]["color2"]) == $option1 && $array_choosedModel[$key1]["builtYear"] == $option2 ){
          $textToAdd = determinateRangeMileageForACar($array_choosedModel,$array_category,$key1,$isIndex);
          if(!in_array($textToAdd,$array_rangedMilageCarsFromChoosedModel) && $textToAdd != null){
            $array_rangedMilageCarsFromChoosedModel[] = $textToAdd;
          }
        }
      }
    }
  }
  elseif($option1 != null && $option2 == null && $option3 == null){
    foreach($array_choosedModel as $key1 => $value){
      foreach($array_choosedModel[$key1] as $key2 => $value){
        if($array_choosedModel[$key1]["color1"] == $option1 || $array_choosedModel[$key1]["color2"] == $option1){
          $textToAdd = determinateRangeMileageForACar($array_choosedModel,$array_category,$key1,$isIndex);
          if(!in_array($textToAdd,$array_rangedMilageCarsFromChoosedModel) && $textToAdd != null){
            $array_rangedMilageCarsFromChoosedModel[] = $textToAdd;
          }
        }
      }
    }
  }
  elseif($option1 == null && $option2 != null && $option3 == null){
    foreach($array_choosedModel as $key1 => $value){
      foreach($array_choosedModel[$key1] as $key2 => $value){
        if($array_choosedModel[$key1]["builtYear"] == $option2){
          $textToAdd = determinateRangeMileageForACar($array_choosedModel,$array_category,$key1,$isIndex);
          if(!in_array($textToAdd,$array_rangedMilageCarsFromChoosedModel) && $textToAdd != null){
            $array_rangedMilageCarsFromChoosedModel[] = $textToAdd;
          }
        }
      }
    }
  }
  elseif($option1 == null && $option2 == null && $option3 != null){
    foreach($array_choosedModel as $key1 => $value){
      foreach($array_choosedModel[$key1] as $key2 => $value){
        if($array_choosedModel[$key1]["state"] == $option3){
          $textToAdd = determinateRangeMileageForACar($array_choosedModel,$array_category,$key1,$isIndex);
          if(!in_array($textToAdd,$array_rangedMilageCarsFromChoosedModel) && $textToAdd != null){
            $array_rangedMilageCarsFromChoosedModel[] = $textToAdd;
          }
        }
      }
    }
  }
  else{
    foreach($array_choosedModel as $key1 => $value){
      $textToAdd = determinateRangeMileageForACar($array_choosedModel,$array_category,$key1,$isIndex);
      if(!in_array($textToAdd,$array_rangedMilageCarsFromChoosedModel) && $textToAdd != null){
        $array_rangedMilageCarsFromChoosedModel[] = $textToAdd;
      }
    }
  }
}

//R
function getKeyName1($mainValue){
  $keyName1 = "";
  if ($mainValue == "color"){
    $keyName1 = "color1";
  }
  else if($mainValue == "builtYear"){
    $keyName1 = "builtYear";
  }
  else if($mainValue == "state"){
    $keyName1 = "state";
  }
  else {
    $keyName1 = null;
  }
  return $keyName1;
}

function getKeyName2($mainValue){
  $keyName2 = "";
  if ($mainValue == "color"){
    $keyName2 = "color2";
  }
  else if($mainValue == "builtYear"){
    $keyName2 = "builtYear";
  }
  else if ($mainValue == "state"){
    $keyName2 = "state";
  }
  else {
    $keyName2 = null;
  }
  return $keyName2;
}

function addElementToDropDownMenu ($array_choosedModel, $keyToGet, $array_toDropDownMenu, $mainValue){
  global $array_modelColors,$array_modelBuiltYear, $array_modelState;
  $mainKeyName1 = getKeyName1 ($mainValue);
  $mainKeyName2 = getKeyName2 ($mainValue);
  foreach($array_choosedModel[$keyToGet] as $key2 => $value){
    if ($key2 == $mainKeyName1 || $key2 == $mainKeyName2){
      $array_toDropDownMenu[] = $value;
    }
  }
  if ($mainValue == "color"){
    foreach($array_toDropDownMenu as $value){
      if(!in_array($value,$array_modelColors) && $value != null)
      $array_modelColors[] = $value;
    }
  }
  if ($mainValue == "builtYear"){
    foreach($array_toDropDownMenu as $value){
      if(!in_array($value,$array_modelBuiltYear) && $value != null)
      $array_modelBuiltYear[] = $value;
    }
  }
  if ($mainValue == "state"){
    foreach($array_toDropDownMenu as $value){
      if(!in_array($value,$array_modelState) && $value != null)
      $array_modelState[] = $value;
    }
  }
}

function createArrayForACarOption($array_choosedModel,$array_category,$array_toDropDownMenu, $option1, $option2, $option3, $keyName1, $keyName2, $keyName3, $mainValueName,$isIndex){
  if ($option1 != null && $option2 != null && $option3 != null){
    foreach($array_choosedModel as $key1 => $value){
    $textToCompare = determinateRangeMileageForACar($array_choosedModel,$array_category,$key1,$isIndex);
      if(($array_choosedModel[$key1][$keyName1] == $option1 || $array_choosedModel[$key1][$keyName3] == $option1) && $textToCompare == $option2 && $array_choosedModel[$key1][$keyName2] == $option3){
      addElementToDropDownMenu ($array_choosedModel,$key1,$array_toDropDownMenu, $mainValueName);
      }
    }
  }
  elseif ($option1 != null && $option2 == null && $option3 != null){
    foreach($array_choosedModel as $key1 => $value){
      if(($array_choosedModel[$key1][$keyName1] == $option1 || $array_choosedModel[$key1][$keyName3] == $option1) && $array_choosedModel[$key1][$keyName2] == $option3){
      addElementToDropDownMenu ($array_choosedModel,$key1,$array_toDropDownMenu, $mainValueName);
      }
    }
  }
  elseif ($option1 == null && $option2 != null && $option3 != null){
    foreach($array_choosedModel as $key1 => $value){
    $textToCompare = determinateRangeMileageForACar($array_choosedModel,$array_category,$key1,$isIndex);
      if($textToCompare == $option2 && $array_choosedModel[$key1][$keyName2] == $option3){
      addElementToDropDownMenu ($array_choosedModel,$key1,$array_toDropDownMenu, $mainValueName);
      }
    }
  }
  elseif ($option1 != null && $option2 != null && $option3 == null){
    foreach($array_choosedModel as $key1 => $value){
    $textToCompare = determinateRangeMileageForACar($array_choosedModel,$array_category,$key1,$isIndex);
      if(($array_choosedModel[$key1][$keyName1] == $option1 || $array_choosedModel[$key1][$keyName3] == $option1) && $textToCompare == $option2 ){
      addElementToDropDownMenu ($array_choosedModel,$key1,$array_toDropDownMenu, $mainValueName);
      }
    }
  }
  elseif ($option1 != null && $option2 == null && $option3 == null){
    foreach($array_choosedModel as $key1 => $value){
      if($array_choosedModel[$key1][$keyName1] == $option1 || $array_choosedModel[$key1][$keyName3] == $option1){
      addElementToDropDownMenu ($array_choosedModel,$key1,$array_toDropDownMenu,$mainValueName);
      }
    }
  }
  elseif ($option1 == null && $option2 != null && $option3 == null){
    foreach($array_choosedModel as $key1 => $value){
    $textToCompare = determinateRangeMileageForACar($array_choosedModel,$array_category,$key1,$isIndex);
      if($textToCompare == $option2){
      addElementToDropDownMenu ($array_choosedModel,$key1,$array_toDropDownMenu,$mainValueName);
      }
    }
  }
  elseif ($option1 == null && $option2 == null && $option3 != null){
    foreach($array_choosedModel as $key1 => $value){
      if($array_choosedModel[$key1][$keyName2] == $option3){
      addElementToDropDownMenu ($array_choosedModel,$key1,$array_toDropDownMenu,$mainValueName);
      }
    }
  }
  else{
    foreach($array_choosedModel as $key1 => $value){
    addElementToDropDownMenu ($array_choosedModel,$key1,$array_toDropDownMenu,$mainValueName);
    }
  }
}

createArrayForACarOption($array_choosedModel,$array_rangeMilageCategory,$array_modelColors,$builtYear,$mileage,$state,"builtYear","state", "builtYear", "color",$isIndex);
createArrayForACarOption($array_choosedModel,$array_rangeMilageCategory,$array_modelBuiltYear,$color,$mileage,$state,"color1","state","color2","builtYear",$isIndex);
createArrayMileageRangeFromChoosedModel($array_choosedModel,$array_rangeMilageCategory,$array_rangedMilageCarsFromChoosedModel,$color,$builtYear,$state,$isIndex);
createArrayForACarOption($array_choosedModel,$array_rangeMilageCategory,$array_modelState,$color,$mileage,$builtYear,"color1","builtYear","color2","state",$isIndex);


// Création du menu déroulang contenant les couleurs disponibles selon les choix de l'utilisateur.
function createSelectedList($array_toDropDownMenu, $mainValue, $nameOfSelectMenu, $nameOfSubmitButton){
  echo "<select name=".$nameOfSelectMenu.">";
  echo "<option value=". null . "> </option>";
  foreach($array_toDropDownMenu as $value){
    if($mainValue == null){
      echo "<option value=" . "\"". $value . "\"" . ">" . $value . "</option>";
    }
    else {
      if($value == $mainValue){
        echo "<option selected value=" . "\"". $value . "\"" . ">" . $value . "</option>";
      }
      else{
        echo "<option value=" . "\"". $value . "\"" . ">" . $value . "</option>";
      }
    }
  }
  echo "</select>";
  echo "<input type =". "\"" . "submit" . "\"". "name=" . "\"" . $nameOfSubmitButton . "\"". "class=\"btn btn-success\"" . "value=" . "\"" . "Ok" . "\"" . ">";
}

include_once 'vues/accueil.php';
?>
