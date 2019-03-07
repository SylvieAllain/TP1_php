<?php

function determineCarsByModel($model){
  include "../modeles/model_cars.php";
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

?>
