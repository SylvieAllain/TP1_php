<!--
Programmation Web II - TP1
Projet : Voiture @Variée
Hiver 2019
Auteur: Sylvie Allain & Cyrice Paradis
-->

<?php
include_once 'vues/banner.php';
include "modeles/model_cars.php";

$brand = (!empty($_POST['brand'])) ? ($_POST['brand']) : "Lada";
$submit_brand = (!empty($_POST['submit_brand'])) ? ($_POST['submit_brand']) : null;
$model = (!empty($_POST['model'])) ? ($_POST['model']) : "Granta";
$submit_model = (!empty($_POST['submit_model'])) ? ($_POST['submit_model']) : null;
$color = (!empty($_POST['color'])) ? ($_POST['color']) : null;
$submit_color = (!empty($_POST['submit_color'])) ? ($_POST['submit_color']) : null;
$builtYear = (!empty($_POST['builtYear'])) ? ($_POST['builtYear']) : null;
$submit_builtYear = (!empty($_POST['submit_builtYear'])) ? ($_POST['submit_builtYear']) : null;
$search = (!empty($_POST['search'])) ? ($_POST['search']) : null;

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
  echo "<input type=". "\"" . "submit" . "\"" . "name=" . "\"" . "submit_model" . "\"". "value=" . "\"" . "Ok". "\"". ">";
}

$array_modelColors = [];
$array_modelBuiltYear = [];
// $array_choosedModel = [];

$array_choosedModel = [
  "car1" => ["imageSrc" => null ,"miniSrc" => null, "nameMini" => null,"brand" => null, "model" => null, "builtYear"=> null, "color1"=> null, "color2" => null, "description" => null, "price" => null ],
  "car2" => ["imageSrc" => null ,"miniSrc" => null, "nameMini" => null,"brand" => null, "model" => null, "builtYear"=> null, "color1"=> null, "color2" => null, "description" => null, "price" => null],
  "car3" => ["imageSrc" => null ,"miniSrc" => null, "nameMini" => null,"brand" => null, "model" => null, "builtYear"=> null, "color1"=> null, "color2" => null, "description" => null, "price" => null]
];




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

function selectedCarColors($array_choosedModel,$builtYear){
  echo '<select name='.'"'.'color'.'"'.'>';
  foreach($array_choosedModel as $key1=>$value){
    if ($builtYear != null && $array_choosedModel[$key1]["builtYear"] == $builtYear){
      foreach ($array_choosedModel[$key1] as $key2=>$value){
        if ($key2 == "color1" || $key2 == "color2"){
          if(!in_array($value,$array_modelColors) && $value != null){
            if ($color == $value){
              echo "<option selected value="."\""."$value"."\"".">" . "$value" . "</option>";
              $array_modelColors[] = $value;
            }
            else{
              echo "<option value="."\""."$value"."\"".">" . "$value" . "</option>";
              $array_modelColors[] = $value;
            }
          }
        }
      }
    }
  }
  echo "</select>";
  echo "<input type =". "\"" . "submit" . "\"". "name=" . "\"" . "submit_color" . "\"". "value=" . "\"" . "Ok" . "\"" . ">";
}

function selectedCarBuiltYear($array_choosedModel,$color){
  $array_modelBuiltYear = [];
  echo '<select name='.'"'.'builtYear'.'"'.'>';
  foreach($array_choosedModel as $key1=>$value){
    if ($color != null){
      if ($array_choosedModel[$key1]["color1"] == $color || $array_choosedModel[$key1]["color2"] == $color){
        foreach($array_choosedModel[$key1] as $key2 => $value){
          if($key2 == "builtYear"){
            if(!in_array($value,$array_modelColors) && $value != null){
              if ($color == $value){
                echo "<option selected value="."\""."$value"."\"".">" . "$value" . "</option>";
                $array_modelBuiltYear[] = $value;
              }
              else{
                echo "<option value="."\""."$value"."\"".">" . "$value" . "</option>";
                $array_modelBuiltYear[] = $value;
              }
            }
          }
        }
      }
    }
  }
  echo "</select>";
  echo "<input type =". "\"" . "submit" . "\"". "name=" . "\"" . "submit_builtYear" . "\"". "value=" . "\"" . "Ok" . "\"" . ">";
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
