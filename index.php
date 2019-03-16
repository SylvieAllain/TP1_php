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

  $array_usingKey = [
    "color1" => $color,
    "color2" => $color,
    "builtYear" => $builtYear,
    "mileage" => $mileage,
    "state" => $state
  ];

function createArrayOfKeyNeeded ($array_choosedModel,$array_usingKey,$array_rangeMilageCategory,$isIndex){
  $array_toReturn = [];
  foreach($array_choosedModel as $keyModel => $valueModel){
    $isKeyBelong = true;
    $arrayLength = sizeOf($array_usingKey);
      foreach($array_choosedModel[$keyModel] as $keyModel2 => $valueModel2){
        foreach($array_usingKey as $keyUsing => $valueKey){
          if($isKeyBelong){
            if($keyUsing == $keyModel2){
              if($keyUsing == "color1"){
                if ($array_choosedModel[$keyModel][$keyModel2] != $valueKey && $array_choosedModel[$keyModel]["color2"] != $valueKey && $valueKey != null){
                  $isKeyBelong = false;
                }
              }
              elseif($keyUsing == "color2"){
                if($array_choosedModel[$keyModel][$keyModel2] != $valueKey && $array_choosedModel[$keyModel]["color1"] != $valueKey && $valueKey != null){
                  $isKeyBelong = false;
                }
              }
              elseif ($keyUsing == "mileage"){
                $textToCompare = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$keyModel,$isIndex);
                if($textToCompare != $valueKey && $valueKey != null){
                  $isKeyBelong = false;
                }
              }
              else{
                if($array_choosedModel[$keyModel][$keyModel2] != $valueKey && $valueKey != null){
                  $isKeyBelong = false;
                }
              }
            }
          }
        }
      }
    if($isKeyBelong){
      $array_toReturn[] = $keyModel;
    }
  }
  return $array_toReturn;
}

$array_keyNeeded = createArrayOfKeyNeeded ($array_choosedModel,$array_usingKey,$array_rangeMilageCategory,$isIndex);

function createArrayOptionAvailable($array_choosedModel,$array_keyNeeded,$array_rangeMilageCategory,$isIndex,$optionName){
  $array_toDropDownList = [];
  foreach($array_choosedModel as $key1 => $value1){
    foreach($array_keyNeeded as $valueKey){
      if ($valueKey == $key1){
        foreach($array_choosedModel[$key1] as $key2 => $value2){
          if($optionName == "color" && $key2 == "color1"){
            if(!in_array($value2,$array_toDropDownList) && $value2 != null){
              $array_toDropDownList[] = $value2;
            }
          }
          elseif ($optionName == "color" && $key2 == "color2"){
            if(!in_array($value2,$array_toDropDownList) && $value2 != null){
              $array_toDropDownList[] = $value2;
            }
          }
          elseif($optionName == "mileage" && $key2 == $optionName){
            $textToCompare = determinateRangeMileageForACar($array_choosedModel,$array_rangeMilageCategory,$key1,$isIndex);
            if(!in_array($textToCompare,$array_toDropDownList) && $value2 != null){
              $array_toDropDownList[] = $textToCompare;
            }
          }
          elseif ($key2 == $optionName) {
            if(!in_array($value2,$array_toDropDownList) && $value2 != null){
              $array_toDropDownList[] = $value2;
            }
          }
        }
      }
    }
  }
  return $array_toDropDownList;
}

$array_modelColors = createArrayOptionAvailable($array_choosedModel,$array_keyNeeded,$array_rangeMilageCategory, $isIndex,"color");
$array_modelBuiltYear = createArrayOptionAvailable($array_choosedModel,$array_keyNeeded,$array_rangeMilageCategory, $isIndex,"builtYear");
$array_modelRangedMileage = createArrayOptionAvailable($array_choosedModel,$array_keyNeeded,$array_rangeMilageCategory, $isIndex,"mileage");
$array_modelState = createArrayOptionAvailable($array_choosedModel,$array_keyNeeded,$array_rangeMilageCategory, $isIndex,"state");

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
