<!--
Programmation Web II - TP1
Projet : Voiture @Variée
Hiver 2019
Auteur: Sylvie Allain & Cyrice Paradis
-->

<?php

function determineCarsByModel($model,$isIndex){
  if($isIndex){
    include "modeles/model_cars.php";
  }
  else {
    include "../modeles/model_cars.php";
  }

  $array_cars = [];
  switch ($model){
    case "Granta":
      foreach($array_ladaGranta as $key => $value){
        $array_cars[$key] = $value;
        }
    break;
    case "Largus":
      foreach($array_ladaLargus as $key => $value){
        $array_cars[$key] = $value;
        }
      break;
    case "Niva":
      foreach($array_ladaNiva as $key => $value){
        $array_cars[$key] = $value;
        }
    break;
    case "Firebird":
      foreach($array_pontiacFirebird as $key => $value){
        $array_cars[$key] = $value;
        }
    break;
    case "GTO":
      foreach($array_pontiacGTO as $key => $value){
        $array_cars[$key] = $value;
        }
    break;
    case "Sunfire":
      foreach($array_pontiacSunfire as $key => $value){
        $array_cars[$key] = $value;
        }
      break;
    case "Korando":
      foreach($array_ssangyongKorando as $key => $value){
        $array_cars[$key] = $value;
        }
      break;
    case "Musso":
      foreach($array_ssangyongMusso as $key => $value){
        $array_cars[$key] = $value;
        }
    break;
    case "Rexton":
      foreach($array_ssangyongRexton as $key => $value){
        $array_cars[$key] = $value;
        }
      break;
    case "Beetle":
      foreach($array_volkswagenBeetle as $key => $value){
        $array_cars[$key] = $value;
        }
      break;
    case "Golf":
      foreach($array_volkswagenGolf as $key => $value){
        $array_cars[$key] = $value;
        }
      break;
    case "Jetta":
      foreach($array_volkswagenJetta as $key => $value){
        $array_cars[$key] = $value;
        }
      break;
    }
  /*
  default:
    throw new Exception("Bravo! Tu as brisé le site...");
    */
  return $array_cars;
}

function determinateRangeMileageForACar ($array_pictures,$array_rangeMilageCategory,$keyToGet,$isIndex){
  $textToReturn = "";
  foreach($array_pictures[$keyToGet] as $key => $valueMilage){
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
  if(!$isIndex){
    $textToReturn = str_replace(" ", "", $textToReturn);
  }
  return $textToReturn;
}

?>
